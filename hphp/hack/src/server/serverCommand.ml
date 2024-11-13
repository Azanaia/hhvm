(*
 * Copyright (c) 2015, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the "hack" directory of this source tree.
 *
 *)

open Hh_prelude
open Utils
open ServerCommandTypes

exception Nonfatal_rpc_exception of Exception.t * ServerEnv.env

let reason = ServerCommandTypesUtils.debug_describe_cmd

(****************************************************************************)
(* Called by the server *)
(****************************************************************************)

(* Only grant access to dependency table to commands that declared that they
 * need full check - without full check, there are no guarantees about
 * dependency table being up to date. *)
let with_dependency_table_reads mode full_recheck_needed f =
  let deptable_unlocked =
    if full_recheck_needed then
      Some (Typing_deps.allow_dependency_table_reads mode true)
    else
      None
  in
  try_finally ~f ~finally:(fun () ->
      Option.iter deptable_unlocked ~f:(fun deptable_unlocked ->
          ignore
            (Typing_deps.allow_dependency_table_reads mode deptable_unlocked
              : bool)))

(** Construct a continuation that will finish handling the command and update
    the environment. The server can execute the continuation immediately, or store it
    to be completed later (when full recheck is completed, when workers are
    available, when current recheck is cancelled... *)
let actually_handle genv client msg full_recheck_needed ~is_stale env =
  Hh_logger.debug "SeverCommand.actually_handle preamble";
  with_dependency_table_reads env.ServerEnv.deps_mode full_recheck_needed
  @@ fun () ->
  Errors.ignore_ @@ fun () ->
  assert (
    (not full_recheck_needed)
    || ServerEnv.(is_full_check_done env.full_check_status));

  ClientProvider.track
    client
    ~key:Connection_tracker.Server_done_full_recheck
    ~long_delay_okay:true;

  let (_metadata, cmd) = msg in
  ClientProvider.ping client;
  let t_start = Unix.gettimeofday () in
  ClientProvider.track
    client
    ~key:Connection_tracker.Server_start_handle
    ~time:t_start;
  Sys_utils.start_gc_profiling ();
  Full_fidelity_parser_profiling.start_profiling ();

  let (new_env, response) =
    try ServerRpc.handle ~is_stale genv env cmd with
    | exn ->
      let e = Exception.wrap exn in
      raise (Nonfatal_rpc_exception (e, env))
  in

  let parsed_files = Full_fidelity_parser_profiling.stop_profiling () in
  ClientProvider.track
    client
    ~key:Connection_tracker.Server_end_handle
    ~log:true;
  let (major_gc_time, minor_gc_time) = Sys_utils.get_gc_time () in
  HackEventLogger.handled_command
    (ServerCommandTypesUtils.debug_describe_t cmd)
    ~start_t:t_start
    ~major_gc_time
    ~minor_gc_time
    ~parsed_files;

  ClientProvider.send_response_to_client client response;
  ClientProvider.shutdown_client client;
  new_env

let handle
    (genv : ServerEnv.genv)
    (env : ServerEnv.env)
    (client : ClientProvider.client) :
    ServerEnv.env ServerUtils.handle_command_result =
  (* In the case if LSP, it's normal that this [Server_waiting_for_cmd]
     track happens on a per-message basis, much later than the previous
     [Server_got_connection_type] track that happened when the persistent
     connection was established; the flag [long_delay_okay]
     means that the default behavior, of alarming log messages in case of delays,
     will be suppressed. *)
  ClientProvider.track
    client
    ~key:Connection_tracker.Server_waiting_for_cmd
    ~long_delay_okay:false;

  let msg = ClientProvider.read_client_msg client in

  (* This is a helper to update progress.json to things like "[hh_client:idle done]" or "[HackAst:--type-at-pos check]"
     or "[HackAst:--type-at-pos]". We try to balance something useful to the user, with something that helps the hack
     team know what's going on and who is to blame.
     The form is [FROM:CMD PHASE].
     FROM is the --from argument passed at the command-line, or "hh_client" in case of LSP requests.
     CMD is the "--type-at-pos" or similar command-line argument that gave rise to serverRpc, or something sensible for LSP.
     PHASE is empty at the start, "done" once we've finished handling, "check" if Needs_full_recheck. *)
  let send_progress phase =
    Server_progress.write
      ~include_in_logs:false
      "%s%s"
      (ServerCommandTypesUtils.status_describe_cmd msg)
      phase
  in

  (* Once again, it's expected that [Server_got_cmd] happens a long time
     after we started waiting for one! *)
  ClientProvider.track
    client
    ~key:Connection_tracker.Server_got_cmd
    ~log:true
    ~msg:
      (Printf.sprintf
         "%s [%s]"
         (ServerCommandTypesUtils.debug_describe_cmd msg)
         (ClientProvider.priority_to_string client))
    ~long_delay_okay:false;
  let full_recheck_needed = rpc_command_needs_full_check (snd msg) in
  let is_stale =
    ServerEnv.(env.last_recheck_loop_stats.RecheckLoopStats.updates_stale)
  in

  let handle_command =
    send_progress "";
    let r = actually_handle genv client msg full_recheck_needed ~is_stale in
    send_progress " done";
    r
  in

  if full_recheck_needed then begin
    send_progress " typechecking";
    ServerUtils.Needs_full_recheck
      { env; finish_command_handling = handle_command; reason = reason msg }
  end else
    ServerUtils.Done (handle_command env)

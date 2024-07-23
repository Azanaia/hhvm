(*
 * Copyright (c) 2018, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the "hack" directory of this source tree.
 *
 *)

(* Eager Initialization:

   hh_server can initialize either by typechecking the entire project (aka
   starting from a "fresh state") or by loading from a saved state and
   typechecking what has changed. Historically, eager initialization was able to
   do both, but we had little need for eager init from saved state, and removed
   it.

   If we perform an eager init from a fresh state, we run the following phases:

     Parsing -> Naming -> Type-decl -> Type-check

   If we are initializing lazily from a saved state, we do

     Run load script and parsing concurrently -> Naming -> Type-check

   Then we typecheck only the files that have changed since the state was saved.
   Type-decl is performed lazily as needed.
*)

open Hh_prelude
open ServerEnv

let init
    (genv : ServerEnv.genv)
    (env : ServerEnv.env)
    (cgroup_steps : CgroupProfiler.step_group) : ServerEnv.env * float =
  let init_telemetry =
    ServerEnv.Init_telemetry.make
      ServerEnv.Init_telemetry.Init_eager
      (Telemetry.create ()
      |> Telemetry.float_ ~key:"start_time" ~value:(Unix.gettimeofday ()))
  in

  (* We don't support a saved state for eager init. *)
  let (get_next, t) =
    ServerInitCommon.directory_walk ~telemetry_label:"eager.init.indexing" genv
  in
  (* Parsing entire repo, too many files to trace *)
  let trace = false in
  let (env, t) =
    ServerInitCommon.parse_files_and_update_forward_naming_table
      genv
      env
      ~get_next
      t
      ~trace
      ~cache_decls:true
      ~telemetry_label:"eager.init.parsing"
      ~cgroup_steps
      ~worker_call:MultiWorker.wrapper
  in
  let (env, t) =
    ServerInitCommon
    .update_reverse_naming_table_from_env_and_get_duplicate_name_errors
      env
      t
      ~telemetry_label:"eager.init.naming"
      ~cgroup_steps
  in
  ServerInitCommon.validate_no_errors env.errorl;
  let defs_per_file = Naming_table.to_defs_per_file env.naming_table in
  (* Type-checking everything *)
  ServerInitCommon.defer_or_do_type_check
    genv
    env
    (Relative_path.Map.keys defs_per_file)
    init_telemetry
    t
    ~telemetry_label:"eager.init.type_check"
    ~cgroup_steps

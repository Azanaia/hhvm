(**
 * Copyright (c) 2019, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the "hack" directory of this source tree.
 *
 *)

val compute_changes :
  Provider_context.t ->
  during_init:bool ->
  class_names:Decl_compare.VersionedSSet.diff ->
  Shallow_class_fanout.changed_class list

(** Compare classes in files and deduce fanout. *)
val compute_class_fanout :
  Provider_context.t -> Shallow_class_fanout.changed_class list -> Fanout.t

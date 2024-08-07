//// module_a.php
<?hh
new module a {}     // package pkg1
//// module_c.php
<?hh
new module c {}     // package pkg3 (include pkg2)
//// module_d.php
<?hh
new module d {}     // package pkg4

//// a.php
<?hh
module a;
public function f1(): void {}

//// d.php
<?hh
module d;
public function f4(): void {}

//// c.php
<?hh

module c;
public function test(): void {
  if (package pkg1 || package pkg4) {
      // neither is allowed because disjuction doesn't register package info
      f1();
      f4();
  }
}

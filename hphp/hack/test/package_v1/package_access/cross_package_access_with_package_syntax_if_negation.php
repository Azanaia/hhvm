//// module_a.php
<?hh
new module a {}     // package pkg1
//// module_c.php
<?hh
new module c {}     // package pkg3 (include pkg2)

//// a.php
<?hh
module a;
public function f1(): void {}

//// c.php
<?hh

module c;
public function test(): void {
  if (!(package pkg1)) {
    f1();   // error; pkg1 is not loaded
    return;
  } else {
    f1();  // ok
  }
  f1(); // error; pakcage info unknown outside if/else branches
}

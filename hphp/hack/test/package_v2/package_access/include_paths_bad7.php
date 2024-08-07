//// foo.php
<?hh
// package pkg1
type TFoo = int;
class Foo {}

//// bar.php
<?hh
// package pkg2
<<file: __PackageOverride('pkg2')>>
class Bar<reify T> {}
function bar<reify T>(): void {}

function test(): void {
  // All error
  bar<TFoo>();
  bar<Foo>();
  $_ = new Bar<TFoo>();
  $_ = new Bar<Foo>();
}

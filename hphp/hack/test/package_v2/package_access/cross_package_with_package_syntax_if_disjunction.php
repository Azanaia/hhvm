//// pkg1.php
<?hh
function pkg1_call(): void {}

//// pkg4.php
<?hh
<<file: __PackageOverride('pkg4')>>
function pkg4_call(): void {}

//// pkg3.php
<?hh
<<file: __PackageOverride('pkg3')>>
function test(): void {
  if (package pkg1 || package pkg4) {
      // neither is allowed because disjuction doesn't register package info
      pkg1_call();
      pkg4_call();
  }
}

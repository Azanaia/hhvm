//// a.php
<?hh

class A {
  public function foo(string $c): void {}
}

//// b.php
<?hh

class B extends A {
  public function foo(string $c): void {}
}

//// c.php
<?hh

class C extends B {}

//// d.php
<?hh

class D extends C {
  public function foo(string $c): void {}
}

//// e.php
<?hh

class E extends C {}

//// f.php
<?hh

class F extends E {
  public function foo(string $c): void {}
}

//// g.php
<?hh

class G extends F {}

//// use-b.php
<?hh

function f_b(B $x): void {
  $x->foo("");
}

//// use-c.php
<?hh

function f_c(C $x): void {
  $x->foo("");
}

//// use-d.php
<?hh

function f_d(D $x): void {
  $x->foo("");
}
//// use-g.php
<?hh

function f_g(G $x): void {
  $x->foo("");
}

///////////////////////////

//// f.php
<?hh

class F extends E {}


///////////////////////////

//// c.php
<?hh

class C extends B {
  public function foo(string $c): void {}
}

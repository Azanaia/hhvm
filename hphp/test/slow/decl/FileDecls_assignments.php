<?hh

abstract class MyOtherClass {
  private async function genNothing(): Awaitable<void> {
    $a = 1;
  }
}

function printNameValues(string $kls, mixed $xs): void {
  foreach ($xs as $x) {
    printNameValue($kls, $x);
  }
}

function printNameValue(string $kls, mixed $x): void {
  echo $kls.'::'.$x['name'].' = '.($x['value'] ?? '(no value)')."\n";
}

<<__EntryPoint>>
function main(): void {
  // Get the autoloader to initialize
  HH\autoload_is_native();

  $instance = HH\FileDecls::parseText('
  const string FileConst = "asdfasdf";
  enum FilePermission: mixed as mixed {
    Read = 4;
    Write = FilePermission::Read >> 1;
    Execute = FilePermission::Read >> 2;
    SomeStr = "asdf";
  }

  enum class Random: mixed {
    int X = 42;
    string S = "foo";
  }

  class MyClass {
    const string MY_CONSTANT_STR = "abc";
    const int MY_CONSTANT_INT = 1234;
    const float MY_CONSTANT_FLOAT = 0.314;
    const bool MY_CONSTANT_BOOL = false;
    const mixed MY_CONSTANT_MIXED = vec["aa",22];
    const dict<int, string> MY_CONSTANT_DICT = dict[];
    const ?Whatever MY_CONSTANT_NULL = null;
    const SomeShape MY_CONSTANT_SHAPE = shape( "f1" =>123,"f2"=>"abc");
    const bool MY_CONSTANT_REF_SELF = self::MY_CONSTANT_BOOL;
    const bool MY_CONSTANT_REF_STATIC = static::MY_CONSTANT_BOOL;
    const int MY_CONSTANT_REF_NAMED = FilePermission::Read;
    const int MY_CONSTANT_REF_OP = FilePermission::Read + 5;

    private function fnWithDefault(
      int $nodefault,
      ?int $nullint = null,
      ?string $str = \'asdf\',
      mixed $emptyvec = vec[],
      vec<int> $vecint = vec[10,20],
      shape(...) $someshape = shape("yes" => true)
    ): void {}
  }
  interface MyInterface {
    public function fnWithOptional(
      int $required,
      optional ?int $optionalint,
      optional string $str
    ): void;
  }');

  echo " == \n\n";
  printNameValue("FileConst", $instance->getFileConst("FileConst"));
  printNameValues("Random", $instance->getConsts("Random"));
  printNameValues("FilePermission", $instance->getConsts("FilePermission"));
  printNameValues("MyClass", $instance->getConsts("MyClass"));

  $params = $instance->getMethod('MyClass', 'fnWithDefault')['signature']['params'] ?? vec[];
  foreach ($params as $x) {
    if ((bool)idx($x, 'has_default')) {
      echo $x['name'].' = '.($x['default_value'] ?? '(no value)')."\n";
    }
    if ((bool)idx($x, 'is_optional')) {
      echo 'optional '.$x['name']."\n";
    }
    else {
      echo 'required '.$x['name']."\n";
    }
  }

  $params = $instance->getMethod('MyInterface', 'fnWithOptional')['signature']['params'] ?? vec[];
  foreach ($params as $x) {
    if ((bool)idx($x, 'is_optional')) {
      echo 'optional '.$x['name']."\n";
    }
    else {
      echo 'required '.$x['name']."\n";
    }
  }

  $instance = HH\FileDecls::parseText("
    enum EnumWithQuoteEscape: string {
      X = '\'';
    }
  ");
  var_dump($instance->getConsts("EnumWithQuoteEscape")[0]["value"]);
}

<?hh
/* Prototype  : bool mkdir(string pathname [, int mode [, bool recursive [, resource context]]])
 * Description: Create a directory
 * Source code: ext/standard/file.c
 * Alias to functions:
 */

// define some classes
class classWithToString
{
    public function __toString() :mixed{
        return "Class A object";
    }
}

class classWithoutToString
{
}

// Define error handler
function test_error_handler($err_no, $err_msg, $filename, $linenum, $vars) :mixed{
    if (error_reporting() != 0) {
        // report non-silenced errors
        echo "Error: $err_no - $err_msg, $filename($linenum)\n";
    }
}
<<__EntryPoint>> function main(): void {
echo "*** Testing mkdir() : usage variation ***\n";
set_error_handler(test_error_handler<>);

// Initialise function arguments not being substituted (if any)
$pathname = sys_get_temp_dir().'/'.'mkdirVar3.tmp';
$mode = 0777;


// heredoc string
$heredoc = <<<EOT
hello world
EOT;

// add arrays
$index_array = vec[1, 2, 3];
$assoc_array = dict['one' => 1, 'two' => 2];

//array of values to iterate over
$inputs = dict[
      // boolean data
      'lowercase true' => true,
      'lowercase false' =>false,
      'uppercase TRUE' =>TRUE,
      'uppercase FALSE' =>FALSE,
];

// loop through each element of the array for recursive

foreach($inputs as $key =>$value) {
      echo "\n--$key--\n";
            $h = null;
      try { $h = mkdir($pathname, $mode, $value); } catch (Exception $e) { echo "\n".'Warning: '.$e->getMessage().' in '.__FILE__.' on line '.__LINE__."\n"; }
      if ($h === true) {
         echo "Directory created\n";
         rmdir($pathname);
      }
};

echo "===DONE===\n";
}

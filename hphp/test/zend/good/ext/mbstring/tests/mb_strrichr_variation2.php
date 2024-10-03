<?hh

// Define error handler
function test_error_handler($err_no, $err_msg, $filename, $linenum, $vars) :mixed{
	if (error_reporting() != 0) {
		// report non-silenced errors
		echo "Error: $err_no - $err_msg, $filename($linenum)\n";
	}
}

// define some classes
class classWithToString
{
	public function __toString() :mixed{
		return b"Class A object";
	}
}

class classWithoutToString
{
}
<<__EntryPoint>>
function entrypoint_mb_strrichr_variation2(): void {
  /* Prototype  : string mb_strrichr(string haystack, string needle[, bool part[, string encoding]])
   * Description: Finds the last occurrence of a character in a string within another, case insensitive
   * Source code: ext/mbstring/mbstring.c
   * Alias to functions:
   */

  echo "*** Testing mb_strrichr() : usage variation ***\n";
  set_error_handler(test_error_handler<>);

  // Initialise function arguments not being substituted (if any)
  $haystack = b'string_val';
  $part = true;
  $encoding = 'utf-8';


  // heredoc string
  $heredoc = b<<<EOT
hello world
EOT;

  // add arrays
  $index_array = vec[1, 2, 3];
  $assoc_array = dict['one' => 1, 'two' => 2];

  //array of values to iterate over
  $inputs = dict[
        // empty data
        'empty string DQ' => "",
        'empty string SQ' => '',
  ];

  // loop through each element of the array for needle

  foreach($inputs as $key =>$value) {
        echo "\n--$key--\n";
        try { var_dump( mb_strrichr($haystack, $value, $part, $encoding) ); } catch (Exception $e) { echo "\n".'Warning: '.$e->getMessage().' in '.__FILE__.' on line '.__LINE__."\n"; }
  }

  echo "===DONE===\n";
}

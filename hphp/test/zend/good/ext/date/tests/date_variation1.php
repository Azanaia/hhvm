<?hh
/* Prototype  : string date  ( string $format  [, int $timestamp  ] )
 * Description: Format a local time/date.
 * Source code: ext/date/php_date.c
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
<<__EntryPoint>> function main(): void {
echo "*** Testing date() : usage variation -  unexpected values to first argument \$format***\n";

//Set the default time zone
date_default_timezone_set("Europe/London");


// heredoc string
$heredoc = <<<EOT
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

      // string data
      'string DQ' => "string",
      'string SQ' => 'string',
      'mixed case string' => "sTrInG",
      'heredoc' => $heredoc,
];

$timestamp = mktime(10, 44, 30, 2, 27, 2009);

foreach($inputs as $variation =>$format) {
      echo "\n-- $variation --\n";
      try { var_dump( date($format, $timestamp) ); } catch (Exception $e) { echo "\n".'Warning: '.$e->getMessage().' in '.__FILE__.' on line '.__LINE__."\n"; }
};

echo "===DONE===\n";
}

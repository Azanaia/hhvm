<?hh
/* Prototype  : array date_parse  ( string $date  )
 * Description: Returns associative array with detailed info about given date.
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
echo "*** Testing date_parse() : usage variation -  unexpected values to first argument \$date***\n";

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

foreach($inputs as $variation =>$date) {
      echo "\n-- $variation --\n";
            $result = false;
      try { $result = date_parse($date); } catch (Exception $e) { echo "\n".'Warning: '.$e->getMessage().' in '.__FILE__.' on line '.__LINE__."\n"; }
      if (is_array($result)) {
          var_dump($result["errors"]);
      } else {
          var_dump($result);
      }
};

echo "===DONE===\n";
}

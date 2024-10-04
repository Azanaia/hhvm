<?hh
/* Prototype  : string gmdate(string format [, long timestamp])
 * Description: Format a GMT date/time
 * Source code: ext/date/php_date.c
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
<<__EntryPoint>> function main(): void {
echo "*** Testing gmdate() : usage variation ***\n";


// Initialise all required variables
date_default_timezone_set('UTC');
$format = DATE_ISO8601;

// add arrays
$index_array = vec[1, 2, 3];
$assoc_array = dict['one' => 1, 'two' => 2];

//array of values to iterate over
$inputs = dict[
      // int data
      'int 0' => 0,
      'int 1' => 1,
      'int 12345' => 12345,
      'int -12345' => -12345,

      // null data
      'uppercase NULL' => NULL,
      'lowercase null' => null,
];

// loop through each element of the array for timestamp

foreach($inputs as $key =>$value) {
      echo "\n--$key--\n";
            if ($value === null) {
                $without_timestamp = gmdate($format);
                $with_timestamp = gmdate($format, $value);
                // These is a risk that the time change right between these calls if so
                // we do another try.
                if ($with_timestamp !== $without_timestamp) {
                    $without_timestamp = gmdate($format);
                }
                var_dump($with_timestamp === $without_timestamp);
            } else {
        try { var_dump( gmdate($format, $value) ); } catch (Exception $e) { echo "\n".'Warning: '.$e->getMessage().' in '.__FILE__.' on line '.__LINE__."\n"; }
            }
};

echo "===DONE===\n";
}

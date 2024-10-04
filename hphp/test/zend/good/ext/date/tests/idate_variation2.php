<?hh
/* Prototype  : int idate(string format [, int timestamp])
 * Description: Format a local time/date as integer
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
echo "*** Testing idate() : usage variation ***\n";

// Initialise function arguments not being substituted (if any)
$format = 'Y';
date_default_timezone_set("Asia/Calcutta");

// add arrays
$index_array = vec[1, 2, 3];
$assoc_array = dict['one' => 1, 'two' => 2];

//array of values to iterate over
$inputs = dict[
      // null data
      'uppercase NULL' => NULL,
      'lowercase null' => null,
];

// loop through each element of the array for timestamp

foreach($inputs as $key =>$value) {
      echo "\n--$key--\n";
            if ($value === null) {
                $without_timestamp = idate($format);
                $with_timestamp = idate($format, $value);
                // These is a risk that the time change right between these calls if so
                // we do another try.
                if ($with_timestamp !== $without_timestamp) {
                    $without_timestamp = idate($format);
                }
                var_dump($with_timestamp === $without_timestamp);
            } else {
        try { var_dump( idate($format, $value) ); } catch (Exception $e) { echo "\n".'Warning: '.$e->getMessage().' in '.__FILE__.' on line '.__LINE__."\n"; }
            }
};

echo "===DONE===\n";
}

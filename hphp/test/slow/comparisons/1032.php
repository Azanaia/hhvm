<?hh

<<__NEVER_INLINE>> function P(bool $v) :mixed{ print $v ? 'Y' : 'N'; }

<<__EntryPoint>>
function main_1032() :mixed{
$i = 0;
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\gte(-1, true)); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P(HH\Lib\Legacy_FIXME\gte($a, true)); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = true;
 try { P(HH\Lib\Legacy_FIXME\gte(-1, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\gte($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= true	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\gte(-1, false)); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P(HH\Lib\Legacy_FIXME\gte($a, false)); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = false;
 try { P(HH\Lib\Legacy_FIXME\gte(-1, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\gte($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= false	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=1); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=1); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = 1;
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= 1	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=0); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=0); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = 0;
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= 0	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=-1); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=-1); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = -1;
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= -1	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\gte(-1, '1')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P(HH\Lib\Legacy_FIXME\gte($a, '1')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = '1';
 try { P(HH\Lib\Legacy_FIXME\gte(-1, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\gte($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= '1'	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\gte(-1, '0')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P(HH\Lib\Legacy_FIXME\gte($a, '0')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = '0';
 try { P(HH\Lib\Legacy_FIXME\gte(-1, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\gte($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= '0'	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\gte(-1, '-1')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P(HH\Lib\Legacy_FIXME\gte($a, '-1')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = '-1';
 try { P(HH\Lib\Legacy_FIXME\gte(-1, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\gte($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= '-1'	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\gte(-1, null)); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P(HH\Lib\Legacy_FIXME\gte($a, null)); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = null;
 try { P(HH\Lib\Legacy_FIXME\gte(-1, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\gte($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= null	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=dict[]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=dict[]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict[];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array()	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=vec[1]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=vec[1]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec[1];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array(1)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=vec[2]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=vec[2]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec[2];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array(2)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=vec['1']); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=vec['1']); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec['1'];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array('1')	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=dict['0' => '1']); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=dict['0' => '1']); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict['0' => '1'];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array('0' => '1')	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=vec['a']); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=vec['a']); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec['a'];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array('a')	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=dict['a' => 1]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=dict['a' => 1]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict['a' => 1];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array('a' => 1)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=dict['b' => 1]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=dict['b' => 1]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict['b' => 1];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array('b' => 1)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=dict['a' => 1, 'b' => 2]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=dict['a' => 1, 'b' => 2]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict['a' => 1, 'b' => 2];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array('a' => 1, 'b' => 2)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=vec[dict['a' => 1]]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=vec[dict['a' => 1]]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec[dict['a' => 1]];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array(array('a' => 1))	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(-1>=vec[dict['b' => 1]]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P($a >=vec[dict['b' => 1]]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec[dict['b' => 1]];
 try { P(-1>=$b); } catch (Throwable $_) { print 'E'; }
 try { P($a >=$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= array(array('b' => 1))	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\gte(-1, 'php')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P(HH\Lib\Legacy_FIXME\gte($a, 'php')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = 'php';
 try { P(HH\Lib\Legacy_FIXME\gte(-1, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\gte($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= 'php'	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\gte(-1, '')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = -1;
 try { P(HH\Lib\Legacy_FIXME\gte($a, '')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = '';
 try { P(HH\Lib\Legacy_FIXME\gte(-1, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\gte($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "-1 >= ''	";
 print "\n";
}

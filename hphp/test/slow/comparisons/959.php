<?hh

<<__NEVER_INLINE>> function P(bool $v) :mixed{ print $v ? 'Y' : 'N'; }

<<__EntryPoint>>
function main_959() :mixed{
$i = 0;
 ++$i; print $i;
 print "\t";
 try { P(true<true); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <true); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = true;
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < true	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<false); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <false); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = false;
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < false	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\lt(true, 1)); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P(HH\Lib\Legacy_FIXME\lt($a, 1)); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = 1;
 try { P(HH\Lib\Legacy_FIXME\lt(true, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\lt($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < 1	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\lt(true, 0)); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P(HH\Lib\Legacy_FIXME\lt($a, 0)); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = 0;
 try { P(HH\Lib\Legacy_FIXME\lt(true, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\lt($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < 0	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\lt(true, -1)); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P(HH\Lib\Legacy_FIXME\lt($a, -1)); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = -1;
 try { P(HH\Lib\Legacy_FIXME\lt(true, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\lt($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < -1	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\lt(true, '1')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P(HH\Lib\Legacy_FIXME\lt($a, '1')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = '1';
 try { P(HH\Lib\Legacy_FIXME\lt(true, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\lt($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < '1'	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\lt(true, '0')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P(HH\Lib\Legacy_FIXME\lt($a, '0')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = '0';
 try { P(HH\Lib\Legacy_FIXME\lt(true, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\lt($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < '0'	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\lt(true, '-1')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P(HH\Lib\Legacy_FIXME\lt($a, '-1')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = '-1';
 try { P(HH\Lib\Legacy_FIXME\lt(true, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\lt($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < '-1'	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\lt(true, null)); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P(HH\Lib\Legacy_FIXME\lt($a, null)); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = null;
 try { P(HH\Lib\Legacy_FIXME\lt(true, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\lt($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < null	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<dict[]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <dict[]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict[];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array()	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<vec[1]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <vec[1]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec[1];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array(1)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<vec[2]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <vec[2]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec[2];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array(2)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<vec['1']); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <vec['1']); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec['1'];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array('1')	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<dict['0' => '1']); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <dict['0' => '1']); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict['0' => '1'];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array('0' => '1')	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<vec['a']); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <vec['a']); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec['a'];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array('a')	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<dict['a' => 1]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <dict['a' => 1]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict['a' => 1];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array('a' => 1)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<dict['b' => 1]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <dict['b' => 1]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict['b' => 1];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array('b' => 1)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<dict['a' => 1, 'b' => 2]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <dict['a' => 1, 'b' => 2]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = dict['a' => 1, 'b' => 2];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array('a' => 1, 'b' => 2)	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<vec[dict['a' => 1]]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <vec[dict['a' => 1]]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec[dict['a' => 1]];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array(array('a' => 1))	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(true<vec[dict['b' => 1]]); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P($a <vec[dict['b' => 1]]); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = vec[dict['b' => 1]];
 try { P(true<$b); } catch (Throwable $_) { print 'E'; }
 try { P($a <$b); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < array(array('b' => 1))	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\lt(true, 'php')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P(HH\Lib\Legacy_FIXME\lt($a, 'php')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = 'php';
 try { P(HH\Lib\Legacy_FIXME\lt(true, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\lt($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < 'php'	";
 print "\n";
 ++$i; print $i;
 print "\t";
 try { P(HH\Lib\Legacy_FIXME\lt(true, '')); } catch (Throwable $_) { print 'E'; }
 $a = 1;
 $a = 't';
 $a = true;
 try { P(HH\Lib\Legacy_FIXME\lt($a, '')); } catch (Throwable $_) { print 'E'; }
 $b = 1;
 $b = 't';
 $b = '';
 try { P(HH\Lib\Legacy_FIXME\lt(true, $b)); } catch (Throwable $_) { print 'E'; }
 try { P(HH\Lib\Legacy_FIXME\lt($a, $b)); } catch (Throwable $_) { print 'E'; }
 print "\t";
 print "true < ''	";
 print "\n";
}

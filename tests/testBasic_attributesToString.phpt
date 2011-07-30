--TEST--
XML_Util2::attributesToString() basic tests
--CREDITS--
Chuck Burgess <ashnazg@php.net>
# created for v1.2.0a1 2008-05-04
--FILE--
<?php
require_once 'XML' . DIRECTORY_SEPARATOR . 'Util2.php';
$util = new XML_Util2();
echo '=====XML_Util2::attributesToString() basic tests=====' . PHP_EOL . PHP_EOL;

$att = array("foo" => "bar", "boo" => "baz");
$sort1 = array(
    'multiline' => true, 
    'indent'    => '----', 
    'linebreak' => "^", 
    'entities'  =>  XML_Util2::ENTITIES_XML, 
    'sort'      => true
);
$sort2 = array(
    'multiline' => true, 
    'indent'    => '----', 
    'linebreak' => "^", 
    'entities'  =>  XML_Util2::ENTITIES_XML, 
);

echo "TEST:  basic usage" . PHP_EOL;
echo $util->attributesToString($att) . PHP_EOL . PHP_EOL;

echo "TEST:  explicit \$sort = true" . PHP_EOL;
echo $util->attributesToString($att, true) . PHP_EOL . PHP_EOL;

echo "TEST:  explicit \$sort = false" . PHP_EOL;
echo $util->attributesToString($att, false) . PHP_EOL . PHP_EOL;

echo "TEST:  explicit \$multiline = false" . PHP_EOL;
echo $util->attributesToString($att, true, false) . PHP_EOL . PHP_EOL;

echo "TEST:  explicit \$multiline = true" . PHP_EOL;
echo $util->attributesToString($att, true, true) . PHP_EOL . PHP_EOL;

echo "TEST:  explicit \$indent = '        ' (8 spaces)" . PHP_EOL;
echo $util->attributesToString($att, true, true, '        ') . PHP_EOL . PHP_EOL;

echo "TEST:  explicit \$linebreak = '^' (some dummy char)" . PHP_EOL;
echo $util->attributesToString($att, true, true, '^') . PHP_EOL . PHP_EOL;

echo "TEST:  passing \$sort array of options that includes 'sort'" . PHP_EOL;
echo $util->attributesToString($att, $sort1) . PHP_EOL . PHP_EOL;

echo "TEST:  passing \$sort array of options that doesn't include 'sort'" . PHP_EOL;
echo $util->attributesToString($att, $sort2) . PHP_EOL . PHP_EOL;

echo "TEST:  do not replace entities" . PHP_EOL;
$arr = array("foo" => "b@&r", "boo" => "b><z");
echo $util->attributesToString($arr, true, false, '    ', PHP_EOL, 
     XML_Util2::ENTITIES_NONE) . PHP_EOL . PHP_EOL;

echo "TEST:  replace all XML entities" . PHP_EOL;
$arr = array("foo" => "b@&r", "boo" => "b><z");
echo $util->attributesToString($arr, true, false, '    ', PHP_EOL, 
     XML_Util2::ENTITIES_XML) . PHP_EOL . PHP_EOL;

echo "TEST:  replace only required XML entities" . PHP_EOL;
$arr = array("foo" => "b@&r", "boo" => "b><z");
echo $util->attributesToString($arr, true, false, '    ', PHP_EOL, 
     XML_Util2::ENTITIES_XML_REQUIRED) . PHP_EOL . PHP_EOL;

echo "TEST:  replace HTML entities" . PHP_EOL;
$arr = array("foo" => "b@&r", "boo" => "b><z");
echo $util->attributesToString($arr, true, false, '    ', PHP_EOL, 
     XML_Util2::ENTITIES_HTML) . PHP_EOL . PHP_EOL;
?>
--EXPECT--
=====XML_Util2::attributesToString() basic tests=====

TEST:  basic usage
 boo="baz" foo="bar"

TEST:  explicit $sort = true
 boo="baz" foo="bar"

TEST:  explicit $sort = false
 foo="bar" boo="baz"

TEST:  explicit $multiline = false
 boo="baz" foo="bar"

TEST:  explicit $multiline = true
 boo="baz"
    foo="bar"

TEST:  explicit $indent = '        ' (8 spaces)
 boo="baz"
        foo="bar"

TEST:  explicit $linebreak = '^' (some dummy char)
 boo="baz"
^foo="bar"

TEST:  passing $sort array of options that includes 'sort'
 boo="baz"
----foo="bar"

TEST:  passing $sort array of options that doesn't include 'sort'
 boo="baz"
----foo="bar"

TEST:  do not replace entities
 boo="b><z" foo="b@&r"

TEST:  replace all XML entities
 boo="b&gt;&lt;z" foo="b@&amp;r"

TEST:  replace only required XML entities
 boo="b>&lt;z" foo="b@&amp;r"

TEST:  replace HTML entities
 boo="b&gt;&lt;z" foo="b@&amp;r"

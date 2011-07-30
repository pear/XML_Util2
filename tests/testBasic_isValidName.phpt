--TEST--
XML_Util2::isValidName() basic tests
--CREDITS--
Chuck Burgess <ashnazg@php.net>
# created for v1.2.0a1 2008-05-04
--FILE--
<?php
require_once 'XML' . DIRECTORY_SEPARATOR . 'Util2.php';
$util = new XML_Util2();
echo '=====XML_Util2::isValidName() basic tests=====' . PHP_EOL . PHP_EOL;

echo "TEST:  valid tag" . PHP_EOL;
try {
    $result = $util->isValidName("alpha-x_y_z.123");

    print "Valid XML name." . PHP_EOL . PHP_EOL;
} catch (XML_Util2_Exception $e) {
    print "Invalid XML name: " . $e->getMessage() . PHP_EOL . PHP_EOL;
}

echo "TEST:  invalid tag" . PHP_EOL;
try {
    $result = $util->isValidName("invalidTag?");

    print "Valid XML name." . PHP_EOL . PHP_EOL;
} catch (XML_Util2_Exception $e) {
    print "Invalid XML name: " . $e->getMessage() . PHP_EOL . PHP_EOL;
}

echo "TEST:  invalid tag that doesn't start with a letter" . PHP_EOL;
try {
    $result = $util->isValidName("1234five");

    print "Valid XML name." . PHP_EOL . PHP_EOL;
} catch (XML_Util2_Exception $e) {
    print "Invalid XML name: " . $e->getMessage() . PHP_EOL . PHP_EOL;
}

?>
--EXPECT--
=====XML_Util2::isValidName() basic tests=====

TEST:  valid tag
Valid XML name.

TEST:  invalid tag
Invalid XML name: XML names may only contain alphanumeric chars, period, hyphen, colon and underscores

TEST:  invalid tag that doesn't start with a letter
Invalid XML name: XML names may only start with letter or underscore

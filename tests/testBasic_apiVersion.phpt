--TEST--
XML_Util2::apiVersion() basic tests
--CREDITS--
Chuck Burgess <ashnazg@php.net>
# created for v1.2.0a1 2008-05-04
--FILE--
<?php
require_once 'XML' . DIRECTORY_SEPARATOR . 'Util2.php';
$util = new XML_Util2();
echo '=====XML_Util2::apiVersion() basic tests=====' . PHP_EOL . PHP_EOL;

echo "TEST:  basic apiVersion() call" . PHP_EOL;
echo $util->apiVersion() . PHP_EOL;
?>
--EXPECT--
=====XML_Util2::apiVersion() basic tests=====

TEST:  basic apiVersion() call
2.0

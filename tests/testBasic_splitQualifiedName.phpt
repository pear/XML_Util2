--TEST--
XML_Util2::splitQualifiedName() basic tests
--CREDITS--
Chuck Burgess <ashnazg@php.net>
# created for v1.2.0a1 2008-05-04
--FILE--
<?php
require_once 'XML' . DIRECTORY_SEPARATOR . 'Util2.php';
$util = new XML_Util2();
echo '=====XML_Util2::splitQualifiedName() basic tests=====' . PHP_EOL . PHP_EOL;

echo "TEST:  basic usage without namespace" . PHP_EOL;
$return = $util->splitQualifiedName("xslt:stylesheet");
echo "namespace => " . $return['namespace'] . PHP_EOL;
echo "localPart => " . $return['localPart'] . PHP_EOL;
echo PHP_EOL;

echo "TEST:  basic usage with namespace" . PHP_EOL;
$return = $util->splitQualifiedName("stylesheet", "myNs");
echo "namespace => " . $return['namespace'] . PHP_EOL;
echo "localPart => " . $return['localPart'] . PHP_EOL;
echo PHP_EOL;
?>
--EXPECT--
=====XML_Util2::splitQualifiedName() basic tests=====

TEST:  basic usage without namespace
namespace => xslt
localPart => stylesheet

TEST:  basic usage with namespace
namespace => myNs
localPart => stylesheet

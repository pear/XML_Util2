--TEST--
XML_Util2::createEndElement() basic tests
--CREDITS--
Chuck Burgess <ashnazg@php.net>
# created for v1.2.0a1 2008-05-04
--FILE--
<?php
require_once 'XML' . DIRECTORY_SEPARATOR . 'Util2.php';
$util = new XML_Util2();
echo '=====XML_Util2::createEndElement() basic tests=====' . PHP_EOL . PHP_EOL;

echo "TEST:  basic usage (myTag)" . PHP_EOL;
echo $util->createEndElement("myTag") . PHP_EOL . PHP_EOL;

echo "TEST:  basic usage with a namespaced tag (myNs:myTag)" . PHP_EOL;
echo $util->createEndElement("myNs:myTag") . PHP_EOL . PHP_EOL;
?>
--EXPECT--
=====XML_Util2::createEndElement() basic tests=====

TEST:  basic usage (myTag)
</myTag>

TEST:  basic usage with a namespaced tag (myNs:myTag)
</myNs:myTag>

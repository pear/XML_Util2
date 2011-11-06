--TEST--
XML_Util tests for Bug #4950 "Incorrect CDATA serializing"
--CREDITS--
Chuck Burgess <ashnazg@php.net>
# created for v1.2.0a1 2008-05-04
--FILE--
<?php
require_once 'XML' . DIRECTORY_SEPARATOR . 'Util2.php';
$util = new XML_Util2();
echo '=====XML_Util2 tests for Bug #4950 "Incorrect CDATA serializing"=====' . PHP_EOL . PHP_EOL;

echo "TEST:  test case provided in bug report" . PHP_EOL;
echo $util->createTag("test", array(), "Content ]]></test> here!",
    null, XML_Util2::CDATA_SECTION) . PHP_EOL;

?>
--EXPECT--
=====XML_Util2 tests for Bug #4950 "Incorrect CDATA serializing"=====

TEST:  test case provided in bug report
<test><![CDATA[Content ]]]]><![CDATA[></test> here!]]></test>


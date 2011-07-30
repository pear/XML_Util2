--TEST--
XML_Util2::collapseEmptyTags() basic tests
--CREDITS--
Chuck Burgess <ashnazg@php.net>
# created for v1.2.0a1 2008-05-04
--FILE--
<?php
require_once 'XML' . DIRECTORY_SEPARATOR . 'Util2.php';
$util = new XML_Util2();
echo '=====XML_Util2::collapseEmptyTags() basic tests=====' . PHP_EOL . PHP_EOL;

$emptyTag = "<foo></foo>";
$otherTag = "<bar>baz</bar>";
$xhtmlTag = "<b></b>";

echo "TEST:  basic usage" . PHP_EOL;
echo $util->collapseEmptyTags($emptyTag) . PHP_EOL . PHP_EOL;

echo "TEST:  basic usage alongside non-empty tag" . PHP_EOL;
echo $util->collapseEmptyTags($emptyTag . $otherTag) . PHP_EOL . PHP_EOL;

echo "TEST:  one empty tag, with COLLAPSE_ALL set" . PHP_EOL;
echo $util->collapseEmptyTags($emptyTag,  XML_Util2::COLLAPSE_ALL) . PHP_EOL . PHP_EOL;

echo "TEST:  one empty tag alongside non-empty tag, with COLLAPSE_ALL set" . PHP_EOL;
echo $util->collapseEmptyTags($emptyTag . $otherTag,  XML_Util2::COLLAPSE_ALL) . PHP_EOL . PHP_EOL;

echo "TEST:  one empty tag, with COLLAPSE_XHTML_ONLY set" . PHP_EOL;
echo $util->collapseEmptyTags($emptyTag,  XML_Util2::COLLAPSE_XHTML_ONLY) . PHP_EOL . PHP_EOL;

echo "TEST:  one empty tag alongside non-empty tag, with COLLAPSE_XHTML_ONLY set" . PHP_EOL;
echo $util->collapseEmptyTags($emptyTag . $xhtmlTag . $otherTag,  XML_Util2::COLLAPSE_XHTML_ONLY) . PHP_EOL . PHP_EOL;
?>
--EXPECT--
=====XML_Util2::collapseEmptyTags() basic tests=====

TEST:  basic usage
<foo />

TEST:  basic usage alongside non-empty tag
<foo /><bar>baz</bar>

TEST:  one empty tag, with COLLAPSE_ALL set
<foo />

TEST:  one empty tag alongside non-empty tag, with COLLAPSE_ALL set
<foo /><bar>baz</bar>

TEST:  one empty tag, with COLLAPSE_XHTML_ONLY set
<foo></foo>

TEST:  one empty tag alongside non-empty tag, with COLLAPSE_XHTML_ONLY set
<foo></foo><b></b><bar>baz</bar>

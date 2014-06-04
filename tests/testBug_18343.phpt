--TEST--
XML_Util2 tests for Bug #18343 Entities in file names decoded during packaging
--CREDITS--
Chuck Burgess <ashnazg@php.net>
# created for v2.0.1a1 2014-06-03
--FILE--
<?php
// to run tests against an installation, run from anywhere but the parent directory:
//     pear run-tests XML_Util2/tests/ -p xml_util2
//
// to run tests on uninstalled sandbox, run from the parent directory exactly:
//     pear run-tests tests
//
require_once 'XML' . DIRECTORY_SEPARATOR . 'Util2.php';
$util = new XML_Util2();

echo '=====XML_Util2 tests for Bug #18343 "Entities in file names decoded during packaging"=====' . PHP_EOL . PHP_EOL;

echo "TEST:  test case provided in bug report" . PHP_EOL;
$array = array(
    "qname"      => "install",
    "attributes" => array(
        "as"    => "Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&s=Newsweek",
        "name"  => "test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&s=Newsweek",
    )
);
echo $util->createTagFromArray($array) . PHP_EOL;
?>
--EXPECT--
=====XML_Util2 tests for Bug #18343 "Entities in file names decoded during packaging"=====

TEST:  test case provided in bug report
<install as="Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&s=Newsweek" name="test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&s=Newsweek" />

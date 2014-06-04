--TEST--
XML_Util2 tests for Bug #18343 Entities in file names decoded during packaging
--CREDITS--
Chuck Burgess <ashnazg@php.net>
# created for v2.0.1a1 2014-06-03
--FILE--
<?php
require_once 'XML' . DIRECTORY_SEPARATOR . 'Util2.php';
$util2 = new XML_Util2();

echo '=====XML_Util2 tests for Bug #18343 "Entities in file names decoded during packaging"=====' . PHP_EOL . PHP_EOL;

echo "TEST:  test case provided in bug report" . PHP_EOL;
$array = array(
    "qname"      => "install",
    "attributes" => array(
        "as"    => "Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&s=Newsweek",
        "name"  => "test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&s=Newsweek",
    )
);

echo "No matter what flags are given to createTagFromArray(), an attribute must *always* be at least ENTITIES_XML encoded..." . PHP_EOL . PHP_EOL;

$flags = array(
    'no flag' => null,
    'false' => false,
    'ENTITIES_NONE' => XML_Util2::ENTITIES_NONE,
    'ENTITIES_XML' => XML_Util2::ENTITIES_XML,
    'ENTITIES_XML_REQUIRED' => XML_Util2::ENTITIES_XML_REQUIRED,
    'ENTITIES_HTML' => XML_Util2::ENTITIES_HTML,
    'REPLACE_ENTITIES' => XML_Util2::REPLACE_ENTITIES,
);
foreach ($flags as $flagKey => $flagValue) {
    echo "Testing with $flagKey:" . PHP_EOL; 
    echo $util2->createTagFromArray($array, $flagValue) . PHP_EOL . PHP_EOL;
}
?>
--EXPECT--
=====XML_Util2 tests for Bug #18343 "Entities in file names decoded during packaging"=====

TEST:  test case provided in bug report
No matter what flags are given to createTagFromArray(), an attribute must *always* be at least ENTITIES_XML encoded...

Testing with no flag:
<install as="Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" name="test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" />

Testing with false:
<install as="Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" name="test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" />

Testing with ENTITIES_NONE:
<install as="Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" name="test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" />

Testing with ENTITIES_XML:
<install as="Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" name="test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" />

Testing with ENTITIES_XML_REQUIRED:
<install as="Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" name="test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" />

Testing with ENTITIES_HTML:
<install as="Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" name="test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" />

Testing with REPLACE_ENTITIES:
<install as="Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" name="test/Horde/Feed/fixtures/lexicon/http-p.moreover.com-cgi-local-page%2Fo=rss&amp;s=Newsweek" />


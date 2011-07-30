<?php

require_once 'PEAR/PackageFileManager2.php';
PEAR::setErrorHandling(PEAR_ERROR_DIE);

$desc =
   "Selection of methods that are often needed when working with XML documents.  "
    . "Functionality includes creating of attribute lists from arrays, "
    . "creation of tags, validation of XML names and more."
;

$version = '2.0.0alpha1';
$apiver  = '2.0.0';
$state   = 'alpha';

$notes = <<<EOT
Initial release
Forked from XML_Util
Fixed dir layout
PHP5 E_STRICT compatability
EOT;

$package = PEAR_PackageFileManager2::importOptions(
    'package.xml',
    array(
    'filelistgenerator' => 'svn',
    'changelogoldtonew' => false,
    'simpleoutput'	=> true,
    'baseinstalldir'    => '/',
    'packagefile'       => 'package.xml',
    'packagedirectory'  => '.'));

if (PEAR::isError($package)) {
    echo $result->getMessage();
    die();
}

$package->clearDeps();

$package->setPackage('XML_Util2');
$package->setPackageType('php');
$package->setSummary('XML utility class');
$package->setDescription($desc);
$package->setChannel('pear.php.net');
$package->setLicense('BSD License', 'http://opensource.org/licenses/bsd-license');
$package->setAPIVersion($apiver);
$package->setAPIStability($state);
$package->setReleaseVersion($version);
$package->setReleaseStability($state);
$package->setNotes($notes);
$package->setPhpDep('5.1.0');
$package->setPearinstallerDep('1.9.3');
$package->addExtensionDep('required', 'pcre');
$package->addIgnore(array('package.php', 'package.xml'));
$package->addReplacement('XML/Util2.php', 'package-info', '@version@', 'version');
$package->generateContents();

if ($_SERVER['argv'][1] == 'make') {
    $result = $package->writePackageFile();
} else {
    $result = $package->debugPackageFile();
}

if (PEAR::isError($result)) {
    echo $result->getMessage();
    die();
}

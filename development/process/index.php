<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "CDO Bugzilla Process";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">' . "\n";
print '<h1 id="pagetitle">' . $pageTitle . '</h1>' . "\n";

print '<p><img src="CDO-Process.png"></p>' . "\n";
include "$pageRoot/CDO-Process.imagemap";

########################################################################
include "$areaRoot/_footer.php"; ?>

<?php $areaRelative = "relnotes_30"; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

require_once "$areaRoot/relnotes.php";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/common.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n\t");

$pageTitle 		= "Release Notes CDO 3.0";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
printReleaseNotes("http://www.eclipse.org/cdo/documentation/relnotes_30/relnotes-3.0.html");
print '</div>';


########################################################################
include "$areaRoot/_footer.php"; ?>

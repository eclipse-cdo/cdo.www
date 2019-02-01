<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

header( 'Cache-control: no cache' );

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pageFolderPath . '/styles.css" media="screen"/>' . "\n\t");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n\t");

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">' . "\n";
print '<h1>Test</h1>';
print '</div>';


########################################################################
include "$areaRoot/_footer.php"; ?>

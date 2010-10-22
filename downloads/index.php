<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

require_once "$areaRoot/downloads.php";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/common.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n\t");

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

print '<h2>Available P2 repositories for CDO</h2>';

print 'For available P2 repositories have a look at the <a href="updatemanager.php">Update Manager</a> section.';

print '<h2>Available downloads for CDO</h2>';
printDownloads("http://www.eclipse.org/modeling/emf/downloads/index.php?project=cdo&showAll=0&showMax=5");
print '</div>';


########################################################################
include "$areaRoot/_footer.php"; ?>

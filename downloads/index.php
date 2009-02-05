<?php include "_defs.php";  include "_header.php";
########################################################################

require_once "$relativeProjectPath/includes/printDownloads.php";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/common.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n\t");

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
printDownloads("http://www.eclipse.org/modeling/emf/downloads/index.php?project=cdo&showAll=0&showMax=5");
print '</div>';


########################################################################
include "_footer.php"; ?>

<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

require_once "plan.php";

//$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/common.css"/>' . "\n\t");
//$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n\t");
//$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n\t");

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

printPlan("http://www.eclipse.org/projects/project-plan.php?planurl=http://www.eclipse.org/modeling/emf/cdo/project-info/plan.xml&component=CDO");
//print '</div>';


########################################################################
include "$areaRoot/_footer.php"; ?>

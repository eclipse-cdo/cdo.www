<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

require_once "plan.php";

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

printPlan("http://www.eclipse.org/projects/project-plan.php?planurl=http://www.eclipse.org/modeling/emf/cdo/project-info/plan.xml&component=CDO");


########################################################################
include "$areaRoot/_footer.php"; ?>

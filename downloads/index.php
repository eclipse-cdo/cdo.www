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

/*################################### 4.0 ##############################################*/
$entries=array(
array("name" => "4.0 release builds", "url" => "http://download.eclipse.org/modeling/emf/cdo/updates/releases/4.0"),
array("name" => "Latest stable build (<a href=\"https://hudson.eclipse.org/hudson/job/emf-cdo-maintenance\">continuous integration</a>)", "url" => "https://hudson.eclipse.org/hudson/job/emf-cdo-maintenance/lastStableBuild/artifact/result/site.p2"),
array("name" => "Latest successful build (<a href=\"https://hudson.eclipse.org/hudson/job/emf-cdo-maintenance\">continuous integration</a>)", "url" => "https://hudson.eclipse.org/hudson/job/emf-cdo-maintenance/lastSuccessfulBuild/artifact/result/site.p2")
);

printP2Repositories("CDO 4.0",  $entries);

/*################################### 3.0 ##############################################*/
$entries=array(
array("name" => "3.0 release builds", "url" => "http://download.eclipse.org/modeling/emf/cdo/updates/releases/3.0"),
);

printP2Repositories("CDO 3.0",  $entries);

/*################################### HEAD #######################################################*/
$entries=array(
array("name" => "4.1 milestone builds", "url" => "http://download.eclipse.org/modeling/emf/cdo/updates/integration/stable"),
array("name" => "4.1 integration builds", "url" => "http://download.eclipse.org/modeling/emf/cdo/updates/integration/weekly"),
array("name" => "Latest stable build (<a href=\"https://hudson.eclipse.org/hudson/job/emf-cdo-integration\">continuous integration</a>)", "url" => "https://hudson.eclipse.org/hudson/job/emf-cdo-integration/lastStableBuild/artifact/site.p2"),
array("name" => "Latest successful build (<a href=\"https://hudson.eclipse.org/hudson/job/emf-cdo-integration\">continuous integration</a>)", "url" => "https://hudson.eclipse.org/hudson/job/emf-cdo-integration/lastSuccessfulBuild/artifact/site.p2")
);

printP2Repositories("CDO 4.1 Preview",  $entries);

print '</div>';


########################################################################
include "$areaRoot/_footer.php"; ?>

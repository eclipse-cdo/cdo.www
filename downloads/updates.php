<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

require_once "$areaRoot/downloads.php";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/common.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n\t");

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Martin Fluegge";

print '<div id="midcolumn">';

/*################################### 3.0 ##############################################*/
$entries=array(
array("name" => "Latest release", "url" => "http://download.eclipse.org/modeling/emf/cdo/updates/3.0-releases/"),
array("name" => "Latest stable build (<a href=\"https://hudson.eclipse.org/hudson/job/emf-cdo-maintenance/\">continuous integration</a>)", "url" => "https://hudson.eclipse.org/hudson/job/emf-cdo-maintenance/lastStableBuild/artifact/result/site.p2/"),
array("name" => "Latest successful build (<a href=\"https://hudson.eclipse.org/hudson/job/emf-cdo-maintenance/\">continuous integration</a>)", "url" => "https://hudson.eclipse.org/hudson/job/emf-cdo-maintenance/lastSuccessfulBuild/artifact/result/site.p2/")
);

printP2Repositories("CDO 3.0",  $entries);

/*################################### HEAD #######################################################*/
$entries=array(
array("name" => "Latest stable build (<a href=\"https://hudson.eclipse.org/hudson/job/emf-cdo-integration/\">continuous integration</a>)", "url" => "https://hudson.eclipse.org/hudson/job/emf-cdo-integration/lastStableBuild/artifact/result/site.p2/"),
array("name" => "Latest successful build (<a href=\"https://hudson.eclipse.org/hudson/job/emf-cdo-integration/\">continuous integration</a>)", "url" => "https://hudson.eclipse.org/hudson/job/emf-cdo-integration/lastSuccessfulBuild/artifact/result/site.p2")
);

printP2Repositories("CDO 4.0 Preview",  $entries);

print '</div>';


########################################################################
include "$areaRoot/_footer.php"; ?>


<?php

function printP2Repositories($branchName,  $entries)
{
	print "<h2>P2 repositories for ".$branchName."</h2>";

	for($i=0; $i<count($entries); $i++)
	{
		print "<h4>".$entries[$i]['name']."</h4>";
		print "<a href='".$entries[$i]['url']."'>".$entries[$i]['url']."</a><br><br>";
	}
	print '<br><br>';
}
?>
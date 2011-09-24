<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Overview";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

$latest = "/home/data/httpd/download.eclipse.org/modeling/emf/cdo/updates/integration/latest/help/org.eclipse.emf.cdo/html";

global $App;
if ($App != NULL)
{
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $latest . '/book.css" media="screen"/>' . "\n\t");
}

print '<div id="midcolumn">';
print '<h1>CDO Model Repository Overview</h1>';

$inbody = false;

$lines = file($latest . "/Overview.html");
foreach ($lines as $line)
{
	if (inbody)
	{
		if (strpos($line, "</body>") != FALSE)
		{
			break;
		}
		
		print $line . '\n';
	}
	else
	{
		if (strpos($line, "</table>") != FALSE)
		{
			inbody = true;
		}
	}
}

print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "CDO Model Repository Overview";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

global $latestIntegration; // Comes from _header.php
$latest = "http://download.eclipse.org/modeling/emf/cdo/drops/" . $latestIntegration . "/help/org.eclipse.emf.cdo.doc/html";

global $App;
if ($App != NULL)
{
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $latest . '/book.css" media="screen"/>' . "\n\t");
}

print '<div id="midcolumn">' . "\n\n";
print "<h1>CDO Model Repository Overview</h1>\n";

// Fetch Overview.html
$overview = file_get_contents($latest . "/Overview.html");

// Cut our relevant body
preg_match('@</table>(.*)<p align="right">@s', $overview, $match);
$overview = $match[1];

// Protect absolute URLs
$overview = str_replace('<a href="http://', '<a HREF="http://', $overview);
$overview = str_replace('<img src="http://', '<img SRC="http://', $overview);

// Rewrite relative URLs
$overview = str_replace('<a href="', '<a href="' . $latest . '/', $overview);
$overview = str_replace('<img src="', '<img src="' . $latest . '/', $overview);

print $overview;
print "\n\n</div>";

########################################################################
include "$areaRoot/_footer.php"; ?>

<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="book.css"/>' . "\n\t");

$pageTitle 		= "CDO Model Repository Overview";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

global $latestIntegration; // Defined in _header.php

$help = "http://download.eclipse.org/modeling/emf/cdo/drops/" . $latestIntegration . "/help";
$latest = $help . "/org.eclipse.emf.cdo.doc/html";
$others = "<p class=\"middle\"><i>This overview is an extract from the <a href=\"$help\">Latest Help</a>.<br>\nFor other versions select from the menu bar at the left side.</i></p>\n\n";

global $App;

print '<div id="midcolumn">' . "\n\n";
print "<h1 class=\"middle\">CDO Model Repository Overview</h1>\n";
print $others;

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

print "\n\n$others\n\n</div>";

########################################################################
include "$areaRoot/_footer.php"; ?>

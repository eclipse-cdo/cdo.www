<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Presentations";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

function printPresentation($basePath, $title, $subtitle, $month, $lang = "english")
{
	print "<h6 class=\"homeitem\">$title\n";
}

print '<div id="midcolumn">';
printPresentation("Bombardier_2008/CDO_Preview_Bombardier_2008",
									"CDO 2.0 Preview for Bombardier",
									"",
									"October 2008");
print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

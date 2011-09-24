<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Overview";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";


$qualifier = file_get_contents("http://download.eclipse.org/modeling/emf/cdo/updates/integration/latest.qualifier");
$latest = "http://download.eclipse.org/modeling/emf/cdo/drops/" . $qualifier . "/help/org.eclipse.emf.cdo/html";

global $App;
if ($App != NULL)
{
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $latest . '/book.css" media="screen"/>' . "\n\t");
}

print '<div id="midcolumn">';
print "<h1>CDO Model Repository Overview</h1>\n";

$overview = file_get_contents($latest . "/Overview.html");
$overview = preg_replace('/.*?</table>(.*)</BODY>.*?/i', '\\1', $overview);

print $overview;
print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

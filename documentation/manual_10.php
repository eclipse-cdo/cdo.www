<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Manual 1.0";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

require_once "dita.php";

print '<div id="midcolumn">';
print "<h1 id=\"ditatitle\">Manual 1.0</h1>\n";
printDita("manual_20", "org.eclipse.emf/org.eclipse.emf.cdo/doc/org.eclipse.emf.cdo.doc/src");
print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Manual 2.0";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

require_once "dita.php";
print "<h1 id=\"ditatitle\">Manual 2.0</h1>\n";
printDita($viewcvsRoot, "org.eclipse.emf/org.eclipse.emf.cdo/doc/org.eclipse.emf.cdo.doc/src", "manual_20", "Manual 2.0");

print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

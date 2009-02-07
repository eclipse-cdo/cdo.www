<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Reference 2.0";
$pageKeywords	= "reference preview development integration interim";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

require_once "$projectRoot/includes/dita.php";
printDita($viewcvsRoot, "org.eclipse.emf/org.eclipse.emf.cdo/doc/org.eclipse.emf.cdo.doc/dita/src");

print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

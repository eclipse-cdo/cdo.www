<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php"; 
########################################################################

$pageTitle 		= "2.0 Preview";
$pageKeywords	= "preview development integration interim";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
$node = isset($_REQUEST["node"]) ? $_REQUEST["node"] : "index";
include "$node.html";
print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

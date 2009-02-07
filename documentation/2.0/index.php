<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "2.0 Preview";
$pageKeywords	= "preview development integration interim";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

$node = isset($_REQUEST["node"]) ? $_REQUEST["node"] : "index";
$ext =  ($node == "index" ? "ditamap" : "xml");

$viewcvs = "http://dev.eclipse.org/viewcvs/index.cgi";
$dita = "org.eclipse.emf/org.eclipse.emf.cdo/doc/org.eclipse.emf.cdo.doc/dita/src";
$repository = "Modeling_Project";

$viewcvsRev1 = "1.4";
$viewcvsRev2 = "1.2";

$query = "root=$repository&view=diff&r1=$viewcvsRev1&r2=$viewcvsRev2&diff_format=h";
$url = "$viewcvs/$dita/$node.$ext?$query";
echo "$url<br/>";

include "$node.html";
print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

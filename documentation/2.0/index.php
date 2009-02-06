<?php $relativeProjectPath = "../.."; include "../_defs.php";  include "../_header.php"; 
########################################################################

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
$node = isset($_REQUEST["node"]) ? $_REQUEST["node"] : "index";
include "$node.html";
print '</div>';

########################################################################
include "../_footer.php"; ?>

<?php include "_defs.php";  include "_header.php"; 
########################################################################

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

$node = isset($_REQUEST["node"]) ? $_REQUEST["node"] : "index.html";
if (strpos($node, "/") === 0)
{
	$node = substr($node, 1);
}
else if (strpos($node, "../") === 0)
{
	$node = substr($node, 3);
}

print '<div id="midcolumn">';
include $node;
print '</div>';

########################################################################
include "_footer.php"; ?>

<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/actions/edit-clear.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("Process", "$areaPath/process", "", 1);
$Nav->addCustomNav("Plan", "$areaPath/plan", "", 1);

########################################################################
?>

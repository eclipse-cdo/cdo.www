<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/actions/go-down.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("Updates", "$areaPath/updates.php", "", 1);
$Nav->addCustomNav("Preview 4.0", "$areaPath/#version2", "", 1);
$Nav->addCustomNav("Release 3.0", "$areaPath/#version1", "", 1);
$Nav->addCustomNav("Release Notes", "$areaPath/#relnotes", "", 1);
$Nav->addCustomNav("License", "$areaPath/#license", "", 1);

########################################################################
?>

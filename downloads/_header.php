<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/actions/go-down.png";
$Nav->addNavSeparator($areaTitle, "$areaPath/");
$Nav->addCustomNav("Update Manager", "$areaPath/#updates", "", 1);
$Nav->addCustomNav("1.0 Releases", "$areaPath/#version1", "", 1);
$Nav->addCustomNav("2.0 Previews", "$areaPath/#version2", "", 1);
$Nav->addCustomNav("Release Notes", "$areaPath/#relnotes", "", 1);
$Nav->addCustomNav("License", "$areaPath/#license", "", 1);

########################################################################
?>

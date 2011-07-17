<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/actions/go-down.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("Releases", "$areaPath/index.php", "", 1);
$Nav->addCustomNav("&nbsp;4.0 Releases", "$areaPath/index.php#releases_4_0", "", 1);
$Nav->addCustomNav("&nbsp;3.0 Releases", "$areaPath/index.php#releases_3_0", "", 1);
$Nav->addCustomNav("4.1 Integration", "$areaPath/index.php#integration", "", 1);
$Nav->addCustomNav("&nbsp;Stable Builds", "$areaPath/index.php#integration_stable", "", 1);
$Nav->addCustomNav("&nbsp;Weekly Builds", "$areaPath/index.php#integration_weekly", "", 1);
$Nav->addCustomNav("4.0 Maintenance", "$areaPath/index.php#maintenance", "", 1);
$Nav->addCustomNav("&nbsp;Stable Builds", "$areaPath/index.php#maintenance_stable", "", 1);
$Nav->addCustomNav("&nbsp;Weekly Builds", "$areaPath/index.php#maintenance_weekly", "", 1);
$Nav->addCustomNav("License", "http://www.eclipse.org/org/documents/epl-v10.php", "", 1);

########################################################################
?>

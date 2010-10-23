<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/actions/go-down.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("Updates", "$areaPath/updates.php", "", 1);
$Nav->addCustomNav("Release Notes", "$areaPath/../documentation/relnotes_30/index.php", "", 1);
$Nav->addCustomNav("License", "http://www.eclipse.org/org/documents/epl-v10.php", "", 1);

########################################################################
?>

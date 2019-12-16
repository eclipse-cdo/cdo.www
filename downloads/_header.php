<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/actions/go-down.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("Releases", "$areaPath/index.php#releases", "", 1);
$Nav->addCustomNav("Integration", "$areaPath/index.php#integration", "", 1);
$Nav->addCustomNav("Browse Sources", "http://git.eclipse.org/c/cdo/cdo.git", "", 1);
$Nav->addCustomNav("Install Sources", "http://wiki.eclipse.org/CDO_Source_Installation", "", 1);
$Nav->addCustomNav("License", "http://www.eclipse.org/org/documents/epl-v10.php", "", 1);

########################################################################
?>

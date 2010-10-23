<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("About", "$areaPath/about.php", "", 1);
$Nav->addCustomNav("Manual 3.0", "$areaPath/manual_30.php", "", 1);
$Nav->addCustomNav("Release Notes 3.0", "$areaPath/relnotes_30/index.php", "", 1);
$Nav->addCustomNav("Presentations", "$areaPath/presentations", "", 1);

########################################################################
?>

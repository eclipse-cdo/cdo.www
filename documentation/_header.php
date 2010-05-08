<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("About", "$areaPath/about.php", "", 1);
$Nav->addCustomNav("Manual 1.0", "$areaPath/manual_10.php", "", 1);
$Nav->addCustomNav("Manual 2.0", "$areaPath/manual_20.php", "", 1);
$Nav->addCustomNav("Release Notes 3.0", "$areaPath/relnotes/3.0", "", 1);
$Nav->addCustomNav("Presentations", "$areaPath/presentations", "", 1);

########################################################################
?>

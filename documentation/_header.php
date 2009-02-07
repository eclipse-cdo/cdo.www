<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png";
$Nav->addNavSeparator($areaTitle, "$areaPath/");
$Nav->addCustomNav("About", "$areaPath/about.php", "", 1);
$Nav->addCustomNav("Features", "$areaPath/features.php", "", 1);
$Nav->addCustomNav("Reference 2.0", "$areaPath/2.0", "", 1);
$Nav->addCustomNav("Reference 1.0", "$areaPath/1.0", "", 1);
$Nav->addCustomNav("Tutorials", "$areaPath/#tutorials", "", 1);
$Nav->addCustomNav("Presentations", "$areaPath/#presentations", "", 1);

########################################################################
?>

<?php include "$projectRoot/_projectHeader.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png";
$Nav->addNavSeparator($areaTitle, "$areaPath/");
$Nav->addCustomNav("2.0 Preview", "$areaPath/2.0", "", 1);
$Nav->addCustomNav("1.0 Release", "$areaPath/1.0", "", 1);
$Nav->addCustomNav("Tutorials", "$areaPath/#tutorials", "", 1);
$Nav->addCustomNav("Presentations", "$areaPath/#presentations", "", 1);

########################################################################
?>

<?php include "$projectRoot/_projectHeader.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/emblems/emblem-system.png";
$Nav->addNavSeparator($areaTitle, "$areaPath/");
$Nav->addCustomNav("Tables", "$areaPath/tables.php", "", 1);
$Nav->addCustomNav("Test Forms", "$areaPath/test-forms.php", "", 1);

########################################################################
?>

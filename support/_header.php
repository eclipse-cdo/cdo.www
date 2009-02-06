<?php include "$projectRoot/_projectHeader.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/apps/help-browser.png";
$Nav->addNavSeparator($areaTitle, "$areaPath/");
$Nav->addCustomNav("Newsgroup", "$areaPath/#newsgroup", "", 1);
$Nav->addCustomNav("Bugzilla", "$areaPath/#bugzilla", "", 1);
$Nav->addCustomNav("Mailing List", "$areaPath/#mailinglist", "", 1);
$Nav->addCustomNav("Commercial", "$areaPath/#commercial", "", 1);

########################################################################
?>

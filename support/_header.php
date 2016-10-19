<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "https://dev.eclipse.org/huge_icons/actions/mail-reply-all.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("Newsgroup", "$areaPath/#newsgroup", "", 1);
$Nav->addCustomNav("Bugzilla", "$areaPath/#bugzilla", "", 1);
$Nav->addCustomNav("Mailing List", "$areaPath/#mailinglist", "", 1);
$Nav->addCustomNav("Commercial", "$areaPath/#commercial", "", 1);

########################################################################
?>

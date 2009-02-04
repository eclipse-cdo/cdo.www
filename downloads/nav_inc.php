<?php

$Nav->addCustomNav("About This Project", "/projects/project_summary.php?projectid=" . str_replace("/", ".", $PR), "", 1);

$Nav->addNavSeparator("CDO", "$rooturl");
$Nav->addCustomNav("Team", "$rooturl/project-info/team.php", "", 1);
$Nav->addCustomNav("Downloads", "/modeling/emf/downloads/?project=cdo", "", 1);

$Nav->addNavSeparator("Resources", "$rooturl/resources");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/CDO", "", 1);

$Nav->addNavSeparator("Tools", "$rooturl/tools");
$Nav->addCustomNav("MYSQL Tables", "$rooturl/tools/mysql.php", "", 1);

?>

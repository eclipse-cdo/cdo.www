<?php

$Nav->addCustomNav("CDO Model Repository", "..", "", 1);

$Nav->addNavSeparator("Documentation", ".");
$Nav->addCustomNav("Team", "$rooturl/project-info/team.php", "", 1);
$Nav->addCustomNav("Downloads", "/modeling/emf/downloads/?project=cdo", "", 1);

$Nav->addNavSeparator("Resources", "$rooturl/resources");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/CDO", "", 1);

$Nav->addNavSeparator("Tools", "$rooturl/tools");
$Nav->addCustomNav("MYSQL Tables", "$rooturl/tools/mysql.php", "", 1);

?>

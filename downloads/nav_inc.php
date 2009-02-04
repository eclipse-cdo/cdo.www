<?php

$Nav->addNavSeparator("CDO Model Repository", "..");
$Nav->addCustomNav("Downloads", "../downloads", "", 1);
$Nav->addCustomNav("Documentation", "../documentation", "", 1);

$Nav->addCustomNav("Support", "../support", "", 1);
$Nav->addCustomNav("Wiki", "../wiki", "", 1);
$Nav->addCustomNav("Development", "../development", "", 1);
$Nav->addCustomNav("Team", "../team", "", 1);

$Nav->addNavSeparator("Documentation", ".");
$Nav->addCustomNav("Version 1.0", "#version1", "", 1);
$Nav->addCustomNav("Version 2.0", "#version2", "", 1);
$Nav->addCustomNav("Tutorials", "#tutorials", "", 1);
$Nav->addCustomNav("Presentations", "#presentations", "", 1);

$Nav->addNavSeparator("Related Links", "_SEPARATOR");
$Nav->addCustomNav("Team", "$rooturl/project-info/team.php", "", 1);
$Nav->addCustomNav("Downloads", "/modeling/emf/downloads/?project=cdo", "", 1);

if ($debug)
{
	$Nav->addNavSeparator("Tools", "$rooturl/tools");
	$Nav->addCustomNav("MYSQL Tables", "$rooturl/tools/mysql.php", "", 1);
	$Nav->addCustomNav("PHP Info", "$rooturl/tools/info.php", "", 1);
}

?>

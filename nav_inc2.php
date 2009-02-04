<?php

$Nav->addNavSeparator("Related Links", "");
$Nav->addCustomNav("Team", "$rooturl/project-info/team.php", "", 1);
$Nav->addCustomNav("Downloads", "/modeling/emf/downloads/?project=cdo", "", 1);

if ($debug)
{
	$Nav->addNavSeparator("Tools", "");
	$Nav->addCustomNav("MYSQL Tables", "$rooturl/tools/mysql.php", "", 1);
	$Nav->addCustomNav("PHP Info", "$rooturl/tools/info.php", "", 1);
}

?>

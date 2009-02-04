<?php

$Nav->addNavSeparator("Related Links", "");
$Nav->addCustomNav("Bla", "$projectPath/team", "", 1);
$Nav->addCustomNav("Blub", "$projectPath/team", "", 1);

if ($debug)
{
	$Nav->addNavSeparator("Tools", "");
	$Nav->addCustomNav("MYSQL Tables", "$projectPath/tools/mysql.php", "", 1);
	$Nav->addCustomNav("PHP Info", "$projectPath/tools/info.php", "", 1);
}

?>

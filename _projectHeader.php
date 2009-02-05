<?php include "$toolkitRoot/includes/header.php";
########################################################################

if ($Nav != NULL)
{
	$Nav->addNavSeparator($projectTitle, "$relativeProjectPath");
	$Nav->addCustomNav("Downloads", "$relativeProjectPath/downloads", "", 1);
	$Nav->addCustomNav("Documentation", "$relativeProjectPath/documentation", "", 1);
	$Nav->addCustomNav("Support", "$relativeProjectPath/support", "", 1);
	$Nav->addCustomNav("Community", "$relativeProjectPath/community", "", 1);
	$Nav->addCustomNav("Development", "$relativeProjectPath/development", "", 1);
	$Nav->addCustomNav("Team", "$relativeProjectPath/team", "", 1);
}

########################################################################
?>

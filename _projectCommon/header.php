<?php include "$toolkitRoot/includes/header.php";
########################################################################

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $projectPath . '/styles.css" media="screen"/>' . "\n\t");

if ($Nav != NULL)
{
	$Nav->addNavSeparator($projectTitle, "$projectPath/");
	$Nav->addCustomNav("Downloads", "$projectPath/downloads", "", 1);
	$Nav->addCustomNav("Documentation", "$projectPath/documentation", "", 1);
	$Nav->addCustomNav("Community", "$projectPath/community", "", 1);
	$Nav->addCustomNav("Support", "$projectPath/support", "", 1);
}

########################################################################
?>

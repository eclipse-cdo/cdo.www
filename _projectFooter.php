<?php
########################################################################

if ($Nav != NULL)
{
	$Nav->addNavSeparator("Related Links", "");
	$Nav->addCustomNav("Bla", "$relativeProjectPath/team", "", 1);
	$Nav->addCustomNav("Blub", "$relativeProjectPath/team", "", 1);
}

########################################################################
include "$toolkitRoot/includes/footer.php"; ?>

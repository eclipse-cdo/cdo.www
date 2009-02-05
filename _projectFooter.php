<?php
########################################################################

if ($Nav != NULL)
{
	$Nav->addNavSeparator("Related Links", "");
	$Nav->addCustomNav("Bla", "$projectPath/team", "", 1);
	$Nav->addCustomNav("Blub", "$projectPath/team", "", 1);
}

########################################################################
include "$toolkitRoot/includes/footer.php"; ?>

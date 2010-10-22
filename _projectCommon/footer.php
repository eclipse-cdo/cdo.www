<?php
########################################################################

if ($Nav != NULL)
{
	$Nav->addNavSeparator("Related Links", "");
	$Nav->addCustomNav("CDO Wiki", "http://wiki.eclipse.org/CDO", "", 1);
	$Nav->addCustomNav("Net4j Wiki", "http://wiki.eclipse.org/Net4j", "", 1);
	$Nav->addCustomNav("Dawn Wiki", "http://wiki.eclipse.org/Dawn", "", 1);
}

########################################################################
include "$toolkitRoot/includes/footer.php"; ?>

<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

//$pageTitle 		= "Downloads";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

if (function_exists("imap_open"))
{
	$newsgroup = imap_open("{news.eclipse.org:119/nntp}eclipse.tools.emf", "exquisitus", "flinder19");
	echo "Messages: " . imap_num_msg($newsgroup);
	imap_close($newsgroup);
}
else
{
	echo "No NNTP support available.";
}

print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

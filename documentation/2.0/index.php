<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Reference 2.0";
$pageKeywords	= "reference preview development integration interim";
$pageAuthor		= "Eike Stepper";

$ditaSrc = "org.eclipse.emf/org.eclipse.emf.cdo/doc/org.eclipse.emf.cdo.doc/dita/src";

print '<div id="midcolumn">';

$node = isset($_REQUEST["node"]) ? $_REQUEST["node"] : "index";
$mode = isset($_REQUEST["mode"]) ? $_REQUEST["mode"] : "view";
$branch = isset($_REQUEST["branch"]) ? $_REQUEST["branch"] : "HEAD";

$Nav->addNavSeparator("This Node", "");
$Nav->addCustomNav("<b>View</b>", $mode == "view" ? "" : "$pageFolder?node=$node", "", 1);
$Nav->addCustomNav("<b>Source</b>", $mode == "source" ? "" : "$pageFolder?node=$node&mode=source", "", 1);
$Nav->addCustomNav("<b>History</b>", $mode == "history" ? "" : "$pageFolder?node=$node&mode=history", "", 1);

$ext =  ($node == "index" ? "ditamap" : "xml");
$file = "$ditaSrc/$node.$ext";
$url = "$viewcvsURL/$file?root=$viewcvsRoot&pathrev=$branch";

switch ($mode)
{
	case "view":
		include "$node.html";
		break;

	case "source":
		$html = file_get_contents("$url&view=markup");
		preg_match('/<div id="vc_markup">(.+)<\/div>\s*<div id="midcolumn">/is', $html, $matches);
		print $matches[1];
		break;

	case "history":
		$html = file_get_contents("$url&view=log");
		preg_match('/<table class="auto">(.+)<\/form>/is', $html, $matches);
		$html = str_replace('"' . $viewcvsPath, '"' . $viewcvsURL, $matches[1]);
		print '<h6 class="homeitem"><a href="' . $pageFolder . '?node=' . $node . '&mode=source">' . $file . '</a></h6><hr/>' . "\n";
		print '<table class="auto">' . $html . '</form>';
		break;
}

print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

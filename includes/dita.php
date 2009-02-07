<?php

function printDita($viewcvsRoot, $ditaSrc, $navTitle = NULL)
{
	$node = isset($_REQUEST["node"]) ? $_REQUEST["node"] : "index";
	if (strpos($node, "../") === 0)
	{
		$node = substr($node, 3);
	}

	$mode = isset($_REQUEST["mode"]) ? $_REQUEST["mode"] : "view";
	$branch = isset($_REQUEST["branch"]) ? $_REQUEST["branch"] : "HEAD";

	//	echo $_SERVER['PHP_SELF']."<br/>";
	//	echo $_SERVER['QUERY_STRING']."<br/>";
	//	echo "$node<br/>";
	//	echo "$mode<br/>";

	global $Nav, $pageFolder;
	if ($navTitle)
	{
		$Nav->addNavSeparator($navTitle, "");
		$Nav->addCustomNav("<b>View</b>", $mode == "view" ? "" : "$pagePath?mode=view", "", 1);
		$Nav->addCustomNav("<b>Source</b>", $mode == "source" ? "" : "$pagePath?mode=source", "", 1);
		$Nav->addCustomNav("<b>History</b>", $mode == "history" ? "" : "$pagePath?mode=history", "", 1);
	}

	$ext =  ($node == "index" ? "ditamap" : "xml");
	$file = "$ditaSrc/$node.$ext";

	global $viewcvsURL, $viewcvsPath;
	$url = "$viewcvsURL/$file?root=$viewcvsRoot&pathrev=$branch";

	switch ($mode)
	{
		case "view":
			include "$node.xml";
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
}

?>

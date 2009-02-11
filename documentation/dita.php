<?php

function printDita($viewcvsRoot, $ditaSrc, $topicsFolder, $navTitle = "Page Modes")
{
	global $App, $Nav;
	global $areaPath, $pageFolder, $pagePath;
	global $viewcvsURL, $viewcvsPath;

	$topic = isset($_REQUEST["topic"]) ? $_REQUEST["topic"] : "index";
	$mode = isset($_REQUEST["mode"]) ? $_REQUEST["mode"] : "view";
	$branch = isset($_REQUEST["branch"]) ? $_REQUEST["branch"] : "HEAD";

	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $areaPath . '/dita.css" media="screen"/>' . "\n\t");
	if ($topic == "index")
	{
		$App->AddExtraHtmlHeader('<script src="' . $areaPath . '/dita.js" type="text/javascript"></script>' . "\n\t");
	}


	if ($Nav != NULL && $navTitle != NULL)
	{
		$Nav->addNavSeparator($navTitle, "");
		$Nav->addCustomNav("<b>View</b>", $mode == "view" ? "" : "$pagePath?topic=$topic", "", 1);
		$Nav->addCustomNav("<b>Source</b>", $mode == "source" ? "" : "$pagePath?topic=$topic&mode=source", "", 1);
		$Nav->addCustomNav("<b>History</b>", $mode == "history" ? "" : "$pagePath?topic=$topic&mode=history", "", 1);
	}

	$ext =  ($topic == "index" ? "ditamap" : "dita");
	$file = "$ditaSrc/$topic.$ext";
	$url = "$viewcvsURL/$file?root=$viewcvsRoot&pathrev=$branch";

	switch ($mode)
	{
		case "view":
			$html = file_get_contents("$topicsFolder/$topic.topic");
			if ($topic == "index")
			{
				$html = preg_replace('/<li><a href="([^"]+)">([^<]+)<\/a>(\s*)<ul id="([^"]+)">/i',
														 '<li><a href="javascript:toggle(' . "'\\4'" . ')"><img id="\\4_IMG" src="' . $areaPath . '/images/plus.gif"/></a>&nbsp;' .
														 '<img src="' . $areaPath . '/images/book.gif"/>&nbsp;' .
														 '<a href="\\1">\\2</a>\\3<ul id="\\4" class="withchildren" style="display: none;">', $html);
				$html = preg_replace('/<li><a href="([^"]+)">([^<]+)<\/a>/i',
														 '<li><img src="' . $areaPath . '/images/empty.gif"/>&nbsp;' .
														 '<img src="' . $areaPath . '/images/topic.gif"/>&nbsp;' .
														 '<a href="\\1">\\2</a>', $html);
			}

			print $html;
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
			print '<h6 class="homeitem"><a href="' . $pageFolder . '?topic=' . $topic . '&mode=source">' . $file . '</a></h6><hr/>' . "\n";
			print '<table class="auto">' . $html . '</form>';
			break;
	}
}

?>

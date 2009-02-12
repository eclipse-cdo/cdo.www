<?php

function printDita($topicsFolder, $ditaSrc = NULL)
{
	global $areaPath, $pageFolder, $pagePath;
	global $viewcvsURL, $viewcvsPath, $viewcvsRoot;

	$topic = isset($_REQUEST["topic"]) ? $_REQUEST["topic"] : "toc";
	$mode = isset($_REQUEST["mode"]) && $ditaSrc != NULL ? $_REQUEST["mode"] : "view";
	$branch = isset($_REQUEST["branch"]) && $ditaSrc != NULL ? $_REQUEST["branch"] : "HEAD";

	global $App;
	if ($App != NULL)
	{
		$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $areaPath . '/dita.css" media="screen"/>' . "\n\t");
		$App->AddExtraHtmlHeader('<script src="' . $areaPath . '/dita.js" type="text/javascript"></script>' . "\n\t");
	}

	print "<div id=\"breadcrumbs\">\n";
	if ($topic != "toc")
	{
		$stack = array("<a href=\"$pagePath\" title=\"Table of Contents\">TOC</a>");
		$lines = file("$topicsFolder/toc.topic");
		foreach ($lines as $line)
		{
			if (strpos($line, $topic) != FALSE)
			{
				break;
			}

			if (!strpos($line, "</li>") && preg_match('/<li><a href="\?topic=([^"]+)">([^<]+)<\/a>/', $line, $matches))
			{
				array_push($stack, '<a href="?topic=' . $matches[1] . '">' . $matches[2] . '</a>');
			}
			else if (strpos($line, "</ul>") === 0)
			{
				array_pop($stack);
			}
		}

		print implode("<img src=\"/eclipse.org-common/themes/Nova/images/separator.png\"/>", $stack) ;
	}
	else
	{
		print "&nbsp;\n";
	}

	print "</div>\n";
	print "<div id=\"toolbar\">\n";
	$separatorNeeded = false;
	if ($mode == "view")
	{
		if ($topic == "toc")
		{
			print "<a href=\"javascript:setVisibleAll(true)\" title=\"Expand All\"><img src=\"$areaPath/images/expandAll.gif\"/></a>\n";
			print "<a href=\"javascript:setVisibleAll(false)\" title=\"Collapse All\"><img src=\"$areaPath/images/collapseAll.gif\"/></a>\n";
		}
		else
		{
//			if (stripos($topic, $wikiPageSuffix) !== false)
//			print "<a href=\"javascript:setVisibleAll(false)\" title=\"Collapse All\"><img src=\"$areaPath/images/collapseAll.gif\"/></a>\n";
		}

			$separatorNeeded = true;
	}

	if ($ditaSrc != NULL)
	{
		if ($separatorNeeded)
		{
			print "&nbsp;<img src=\"$areaPath/images/vr.gif\"/>&nbsp;\n";
		}

		print "<a href=\"$pagePath?topic=$topic\" title=\"View\"><img src=\"$areaPath/images/view" . ($mode == "view" ? "Active" : "") . ".gif\"/></a>\n";
		print "<a href=\"$pagePath?topic=$topic&mode=source\" title=\"Source\"><img src=\"$areaPath/images/source" . ($mode == "source" ? "Active" : "") . ".gif\"/></a>\n";
		print "<a href=\"$pagePath?topic=$topic&mode=history\" title=\"History\"><img src=\"$areaPath/images/history" . ($mode == "history" ? "Active" : "") . ".gif\"/></a>\n";
		$separatorNeeded = true;
	}

	print "</div>\n";
	print "<br/>\n";

	$ext =  ($topic == "toc" ? "ditamap" : "dita");
	$file = "$ditaSrc/$topic.$ext";
	$url = "$viewcvsURL/$file?root=$viewcvsRoot&pathrev=$branch";

	switch ($mode)
	{
		case "view":
			$html = file_get_contents("$topicsFolder/$topic.topic");
			if ($topic == "toc")
			{
				$html = preg_replace('/<li><a href="([^"]+)">([^<]+)<\/a>(\s*)<ul id="([^"]+)">/i',
														 '<li><a href="javascript:toggle(' . "'\\4'" . ')"><img id="\\4_IMG" src="' . $areaPath . '/images/expand.gif"/></a>&nbsp;' .
														 '<img src="' . $areaPath . '/images/book.gif"/>&nbsp;' .
														 '<a href="\\1">\\2</a>\\3<ul id="\\4" class="withchildren" style="display: none;">', $html);
				$html = preg_replace('/<li><a href="([^"]+)">([^<]+)<\/a>/i',
														 '<li><img src="' . $areaPath . '/images/empty.gif"/>&nbsp;' .
														 '<img src="' . $areaPath . '/images/topic.gif"/>&nbsp;' .
														 '<a href="\\1">\\2</a>', $html);

				print "<h1 class=\"topictitle1\">Table of Contents</h1>\n";
				$html = "<div id=\"toc\">$html</div\n";
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

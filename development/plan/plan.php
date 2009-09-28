<?php

function printPlan($url)
{
	$inplan = false;
	$content = file_get_contents($url);
	$lines = explode("\n", $content);
	for($i = 0; $i < count($lines); $i++)
	{
		$line = $lines[$i];
		if ($inplan == false)
		{
			if (strpos($line, '<div id="midcolumn"><h1>') !== false)
			{
				$inplan = true;
			}
		}
		else
		{
			if (strpos($line, '</div><p><a href="#toc">Table of Contents</a></p></div>') !== false)
			{
				print "$line\n";
//				print "</div>\n";
//				print "</div>\n";
				break;
			}
		}

		if ($inplan)
		{
			print "$line\n";
		}
	}
}

?>

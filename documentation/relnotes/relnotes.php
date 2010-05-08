<?php

function printReleaseNotes($url)
{
	$region = 0;
	$content = file_get_contents($url);
	preg_match('.*<body>(.*)</body>.*', $content, $matches);
	print "$matches[0]\n";
}

?>

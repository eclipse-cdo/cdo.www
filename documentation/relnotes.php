<?php

function printReleaseNotes($url)
{
	$content = file_get_contents($url);
	ereg('.*<body>(.*)</body>.*', $content, $matches);
	print "$matches[1]\n";
}

?>

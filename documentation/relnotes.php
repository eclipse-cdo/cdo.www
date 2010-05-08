<?php

function printReleaseNotes($url)
{
	$content = file_get_contents($url);
	ereg('.*<body>(.*)</body>.*', $content, $matches);
	print "7: $matches[1]\n";
	print "<p> $matches\n";
	// print "<p> $content\n";
}

?>

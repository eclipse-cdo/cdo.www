<?php

function printReleaseNotes($url)
{
	$content = file_get_contents($url);
	ereg('/.*<body>(.*)</body>.*/i', $content, $matches);
	print "5: $matches[1]\n";
	// print "<p> $content\n";
}

?>

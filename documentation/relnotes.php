<?php

function printReleaseNotes($url)
{
	$region = 0;
	$content = file_get_contents($url);
	preg_match('/<body>(.*)<\/body>/i', $content, $matches);
	print "1: $matches[0]\n";
}

?>

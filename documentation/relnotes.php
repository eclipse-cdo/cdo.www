<?php

function printReleaseNotes($url)
{
	$content = file_get_contents($url);
	array $matches;
	preg_match('/<body>(.*)<\/body>/i', $content, $matches);
	print "2: $matches[0]\n";
}

?>

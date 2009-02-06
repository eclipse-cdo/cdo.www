<?php include "_defs.php";  include "_header.php";
########################################################################

//$pageTitle 		= "Downloads";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

phpinfo();
$info = ob_get_clean();
$lines = explode("\n", $info, -1);

ob_start();

print "\n";
print "<!-- ######################################################################## -->\n";
print "<!-- ######################################################################## -->\n";
print "<!-- ######################################################################## -->\n";
print "\n";
print '<div id="midcolumn">';
print '<div class="center">';

foreach ($lines as $line)
{
	if (isset($copyToOutput))
	{
		print "$line\n";
	}
	else
	{
		if ($line == '<body><div class="center">')
		{
			$copyToOutput = true;
		}
	}
}

print '</div>';
print '</div>';

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="phpinfo.css" media="screen"/>' . "\n\t");

########################################################################
include "_footer.php"; ?>

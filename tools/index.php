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

$form = new Form();
$form->setTarget("PHP_REFERENCE");
$fname = $form->addField(new Text("func", "Function name:"))->on("change", "form.action = 'http://www.php.net/' + func.value");
$form->addField(new Button("submit", "Submit"));
$form->render();

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

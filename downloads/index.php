<?php include "_defs.php";  include "_header.php";
########################################################################

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/common.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/downloads.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<script src="/modeling/includes/downloads.js" type="text/javascript"></script>' . "\n\t");

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

$region = 0;
$content = file_get_contents("http://www.eclipse.org/modeling/emf/downloads/index.php?project=cdo&showAll=0&showMax=5");
$lines = explode("\n", $content);
for($i = 0; $i < count($lines); $i++)
{
	$line = $lines[$i];
	switch ($region)
	{
		case 0:
			if (strpos($line, '<div class="homeitem3col">') === 0 && strpos($lines[$i + 1], '<a name="latest">') === 0)
			{
				$region = 1;
				++$i;
			}
			else
			{
				$lines[$i] = NULL;
			}
			break;

		case 1:
			if (strpos($line, '<div id="rightcolumn">') === 0)
			{
				$region = 2;
				$lines[$i] = NULL;
				$lines[$i - 1] = NULL;
			}
			break;

		default:
			$lines[$i] = NULL;
			break;
	}
}

for($i = 0; $i < count($lines); $i++)
{
	$line = $lines[$i];
	if ($line != NULL)
	{
		print "$line\n";
	}
}

//print '</div>';

########################################################################
include "_footer.php"; ?>

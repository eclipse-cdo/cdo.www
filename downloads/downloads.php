<?php

function printDownloads($url)
{
	$region = 0;
	$content = file_get_contents($url);
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

	$availableLines = count($lines);

	for($i = 0; $i < count($lines); $i++)
	{
		$line = $lines[$i];
		if ($line != NULL)
		{
			print "$line\n";
		}
		else
		{
			$availableLines--;
		}
	}

	if($availableLines==0)
	{
		print '<b>There are currently no ZIPs available for download.</b><p>Please have a look at the <a href="updates.php">Updates</a> section.';
		return;
	}
}

?>

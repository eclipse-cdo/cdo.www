<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/emblems/emblem-system.png";
$Nav->addNavSeparator($areaTitle, "$areaPath/");
$Nav->addCustomNav("Tables", "$areaPath/tables.php", "", 1);
$Nav->addCustomNav("Test Forms", "$areaPath/test-forms.php", "", 1);

$Nav->addNavSeparator("Test Scripts", "");
$testRoot = "$areaRoot/test";
if (($dir = opendir($testRoot)))
{
	while (($entry = readdir($dir)) !== false)
	{
		$file = "$testRoot/$entry";
		if (is_file($file))
		{
			$Nav->addCustomNav($entry, "$areaPath/test/$entry", "", 1);
		}
	}

	closedir($dir);
}

########################################################################
?>

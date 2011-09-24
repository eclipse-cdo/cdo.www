<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("Overview", "$areaPath/index.php", "", 1);
$Nav->addCustomNav("4.0 Release Help", "http://help.eclipse.org/indigo/index.jsp", "", 1);

$qualifiers = file_get_contents("http://download.eclipse.org/modeling/emf/cdo/updates/latest.qualifiers");

/*
if (preg_match('@releases_4_0 = (.*)@', $qualifiers, $match))
{
	$latest40 = $match[1];
}

if (preg_match('@releases_3_0 = (.*)@', $qualifiers, $match))
{
	$latest30 = $match[1];
	$Nav->addCustomNav("3.0 Release Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $latest30 . "/help", "", 1);
}
*/

if (preg_match('@integration = (.*)@', $qualifiers, $match))
{
	$latestIntegration = $match[1];
	$Nav->addCustomNav("4.1 Preview Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $latestIntegration . "/help", "", 1);
}

/*
if (preg_match('@maintenance = (.*)@', $qualifiers, $match))
{
	$latestMaintenance = $match[1];
	$Nav->addCustomNav("Maintenance Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $latestMaintenance . "/help", "", 1);
}
*/
$Nav->addCustomNav("Presentations", "$areaPath/presentations", "", 1);

########################################################################
?>

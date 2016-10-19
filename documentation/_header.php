<?php include "$projectRoot/_projectCommon/header.php";
########################################################################

$navIconURL = "http://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png";
$Nav->addNavSeparator($areaTitle, "");
$Nav->addCustomNav("Overview", "$areaPath/index.php", "", 1);

$qualifiers = file_get_contents("http://download.eclipse.org/modeling/emf/cdo/updates/latest.qualifiers");

if (preg_match('@integration = (.*)@', $qualifiers, $match))
{
	$latestIntegration = $match[1];
	$Nav->addCustomNav("Latest Preview Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $latestIntegration . "/help", "", 1);
}

if (preg_match('@releases_4_5 = (.*)@', $qualifiers, $match))
{
	$Nav->addCustomNav("4.5 Release Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $match[1] . "/help", "", 1);
}

if (preg_match('@releases_4_4 = (.*)@', $qualifiers, $match))
{
	$Nav->addCustomNav("4.4 Release Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $match[1] . "/help", "", 1);
}

if (preg_match('@releases_4_3 = (.*)@', $qualifiers, $match))
{
	$Nav->addCustomNav("4.3 Release Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $match[1] . "/help", "", 1);
}

if (preg_match('@releases_4_2 = (.*)@', $qualifiers, $match))
{
	$Nav->addCustomNav("4.2 Release Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $match[1] . "/help", "", 1);
}

if (preg_match('@releases_4_1 = (.*)@', $qualifiers, $match))
{
	$Nav->addCustomNav("4.1 Release Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $match[1] . "/help", "", 1);
}

if (preg_match('@releases_4_0 = (.*)@', $qualifiers, $match))
{
	$Nav->addCustomNav("4.0 Release Help", "http://download.eclipse.org/modeling/emf/cdo/drops/" . $match[1] . "/help", "", 1);
}

$Nav->addCustomNav("Presentations", "$areaPath/presentations", "", 1);

########################################################################
?>

<?php

$LF = "\n";
$debug = isset($_GET["debug"]);
$docRoot = $_SERVER["DOCUMENT_ROOT"];
$serverName = $_SERVER["SERVER_NAME"];


if (isset ($_GET["skin"]) && preg_match("/^(Blue|EclipseStandard|Industrial|Lazarus|Miasma|Modern|OldStyle|Phoenix|PhoenixTest|PlainText|Nova)$/", $_GET["skin"], $regs))
{
	// Passed skin
	$theme = $regs[1];
}
else
{
	// Default skin
	$theme = "Nova";
}

function formatDate($date)
{
	if (is_string($date)) $date = strtotime($date);
	return date("Y-m-d", $date);
}

function daysBetween($from, $until)
{
	if (is_string($from)) $from = strtotime($from);
	if (is_string($until)) $until = strtotime($until);
	$offset = floor($until / 86400) - floor($from / 86400) + 1; 
	return $offset;
}

require_once "$docRoot/eclipse.org-common/system/app.class.php";
require_once "$docRoot/eclipse.org-common/system/menu.class.php";
require_once "$docRoot/eclipse.org-common/system/nav.class.php";

class CustomApp extends App
{
	function getNavPath($_theme)
	{
		global $toolkitRoot;
		return "$toolkitRoot/custom/nav.php";
	}
}

$App = new CustomApp();
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/home/content/nova.css"/>');
$App->AddExtraHtmlHeader('<!--[if IE 6]> <link rel="stylesheet" type="text/css" href="/home/content/ie6_nova.css" media="screen"/> <![endif]-->');
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $relativeProjectPath . '/_projectStyles.css" media="screen"/>');	
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="_styles.css" media="screen"/>');	
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
//addGoogleAnalyticsTrackingCodeToHeader();

$Menu = new Menu();
$Nav = new Nav();

?>

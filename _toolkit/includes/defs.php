<?php

require_once "$toolkitRoot/classes/autoload.php";

$LF = "\n";
$debug = isset($_GET["debug"]);
$serverName = $_SERVER["SERVER_NAME"];
$docRoot = $_SERVER["DOCUMENT_ROOT"];
$pageFile = $_SERVER["PHP_SELF"];
$pageRoot = "";

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
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/home/content/nova.css"/>' . "\n\t");
$App->AddExtraHtmlHeader('<!--[if IE 6]> <link rel="stylesheet" type="text/css" href="/home/content/ie6_nova.css" media="screen"/> <![endif]-->' . "\n\t");
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $relativeProjectPath . '/_projectStyles.css" media="screen"/>' . "\n\t");	
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="_styles.css" media="screen"/>' . "\n\t");	
$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
//addGoogleAnalyticsTrackingCodeToHeader();

$Menu = new Menu();
$Nav = new Nav();

?>

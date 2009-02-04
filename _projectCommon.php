<?php

$LF = "\n";
$debug = isset($_GET["debug"]);
$docRoot = $_SERVER['DOCUMENT_ROOT'];
$server = $_SERVER["SERVER_NAME"];
if ($server == "emft.eclipse.org")
{
	// Test server
	$projectPath = "/modeling/emf/cdo/test";
}
else
{
	// Production server
	$projectPath = "/cdo";
}

$root = $docRoot . $projectPath;
$includes = $root . "/includes";

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

// $App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/common.css"/>' . $LF);
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/home/content/nova.css"/>' . $LF);
$App->AddExtraHtmlHeader('<!--[if IE 6]> <link rel="stylesheet" type="text/css" href="/home/content/ie6_nova.css" media="screen"/> <![endif]-->' . $LF);
// $App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
// addGoogleAnalyticsTrackingCodeToHeader();

?>

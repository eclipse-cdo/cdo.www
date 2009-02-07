<?php

require_once "$toolkitRoot/classes/autoload.php";

$LF = "\n";
$debug = isset($_GET["debug"]);
$serverName = $_SERVER["SERVER_NAME"];
$docRoot = $_SERVER["DOCUMENT_ROOT"];
$pagePath = $_SERVER["PHP_SELF"];
$currentDir = getcwd();

//if (!isset($areaRelative) || $areaRelative==".")
//{
//	$areaRelative = "";
//}
//
//if (!isset($projectRelative) || $projectRelative==".")
//{
//	$projectRelative = "";
//}

$pagePathSegments = explode("/", $pagePath);
array_shift($pagePathSegments);

$pageFile = array_pop($pagePathSegments);
$pageFolderPath = "/" . implode("/", $pagePathSegments);
$pageRoot = $docRoot . $pageFolderPath;
$pageLevel = count($pagePathSegments);

$areaLevel = $pageLevel + getLevel($areaRelative);
$areaPath = "/" . implode("/", array_slice($pagePathSegments, 0, $areaLevel));
$areaRoot = $docRoot . $areaPath;

$projectLevel = $areaLevel + getLevel($projectRelative);
$projectPath = "/" . implode("/", array_slice($pagePathSegments, 0, $projectLevel));
$projectRoot = $docRoot . $projectPath;

$pageLevel -= $projectLevel;
$areaLevel -= $projectLevel;
$projectLevel = 0;
unset($pagePathSegments);

if ($debug)
{?>
<div class="sideitem">
<h6>Server Info</h6>
<ul>
	<li>includePath = <?=get_include_path()?></li>
	<li>currentDir = <?=$currentDir?></li>
	<li>docRoot = <?=$docRoot?></li>
</ul>
</div>
<div class="sideitem">
<h6>Page Info</h6>
<ul>
	<li>pagePath = <?=$pagePath?></li>
	<li>pageFile = <?=$pageFile?></li>
	<li>pageFolderPath = <?=$pageFolderPath?></li>
	<li>pageRoot = <?=$pageRoot?></li>
	<li>pageLevel = <?=$pageLevel?></li>
</ul>
</div>
<div class="sideitem">
<h6>Area Info</h6>
<ul>
	<li>areaRelative = <?=$areaRelative?></li>
	<li>areaPath = <?=$areaPath?></li>
	<li>areaRoot = <?=$areaRoot?></li>
	<li>areaLevel = <?=$areaLevel?></li>
</ul>
</div>
<div class="sideitem">
<h6>Project Info</h6>
<ul>
	<li>projectRelative = <?=$projectRelative?></li>
	<li>projectPath = <?=$projectPath?></li>
	<li>projectRoot = <?=$projectRoot?></li>
	<li>projectLevel = <?=$projectLevel?></li>
</ul>
</div>
<?}

if (isset($_GET["skin"]) && preg_match("/^(Blue|EclipseStandard|Industrial|Lazarus|Miasma|Modern|OldStyle|Phoenix|PhoenixTest|PlainText|Nova)$/", $_GET["skin"], $regs))
{
	// Passed skin
	$theme = $regs[1];
}
else
{
	// Default skin
	$theme = "Nova";
}

function getLevel($relative)
{
	$level = 0;
	$segments = explode("/", $relative);
	foreach ($segments as $segment)
	{
		switch ($segment)
		{
			case NULL:
			case ' ':
			case '':
			case '.':
				break;

			case '..':
				--$level;
				break;

			default:
				++$level;
				break;
		}
	}

	return $level;
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
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $projectPath . '/_projectCommon/styles.css" media="screen"/>' . "\n\t");
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $areaPath . '/_styles.css" media="screen"/>' . "\n\t");
if ($pageFolderPath != $areaPath)
{
	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pageFolderPath . '/_styles.css" media="screen"/>' . "\n\t");
}

$App->Promotion = TRUE; # set true to enable current eclipse.org site-wide promo
//addGoogleAnalyticsTrackingCodeToHeader();

$Menu = new Menu();
$Nav = new Nav();

?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
if (true)
{
	class MyApp extends App
	{
		function getNavPath($_theme)
		{
			return $_SERVER["DOCUMENT_ROOT"] . "/cdo/includes/my_nav.php";
		}
	}

	$App = new MyApp();
}
else
{
	$App = new App();
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $Menu = new Menu();
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); $Nav = new Nav();
include($App->getProjectCommon());
include($root . "/nav_inc1.php");
include("nav_inc.php");
include($root . "/nav_inc2.php");

$pageTitle 		= "CDO Model Repository - Downloads";
$pageKeywords	= "eclipse cdo model repository modeling emf downloads";
$pageAuthor		= "Eike Stepper";

ob_start();
?>
<div id="midcolumn">
</div>

<?php

$html = ob_get_clean();
$html = mb_convert_encoding($html, "HTML-ENTITIES", "auto");

# Generate the web page
$App->Promotion = TRUE;
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="../group.css" media="screen" />');
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />');
$App->generatePage("Nova", $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>

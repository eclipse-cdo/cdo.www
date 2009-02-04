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
	$navIconURL = "huhu";
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
<div class="linkBlock">
<div class="link"><a
	href="http://www.eclipse.org/modeling/emf/downloads/index.php?project=cdo&showAll=0&showMax=5"><img
	src="http://dev.eclipse.org/huge_icons/actions/go-down.png"
	alt="Downloads" /></a> <a class="heading"
	href="http://www.eclipse.org/modeling/emf/downloads/index.php?project=cdo&showAll=0&showMax=5">Downloads</a>
<p class="subText">Looking for the latest build?<br />
Milestones, maintenance builds, and more...</p>
</div>
<div class="link"><a href="docs"><img
	src="http://dev.eclipse.org/huge_icons/mimetypes/x-office-book.png"
	alt="Documentation" /></a> <a class="heading" href="docs">Documentation</a>
<p class="subText">Browse through the product documentation, tutorials,
presentations and the JavaDocs...</p>
</div>
<div class="link"><a href="support"><img
	src="http://dev.eclipse.org/huge_icons/apps/help-browser.png"
	alt="Support" /></a> <a class="heading" href="support">Support</a>
<p class="subText">You have problems or questions not answered in the
documentation? Look here for help...</p>
</div>
<div class="link"><a href="http://wiki.eclipse.org/CDO"><img
	src="http://dev.eclipse.org/huge_icons/categories/applications-internet.png"
	alt="Wiki" /></a> <a class="heading" href="http://wiki.eclipse.org/CDO">Wiki</a>
<p class="subText">Visit the community pages for information about
various product and development topics...</p>
</div>
<div class="link"><a href="development"><img
	src="http://dev.eclipse.org/huge_icons/actions/edit-clear.png"
	alt="Development" /></a> <a class="heading" href="development">Development</a>
<p class="subText">Get the sources and find out more about the CDO
project and its development process...</p>
</div>
<div class="link"><a href="team/team.php"><img
	src="http://dev.eclipse.org/huge_icons/apps/system-users.png"
	alt="About Us" /></a> <a class="heading" href="team/team.php">About Us</a>
<p class="subText">Meet the team and gaze at their activity...</p>
</div>
</div>
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

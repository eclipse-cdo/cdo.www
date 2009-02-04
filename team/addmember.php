<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
if (true)
{
	class MyApp extends App
	{
		function getNavPath($_theme)
		{
			global $includes;
			return $includes . "/my_nav.php";
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
require_once($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");

include($App->getProjectCommon());
include($root . "/nav_inc1.php");
include("nav_inc.php");
include($root . "/nav_inc2.php");

$pageTitle 		= "CDO Model Repository - Add Team Member";
$pageKeywords	= "eclipse cdo model repository modeling emf team member";
$pageAuthor		= "Eike Stepper";

ob_start();
print '<div id="midcolumn">';
########################################################################

include($includes . "/forms.php");

$form = new Form();
$committerid = $form->addField(new Text("committerid", "Committer ID:"));
$name = $form->addField(new Text("name", "Name:"));
$email = $form->addField(new Text("email", "EMail:"));
$role = $form->addField(new Text("role", "Role:"));
$company = $form->addField(new Text("company", "Company:"));
$location = $form->addField(new Text("location", "Location:"));
$website = $form->addField(new Text("website", "Website:"));
$photoURL = $form->addField(new Text("photoURL", "Photo URL:"));

$form->addField(new Button("submit", "Submit"));
$form->render();
if ($form->isFinished())
{
	print "<p>";
	print "INSERT INTO developers (committerid, name, email, role, company, location, website, photoURL) VALUES (";
	print "'" . $committerid->getValue() . "', ";
	print "'" . $name->getValue() . "', ";
	print "'" . $email->getValue() . "', ";
	print "'" . $role->getValue() . "', ";
	print "'" . $company->getValue() . "', ";
	print "'" . $location->getValue() . "', ";
	print "'" . $website->getValue() . "', ";
	print "'" . $photoURL->getValue() . "')";
	print "</p>\n";
}

########################################################################
print '</div>';

$html = ob_get_clean();
$html = mb_convert_encoding($html, "HTML-ENTITIES", "auto");

# Generate the web page
$App->Promotion = TRUE;
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="../group.css" media="screen" />');
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="styles.css" media="screen" />');
$App->generatePage("Nova", $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>

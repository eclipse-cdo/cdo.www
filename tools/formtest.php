<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

$App = new App();
$Menu = new Menu();

include($App->getProjectCommon());
include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/buildServer-common.php");
include($_SERVER['DOCUMENT_ROOT'] . "/cdo/includes/forms.php");

ob_start();
print '<div id="midcolumn">';
########################################################################

$form = new Form();
$fname = $form->addField(new Text("fname", "First name:", "Eike"));
$lname = $form->addField(new Text("lname", "Last name:", "Stepper"));
$street = $form->addField(new Text("street", "Street:", "Here"));
$city = $form->addField(new Text("city", "City:", "Berlin"));
$form->addField(new Button("submit", "Submit"));
$form->render();
if ($form->isFinished())
{
	echo $fname->getValue() . " " . $lname->getValue() . ", " . $street->getValue() . ", " . $city->getValue();
}

########################################################################
print '</div>';
$html= ob_get_contents();
ob_end_clean();

$pageKeywords= "";
$pageAuthor= "Eike Stepper";
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, NULL, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

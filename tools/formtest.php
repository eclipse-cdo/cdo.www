<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

$App = new App();
$Nav = new Nav();
$Menu = new Menu();

include($App->getProjectCommon());
include($_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/db.php");
include($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/buildServer-common.php");
include($_SERVER['DOCUMENT_ROOT'] . "/cdo/includes/forms.php");

ob_start();
print '<div id="midcolumn">';
########################################################################

$form = new Form();
$form->addField(new Text("fname", "First name:", "Eike"));
$form->addField(new Text("lname", "Last name:", "Stepper"));
$form->addField(new Text("street", "Street:", "Here"));
$form->addField(new Text("city", "City:", "Berlin"));
$form->addField(new Button("submit", "Submit"));
$form->render();

########################################################################
print '</div>';
$html= ob_get_contents();
ob_end_clean();

$pageKeywords= "";
$pageAuthor= "Eike Stepper";
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

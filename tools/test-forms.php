<?php include "_defs.php";  include "_header.php";
########################################################################

//$pageTitle 		= "Downloads";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

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

print '</div>';

########################################################################
include "_footer.php"; ?>

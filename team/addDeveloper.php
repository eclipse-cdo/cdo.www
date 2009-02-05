<?php include "_defs.php";  include "_header.php";
########################################################################

//require_once "$docRoot/modeling/includes/db.php";
require_once "$toolkitRoot/includes/forms.php";

$pageTitle 		= "Add New Developer";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
print "<h1>$pageTitle</h1>";

$form = new Form();
$committerid = $form->addField(new Text("committerid", "Committer ID:"))->setSize(16);
$role = $form->addField(new Text("role", "Role:"))->setSize(100);
$name = $form->addField(new Text("name", "Name:"))->setSize(35);
$email = $form->addField(new Text("email", "EMail:"))->setSize(35);
$company = $form->addField(new Text("company", "Company:"))->setSize(35);
$location = $form->addField(new Text("location", "Location:"))->setSize(35);
$website = $form->addField(new Text("website", "Website:"))->setSize(50);
$photoURL = $form->addField(new Text("photoURL", "Photo URL:"))->setSize(50);
$form->addField(new Button("submit", "Submit"));

$form->render();
if ($form->isFinished())
{
	print "<p><br/</p>\n";
	print "<table border=\"1\"><tr><td><b><tt>";
	print "INSERT INTO developers (committerid, name, email, role, company, location, website, photoURL) VALUES (";
	print "'" . $committerid->getValue() . "', ";
	print "'" . $name->getValue() . "', ";
	print "'" . $email->getValue() . "', ";
	print "'" . $role->getValue() . "', ";
	print "'" . $company->getValue() . "', ";
	print "'" . $location->getValue() . "', ";
	print "'" . $website->getValue() . "', ";
	print "'" . $photoURL->getValue() . "');";
	print "</tt></b></td></tr></table>\n";
}

print '</div>';

########################################################################
include "_footer.php"; ?>

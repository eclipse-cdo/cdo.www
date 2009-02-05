<?php include "_defs.php";  include "_header.php";
########################################################################

require_once "$toolkitRoot/includes/forms.php";

$pageTitle 		= "Add New Developer";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
print "<h1>$pageTitle</h1>";

$form = new Form();
$form->addField(new Text("committerid"))->setMaxLen(16);
$form->addField(new Text("role"))->setMaxLen(70);
$form->addField(new Text("name"))->setMaxLen(70);
$form->addField(new Text("email"))->setMaxLen(70);
$form->addField(new Text("company"))->setMaxLen(255);
$form->addField(new Text("location"))->setMaxLen(255);
$form->addField(new Text("website"))->setMaxLen(255);
$form->addField(new Text("photoURL"))->setMaxLen(255);

$form->addField(new Button("submit", "Generate"));
$form->render();
if ($form->isFinished())
{
	print "<p><br/</p>\n";
	print "<table border=\"1\"><tr><td><b><tt>\n";
	print "INSERT INTO developers (" . implode(", ", $form->getNames()) . ") VALUES ('" . implode("', '", $form->getValues()) . "');\n" ;
	print "</tt></b></td></tr></table>\n";
}

include "sqlForms.php";
print '</div>';

########################################################################
include "_footer.php"; ?>

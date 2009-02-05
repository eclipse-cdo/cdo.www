<?php include "_defs.php";  include "_header.php";
########################################################################

require_once "$toolkitRoot/includes/forms.php";

$pageTitle 		= "Add New Developer";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
print "<h1>$pageTitle</h1>";

$form = new Form();
$form->addField(new Text("committerid"))->setSize(16);
$form->addField(new Text("role"))->setSize(100);
$form->addField(new Text("name"))->setSize(35);
$form->addField(new Text("email"))->setSize(35);
$form->addField(new Text("company"))->setSize(35);
$form->addField(new Text("location"))->setSize(35);
$form->addField(new Text("website"))->setSize(50);
$form->addField(new Text("photoURL"))->setSize(50);
$form->addField(new Button("submit", "Generate"));

$form->render();
if ($form->isFinished())
{
	print "<p><br/</p>\n";
	print "<table border=\"1\"><tr><td><b><tt>\n";
	print "INSERT INTO developers (" . implode(", ", $form->getNames()) . ") VALUES ('" . implode("', '", $form->getValues()) . "');\n" ;
	print "</tt></b></td></tr></table>\n";
}

print '</div>';

########################################################################
include "_footer.php"; ?>

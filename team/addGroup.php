<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php"; 
########################################################################

require_once "$toolkitRoot/includes/forms.php";

$pageTitle 		= "Add New Group";
$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
print "<h1>$pageTitle</h1>";

$form = new Form();
$form->addField(new Text("groupname"))->setMaxLen(30);
$form->addField(new Text("path"))->setMaxLen(255);

$form->addField(new Button("submit", "Generate"));
$form->render();
if ($form->isFinished())
{
	print "<p><br/</p>\n";
	print "<table border=\"1\"><tr><td><b><tt>\n";
	print "INSERT INTO groups (project, component, " . implode(", ", $form->getNames()) .
				") VALUES ('" . $mysqlProject . "', '" . $mysqlComponent . "', '" . implode("', '", $form->getValues()) . "');\n" ;
	print "</tt></b></td></tr></table>\n";
}

include "sqlForms.php";
print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

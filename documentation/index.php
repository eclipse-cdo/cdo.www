<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

print '<h2>'.$areaTitle.'</h2>';

print 'This section contains the documentaion for the CDO project.';

/*############################# Manuals ###########################################*/
$entries=array(
array("name" => "Manual 1.0", "url" => "$areaPath/manual_10.php"),
array("name" => "Manual 2.0", "url" => "$areaPath/manual_20.php")
);

printDocumentationEntries("Manuals",  $entries);

/*############################# Release Notes ###########################################*/
$entries=array(
array("name" => "Release Notes 3.0", "url" => "$areaPath/#relnotes")
);

printDocumentationEntries("Manuals",  $entries);

/*############################# Presentations ###########################################*/
$entries=array(
array("name" => "Presentations", "url" => "$areaPath/presentations")
);

printDocumentationEntries("Wikis",  $entries);

/*############################# Wikis ###########################################*/
$entries=array(
array("name" => "CDO Wiki", "url" => "http://wiki.eclipse.org/CDO"),
array("name" => "Net4J Wiki", "url" => "http://wiki.eclipse.org/Net4j"),
array("name" => "Dawn Wiki", "url" => "http://wiki.eclipse.org/Dawn")
);

printDocumentationEntries("Wikis",  $entries);


//include "$projectRoot/tools/placeholder.html";
print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

<?php

function printDocumentationEntries($groupName,  $entries)
{
	print "<p><b>".$groupName."</b></p>";

	print "<ul>";
	for($i=0; $i<count($entries); $i++)
	{
		print "<li><a href='".$entries[$i]['url']."'>".$entries[$i]['name']."</a></li>";
	}

	print "</ul>";
}
?>

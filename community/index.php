<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

print '<h2>'.$areaTitle.'</h2>';

print '<p>You are encouraged to participate in the development of CDO. You might want to help us fixing bug, develop new features or extend our documentation. In any case it is best to visit our wiki pages which provide information about how to join our community.</p>';

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
	print "<h4>".$groupName."<h4>";

	print "<ul>";
	for($i=0; $i<count($entries); $i++)
	{
		print "<li><a href='".$entries[$i]['url']."'>".$entries[$i]['name']."</a></li>";
	}

	print "</ul>";
}
?>
<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';


$entries=array(
array(
		"name" => "Newsgroup/Community Forum", 
		"url" => "http://www.eclipse.org/forums/index.php?t=thread&frm_id=108", 
		 "description" => "If you have questions about CDO it is best you ask in the forum. Please describe your problem as detailed as possible. Provide any useful information that helps us to solve your concern as fast as possible (e.g. console outputs, stacktrace etc.). To make it easeier for use to filter out any CDO related request, please prefix your port with <i>[CDO]</i>."),
array(
		"name" => "Bugzilla", 
		"url" => "https://bugs.eclipse.org/bugs/enter_bug.cgi?product=EMF",  
		"description" => "For any bug report or enhancement request please write a bugzilla against CDO. As componente select one of the sub components of cdo (e.g. cdo.core) and describe your problem as detailed as possible. Do not forget to set version where the bug appeared."),
array(
		"name" => "Mailing List", 
		"url" => "https://dev.eclipse.org/mailman/listinfo/emf-dev",  
		"description" => "You can subscribe to the emf-dev mailing list for information about CDO. But please use the community forum/newsgroup for questions. The mailing list is mostly used for internal communication of the EMF project.")
);

 printSuppportEntries("Support",  $entries);
//include "$projectRoot/tools/placeholder.html";
print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>


<?php

function printSuppportEntries($groupName,  $entries)
{
	print "<h2>".$groupName."</h2>";

	print "<ul>";
	for($i=0; $i<count($entries); $i++)
	{
		print "<p><b>".$entries[$i]['name']."</b></p>";
		print "<p>".$entries[$i]['description']."</p>";
		print "<a href='".$entries[$i]['url']."'>go to</a><br>";
	}

	print "</ul>";
}
?>
?>

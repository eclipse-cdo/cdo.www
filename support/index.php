<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';


$entries=array(
array(
		"name" => "EMF Newsgroup/Community Forum",
		"url" => "http://www.eclipse.org/forums/index.php?t=thread&frm_id=108",
		 "description" => "If you have questions about CDO please ask them in the forum.<p>Please indicate what version of CDO you're using.<p>Provide us with any information that may help us to help you as fast as possible (e.g. console outputs, stacktraces etc.).<p>Please always prefix your posts with <b>[CDO]</b>!"),
array(
		"name" => "Bugzilla",
		"url" => "https://bugs.eclipse.org/bugs/enter_bug.cgi?product=EMF",
		"description" => "If you encounter trouble with CDO or would like to request an enhancement please write a bugzilla against Modeling/EMF and select one of the sub components of CDO (e.g. cdo.core, cdo.dawn, etc.) and describe your problem as detailed as possible. Do not forget to tell us the CDO version you're using.")
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

	for($i=0; $i<count($entries); $i++)
	{
		print "<h4>".$entries[$i]['name']."</h4>";
		print "<p>".$entries[$i]['description']."<p><a href='".$entries[$i]['url']."'>Go to</a>...</p>";
	}
}
?>
?>

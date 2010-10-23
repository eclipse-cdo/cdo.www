<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';


$entries=array(
array(
		"name" => "Community Forum",
		"url" => "http://www.eclipse.org/forums/index.php?t=thread&frm_id=108",
		 "description" => "If you have questions about CDO please ask them in the forum. Please always prefix your posts with <b>[CDO]</b> and indicate what version of CDO you're using. Provide us with any information that may help us to help you as fast as possible (e.g. console outputs, stacktraces etc.)."),
array(
		"name" => "Issue Management",
		"url" => "https://bugs.eclipse.org/bugs/enter_bug.cgi?product=EMF",
		"description" => "If you encounter trouble with CDO or would like to request an enhancement please write a bugzilla against Modeling/EMF and select one of the sub components of CDO (e.g. cdo.core, cdo.dawn, etc.). Describe your problem as detailed as possible and don't forget to tell us the CDO version you're using."),
array(
		"name" => "Commercial Support",
		"url" => "mailto:stepper@esc-net.de?subject=Please help us to make the best use of CDO in our application",
		"description" => "The CDO team is happy to provide you with prompt and free support in the public forum. If, for some reason, you feel uncomfortable with that, would like more private attention or require specific consulting services around CDO and its best usage in your application there will certainly be an opportunity for professional and dedicated collaboration. Please just drop us a note and we will find the best expert for your specific needs.")
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
		print "<p>".$entries[$i]['description']." <a href='".$entries[$i]['url']."'>Go to</a>...</p>";
	}
}
?>
?>

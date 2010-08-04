<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php"; 
########################################################################

require_once "$docRoot/modeling/includes/db.php";

$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';


<form action="query.php" method="POST">
  <p>Welche HTML-Elemente fallen Ihnen ein, und was bewirken sie:<br>
    <textarea name="user_eingabe" cols="100" rows="20"></textarea>
  </p>
  <input type="submit" value="send">
</form>


/*
$query=$_POST["query"];

echo $query;

if($query!="")
{

$result = wmysql_query($query);
	$rows = mysql_num_rows($result);
		

		while ($row = mysql_fetch_row($result))
		{
		  for($i=0; $i<count($row); $i++)
		  {
		   echo $row[$i]+" ";
		  }
		  echo "<br>";
		}
}

*/
print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

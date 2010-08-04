<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php"; 
########################################################################

require_once "$docRoot/modeling/includes/db.php";

$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
$query=$_POST["query"];

?>
<form action="query.php" method="POST">
  <p><br>
    <textarea name="query" cols="100" rows="10"><?$query?></textarea>
  </p>
  <input type="submit" value="send">
</form>
<?




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


print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

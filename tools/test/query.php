<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php"; 
########################################################################

require_once "$docRoot/modeling/includes/db.php";

$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';
$query=stripslashes($_POST["query"]);

?>

<b>Insert query:</b>
<form action="query.php" method="POST">
  <p><br>
    <textarea name="query" cols="100" rows="10"><?echo $query;?></textarea>
  </p>
  <input type="submit" value="send">
</form>
<?




echo "Query: <b>".$query."</b><br/><br/>";

//$query="";

if($query!="")
{

$result = wmysql_query($query);
$num_fields = mysql_num_fields($result);
$rows = mysql_num_rows($result);
		
echo "<table>";
		while ($row = mysql_fetch_row($result))
		{
		 echo "<tr>";
		  for($i=0; $i<$num_fields; $i++)
		  {
		   echo "<td>";
		   echo $row[$i]." ";
		   echo "</td>";
		  }
		  echo "</tr>";
		}
		
echo "</table>";
}


print '</div>';

########################################################################
include "$areaRoot/_footer.php"; ?>

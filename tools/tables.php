<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

require_once "$docRoot/modeling/includes/db.php";

//$pageTitle 		= "Downloads";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">';

if (isset($_GET["table"]))
{
	$defrecords = 100;
	$pageTitle = $_GET["table"];
	print '<h1>' . $_GET["table"] . '</h1>' . "\n";

	$result = query("SELECT * FROM " . $_GET["table"] . ";");
	if ($result && mysql_num_rows($result) > 0)
	{
		$page = getParameter("page", 0);
		$records = getParameter("records", $defrecords);

		print '<table border="1"><tr>' ."\n";
		print "<th>&nbsp;</th>\n";
		for ($index = 0; $index < mysql_num_fields($result); $index++) {
			print "<th>" . mysql_field_name($result, $index) . "</th>\n";
		}

		print "</tr>\n";
		$i = 0;
		$offset = $page * $records;
		mysql_data_seek($result, $offset);
		while ($i++ < $records && $row = mysql_fetch_row($result))
		{
			print "<tr>\n";
			print "<td>" . $offset++ . "</td>\n";
			for ($index = 0; $index < mysql_num_fields($result); $index++) {
				print "<td>" . $row[$index] . "</td>\n";
			}

			print "</tr>\n";
		}

		if ($offset < mysql_num_rows($result) - 1)
		{
			print '<tr><td colspan="' . (1 + mysql_num_fields($result)) . '" align="center"><a href="' .
			$_SERVER["PHP_SELF"] . '?table=' . $table . '&page=' . ($page + 1) . ($records == $defrecords ? '' : '$records=' . $records);
		}

		print "</table><br/>\n";
	}
}
else
{
	$pageTitle = "MYSQL Tables";
	$tables = query("SHOW TABLES;");
	if ($tables && mysql_num_rows($tables) > 0)
	{
		while ($table = mysql_fetch_row($tables))
		{
			$result = query("SELECT COUNT(*) FROM " . $table[0] . ";");
			$row = mysql_fetch_row($result);
			$count = $row[0];

			print '<h1><a href="' . $_SERVER["PHP_SELF"] . '?table=' . $table[0] . '">' . $table[0] . '</a> (' . $count . ')</h1>' . "\n";
			$fields = query("DESCRIBE " . $table[0] . ";");
			if ($fields && mysql_num_rows($fields) > 0)
			{
				print '<table border="1"><tr>' ."\n";
				for ($index = 0; $index < mysql_num_fields($fields); $index++) {
					print "<th" . ($index==1 ? ' width="200">' : ">") . mysql_field_name($fields, $index) . "</th>\n";
				}

				print "</tr>\n";
				while ($field = mysql_fetch_row($fields))
				{
					print "<tr>\n";
					for ($index = 0; $index < mysql_num_fields($fields); $index++) {
						print "<td>" . $field[$index] . "</td>\n";
					}

					print "</tr>\n";
				}

				print "</table><br>\n";
			}
		}
	}
}

print '</div>';

function getParameter($name, $defvalue)
{
	if (isset($_GET[$name])) return $_GET[$name];
	return $defvalue;
}

function query($sql)
{
	global $App;
	$dbname = getParameter("dbname", "modeling");
	switch ($dbname)
	{
		case "modeling":
			return wmysql_query($sql);

		case "bugzilla":
			return $App->bugzilla_sql($sql);

		default:
			return $App->sql($sql, $dbname);
	}
}

########################################################################
include "$areaRoot/_footer.php"; ?>

<?php $toolkitRoot = $_SERVER["DOCUMENT_ROOT"] . "/cdo/_toolkit"; require_once "$toolkitRoot/includes/defs.php";
########################################################################

# Display name of this project
$projectTitle = "CDO Model Repository";

# Keywords of this project
$projectKeywords	= "Eclipse Modeling Framework EMF";

# Project enums in the mysql database
$mysqlProject = "org.eclipse.emf";
$mysqlComponent = "org.eclipse.emf.cdo";

$devEclipseURL = "http://dev.eclipse.org";
$viewcvsPath = "/viewcvs/index.cgi";
$viewcvsURL = $devEclipseURL . $viewcvsPath;
$viewcvsRoot = "Modeling_Project";

# Used by various modeling includes
$PR = "modeling/emf/cdo";
require_once "$docRoot/modeling/includes/scripts.php";

########################################################################
?>

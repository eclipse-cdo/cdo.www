<?php $areaRelative = "."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/modeling/includes/common.css"/>' . "\n\t");

//$pageTitle 		= "";
//$pageKeywords	= "";
$pageAuthor		= "Martin Fluegge";

print '<div id="midcolumn">';

?>
<p>The CDO (Connected Data Objects) Model Repository is a distributed
shared model framework for EMF models and meta models. CDO is also a
model runtime environment with a focus on orthogonal aspects like model
scalability, transactionality, persistence, distribution, queries and
more.</p>

<p>CDO has a 3-tier architecture supporting EMF-based client
applications, featuring a central model repository server and leveraging
different types of pluggable data storage back-ends like relational
databases, object databases and file systems. The default client/server
communication protocol is implemented with the Net4j Signalling
Platform.</p>

<?php
print '</div>';


########################################################################
include "$areaRoot/_footer.php"; ?>

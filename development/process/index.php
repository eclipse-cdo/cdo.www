<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

require_once "process.php";

$pageTitle 		= "Bugzilla Process";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pageFolderPath . '/styles.css" media="screen"/>' . "\n\t");

print '<div id="midcolumn">' . "\n";
print '<h1 id="pagetitle">' . $pageTitle . '</h1>' . "\n";
print "<p>(Work in progress)</p>\n";

$process = new Process("CDO-Process");

$stateStart = $process->addState("start", "263,13,13", "circle");
$stateNew   =	$process->addState("new", "195,60,331,115");
$stateFeedbackN =	$process->addState("feedback-n", "1,60,136,114");
$stateDuplicate =	$process->addState("duplicate", "435,60,571,115");
$stateWorks =	$process->addState("works", "435,143,572,197");
$stateNotEclipse =	$process->addState("noteclipse", "435,225,571,279");
$stateTriaged =	$process->addState("triaged", "196,143,331,197");
$stateFeedbackT =	$process->addState("feedback-t", "1,143,136,197");
$stateDevelop =	$process->addState("develop", "195,225,331,279");
$stateFeedbackD =	$process->addState("feedback-d", "0,225,137,279");
$stateReview =	$process->addState("review", "195,308,331,361");
$stateFeedbackR =	$process->addState("feedback-r", "0,308,136,362");
$stateReviewed =	$process->addState("reviewed", "196,391,331,444");
$stateFixed =	$process->addState("fixed", "435,391,572,445");
$stateReleased =	$process->addState("released", "435,488,571,543");
$stateClosed =	$process->addState("closed", "645,488,782,542");

$stateStart->addTransition("Submit new bugzilla", $stateNew)
->addAction("Quick&nbsp;Links", "<a href=\"https://bugs.eclipse.org/bugs/enter_bug.cgi?product=EMF&component=CDO&version=2.0&bug_severity=normal&short_desc=[XYZ]+NullPointerException+in+CDOObjectImpl.cdoState()&comment=Build-ID:\" target=\"Bugzilla\">Report a problem</a>,<br><a href=\"https://bugs.eclipse.org/bugs/enter_bug.cgi?product=EMF&component=CDO&version=3.0&bug_severity=enhancement&short_desc=[XYZ]+Provide+particular+functionality\" target=\"Bugzilla\">Request a new feature</a>")
->addAction("Product", "<b>EMF</b>")
->addAction("Component", "<b>CDO</b>")
->addAction("Version", "<b>3.0</b> for features or bugs in HEAD,<br><b>2.x</b> for bugs in maintenance.")
->addAction("Summary", "Short description of the bugzilla.")
->addAction("Description", "Exhaustive description of the observed misbehaviour (for bugs) or the desired functionality (for features).");

$stateNew->addTransition("Get feedback from reporter", $stateFeedbackN)
->addAction("Keywords", "<b>needinfo+</b>");

$stateNew->addTransition("Confirm", $stateTriaged)
->addAction("QA&nbsp;Contact", "User ID of the reviewer.")
->addAction("Version", "One of <b>2.x</b> or <b>3.0</b> to indicate where the changes are supposed to be applied.");

$stateNew->addTransition("Resolve as DUPLICATE", $stateDuplicate)
->addAction("Status", "<b>RESOLVED</b>")
->addAction("Resolution", "<b>DUPLICATE</b>")
->addAction("Bug&nbsp;ID", "ID of the existing bugzilla.");

$stateNew->addTransition("Resolve as WORKS", $stateWorks)
->addAction("Status", "<b>RESOLVED</b>")
->addAction("Resolution", "<b>WORKSFORME</b>");

$stateNew->addTransition("Resolve as NOTECLIPSE", $stateNotEclipse)
->addAction("Status", "<b>RESOLVED</b>")
->addAction("Resolution", "<b>NOT_ECLIPSE</b>");

$stateFeedbackN->addTransition("Return to team", $stateNew)
->addAction("Keywords", "<b>needinfo-</b>");

$stateDuplicate->addTransition("Close", $stateClosed)
->addAction("Status", "<b>CLOSED</b>");

$stateWorks->addTransition("Close", $stateClosed)
->addAction("Status", "<b>CLOSED</b>");

$stateNotEclipse->addTransition("Close", $stateClosed)
->addAction("Status", "<b>CLOSED</b>");

$stateTriaged->addTransition("Get feedback from reporter", $stateFeedbackT)
->addAction("Keywords", "<b>needinfo+</b>");

$stateTriaged->addTransition("Start development", $stateDevelop)
->addAction("Status", "<b>ASSIGNED</b>");

$stateFeedbackT->addTransition("Return to team", $stateTriaged)
->addAction("Keywords", "<b>needinfo-</b>");

$stateDevelop->addTransition("Get feedback from reporter", $stateFeedbackD)
->addAction("Keywords", "<b>needinfo+</b>");

$stateDevelop->addTransition("Stop development", $stateTriaged)
->addAction("Status", "<b>NEW</b>");

$stateDevelop->addTransition("Request review", $stateReview)
->addAction("Flags", "<b>review?</b>")
->addAction("Reviewer", "The value of the QA Contact.");

$stateFeedbackD->addTransition("Return to team", $stateDevelop)
->addAction("Keywords", "<b>needinfo-</b>");

$stateReview->addTransition("Get feedback from reporter", $stateFeedbackR)
->addAction("Keywords", "<b>needinfo+</b>");

$stateReview->addTransition("Reject changes", $stateDevelop)
->addAction("Flags", "<b>review-</b>");

$stateReview->addTransition("Approve changes", $stateReviewed)
->addAction("Flags", "<b>review+</b>");

$stateFeedbackR->addTransition("Return to team", $stateReview)
->addAction("Keywords", "<b>needinfo-</b>");

$stateReviewed->addTransition("Resolve as FIXED", $stateFixed)
->addAction("Status", "<b>RESOLVED</b>")
->addAction("Resolution", "<b>FIXED</b>")
->addAction("Target&nbsp;Milestone", "M1..M7 or RC1..RC5 (for 3.0),<br>SR1..SR2 (for 2.x)")
->addAction("Comment", "&quot;Committed to [branch name]&quot;");

$stateFixed->addTransition("Release", $stateReleased)
->addAction("Status", "<b>VERIFIED</b>")
->addAction("Comment", "&quot;Fix available in [build-ID]&quot;");

$stateReleased->addTransition("Close", $stateClosed)
->addAction("Status", "<b>CLOSED</b>");

$process->render();


########################################################################
include "$areaRoot/_footer.php"; ?>

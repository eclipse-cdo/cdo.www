<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Bugzilla Process";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pageFolderPath . '/styles.css" media="screen"/>' . "\n\t");

print '<div id="midcolumn">' . "\n";
print '<p><a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=EMF&component=CDO&version=3.0&bug_severity=enhancement" target="Bugzilla">Request new feature</a></p>' . "\n";
print '<h1 id="pagetitle">' . $pageTitle . '</h1>' . "\n";
print "<p>(Work in progress)</p>\n";

require_once 'process.php';
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
->addAction("Product", "EMF")
->addAction("Component", "CDO")
->addAction("Summary", "Short description of the bugzilla.")
->addAction("Description", "Exhaustive description of the observed misbehaviour (for bugs) or the desired functionality (for features).");

$stateNew->addTransition("Get feedback from reporter", $stateFeedbackN)
->addAction("Keywords", "needinfo+");

$stateNew->addTransition("Confirm", $stateTriaged)
->addAction("Status", "ASSIGNED");

$stateNew->addTransition("Resolve as DUPLICATE", $stateDuplicate)
->addAction("Status", "RESOLVED")
->addAction("Resolution", "DUPLICATE")
->addAction("Bug ID", "ID of the existing bugzilla.");

$stateNew->addTransition("Resolve as WORKS", $stateWorks)
->addAction("Status", "RESOLVED")
->addAction("Resolution", "WORKSFORME");

$stateNew->addTransition("Resolve as NOTECLIPSE", $stateNotEclipse)
->addAction("Status", "RESOLVED")
->addAction("Resolution", "NOT_ECLIPSE");

$stateFeedbackN->addTransition("Return to team", $stateNew)
->addAction("Keywords", "needinfo-");

$stateDuplicate->addTransition("Close", $stateClosed)
->addAction("Status", "CLOSED");

$stateWorks->addTransition("Close", $stateClosed);
$stateNotEclipse->addTransition("Close", $stateClosed);
$stateTriaged->addTransition("Get feedback from reporter", $stateFeedbackT);
$stateTriaged->addTransition("Start development", $stateDevelop);
$stateFeedbackT->addTransition("Return to team", $stateTriaged);
$stateDevelop->addTransition("Get feedback from reporter", $stateFeedbackD);
$stateDevelop->addTransition("Stop development", $stateTriaged);
$stateDevelop->addTransition("Request review", $stateReview);
$stateFeedbackD->addTransition("Return to team", $stateDevelop);
$stateReview->addTransition("Get feedback from reporter", $stateFeedbackR);
$stateReview->addTransition("Reject changes", $stateDevelop);
$stateReview->addTransition("Approve changes", $stateReviewed);
$stateFeedbackR->addTransition("Return to team", $stateReview);
$stateReviewed->addTransition("Resolve as FIXED", $stateFixed);
$stateFixed->addTransition("Release", $stateReleased);
$stateReleased->addTransition("Close", $stateClosed);

$process->render();


########################################################################
include "$areaRoot/_footer.php"; ?>

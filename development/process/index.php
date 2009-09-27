<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Bugzilla Process";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

print '<div id="midcolumn">' . "\n";
print '<h1 id="pagetitle">' . $pageTitle . '</h1>' . "\n";

$fieldState = "State";
$fieldFeedback = "Feedback";
$fieldResolution = "Resolution";

$stateStart = new State("start");
$stateNew   =	new State("new");
$stateFeedbackN =	new State("feedback-n");
$stateDuplicate =	new State("duplicate");
$stateWorks =	new State("works");
$stateNotEclipse =	new State("noteclipse");
$stateTriaged =	new State("triaged");
$stateFeedbackT =	new State("feedback-t");
$stateDevelop =	new State("develop");
$stateFeedbackD =	new State("feedback-d");
$stateReview =	new State("review");
$stateFeedbackR =	new State("feedback-r");
$stateReviewed =	new State("reviewed");
$stateFixed =	new State("fixed");
$stateReleased =	new State("released");
$stateClosed =	new State("closed");

$stateStart->addTransition("Submit new bugzilla", $stateNew);
$stateNew->addTransition("Get feedback from reporter", $stateFeedbackN);
$stateNew->addTransition("Confirm", $stateTriaged);
$stateNew->addTransition("Resolve as DUPLICATE", $stateDuplicate);
$stateNew->addTransition("Resolve as WORKS", $stateWorks);
$stateNew->addTransition("Resolve as NOTECLIPSE", $stateNotEclipse);
$stateFeedbackN->addTransition("Return to team", $stateNew);
$stateDuplicate->addTransition("Close", $stateClosed);
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


$states = array(
$stateStart,
$stateNew,
$stateFeedbackN,
$stateDuplicate,
$stateWorks,
$stateNotEclipse,
$stateTriaged,
$stateFeedbackT,
$stateDevelop,
$stateFeedbackD,
$stateReview,
$stateFeedbackR,
$stateReviewed,
$stateFixed,
$stateReleased,
$stateClosed,
);

print '<p><img src="CDO-Process.png" usemap="#CDOProcess"></p>' . "\n";
include "$pageRoot/CDO-Process.imagemap";
print "<table>\n";
foreach ($states as $state)
{
	$state->render();
}
print "</table>\n";

class State
{
	public $name;
	public $transitions = array();

	function __construct($name)
	{
		$this->name = $name;
	}

	function addTransition($name, $result)
	{
		$this->transitions[count($this->transitions)] = new Transition($name, $result);
	}

	function render()
	{
		print '<tr>' . "\n";
		print '  <td colspan="3"><hr></td>' . "\n";
		print '</tr>' . "\n";
		print '<tr>' . "\n";
		print '  <td colspan="3"><br><br><br><br><br><a name="' . $this->name . '"/><img src="images/' . $this->name . '.png"/></td>' . "\n";
		print '</tr>' . "\n";
		foreach ($this->transitions as $transition)
		{
			$transition->render();
		}
	}
}

class Transition
{
	public $name;
	public $result;

	function __construct($name, $result)
	{
		$this->name = $name;
		$this->result = $result;
	}

	function render()
	{
		print '<tr>' . "\n";
		print '  <td width="70"/>' . "\n";
		print '  <td><a href="#' . $this->result->name . '"><img src="images/transition.png"/><img src="images/' . $this->result->name . '.png"/></a></td>' . "\n";
		print '  <td><b>' . $this->name . '</b></td>' . "\n";
		print '<tr>' . "\n";
	}
}


########################################################################
include "$areaRoot/_footer.php"; ?>

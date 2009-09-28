<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Bugzilla Process";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pageFolderPath . '/styles.css" media="screen"/>' . "\n\t");

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
print "<br><br><br><h1 id=\"pagetitle\">States and Transitions</h1>\n";

foreach ($states as $state)
{
	$state->render();
}


class State
{
	public $name;
	public $description;
	public $transitions = array();

	function __construct($name, $description="")
	{
		$this->name = $name;
		$this->description = $description;
	}

	function addTransition($name, $result)
	{
		$this->transitions[count($this->transitions)] = new Transition($name, $result);
	}

	function render()
	{
		print '<div class="box">' . "\n";
		print '  <div class="state">' . "\n";
		print '    <div class="statename"><a name="' . $this->name . '"/><img src="images/' . $this->name . '.png"/></div>' . "\n";
		print '    <div class="statedesc">Bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla.</div>' . "\n";
		print '  </div>' . "\n";

		foreach ($this->transitions as $transition)
		{
			$transition->render($this);
		}

		print '</div>' . "\n";
	}
}

class Transition
{
	public $name;
	public $result;
	public $description;

	function __construct($name, $result, $description="")
	{
		$this->name = $name;
		$this->result = $result;
		$this->description = $description;
	}

	function render($current)
	{
		print '  <div class="trans">' . "\n";
		print '    <div class="transpic">' . "\n";
		print '      <a href="#' . $current->name . '"><img src="images/' . $current->name . '.png"/></a>';
		print ($current->name == "start") ? '<img src="images/line.png"/>' : "";
		print '<img src="images/transition.png"/>';
		print '<a href="#' . $this->result->name . '"><img src="images/' . $this->result->name . '.png"/></a>' . "\n";
		print '    </div>' . "\n";
		print '    <div class="transname">' . $this->name . '</div>' . "\n";
		print '    <div class="transdesc">' . $this->description . '</div>' . "\n";
		print '  </div>' . "\n";
	}
}


########################################################################
include "$areaRoot/_footer.php"; ?>

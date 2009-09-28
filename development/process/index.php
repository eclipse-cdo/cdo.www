<?php $areaRelative = ".."; require_once "$areaRelative/_defs.php";  include "$areaRoot/_header.php";
########################################################################

$pageTitle 		= "Bugzilla Process";
//$pageKeywords	= "";
$pageAuthor		= "Eike Stepper";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pageFolderPath . '/styles.css" media="screen"/>' . "\n\t");

print '<div id="midcolumn">' . "\n";
print '<h1 id="pagetitle">' . $pageTitle . '</h1>' . "\n";

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

$t1 = $stateStart->addTransition("Submit new bugzilla", $stateNew);
$t1->addAction("<b>Product</b> = EMF");
$t1->addAction("<b>Component</b> = CDO");
$t1->addAction("<b>Description</b> = ");

$t2 = $stateNew->addTransition("Get feedback from reporter", $stateFeedbackN);
$t2->addAction("<b>Product</b> = EMF");
$t2->addAction("<b>Component</b> = CDO");
$t2->addAction("<b>Description</b> = ");

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

$process->render();


class Process
{
	public $name;
	public $description;
	public $states = array();

	function __construct($name, $description="")
	{
		$this->name = $name;
		$this->description = $description;
	}

	function  addState($name, $coords=NULL, $shape="rect")
	{
		return $this->states[count($this->states)] = new State($name, $coords, $shape);
	}

	function render()
	{
		print '<p><img src="' . $this->name . '.png" usemap="#' . $this->name . '"></p>' . "\n";
		print '<map name="' . $this->name . '">' . "\n";
		foreach ($this->states as $state)
		{
			print '  <area shape="' . $state->shape . '" coords="' . $state->coords . '" href="#' . $state->name . '"  />' . "\n";
		}

		print '</map>' . "\n";
		print "<br><br><br>\n";
		foreach ($this->states as $state)
		{
			$state->render();
		}
	}
}

class State
{
	public $name;
	public $shape;
	public $coords;
	public $description;
	public $transitions = array();

	function __construct($name, $coords=NULL, $shape="rect")
	{
		$this->name = $name;
		$this->coords = $coords;
		$this->shape = $shape;
	}

	function addTransition($name, $result)
	{
		return $this->transitions[count($this->transitions)] = new Transition($name, $result);
	}

	function render()
	{
		//		print '<div><a name="' . $this->name . '"/></div>' . "\n";
		print '<div class="box" id="' . $this->name . '">' . "\n";
		print '  <table class="state"><tr>' . "\n";
		print '    <td class="statename" valign="top" width="190"><img src="images/' . $this->name . '.png"/></td>' . "\n";
		print '    <td class="statedesc" valign="top">' . $this->description . '</td>' . "\n";
		print '  </tr></table>' . "\n";
		print '  <div class="transitions">' . "\n";

		foreach ($this->transitions as $transition)
		{
			$transition->render($this);
		}

		print '  </div>' . "\n";
		print '</div>' . "\n";
	}
}

class Transition
{
	public $name;
	public $result;
	public $description;
	public $actions = array();

	function __construct($name, $result, $description="")
	{
		$this->name = $name;
		$this->result = $result;
		$this->description = $description;
	}

	function addAction($action)
	{
		return $this->actions[count($this->actions)] = $action;
	}

	function render($current)
	{
		print '    <table class="trans"><tr>' . "\n";
		print '      <td class="transpic" valign="top" width="380">' . "\n";
		print '        <a href="#' . $current->name . '"><img src="images/' . $current->name . '.png"/></a>';
		print ($current->name == "start") ? '<img src="images/line.png"/>' : "";
		print '<img src="images/transition.png"/>';
		print '<a href="#' . $this->result->name . '"><img src="images/' . $this->result->name . '.png"/></a>' . "\n";
		print '      </td>' . "\n";
		print '      <td valign="top">' . "\n";
		print '        <h3 class="transname">' . $this->name . '</h3>' . "\n";
		if ($this->description != "")
		{
			print '        <p class="transdesc">' . $this->description . '</p>' . "\n";
		}

		print '        <ul>' . "\n";
		foreach ($this->actions as $action)
		{
			print '          <li>' . "$action\n";
		}

		print '        </ul>' . "\n";
		print '      </td>' . "\n";
		print '    </tr></table>' . "\n";
	}
}


########################################################################
include "$areaRoot/_footer.php"; ?>

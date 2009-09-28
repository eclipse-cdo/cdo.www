<?php
########################################################################

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
		print '<p><img class="diagram" id="' . $this->name . '" src="' . $this->name . '.png" usemap="#' . $this->name . '"></p>' . "\n";
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

	function addAction($field, $description="")
	{
		$this->actions[count($this->actions)] = new Action($field, $description);
		return $this;
	}

	function render($current)
	{
		print '    <table class="trans"><tr>' . "\n";
		print '      <td class="transpic" valign="top" width="370">' . "\n";
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

		print '        <table class="actions">' . "\n";
		foreach ($this->actions as $action)
		{
			print "          <tr><td valign=\"top\"><b>$action->field</b>:</td><td valign=\"top\">$action->description</td></tr>\n";
		}

		print '        </table>' . "\n";
		print '      </td>' . "\n";
		print '    </tr></table>' . "\n";
	}
}

class Action
{
	public $field;
	public $description;

	function __construct($field, $description="")
	{
		$this->field = $field;
		$this->description = $description;
	}
}

########################################################################
?>

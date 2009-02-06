<?php

abstract class Field
{
	private $form;
	private $name;
	private $label;
	private $defaultValue;
	private $value;
	private $error;

	function __construct($name, $label = NULL, $defaultValue = NULL)
	{
		$this->name = $name;
		$this->label = $label == NULL ? $name : $label;
		$this->defaultValue = $defaultValue;
	}

	function load()
	{
		if (isset($_POST[$this->name]))
		{
			// TODO Consider form method!
			$this->setValue($_POST[$this->name]);
		}
		else
		{
			$this->clear();
		}

		return false;
	}

	function clear()
	{
		$this->setValue($this->defaultValue);
	}

	function getError()
	{
		return $this->error;
	}

	function getForm()
	{
		return $this->form;
	}

	function setForm($form)
	{
		$this->form = $form;
		return this;
	}

	function getName()
	{
		return $this->name;
	}

	function getLabel()
	{
		return $this->label;
	}

	function setLabel($label)
	{
		$this->label = $label;
		return this;
	}

	function getValue()
	{
		return $this->value;
	}

	function setValue($value)
	{
		$this->value = $value;
		$this->error = $this->validate($value);
		return this;
	}

	function validate($value)
	{
		return NULL;
	}

	function render()
	{
		//		if ($this->error != NULL && $this->form->isSubmitted())
		//		{
		//			print '<td></td><td>';
		//			$this->renderError();
		//			print "</td></tr>\n";
		//			print "<tr>";
		//		}

		print "<td>";
		$this->renderLabel();
		print "</td>";

		print "<td>";
		$this->renderValue();
		if ($this->error != NULL && $this->form->isSubmitted())
		{
			print '&nbsp;';
			$this->renderError();
		}

		print "</td>";
	}

	function renderError()
	{
		print '<b><font color="#FF0000">';
		print $this->error;
		print "</font></b>";
	}

	function renderLabel()
	{
		if ($this->error != NULL && $this->form->isSubmitted())
		{
			print '<b><font color="#FF0000">' . $this->label . '</font></b>';
		}
		else
		{
			print $this->label;
		}
	}

	abstract function renderValue();
}

?>

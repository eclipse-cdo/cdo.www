<?php

class Form
{
	private $method;
	private $fields = array();

	function __construct($method = "POST")
	{
		$this->method = $method;
	}

	function getMethod()
	{
		return $this->method;
	}

	function getFields()
	{
		return $this->fields;
	}

	function addField($field)
	{
		$field->setForm($this);
		$this->fields[count($this->fields)] = $field;
		return $field;
	}

	function render()
	{
		$submitted = false;
		foreach ($this->fields as $field)
		{
			if ($field->load())
			{
				$submitted = true;
			}
		}

		print "<form method=\"$this->method\">\n";
		print "<table border=\"0\">\n";
		foreach ($this->fields as $field)
		{
			$this->renderField($field);
		}

		print "</table>\n";
		print "</form>\n";
	}

	function renderField(Field $field)
	{
		print "<tr>";
		$field->render();
		print "</tr>\n";
	}
}


abstract class Field
{
	private $form;
	private $name;
	private $label;
	private $defaultValue;
	private $value;
	private $error;

	function __construct($name, $label, $defaultValue = NULL)
	{
		$this->name = $name;
		$this->label = $label;
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
		print "<td>";
		$this->renderLabel();
		print "</td>";

		print "<td>";
		$this->renderValue();
		print "</td>";
	}

	function renderLabel()
	{
		if ($this->error != NULL)
		{
			print '<color="red">' . $this->label . '</color>';
		}
		else
		{
			print $this->label;
		}
	}

	abstract function renderValue();
}


class Button extends Field
{
	function __construct($name, $label)
	{
		parent::__construct($name, $label);
	}

	function load()
	{
		parent::load();
		return $this->getName() == "submit" && $this->getValue() != NULL;
	}

	function renderLabel()
	{
		// Do nothing
	}

	function renderValue()
	{
		print '<input type="submit" value="' . $this->getLabel() . '" name="' . $this->getName() . '"/>';
	}
}


class Text extends Field
{
	private $size;
	private $maxlen;

	function __construct($name, $label, $defaultValue = NULL)
	{
		parent::__construct($name, $label, $defaultValue);
	}

	function getSize()
	{
		return $this->size;
	}

	function setSize($size)
	{
		$this->size = $size;
		return $this;
	}

	function renderValue()
	{
		print '<input type="text" value="' . $this->getValue() . '" name="' . $this->getName() . '" size="/' . $this->getSize() . '"/>';
	}
}

?>

<?php

class Form
{
	private $method;
	private $fields = array();
	private $fieldsByName = array();
	private $submitted = false;
	private $finished = false;

	function __construct($method = "POST")
	{
		$this->method = $method;
	}

	function getMethod()
	{
		return $this->method;
	}

	function addField($field)
	{
		$field->setForm($this);
		$this->fields[count($this->fields)] = $field;
		$this->fieldsByName[$field->getName()] = $field;
		return $field;
	}

	function getFields()
	{
		return $this->fields;
	}

	function getField($name)
	{
		return $this->fieldsByName[$name];
	}

	function getValue($name)
	{
		return $this->getField($name)->getValue();
	}

	function getValues($skipButtons = true)
	{
		$result = array();
		foreach ($this->fields as $field)
		{
			if (!($skipButtons && $field instanceof Button))
			{
				$result[count($result)] = $field->getValue();
			}
		}

		return $result;
	}

	function getNames($skipButtons = true)
	{
		$result = array();
		foreach ($this->fields as $field)
		{
			if (!($skipButtons && $field instanceof Button))
			{
				$result[count($result)] = $field->getName();
			}
		}

		return $result;
	}

	function render()
	{
		foreach ($this->fields as $field)
		{
			if ($field->load())
			{
				$this->submitted = true;
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

		if ($this->submitted)
		{
			$this->finished = true;
			foreach ($this->fields as $field)
			{
				if ($field->getError() != NULL)
				{
					$this->finished = false;
				}
			}
		}
	}

	function isSubmitted()
	{
		return $this->submitted;
	}

	function isFinished()
	{
		return $this->finished && $this->isSubmitted();
	}

	protected function renderField(Field $field)
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


class Button extends Field
{
	function __construct($name, $label = NULL)
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

	function __construct($name, $label = NULL, $defaultValue = NULL)
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

	function getMaxLen()
	{
		return $this->maxlen;
	}

	function setMaxLen($maxlen)
	{
		$this->maxlen = $maxlen;
		if (!isset($this->size))
		{
			$this->size = ($maxlen > 100 ? 100 : $maxlen);
		}

		return $this;
	}

	function validate($value)
	{
		if ($value == "Eike")
		{
			return "'Eike' is not allowed";
		}
			
		return parent::validate($value);
	}

	function renderValue()
	{
		print '<input type="text" value="' . $this->getValue() . '" name="' . $this->getName() . '" size="/' . $this->getSize() . '"/>';
	}
}

?>

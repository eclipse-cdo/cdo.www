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

?>

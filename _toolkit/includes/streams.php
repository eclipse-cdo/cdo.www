<?php

/*
abstract class Stream
{
	abstract function close();
	abstract function eof();
}

abstract class InputStream extends Stream
{
	abstract function read($bytes = 1);
}

class FileInputStream extends InputStream
{
	private $fp;

	function __construct($fp)
	{
		$this->fp = $fp;
	}

	function close()
	{
		fclose($this->fp);
	}

	function eof()
	{
		return feof($this->fp);
	}

	function read($bytes = 1)
	{
		return fread($this->fp, $bytes);
	}
}

class FilterInputStream extends InputStream
{
	private $in;

	function __construct(InputStream $in)
	{
		$this->in = $in;
	}

	function close()
	{
		$this->in->close();
	}

	function eof()
	{
		return $this->in->eof();
	}

	function read($bytes = 1)
	{
		return $this->in->read($bytes);
	}
}

// Deprecated
class LineReader extends FilterInputStream
{
	private $loadSize;
	private $buffer;

	function __construct(InputStream $in, $loadSize = 8192)
	{
		parent::__construct($in);
		$this->loadSize = $loadSize;
	}

	function readLine()
	{
		return $this->in->read($bytes);
	}
}
*/

class LineFilter
{
	private $url;
	private $fromRegex;
	private $fromIncluded;
	private $toRegex;
	private $toIncluded;

	function __construct($url)
	{
		$this->url = $url;
	}

	function addRegex($regex, $included = true)
	{
		$entry = array($regex, $included);
		$this->fields[count($this->fields)] = $field;
		$this->fromRegex = $regex;
		$this->fromIncluded = $included;
		return $this;
	}

	function setTo($regex, $included = true)
	{
		$this->toRegex = $regex;
		$this->toIncluded = $included;
		return $this;
	}

	function getLines($invert = false)
	{
		$skipping = !$invert;
		$result = array();
		$lines = file_get_contents($this->url);
		foreach ($lines as $line)
		{
			if ($skipping)
			{
				
			}
			else
			{
				
			}
		}
		
		return $result;
	}
}

?>

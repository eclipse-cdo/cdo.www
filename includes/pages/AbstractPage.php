<?php

abstract class AbstractPage
{
	function generate()
	{
		echo 'Class: ' . get_class($this);
	}
}

?>

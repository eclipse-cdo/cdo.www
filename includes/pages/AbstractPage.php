<?php

abstract class AbstractPage
{
	function render()
	{
		echo 'Class: ' . get_class($this);
	}
}

?>

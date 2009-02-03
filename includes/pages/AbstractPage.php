<?php

abstract class AbstractPage
{
	function generate()
	{
		echo 'Class: ' . self->get_class();
	}
}

?>

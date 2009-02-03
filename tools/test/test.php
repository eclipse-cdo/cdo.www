<?php

abstract class C
{
	abstract function run();
} 

$obj = new C()
{
	function run()
	{
		echo "Juchuh!";
	}	
}

echo "Running: ";
$obj->run();

?>

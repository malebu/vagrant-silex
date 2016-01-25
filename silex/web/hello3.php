<?php

$rechner = new Rechner; 

for ($i = 0; $i < 10; $i++) {
	echo "$i + $i = " . $rechner->addieren($i) . "<br>";
	echo "$i * $i = " . $rechner->multiplizieren($i) . "<br>";
	echo "$i! = " . $rechner->fakultaet($i) . "<br>";
	echo "<hr>";
}

class Rechner
{	
	function addieren($n)
	{
		return $n + $n;
	}

	function multiplizieren($n)
	{
		return $n * $n;
	}

	function fakultaet($n)
	{
		if($n==0)
		{
			return 1;
		}
		else
		{
			return $n * $this->fakultaet($n-1);
		}
	}
}

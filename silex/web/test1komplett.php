<?php
echo "Hello World!";
echo "The Server time is" . time() ;
echo "<hr>";
for ($i = 0; $i < 10; $i++)
{
		if($i % 2 == 0)
		{
			echo $i . " is even <br>";
		}
			else 
			{
				echo $i . " is odd <br>";
			}
}
echo "<hr>";
$capital = array(
	"Germany" => "Berlin",
	"France" => "Paris",
	"Belgium" => "Brussels"
	);

foreach ($capital as $key => $value)
	echo "The capital of $key is " . $value . "<br>";
echo "<br>";

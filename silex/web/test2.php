<?php
echo "Hello world!";
echo "<hr>";

$a=0;
$b;

function fak($a){
	if($a==0){
	echo "1";}
		else{
			for ($a; $a<10; $a++){
				$b=($a*$a-1);
				$b=fak($a);
				echo "$b";
				echo "<br>";}
}}

fak(10);
	
	
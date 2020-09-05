<?php
#test
require("config.php");

echo "This is for inputting data</br>";

$stm = "INSERT INTO Product(Name, ID, Date) VALUES('Chinchine Bike', 2, NOW())";



$r = getIn($stm);

if($r == 0){

	echo "cannot connect to the db </br>";

}else if($r == 1){
	
	echo "cannot insert information into db </br>"; 

}else if($r == 2){
	
	echo "your record is inserted</br>";
	echo "<hr>";
	echo "<hr>";

}

echo "This is for outputting information</br>";

$stm = "SELECT * FROM Product";

$r = getOut($stm);

if($r == 0){
	echo "can't connect to the server</br>";
}else if($r  == 1){
	echo "cannot fetch out any information</br>";
}else{
	foreach($r as $key){
		echo $key;
		echo "<hr/>";
	}
}


?>
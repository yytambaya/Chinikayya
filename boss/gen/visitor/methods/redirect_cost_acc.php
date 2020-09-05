<?php
session_start();

if(isset($_POST['order'])){
	$_SESSION['ID'] = 'linked'; 
header("Location: ../../../visitor/Customer/customer_login.php");

}

?>
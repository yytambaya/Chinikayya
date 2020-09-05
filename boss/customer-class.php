<?php

require_once("../config.php");

class Customer{
	public $f_name;
	public $l_name;
	public $e_address;
	public $phone_no;
	public $country;
	public $state;	

public function  __construct($f_name, $l_name, $e_address, $phone_no, $country, $state){
		
	$this->f_name = $f_name;
	$this->l_name = $l_name;
    $this->e_address =  $e_address;
	$this->phone_no = $phone_no;
	$this->country = $country;
	$this->state = $state;	
	
}

 
public function registerUser($psascode){
	
	$stm1 = "INSERT INTO Customer(F_name, L_name, E_address, Phone_no, Country, State) VALUES('$this->f_name', '$this->l_name', '$this->e_address', '$this->phone_no', '$this->country' ,'$this->state' , NOW(), NULL)";
	
	$stm2 = "INSERT INTO Generated_passcode(passcode, User_ID) VALUES('$passcode' , NULL)";
		
	if((getIn($stm1) == 2) and (getIn($stm2) == 1)){
	
		
		
		$this->msg = "We sent a confirmation link to your email address";
	
	}else{
		
		$this->msg = "can't connect to the server at this time, try again";
	
	}
	
	return $this->msg;
	
}

public function logCustomer($email, $passcode){
	
	$stm = "SELECT E_address, Passcode FROM Customer,Genearted_passcode  WHERE E_address = '$email' and  Passcode= '$passcode' ";
	
	$result = getOut($stm);
	
	if($resilt == 0){
	
		return "cannot connect to the server at this time"; 
	
	}else if($result == 1){
	
		return "cannot connect to the server at this time to fetch out any info";
	
	}else if(size($result) == 2){
		
		$this-> $result; 
		
	}else{
		
		return "You have a problem, kindly visit to the Chinikayya branch or send the problem via info@chinikayya.com";
	
	}
	

}



public static function generatePasscode(){
	
	
	$id = uniqueid(rand(0, 10));
	
	$stm = "SLECT COUNT(Passcode) FROM User WHERE Passcode = '$passcode' ";

do{	
	$id = uniqueid(rand(0, 10));
	
	$result = getIn($stm);
	
	if(($result == 0) or ($result == 1)){
		
		return $result;
		
	}else{
	
		$id = uniqueid(rand(0, 10));
	}
	
}while($result){
			
			
	
	return $passcode;

}

}


class CustomerPanel{

	public static function getCart($id){
		
		$smt = "SELECT Name FROM product WHERE Customers.ID = $id and ID = Customer_Cart.Product_ID";
		
		$rrsult = getOut($stm);
		
		if((getOut($stm) == 0) and (getOut($stm) == 1)){
		
			return "can't connect to the server at this time, try again";
		
		}else{
			
			return $result;
	
		}
	
	
		
	
	}
	
	public static function getPurchedProducts($id){
		
		$smt = "SELECT Name FROM Product WHERE Customers.ID = $id and ID = Customer_store.Product_ID";
		
		$rrsult = getOut($stm);
		
		if((getOut($stm) == 0) and (getOut($stm) == 1)){
		
			return "can't connect to the server at this time, try again";
		
		}else{
			
			return $result;
	
		}
	
	
		
	
	}
	
	public static function getAccout_info($id){
		
		$smt = "SELECT F_name, L_name, E_address, Phone_no, Country, State FROM Customers WHERE ID = '$id' ";
		
		$rrsult = getOut($stm);
		
		if((getOut($stm) == 0) and (getOut($stm) == 1)){
		
			return "can't connect to the server at this time, try again";
		
		}else{
			
			return $result;
	
		}
	
	
		
	
	}




}






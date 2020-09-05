<?php
//require("../../gen/config.php");

function generateInvoiceID($user_id, $product_id){
	
	$i = 0;	
	
	$gen_code = (rand(25, 10));
		
	$stm_invoice_out = "SELECT count(*) AS invoice FROM customers_transaction WHERE Transaction_ID = '$gen_code' ";
		
	$value = getOut($stm_invoice_out);
		
	//var_dump($value);
	
	
	while($i < $value['result'][0]['invoice']){
	
		$gen_code = rand(10, 100);
		
		$stm_invoice_out = "SELECT count(*) FROM customers_transaction WHERE Transaction_ID = '$gen_code' ";
		
		$value = getOut($stm_invoice_out);	
		
	}	
	
	//echo "Result: ".$value['result'][0]['invoice']."<br>";
	
		$invoice = (getTransactionID($user_id, $product_id, $gen_code));
	
		//$stm_invoice_in = "INSERT INTO Generated_invoice VALUES('$invoice', '$user_id', '$product_id', NOW(), NULL)";
		
		if($value == 0){
			return	"cannot connect to the server";
		}else if($value == 1){
			return "cannot connect transaction id";
		}else{
			
			
	
		//$count = $this->getOut($tm_invoic_in);
	
	return $invoice;
	
	}
}

function getTransactionID($user_id, $product_id, $gen_code){

		$transaction_id = $user_id.$product_id.$gen_code;  
		
		return $transaction_id;
}

//print"Transaction ID: ".(generateInvoiceID(1, 1));




?>
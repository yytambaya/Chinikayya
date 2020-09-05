<?php
//ob_start();

require_once("config.php");

class CreateProduct{
	/*public $name;
	public $category;
	public $description;
	public $price;
	#public $image;
	public $status;
	public $addition;
	public $msg;*/


public function  __construct(){
	/*$this->name = $name;
	$this->description = $description;
	$this->price = $price;
	$this->category = $category;
	$this->addition = $addition;*/
}


public static function storeProduct($name, $description, $price, $image, $status, $category, $addition){


	/*$stm1 = "INSERT INTO products VALUES('$name', $price, '$image', '$category', NULL, NOW())";

	$stm2 = "INSERT INTO Product_info VALUES(NULL, '$description', '$status', '$addition')";

	if((getIn($stm1)[0] == 2) or (getIn($stm2)[0] == 2)){

		return getIn($stm1)[1];

	}else if((getIn($stm1)[0] == 1) or (getIn($stm2)[0] == 1)){

		return getIn($stm1)[1]."<br/>".getIn($stm2)[1];

	}else if((getIn($stm1)[0] == 0) or (getIn($stm2)[0] == 0)){

		return getIn($stm1)[1]."<br/>".getIn($stm2)[1];

	}else{
		return "no output";
	}*/

	return "No";


}

public static function getLatestProducts(){

	$stm = "SELECT Name, Price, ID FROM products ORDER BY DATE DESC";

	$result = getOut($stm);

	if($result == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}


}

Public static function getAllProducts(){

	$stm = "SELECT Name, Price, Image, ID FROM products LIMIT 15";

	$result = getOut($stm);

	if($result == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}


}


Public static function getAllProductsAdmin(){

	$stm = "SELECT Name, Price, ID FROM products";

	$result = getOut($stm);

	if($result == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}


}


Public static function getProductById($id){

	$stm = "SELECT Name, Price, ID FROM products WHERE ID = '$id' ";

	$result = getOut($stm);

	if($result == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}


}

public static function getProductsByCategory($category){

	$stm = "SELECT Name, Price, ID FROM products WHERE Category = '$category' ORDER BY DATE DESC";

	$result = getOut($stm);

	if($result == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}

}

public function getRecomendedProducts(){ //use category

	$stm = "SELECT  6 Name, price FROM products ORDER BY DATE DESC";

	$result = getOut($stm);

	if($resilt == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}

}

public static function getProductDetails($id){

	$stm = "SELECT  Name, Price, products.ID, Description, Additional_info FROM products,  product_info WHERE products.ID = product_info.ID and products.ID = '$id' ";

	$result = getOut($stm);

	echo $result[1];

	if($result == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}

}

}

class Customer{


	public static function registerUser($v_fname, $v_lname , $v_email , $v_password, $v_pnum , $v_country , $v_state){

		$stm = "INSERT INTO customers(F_Name, L_Name, E_ADDRESS, Passcode, Phone_no, Country, State, DATE) VALUES('$v_fname', '$v_lname' , '$v_email' , '$v_password', '$v_pnum' , '$v_country' , '$v_state', NOW())";

// 		echo $stm;

		$result = getIn($stm);

		//var_dump($result);

		if($result[0] == 0){
			return [0, "cannot connect to the server, try again"];
		}else if($result[0] == 1){
			return [1, $result[1]];
		}else if($result[0] == 2){
			return [2, "You are registered!, kindly activate your account via your email address"];
		}


	}


	public static function logOut($customer_id){

		session_destroy();

		header("Location: C-login_form.php");


	}


		public static function checkEmail($email){

		$stm = "SELECT COUNT(E_ADDRESS) FROM  customer WHERE E_ADDRESSS == '$email' ";

		$result = getOut($stm);

		if($result == 0){

			return 0;

		}else if($result == 1){

			return 1;

		}else{
				return $result;

		}

		}

		public static function orderProduct($customer_id){

		$stm = "INSERT INTO  customers_transaction(Product_Id, Product_status, Quantity, Customer_Id,  ID, DATE) VALUES('$Product_id', 'O', $customer_id, 1, NULL, NOW()) ";

		$result = getOut($stm);

		if($result == 0){

			return 0;

		}else if($result == 1){

			return 1;

		}else{
				return $result;

		}

	}

		public static function storeInvoice_Now($customer_id, $product_id, $invoice_id){

		$stm = "INSERT INTO  customers_transaction VALUES( '$product_id', 'O', 1, '$customer_id', '$invoice_id', NULL, NOW())";

		$result = getIn($stm);

		if($result[0] == 0){

			return 0;

		}else if($result[0] == 1){

			return 1;

		}else if($result[0] == 2){
				return $result;

		}
			var_dump($result[0]);
		}

	public static function getAccount($customer_id){

	$stm = "SELECT  F_name, L_name, E_ADDRESS, Phone_no, State, Country FROM  customers WHERE ID = '$customer_id' ";

	$result = getOut($stm);

	if($result == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}

}


	public static function getOrderedProducts($customer_id){

	$stm = "SELECT  Product_Id, Name, Quantity, Transaction_ID FROM  customers_transaction,  products WHERE customers_transaction.customer_Id = '$customer_id' and customers_transaction.product_status = 'O' and customers_transaction.product_Id = product.ID";
//$stm = "SELECT  * FROM  Customers_transaction";
	$result = getOut($stm);

	if($result == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}

	}



	public static function getPurchasedProducts($customer_id){

	$stm = "SELECT  Name, Quantity, Transaction_ID FROM  customers_transaction,  products WHERE  customers_transaction.customer_Id = '$customer_id' and  customers_transaction.product_status = 'P' and  customers_transaction.Product_Id =  product.ID";

	$result = getOut($stm);

	if($result == 0){

		return "cannot connect to the server at this time";

	}else if($result == 1){

		return "cannot connect to the server at this time to fetch out any info";

	}else{

		return $result;

	}

	}


	public static function SupplyProduct($p_name, $p_description){

		$stm = "INSERT INTO  supply VALUES('$p_name', '$p_description', NULL, NOW())";

		$result = getIn($stm);

		if($result[0] == 0){

			return 0;

		}else if($result[0] == 1){

			return 1;

		}else if($result[0] == 2){
				return 2;

		}

	}








}?>

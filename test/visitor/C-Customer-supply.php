<?php
session_start();

require_once("../gen/gen/config.php");
require_once("../gen/gen/product.php");
require_once("C-customer-header.php");

//require_once("header_nav.php");




if(isset($_SESSION['Customer_ID'])){ 
						

$v_p_name = $v_p_description =  ""; 


if(isset($_POST['send'])){
	
	//print_r($_REQUEST);
	
	if(!empty($_POST['p_name'])){

		$p_name = check($_POST['p_name']);
	
		if(preg_match('/^[A-Za-z0-9\s]{3,40}$/', $p_name)){
			
			$v_p_name = $p_name;
		
		}else{
			$p_error = "Invalid Product Name";
		}
		
	}else{
		$p_error = "Product Name is required";
	}
	
	if(!empty($_POST['p_description'])){

		$p_description = check($_POST['p_description']);
	
		if(preg_match('/^[A-Za-z0-9\s\b(),\.]{3,200}$/', $p_description)){
			
			$v_p_description = $p_description;
		
		}else{
			$d_error = "Invalid Description, use alphabets only";
		}
		
	}else{
		$d_error = "Product description is required";
	}
	
	if($v_p_name && $v_p_description){
		
		
		$result = Customer::SupplyProduct($v_p_name, $v_p_description);
		
		if($result == 0 or $result == 1){
		
			echo $msg = "<div class='alert alert-info'>Cannot connect to the server at this time</div>";
			
			
		}else if($result == 2){
		
			header("Location: C-customer-supply-status.php");
			
		}
		
	
	}
	
}

?>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-4 col-sm-offset-1">
					
						
					<div class="login-form"><!--login form-->
						<div class="container text-danger">
							<p><?php if(isset($msg)) echo $msg; ?></p>
						</div>
						<h2>Send Product Details</h2>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-input">
							<input type="text" name="p_name" class="form-control" placeholder="Name" value="<?php if(isset($p_name)) echo $p_name; ?>" maxlength="150"/>
							<span class="text-danger"><?php if(isset($p_error)) echo $p_error; ?></span><br/>
							
							<textarea type="text" name="p_description" class="form-control" placeholder="Description" maxlength="200" value="<?php if(isset($p_description)) echo $p_description;?>"></textarea>
							<span class="text-danger"><?php if(isset($d_error)) echo $d_error; ?></span><br/>
							
	
							<input type="submit" name="send" value="Send" class="btn btn-default">
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-2"></div>
			</div>
				
	<?php require_once("C-customer-footer.php"); ?>
	
<?php }else{ header("Location: C-login_form.php");}?>	
</body>
</html>
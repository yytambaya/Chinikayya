<?php
require("../../gen/gen/config.php");
require("../../gen/gen/product.php");

$v_fname = $v_lname = $v_email = $v_pnum =$v_country = $v_state = $v_course = $state = "";
 
if(isset($_POST['register'])){
	//print_r($_REQUEST);
	if(!empty($_POST['f_name'])){

		$f_name = check($_POST['f_name']);
	
		if(preg_match('/^[A-Za-z]{3,40}$/', $f_name)){
			
			$v_fname = $f_name;
		
		}else{
			$f_error = "First name must contains LETTERS only";
		}
		
	}else{
		$f_error = "First name is required";
	}
	
	if(!empty($_POST['l_name'])){

		$l_name = check($_POST['l_name']);
	
		if(preg_match('/^[A-Za-z]{3,40}$/', $l_name)){
		
			$v_lname = $l_name;
		
		}else{
			$l_error = "Last name must contains LETTERS only";
		}
		

	}else{
		$l_error = "Last name is required";
	}
	
	if(!empty($_POST['email'])){

		$email = check($_POST['email']);
	
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			
			$v_email = $email;
			
		}else{
			$e_error = "Invalid email format";
		}
			
		
		
	}else{
		$e_error = "Email is required";
	}
	
	if(!empty($_POST['p_num'])){

		$p_num = check($_POST['p_num']);
	
		if(preg_match('/^[0-9]{11}$/', $p_num)){
			
			$v_pnum = $p_num;
			
		}else{
			$p_error = "This phone number is invalid";
		}

	}else{
		$p_error = "phone number is required";
	}
	
	if(!empty($_POST['country'])){

		$country = check($_POST['country']);
	
		/*if(preg_match('/^[A-Za-z]{2, 100}/', $country)){
			
			$v_country = $country;
			
		}else{
			$country_error = "This country is invalid";
		}*/
		$v_country = $country;
		
	}else{
		$country_error = "A country must be selected";
	}
	
	if(!empty($_POST['state'])){

		$state = check($_POST['state']);
	
		/*if(preg_match('/^[A-Za-z]{2, 40}/', $state)){
			
			
			
		}else{
			$s_error = "This state is invalid";
		}*/
		
		$v_state = $state;
		
	}else{
		$s_error = "A state must be selected";
	}
		
	
	
	if($v_fname && $v_lname && $v_email && $v_pnum && $v_country && $v_state){
		
		$result = Customer::registerUser($v_fname, $v_lname , $v_email , $v_pnum , $v_country , $v_state);		
		
		if($result[0] == 0){
			header("Location: user_signup.php");
			//send $result[1] for values 0,1 to website's email
		}else if($result[0] == 1){
			header("Location: user_signup.php");
		}else if ($result[0] == 2){
			header("Location: activate_account_msg.php");
		}else{
			header("Location: user_signup.php");
		}
		
	}
}	
	


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="charset" content="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1 "/>
	<meta name="keywords" data="scholarship kano, school scholarship 2018 Nigeria, Scholarship registration"/>
	<meta name="description" data="A scholarship program for Nigerians 2018 open for everyone at kano" />
	<meta name="robots" data="index"/>
	<!--<link rel="stylesheet" href="homestyle.css"/!-->
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>

	<style>
		body{
			background-color: white;
		}	
		.form-control{
			margin-bottom: 30px; 
		}
	</style>
	
</head>


<body>
	
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2">
		
		</div>
		
		<div class="col-lg-8">
				<?php if(isset($msg)) echo "<div class='badge'> $msg </div>"; ?>
			<?php if($state != "update"){ ?>
			
			<div class="jumbotron bg-white">
			
			<?php if(isset($value)) echo "<div class='badge bg-info'> $value </div>"; ?>
			
			<p class="display-4 text-info text-center">Register wit us now</p> 
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-bloc bg-lightk">
				<div class="form-group">	
					<label>first name<input type="text" name="f_name" value="<?php if(isset($f_name)) echo $f_name; ?>" maxlength="40" class="form-control"/></label>
					<span class="text-danger"><?php if(isset($f_error)) echo $f_error; ?></span><br/>
			
					
					<label>last name<input type="text" name="l_name" maxlength="40" value="<?php if(isset($l_name)) echo $l_name; ?>" class="form-control"/></label>
					<span class="text-danger"><?php if(isset($l_error)) echo $l_error; ?></span><br/>
			
					
					<label>Email address name<input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" maxlength="40" class="form-control"/></label>
					<span class="text-danger"><?php if(isset($e_error)) echo $e_error; ?></span><br/>
			
					
					<label>phone number<input type="text" name="p_num" value="<?php if(isset($p_num)) echo $p_num; ?>" maxlength="40" class="form-control"/></label>
					<span class="text-danger"><?php if(isset($p_error)) echo $p_error; ?></span><br/>
			
					
					<label>country
					<select class="form-control" name="country">
						<option value="Nigeria">Nigeria</option>
						<option value="Niger">Niger</option>
						<option value="Ghana">Ghana</option>
					</select></label><br/>
			
					<label>state 
					<select id="states" class="form-control" name="state">
						<option value="Kaduna">Kaduna</option>
						<option value="Kano">Kano</option>
						<option value="Lagos">Lagos</option>
					</select></label><br/>
				
					<p class="text-info">By applying, you agree with our terms and policy</p>
					<p><input type="submit" name="register" value="Register" maxlength="40" class="btn btn-info"/>
				</div>
			</form>
		</div><?php } ?>
		
		<div class="col-lg-2">
		
		</div>
		
	</div>	
	
</body>
</html>
<?php  

require("header.php");
require_once("header_nav.php"); 
require_once("../gen/gen/config.php");
require_once("../gen/gen/product.php");

$v_fname = $v_lname = $v_email = $v_password = $v_pnum =$v_country = $v_state = $state = "";
 
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
			
			/*$check_email = Customer::checkEMail($email);
			
			if($check_email == 1){
				
				$e_error = "This email already exist!";
			
			}else if($check_email == 0){
				
				$this_page = $_SERVER['PHP_SELF'];
				
				header("Location: $this_page");
				
			}else{
				
				$v_email = $email;
			}*/	
			
			$v_email = $email;
			
		}else{
			 $e_error = "Invalid email format";
		}
			
		
		
	}else{
		 $e_error = "Email is required";
	}
	
	
	if(!empty($_POST['password'])){

		$password = check($_POST['password']);
	
		if(preg_match('/^[A-Za-z0-9]{5,40}$/', $password)){
		
			$v_password = $password;
		
		}else{
				 $pass_error = "Password can only be letters, numbers or characters";
		}
		

	}else{
		 $pass_error = "Password is required";
	}
	
	
	if(!empty($_POST['p_num'])){

		$p_num = check($_POST['p_num']);
	
		if(preg_match('/^[0-9]{11,15}$/', $p_num)){
			
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
		echo $country_error = "A country must be selected";
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
		
	
	if($v_fname && $v_lname && $v_email && $v_password && $v_pnum && $v_country && $v_state){
	
			
		$result = Customer::registerUser($v_fname, $v_lname , $v_email , $v_password, $v_pnum , $v_country , $v_state);		
		
		var_dump($result);
		
		if($result[0] == 0){
			
			//header("Location: C-user_signup.php");
			
			//send $result[1] for values 0,1 to website's email
			
			echo $msg = $result[1];
		
		}else if($result[0] == 1){
			
			//header("Location: C-user_signup.php");
			
			echo $msg = $result[1];
		
		}else if ($result[0] == 2){
			
			header("Location: C-activate_account_msg.php");
			echo $msg = "Redirect me!";
		}else{
			//header("Location: C-user_signup.php");
			echo $msg = "Don't understand";
		}
		
	}
}

?>

<style>
div#myform{
	background: white;
}
.form-control{
	background-color: white;
	width: 30%;
	color: blue;

}

</style>

<section id="form" ><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
								<div class="container">
									<?php if(isset($msg)) echo "<div class='badge'> $msg </div>"; ?>
								</div>
			<div class="jumbotron" id="myform">
			
			<?php if(isset($value)) echo "<div class='badge bg-info'> $value </div>"; ?>
			
			<p class="display-4 text-info text-center">Register with us now</p> 
			<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-bloc bg-lightk">
				<div class="form-group">	
					<small><i><label>First name<input type="text" name="f_name" value="<?php if(isset($f_name)) echo $f_name; ?>" maxlength="40" class="form-control"/></label>
					<span class="text-danger"><?php if(isset($f_error)) echo $f_error; ?></span><br/>
			
					
					<label>Last name<input type="text" name="l_name" maxlength="40" value="<?php if(isset($l_name)) echo $l_name; ?>" class="form-control"/></label>
					<span class="text-danger"><i><?php if(isset($l_error)) echo $l_error; ?></span><br/>
			
					
					<label>Email address<input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>" maxlength="40" class="form-control"/></label>
					<span class="text-danger"><?php if(isset($e_error)) echo $e_error; ?></i></span><br/>
					
					
					<label>Password<input type="password" name="password" value="<?php if(isset($password)) echo $password; ?>" maxlength="40" class="form-control"/></label>
					<span class="text-danger"><?php if(isset($pass_error)) echo $pass_error; ?></i></span><br/>
					
					
					<label>Phone number<input type="text" name="p_num" value="<?php if(isset($p_num)) echo $p_num; ?>" maxlength="40" class="form-control"/></label>
					<span class="text-danger"><?php if(isset($p_error)) echo $p_error; ?></span><br/>
			
					
					<label>Country
					<select class="form-control" name="country">
						<option value="Nigeria">Nigeria</option>
						<option value="Niger">Niger</option>
						<option value="Ghana">Ghana</option>
					</select></label><br/>
			
					<label>State 
					<select id="states" class="form-control" name="state">
						<option value="Kaduna">Kaduna</option>
						<option value="Kano">Kano</option>
						<option value="Lagos">Lagos</option>
					</select></label><br/>
				
					<p class="text-info">By applying, you agree with our terms and policy</p>
					<p><input type="submit" name="register" value="Register" maxlength="40" class="btn btn-info"/></i></small>
				</div>
			</form>
		</div>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


<?php  require_once("footer.php"); ?>
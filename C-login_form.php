<?php
ob_start();
session_start();
require_once("gen/gen/config.php");
require("header.php");
require("header_nav.php");
if(isset($_SESSION['Product_Id'])){

	$_SESSION['confirm_login'] = "yeah";

}

$v_username = $v_password =  "";


if(isset($_POST['login'])){
// 	echo "good";

	//print_r($_REQUEST);

	if(!empty($_POST['username'])){

		$username = check($_POST['username']);

		if(filter_var($username, FILTER_VALIDATE_EMAIL)){

			$v_username = $username;

		}else{
			$u_error = "Invalid E-Address";
		}

	}else{
		$u_error = "E-Address is required";
	}

	if(!empty($_POST['password'])){

		$password = check($_POST['password']);

		if(preg_match('/^[A-Za-z0-9]{3,40}$/', $password)){

			$v_password = $password;

		}else{
			$pass_error = "Invalid Password";
		}

	}else{
		$pass_error = "Password is required";
	}

	if($v_username && $v_password){


		$stm = "SELECT ID  FROM Customers WHERE E_ADDRESS = '$v_username' AND Passcode = '$v_password' ";

		$result = getOut($stm);

// 		var_dump($result);
// 		print("Count: ".$result["count"]);

		//print($result);

		if($result["count"]){

			$msg = "successful!";



			$_SESSION['Customer_ID'] = $result['result'][0]['ID'];

// 			echo print_r($result['result']);

			header("Location: C-customer-home.php");
			//echo "Redirect me to admin page";

		}else{
			$msg = "username or passcode is not correct";
		}


	}

}?>

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">

					<?php if(isset($_SESSION['Product_Id'])){ ?>
						<div class="container">
							<h3 class="text-info">Login to confirm your order!</h3>
						</div>
						<?php } ?>

					<div class="login-form"><!--login form-->
						<div class="container text-danger">
							<p><?php if(isset($msg)) echo $msg; ?></p>
						</div>
						<h2>Login to your account</h2>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<input type="text" name="username" placeholder="Email Address" value="<?php if(isset($username)) echo $username; ?>" maxlength="150"/>
							<span class="text-danger"><?php if(isset($u_error)) echo $u_error; ?></span><br/>

							<input type="text" name="password" placeholder="passcode" value="<?php if(isset($password)) echo $password; ?>" maxlength="100"/>
							<span class="text-danger"><?php if(isset($pass_error)) echo $pass_error; ?></span><br/>


							<input type="submit" name="login" value="Login" class="btn btn-default">
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
</section>
	<?php require_once("footer.php"); ?>
</body>
</html>

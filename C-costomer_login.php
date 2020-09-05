<?php
session_start();

require("../gen/gen/product.php");

$v_username = $v_passcode =  ""; 

if(isset($_POST['Login'])){
	//print_r($_REQUEST);
	if(!empty($_POST['username'])){

		$username = check($_POST['username']);
	
		if(preg_match('/^[A-Za-z]{3,40}$/', $username)){
			
			$v_username = $username;
		
		}else{
			$u_error = "username name must contains LETTERS only";
		}
		
	}else{
		$u_error = "username is required";
	}
	
	if(!empty($_POST['passcode'])){

		$passcode = check($_POST['passcode']);
	
		if(preg_match('/^[A-Za-z0-9]{3,40}$/', $passcode)){
			
			$v_passcode = $passcode;
		
		}else{
			$p_error = "passcode is invalid";
		}
		
	}else{
		$p_error = "passcode is required";
	}
	
	if($v_username and $v_passcode){
		
		$login = Customer::logCustomer($v_username, $v_passcode);
		
		$login = $msg;
	
	}
	
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta name="charset" content="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1 "/>
	<!--<link rel="stylesheet" href="homestyle.css"/!-->
	<link rel="stylesheet" href=".../../framework/bootstrap/css/bootstrap.min.css"/>

</head>


<body>
<div class="container">
	<div class="container-fluid bg-success">
		<?php if(isset($msg)) echo "<div class='badge'> $msg </div>"; ?>
	</div>
	 
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="jumbotron bg-light form-block">
		<p class="text-info">Login</p>
		<div class="form-group">	
			
			<label>Email Address<input type="text" name="username" maxlength="40" value="<?php if(isset($username)) echo $username; ?>" class="form-control"/></label>
			<span class="text-danger"><?php if(isset($u_error)) echo $u_error; ?></span><br/>
	
			
			<label>Passcode<input type="passcode" name="passcode" value="<?php if(isset($passcode)) echo $passcode; ?>" maxlength="40" class="form-control"/></label>
			<span class="text-danger"><?php if(isset($p_error)) echo $p_error; ?></span><br/>
			<input type="submit" name="Login" value="Login" class="btn btn-info"/>
		</div>
	</form>
</div>	
</body>
</html>			
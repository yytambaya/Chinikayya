<?php
session_start();

require_once("../../gen/visitor/header.php");


$v_username = $v_password =  ""; 
function check($field){
		$n_field = trim($field);
		$n_field = htmlspecialchars($n_field);
		$n_field = stripslashes($n_field);
		return $n_field;	
}

if(isset($_POST['login'])){
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
	
	if(!empty($_POST['password'])){

		$password = check($_POST['password']);
	
		if(preg_match('/^[A-Za-z0-9]{3,40}$/', $password)){
			
			$v_password = $password;
		
		}else{
			$p_error = "password is invalid";
		}
		
	}else{
		$p_error = "password is required";
	}
	
	if($v_username and $v_password){
	
		$conn = new mysqli("localhost", "root", "", "Scholarship");
		
		if($conn->connect_error){
			die(mysql_error());
			$msg = "cannot connect to the server";
		}
		
		$stm = "SELECT ID  FROM Login_info WHERE Username = '$v_username' and Password = '$password' ";
		
		$result = $conn->query($stm);
	
		if($count = $result->num_rows == 1){
			$msg = "successful";
			
			$row = $result->fetch_assoc();
			
			$_SESSION['ID'] = $row['ID'];
			
			header("Location: admin_home.php");
			
		}else{
			$msg = "username or password is not correct";
		}
		$conn->close();
	
	}
	
}

?>

<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
							<input type="text" name="e_address" placeholder="Email Address" />
							<input type="text" name="passcode" placeholder="passcode" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" name="login" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>	
</body>
</html>
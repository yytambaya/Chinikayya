<!DOCTYPE html>
<html lang="en">
<head>
	<title>Landing Page</title>
	<meta name="index" content="non-index"/>
	<meta name="viewport" content="width=device-width, initial-scale=1 "/>
	<link rel="stylesheet" type="text/css" href=""/>
</head>

<body>
	
	<div id="sing_up">
		<form method="POST" action="signup_server.php">
			<p><h4> first name</h4>
			<p><input type="text" name="f_name" maxlength="40" class="field"/>
			<p><h4>last name</h4>
			<p><input type="text" name="l_name" maxlength="40" class="field"/>
			<p><h4>email address name</h4>
			<p><input type="text" name="e_address" maxlength="40" class="field"/>
			<p><h4>phone number</h4>
			<p><input type="number" name="p_num" maxlength="40" class="field"/>
			<p><h4>country</h4>
			<p><input type="dropbox" name="course" maxlength="40" class="field"/>
			<p><h4>state </h4>
			<p><input type="dropbox" name="state" maxlength="40" class="field"/>
			<p><h4>password 1</h4>
			<p><input type="password" name="pass1" maxlength="40" class="field"/>
			<p><h4>password 2</h4>
			<p><input type="password" name="pass2" maxlength="40" class="field"/>
			<p><h4>State your class</h4>
			<p><input type="checkbox" name="class"/>
				<option>Driver</option>
				<option>Driver</option>
				<option>Driver</option>
			<p><h4>By applying, you agree with our policy</h4>
			<p><input type="submit" name="apply" value="Apply" maxlength="40" id="submit"/>
		</form>
	</div>
	
</body>

</html>
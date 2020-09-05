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
	<form action="checkbox_server.php" method="POST">
	<p><input type="text" name="name" class="field" placeholder="Your Name"/>
	<p><input type="text" name="e_address" class="field" placeholder="Your Email Address"/>
	<p><label>Driver
	<p><input type="checkbox" class="box" name="driver" checked="checked"/>
	</label>
	<p><label>Business owner
	<p><input type="checkbox" class="box" name="b_owner" />
	</label>
	<p><label>Love African Foods
	<p><input type="checkbox" class="box" name="l_a_foods" />
	</label>	
	<p><h4>By applying, you agree with our policy</h4>
	<p><input type="submit" name="apply" value="Submit" id="submit"/>
	</form>
	</div>
	
</body>

</html>
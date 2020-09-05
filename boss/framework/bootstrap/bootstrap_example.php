<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap example</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale = 1"/>
	
	
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<script src="js/bootstrap.min.js" ></script>
	<script src="js/bootstrap.js" ></script>

	<!--
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	!-->
</head>

<body>	
	
	
		<nav class="navbar navbar-light">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="#" class="navbar-brand ">Affiliate Marketing Secret</a>
				</div>
		
				<ul class="nav navbar-nav">
					<li><a href="#" class="active" >topics</a></li>
					<li><a href="#">recent</a></li>
					<li><a href="#">subscribe</a></li>
					<li><a href="#">Links</a></li>
				</ul>
		
			</div>
			
	
		</nav>
	
	
	<div class="dropdown">
		<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Drop Down
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="#">Page 1</a></li>
			<li><a href="#">Page 2</a></li>
			<li><a href="#">Page 3</a></li>
			<li><a href="#">Page 4</a></li>
		</ul>	
		
	</div>
	

		<div class="container-fluid bg-info">
			<button class="btn btn-info" data-target="#p1" toggle="collapse">
				Click
			</button>
			<div id="p1" class="collapse">
				That is a good one
			</div>
	
		</div>

		<p>Form</p>
	
	<form class="form-block">
		<div class="form-group">
			<label>
				<p>username<input type="text" class="form-control" />
			</label>			
				<label>
					<p>password<input type="password" class="form-control" />
				</label>
				<textarea cols="5" rows="7" placeholder="write something here" class="form-control"></textarea>
				<input type="submit" value="Submit"/>
			</label>
	
		</div>
	</form>
	
</body>
</html>

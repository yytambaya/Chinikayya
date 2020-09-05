<!DOCTYPE>
<html>
<head>
	<meta name="charset" content="utf-8"/>
	<meta name="viewport" content="width=device-width initial-scale=1.0"/>
	<link rel="stylesheet" href="../framework/bootstrap/css/bootstrap.min.css"/>
	<style>
		@media print{
		.notprintable{
			display: none;
		}
		}
    </style>

</head>
<?php 
//require("../gen/gen/product.php");

	if(isset($_POST['logout'])){
	
		Customer::logOut($_SESSION['Customer_ID']);
		
	}

?>

<body>

<header>
		<div class="container notprintable">
			<div class="row">
				<div class="col-sm-8">
					<div><a href="C-customer-home.php" class="nav-link"><h4>Customer Dashboard</a></div>
				</div>
				<div class="col-sm-2">
					<image src="images/Custom/cand.png" class="img-round"/>
					<hr/>
				</div>
				<div class="col-2">
					<div class="container"></div>
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<button type="submit" style="margin-top: 10px" class="btn btn-info" name="logout">Logout</button>
					</form>
				</div>
			</div>	
			
			<div class="row">
				<div class="col"><hr/></div>
			</div>
			<div class="row">
			
				<div class="col-sm-3">
					<a href="C-Ordered_Products.php" class="nav-link">Ordered Products</a>
				</div>
				<div class="col-sm-3">
					<a href="C-Purchased_Products.php" class="nav-link">Purchased Products</a>
				</div>
				<div class="col-sm-3">
					<a href="C-Account.php" class="nav-link">Account</a>
				</div>
				
				<div class="col-3">
					<a href="C-Customer-supply.php" class="btn  bg-info text-white">Sell Product</a></button>
				</div>
		
			</div>
			<div class="row p-3">
				<div class="col-sm-12"></hr></div>
			</div>
			
			</div>			
			
		
		
	</header>


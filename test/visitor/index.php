<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Chinikayya</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<?php 

if(isset($_POST[''])){

	


}

?>


<?php require_once("gen/gen/product.php"); ?>

<?php require("visitor/header.php");?> 

<?php require("visitor/header_nav.php"); ?>
	
	<!--category -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php require("visitor/sidebar.php"); ?>
				</div>
				
				<div class="col-sm-9 padding-right">
					
					
					<div class="features_items"><!--Product List-->
						<h2 class="title text-center">Product List</h2>
				
				<?php 
					$products = CreateProduct::getLatestProducts();
					$count = 0;
					foreach($products["result"] as $product){
					
				?>
				
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										
										<div class="productinfo text-center">
											<img src="images/home/product1.jpg" alt="" />
											<h2><?php echo  $product['Name']; ?></h2>
											<p><small>&#8358</small><?php echo $product['Price'] ?></p>
											<form action="visitor/C-product-details.php" method="POST">
												<input type="hidden" name="id" value="<?php echo $product['ID']; ?>">
												<input type="submit" name="buy" value="Buy now" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
											</form>
										</div>
										
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><small>&#8358</small><?php echo $product['Price'] ?></h2>
												<p><?php echo $product['Name']; ?></p>
											<form action="C-product-details.php" method="POST">
												<input type="hidden" name="id" value="<?php echo $product['ID']; ?>">
												<input type="submit" name="buy" value="Buy now" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
											</form>
												
											</div>
										</div>
								</div>
								
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Review: <small>323</small></a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Purchase: <small>129</small></a></li>
									</ul>
								</div>
							</div>
						</div>
						
					<?php $count++; }?>	
				
					
					
					<?php require("visitor/recomended_products.php"); ?>
					
				</div>
			</div>
		</div>
		</div>
	</section>
	
	<?php require("visitor/footer.php"); ?>
	  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

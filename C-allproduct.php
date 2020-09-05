<?php

if(isset($_POST[''])){




}

?>


<?php require_once("gen/gen/product.php"); ?>

<?php require("header.php");?>

<?php require("header_nav.php"); ?>

	<!--category -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php require("sidebar.php"); ?>
				</div>

				<div class="col-sm-9 padding-right">


					<div class="features_items"><!--Product List-->
						<h2 class="title text-center">Product List</h2>

				<?php
					$products = CreateProduct::getAllProducts();
					$count = 0;
					if($products == 0 or $products == 1){
						echo "<div class='alert alert-primary'>There is no Product to buy!</div>";
					}else{

					foreach($products["result"] as $product){

				?>


						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">

										<div class="productinfo text-center">
											<img src="<?php echo 'boss/ProductImages/char'.$product['Image'].'.jpg'; ?>" alt="" />
											<h2><?php echo  $product['Name']; ?></h2>
											<p><small>&#8358 </small><?php echo $product['Price'] ?></p>
											<form action="C-product-details.php" method="POST">
												<input type="hidden" name="id" value="<?php echo $product['ID']; ?>">
												<input type="submit" name="buy" value="Buy now" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
											</form>
										</div>

										<div class="product-overlay">
											<div class="overlay-content">
												<h2><small>&#8358 </small><?php echo $product['Price'] ?></h2>
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
										<li><a href="#"><i class="fa fa-plus-square"></i>Reviews: <small>83</small></a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Purchases: <small>55</small></a></li>
									</ul>
								</div>
							</div>
						</div>

					<?php  }}?>



					<?php //require("recomended_products.php"); ?>

				</div>
				<div>
					<>
				</div>
			</div>
		</div>
	</section>

	<?php require("footer.php"); ?>

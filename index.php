
<?php

if(isset($_POST[''])){




}

?>


<?php require_once("gen/gen/product.php"); ?>

<?php require("header.php");?>

<?php require("header_nav.php"); ?>

<p class="p-3"><?php require("slider.php"); ?></p>

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
					$products = CreateProduct::getLatestProducts();
					//var_dump($products);
					if($products == 0 or $products == 0){

					    echo "<div class='alert alert-info'>Cannot connect to the server at this time</div>";
					}else{
					$count = 0;
					foreach($products["result"] as $product){

				?>


						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">

										<div class="productinfo text-center">
											<img src="
											<?php echo 'boss/ProductImages/char'.$product['Image'].'.jpg'; ?>" alt="" />
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

					<?php $count++; }}?>





				</div>
			</div>
		</div>
		</div>
	</section>

	<?php require("footer.php"); ?>

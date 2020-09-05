
<?php
require_once(('../../gen/visitor/header.php'));
require_once("../../gen/gen/product.php"); ?>


<?php require_once(('../../gen/visitor/sidebar.php')); ?>
<!--category -->
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--Product List-->
						<h2 class="title text-center">Product List</h2>
				
				<?php 
					$products = CreateProduct::getAllProducts();
					$count = 0;
					while($count < $products[1]){
					
				?>
				
						
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/product1.jpg" alt="" />
											<h2><?php echo $products[0]['Name']; ?></h2>
											<p><?php echo $products[0]['Price'] ?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy now</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo $products[0]['Price'] ?></h2>
												<p><?php echo $products[0]['Name']; ?></p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Buy now</a>
											</div>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Buy now</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Buy now</a></li>
									</ul>
								</div>
							</div>
						</div>
						
					<?php $count++; }?>	
				
					
					</div>
					
				</div>
			</div>
		</div>
	</section>
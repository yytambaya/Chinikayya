<?php
session_start();

if(isset($_POST['order'])){

	if(isset($_POST['product_id']) and preg_match('/^[0-9]+$/', $_POST['product_id'])){

		$_SESSION['Product_Id'] = $_POST['product_id'];

		header('Location: C-login_form.php');
	}

}

if(isset($_POST['buy']) and isset($_POST['id'])){

	$id = $_POST['id'];

	if(preg_match('/^[0-9]+$/', $id)){





?>






<?php require("header.php");?>

<?php require("header_nav.php"); ?>

<?php require_once("gen/gen/product.php"); ?>

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<?php require("slider.php"); ?>

				</div>
			</div>
		</div>
	</section><!--/slider-->

	<!--category -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php require("sidebar.php"); ?>
				</div>

				<div class="col-sm-9 padding-right">


	<?php $products = CreateProduct::getProductDetails($id); if($products == 0 or $products == 1){ echo "<div class='alert alert-info'>Product cannot be sold now, check later</div>"; }else{ ?>

	<?php foreach($products['result'] as $product){ ?>

	<!--<section>
		<div class="container">
			<div class="row">
				<!-- siude bar -->

				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo 'boss/ProductImages/char'.$product['Image'].'.jpg'; ?>" alt="" />
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">

								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>

									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>

						<div class="col-sm-7">


							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $product['Name']; ?></h2>
								<p><b>Description: </b><?php echo $product['Description']; ?></p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span>$<?php echo $product['Price']; ?></span>
									<label>Quantity:</label>
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
									<input type="hidden" name="product_id" value="<?php echo $product['ID']; ?>"/>
									<button type="submit" name="order" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Order now
									</button>
								</span>
								<p><?php if(!empty($product['Addition'])){ ?><b>Additional info: </b><?php echo $product['Addition']; } ?></p>
								<p><b>Brand:</b> Chinikayya</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->





				</div>
			</div>
		</div>
	</section>

<?php }}}require("footer.php");?>

<?php	}else{
				echo 'invalid product ID';

		}?>

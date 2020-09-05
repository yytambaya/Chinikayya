<?php require('includes/header.php'); ?>

<?php require_once('includes/head_nav.php'); ?>
<?php require_once('includes/slideshow.php'); ?>
	<!--category -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php require('includes/sidebar.php'); ?>
				</div>
				
				<div class="col-sm-9 padding-right">

					<?php require("includes/products.php"); ?>
				</div>
			</div>
		</div>
	</section>
<?php require_once('includes/footer.php'); ?>
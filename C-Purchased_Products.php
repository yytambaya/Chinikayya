<?php session_start();
require("gen/gen/product.php");
//require("gen/gen/config.php");
require("gen/visitor/methods/allmethods.php");
?>


<?php
if(isset($_SESSION['Customer_ID'])){


//<!-- Header -->
	 require_once("C-customer-header.php");
//<!--/Header -->
?>


<section>

	<div class="row">

			<div class="col-2">
			</div>

			<div class="col-8">
				<?php
						$accounts = Customer::getPurchasedProducts($_SESSION['Customer_ID']);

						if($accounts == 1 or $accounts == 0){

							echo "<div class='alert alert-info'>You do not have any purchased Product!</div>";
						}else{

						foreach($accounts["result"] as $account){

				?>
							<div class="container">
								<table class="table table-responsive-sm table-info table-bordered">
									<th>Ordered Products</th>
									<tr>
										<td><small>Products Name: <?php echo $account['Product_Id']; ?></small></td>
										<td><small>Quantity: <?php echo $account['Quantity']; ?></small></td>
										<td><small>Customer ID: <?php echo $account['Customer_Id']; ?></small></td>
										<td><small>Invoice ID: <?php echo $account['Invoice_ID']; ?></small></td>
										<td><small><button type="" name="">Print<button></small></td>
									</tr>
								</table>


					</div>
			</div>

			<div class="col-2">
			</div>
		</div>



		<?php
		}}
	?>



	</section>

	<!-- Footer -->

		<?php require_once("C-customer-footer.php"); ?>

	<!-- /Footer -->

<?php

}else{

	echo "<p>You don't have access to this page! <a href='javascript:;' onClick='history.go(-1)'>click here to return</a></p>";
}

?>

</body>
</html>

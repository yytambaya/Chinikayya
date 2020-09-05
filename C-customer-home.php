<?php session_start();
require("gen/gen/product.php");
//require("gen/gen/config.php");
require("gen/visitor/methods/allmethods.php");
?>


<?php
if(isset($_SESSION['Customer_ID'])){

 $state = "confirm";

//<!-- Header -->
	 require_once("C-customer-header.php");
//<!--/Header -->
?>


<section>

<?php

if(isset($_POST['confirm_order']) and isset($_POST['customer_id']) and isset($_POST['product_id'])){

	if(preg_match("%^[0-9]+$%", $_POST['customer_id']) and preg_match("%^[0-9]+$%", $_POST['product_id'])){

		$state = "receipt";

		$invoice_id =  generateInvoiceID($_POST['customer_id'], $_POST['product_id']);
		//print("Invoice: ".$invoice_id);

		$result = Customer::storeInvoice_Now($_POST['customer_id'], $_POST['product_id'], $invoice_id);
    if($result != 0 or $result != 1){
        echo "Your has order is successful";
    }else{
      echo "Your order has failed";
      //var_dump($result);
    }
		?>



	<div class="row">

			<div class="col-2">
			</div>

			<div class="col-8">
				<?php
					if(isset($_SESSION['Product_Id']) and isset($_SESSION['confirm_login'])){
						$products = CreateProduct::getProductById($_SESSION['Product_Id']);
						//$order =  setOrder($);
						foreach($products["result"] as $product){

				?>
							<div class="container">
								<table class="table table-responsive-sm table-info table-bordered">
									<th>Customer Order Receipt</th>
									<tr><td><small>Product Name: <?php echo $product['Name']; ?></small></td></tr>
									<tr><td><small>Customer ID: <?php echo $_POST['customer_id']; ?></small></td></tr>
									<tr><td><small>Product ID :<?php echo $product['ID']; ?></small></td></tr>
									<tr><td><small><b>Transaction ID</b> :#<?php echo $invoice_id; ?></small></td></tr>
									<tfoot>
										<tr><td><small>Total Amount: <?php  echo $product['Price']; ?><small></td></tr>
										<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-group">
											<input type="hidden" name="customer_id" value=""/>
											<input type="hidden" name=""/>
											<tr><td><button type="submit" name="confirm_order" onClick="window.print()" class="btn form-control bg-light">Print</button></td></tr>
										</form>
									</tfoot>
								</table>



					</div>
			</div>

			<div class="col-2">
			</div>
		</div>



		<?php
		}}}}
	?>


		<?php
					if(isset($_SESSION['Product_Id']) and isset($_SESSION['confirm_login']) and $state == "confirm"){

						$products = CreateProduct::getProductById($_SESSION['Product_Id']);

						foreach($products["result"] as $product){

				?>


		<div class="row">

			<div class="col-2">
			</div>

			<div class="col-8">

							<div class="container">
								<table class="table table-responsive-sm table-info table-bordered">
									<th>Confirm your order!</th>
									<tr><td><small>Product Name: <?php echo $product['Name']; ?></small></td></tr>
									<tr><td><small>Product ID :<?php echo $product['ID']; ?></small></td></tr>
									<tfoot>
										<tr><td><small>Total Amount: <?php  echo $product['Price']; ?><small></td></tr>
										<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-group">
											<input type="hidden" name="customer_id" value="<?php echo $_SESSION['Customer_ID']; ?>"/>
											<input type="hidden" name="product_id" value="<?php echo $product['ID']; ?>"/>
											<tr><td><button type="submit" name="confirm_order" class="btn form-control bg-light">Confirm Order</button></td></tr>
										</form>
									</tfoot>
								</table>



					</div>
			</div>

			<div class="col-2">
			</div>
		</div>
				<?php
						}
					}
				?>

			<div class="row">

				<div class="col-3">

				</div>
				<div class="col-6">
					<?php
						$accounts = Customer::getPurchasedProducts($_SESSION['Customer_ID']);

						if($accounts == 1 or $accounts == 0){

							echo "<div class='alert alert-info'>You don't have any purchased product</div>";
						}else{

						foreach($accounts["result"] as $account){

				?>
							<div class="container">
								<table class="table table-responsive-sm table-info table-bordered">
									<th>Ordered Product #<?php echo $account['Product_Id']; ?></th>
									<tr>
										<td><small>Products Name: <?php echo $account['Name']; ?></small></td>
										<td><small>Quantity: <?php echo $account['Quantity']; ?></small></td>
										<td><small>Transaction ID: #<?php echo $account['Invoice_ID']; ?></small></td>
										<td><button type="" name="" class="btn btn-info" JavaScript::onclick="window.print()">Print</button></td>
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

				</div>

				<div class="col-3">

				</div>

			</div>

		</div>

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

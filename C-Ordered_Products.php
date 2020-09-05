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
						$accounts = Customer::getOrderedProducts($_SESSION['Customer_ID']);

						if($accounts == 1 or $accounts == 0){

							echo "<div class='alert alert-info'>You don't have any ordered product!</div>";
              //echo $accounts;
            }else{
              echo "<br/>";
              echo "Ordered Products";
              echo "<div class='container'>";
              echo "<table class='table table-responsive-sm table-info table-bordered'>";
						foreach($accounts["result"] as $account){

				?>
							   <tr>
										<td><small>Products Name: <?php echo $account['Name']; ?></small></td>
										<td><small>Quantity: <?php echo $account['Quantity']; ?></small></td>
										<td><small>Customer ID: #<?php echo $account['Customer_Id']; ?></small></td>
                    <td><small>Invoice ID: #<?php echo $account['Invoice_ID']; ?></small></td>
										<td><button type="" name="" class="btn btn-info" JavaScript::onclick="window.print()">Print</button></td>
									</tr>
			</div>

			<div class="col-2">
			</div>
		</div>



		<?php
    }
    echo "</table>";
    echo "</div>";
    }
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

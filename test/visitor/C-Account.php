<?php session_start(); 
require("../gen/gen/product.php");
//require("../gen/gen/config.php"); 
require("../gen/visitor/methods/allmethods.php");
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
						$accounts = Customer::getAccount($_SESSION['Customer_ID']);
						
						foreach($accounts["result"] as $account){	
				
				?>
							<div class="container">
								<table class="table table-responsive-sm table-info table-bordered">
									<th>Account Information</th>
									<tr><td><small>First Name: <?php echo $account['F_name']; ?></small></td></tr>
									<tr><td><small>Last Name:<?php echo $account['L_name']; ?></small></td></tr>
									<tr><td><small>Email Address: <?php  echo $account['E_ADDRESS']; ?><small></td></tr>
									<tr><td><small>State: <?php  echo $account['State']; ?><small></td></tr>
									<tr><td><small>Country: <?php  echo $account['Country']; ?><small></td></tr>
									<tr><td><small>Phone Number: <?php  echo $account['Phone_no']; ?><small></td></tr>									
								</table>				
							
						
					</div>
			</div>
			
			<div class="col-2">
			</div>	
		</div>		
			
		
			
		<?php	
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



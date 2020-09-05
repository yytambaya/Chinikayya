<?php session_start(); 
require("gen/gen/product.php");
//require("../gen/gen/config.php"); 
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
			<div class="col-3">
				<div class="alert alert-info alert-lg">
					<p>Your Product will be reviewed and we'll get back to you soon!</p>
					<p>Thank you for your time</p>
				</div>
			
			</div>
			<div class="col-2">
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



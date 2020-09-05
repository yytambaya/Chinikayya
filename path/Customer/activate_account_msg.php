<?php
require_once("../../gen/visitor/header.php");
if(isset($id)){
?>
<div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Contact <strong>Us</strong></h2>    			    				    				
					<div id="gmap" class="contact-map">
					</div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	 
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Account registration</h2>
	    				<address>
	    					<p>Chinikayya Inc.</p>
							<p>Your registration is successful you can start shopping!</p>
							<p>Have fun!</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
<?php 	

require_once("../../gen/visitor/header.php"); 

}else{
	echo "You dont have access to this page";
}

?>
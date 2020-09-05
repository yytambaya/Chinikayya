 <?php
	    
if(isset($POST['submit'])){
	$driver = $_POST['driver'];
	$b_owner = $_POST['b_owner'];
	$l_a_foods = $_POST['l_a_foods'];
	       
   if($driver == 'checked')
		$class = "Driver";
   else if ($b_owner == 'checked')
		$class ="Business owner";
	       
	   else if($l_a_foods == 'checked') 
		$class = "Love African Foods";
	else
		$class = "none";
		
	if($class){
		require_once("config.php");
		$q = mysql_query("INSERT INTO checkbox VALUES('$class' , '')") or die("Registration failed, try again");
		mysql_close();
		if(mysql_affected_rows($q) == 2)
			echo "Registration is successful"; 
	}	
}
	 
?>

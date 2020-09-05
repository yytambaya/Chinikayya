<?php

if(isset($_POST['upload'])){
$file_path = "files/";
$file_path = $file_path.basename($_FILES['image']['name']);
$name = basename($_FILES['image']['name']);
		$check = getimagesize($_FILES['image']['tmp_name']);
		if($check !== false){
			echo "You upload an image with the following properties: <br/>";
			echo "Name: ".basename($_FILES['image']['name'])."<br/>";
			echo "basename: ".$file_path."<br/>";
			echo "Temporary name: ".$_FILES['image']['tmp_name']."<br/>";
			echo "Image size: ".$_FILES['image']['size']."<br/>";
			echo "Image size: ".$_FILES['image']['type']."<br/>";
			
			if(move_uploaded_file($_FILES['image']['tmp_name'], $file_path)){
				echo $name." is saved!";
			}
			
			
		}else{
			echo  "This is not an image";  
		}
	
	
}	





?>

<html>
<body>
<form name="" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<p>Select File: <input type="file" name="image" value="<?php if(isset($file_path)) echo $file_path; ?>"/>
<p><input type="submit" name="upload" value="upload" />
</form>
</body>
</html>
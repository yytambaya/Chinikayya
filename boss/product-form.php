<?php

//require_once("../gen/gen/config.php");

require_once("../gen/gen/product.php");

if(isset($_POST['create'])){

$v_name = $v_description = $v_status = $v_price = $v_image = $v_addition =  $v_category = "";

	$domain = $_SERVER['PHP_SELF'];

	$n_cond = '%^[a-zA-Z0-9\s\.\',()-]{2,50}$%';

	$d_cond = '%^[a-zA-Z0-9\s\.\',()-]{2,100}$%';

	$s_cond = '%^[(0|1)?]{1}$%';

	$p_cond = '%^[0-9\.?]{1,6}$%'; #make it to float limit letter

	$c_cond = '%^[a-zA-Z\s\b]{2, 100}$%';


	if(empty($_POST['name'])){

		$n_error = "Name is required";

	}else{

		$name = check($_POST['name']);

		if(preg_match($n_cond, $_POST['name'])){

			$p_name = check($_POST['name']);

			$v_name = true;

		}else{

			$n_error = "name must contain alphabets only";
		}
	}

	if(empty($_POST['description'])){

		$d_error = "description is required";

	}else{

		$description = check($_POST['description']);

		if(preg_match($n_cond, $_POST['description'])){

			$p_description = check($_POST['description']);

			$v_description = true;

		}else{

			$d_error = "description should only contain alphabets and @.,# and $";
		}
	}

	if(empty($_POST['price'])){


		$p_error = "price is required";

	}else{

		$price = check($_POST['price']);

		if(preg_match($p_cond, $_POST['price'])){

			$p_price = check($_POST['price']);

			$v_price = true;

		}else{

			$p_error = "price must contain a number or decimal number only";
		}
	}

	if(empty($_POST['status'])){

		$s_error = "status is required";

	}else{

		$p_status = check($_POST['status']);

		if(preg_match($s_cond, $_POST['status'])){

			$p_status = check($_POST['status']);

			$v_status = true;

		}else{

			$s_error = "status must be 0 or 1";
		}
	}

	if(empty($_FILES['image']['name'])){

		$i_error = "An image required";

	}else{

		$image_path = "ProductImages/";

		$image_path = $image_path.basename($_FILES['image']['name']);
		$check = getimagesize($_FILES['image']['tmp_name']);
		if($check == true){

			$i_status = check($_FILES['image']['name']);

				if(preg_match($n_cond, $_FILES['image']['name'])){
					$p_image = 10;

					$v_image = true;
					/*if(move_uploaded_file($_FILES['image']['tmp_name'], $image_path)){


						
						}else{
							$i_error = "This image already exist!";
						}*/

				}else{

					$s_error = "image must contain alphabets only";
				}
			}else{
				$i_error = "This is not an image";
			}
		}



	if(empty($_POST['addition'])){


		$p_addition = check($_POST['addition']);

		$v_addition = true;


	}else{

		//$addition = check($_POST['addition']);

		if(preg_match($d_cond, $_POST['addition'])){

			$p_addition = check($_POST['addition']);

			$v_addition = true;

		}else{

			$a_error = "Additional information can only contain alphabets and @.,# and $";
		}
	}

	if(empty($_POST['category'])){

		$c_error = "category is required";

	}else{

		$category = check($_POST['category']);

		if(preg_match($n_cond, $_POST['category'])){

			$p_category = check($_POST['category']);

			$v_category = true;

		}else{

			$c_error = "category must contain alphabets only";
		}
	}



	if($v_name && $v_description && $v_image && $v_status && $v_price && $v_addition && $v_category){

		#$product = new CreateProduct();

		$result = CreateProduct::storeProduct($p_name, $p_description, $p_price, $p_image, $p_status, $p_category, $p_addition);

		if($result == 2){
			$info = "Product is successfully uploaded";
		}else{
			$info = $result;
		}

	}else{
		$info = "can't create a new product";
	}


}

?>



<div class="container">

<div id="page-wrapper-form">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create a New Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
					<div class="alert bg-info"><?php if(isset($info)) echo $info; ?></div>
                    <div class="panel panel-default">
                        <div class="panel-heading text-info">
                            You should enter all information
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-6">
									<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
										<div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="name" value="<?php if(isset($name)) echo $name; ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
											<span class="alert text-danger"><?php if(isset($n_error)) echo $n_error; ?></span>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description"  class="form-control" maxlength="200" rows="3" ><?php if(isset($description)) echo $description; ?></textarea>
										</div>
											<div class="form-group">
												<span class="alert text-danger"><?php if(isset($d_error)) echo $d_error; ?></span>
											</div>

										 <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="file" name="image" value="<?php if(isset($image)) echo $image; ?>"/>
											<span class="alert text-danger"><?php if(isset($i_error)) echo $i_error; ?></span>
                                        </div>

										<label>Status</label><br/>

                                        <div class="custom-control custom-radio custom-control-inline">

                                                <input type="radio" class="custom-control-input" name="status" id="optionsRadiosInline1" value=1 checked/>
                                            <label class="custom-control-label" for="optionsRadiosInline1">
												Active
											</label>
										</div>

										<div class="custom-control custom-radio custom-control-inline">

											<input type="radio" class="custom-control-input" name="status" id="optionsRadiosInline2" value=0 />
                                            <label class="custom-control-label" for="optionsRadiosInline2">
												Inactive
											</label>
                                        </div>
										<div class="form-group">
											<span class="alert text-danger"><?php if(isset($s_error)) echo $s_error; ?></span>
										</div>

										<div class="for-group">

											<select class="form-control" name="category">
												<option value="Phones">Phone and Accessories</option>
												<option value="Houses">Houses for rent/sale</option>
												<option value="Computers">Computers</option>
												<option value="Books">Books</option>
												<option value="Clothes">Clothes</option>
											</select>
										</div>
										<div class="form-group">
											<span class="alert text-danger"><?php if(isset($c_error)) echo $c_error; ?></span>
										</div>

										<div class="container-fluid">

                                        <input type="submit" name="create" class="btn btn-default" value="Create"/>

										</div>



                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">

										<p class="display-4">price</p>
                                        <div  class="form-group input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="text" name="price" value="<?php if(isset($price)) echo $price; ?>" class="form-control"/>
                                            <span class="input-group-addon">.00</span>
                                        </div>
										<div class="form-group">
											<span class="alert text-danger"><?php if(isset($p_error)) echo $p_error; ?></span>
										</div>

										<div class="form-group">
                                            <label>Additional information</label>
                                            <textarea class="form-control" name="addition" maxlength="150" rows="3"><?php if(isset($addition)) echo $addition; ?></textarea>
										</div>
										<div class="form-group">
											<span class="alert text-danger"><?php if(isset($a_error)) echo $a_error; ?></span>
										</div>


                                    </form>

                                </div>


                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		</div>
	</div>

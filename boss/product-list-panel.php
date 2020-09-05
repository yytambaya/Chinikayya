<?php require("../gen/gen/product.php"); ?>	
	<div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="home.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>

          <!-- Page Content -->
          <h1>Product List</h1>
          <hr>
		  <?php $products = CreateProduct::getAllProductsAdmin();
				if($products == 0 or $products == 1){
					echo "<div class='alert alert-info'>You do not have any purchased Product!</div>";
				}else{ ?>
				<table class="table">
			<thead></thead>
			<?php foreach($products['result'] as $product){ ?>
			<tr>
				<a><td><?php echo $product['ID'] ?></td></a>
				<td><a><?php echo $product['Name'] ?></a></td>
				<td><a>$<?php echo $product['Price'] ?></a></td>
				<td><a href=""><button type="submit" name="edit" class="btn btn-info">Edit</button></a></td>
				<td><a href=""><button type="submit" name="delete" class="btn btn-info">Delete</button></a></td>
			</tr>		
			<?php }}?>			
			<tfoot></tfoot>
		  </table>

	</div>
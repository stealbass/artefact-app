<?php
 
 require("libs/config.php");

 ?>
<?php include('header.php'); ?> 

  <div class="container">
  <br>
 <div class="row-fluid">
  <div class="span12">

    <div class="row-fluid">
      <div class="span12">
	 <div class="span9">
	  
      
<div class="alert alert-success">
<h4>Products</h4>
	  </div>
<legend></legend>
	  
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
 
  <thead>
    <tr>
      <th>Brand Name</th>
      <th>Product Name</th>
      <th>Description</th>
      <th>Cont</th>
      <th width="80">Total Price</th>
      <th>Photo</th>
      <th width="180">Action</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
  $query = $pdo->prepare("select * from tbl_produits ORDER BY prodID ");
			$query->execute();
			while($product = $query->fetch()){
	$id=$product['prodID'];

	?>
	
    <tr>
      <td><?php echo $product['prodBrand']; ?></td>
      <td><?php echo $product['prodTitle']; ?></td>
	  <td><?php echo $product['prodDesc']; ?></td>
      <td><?php echo $product['prodCont']; ?></td>
      <td><?php echo $product['prodAmount']; ?></td>
      <td width="100"><img class="img-rounded" src="<?php echo $product['prodImg']; ?>" width="100"></td>
      <td> <a href="edit-produit.php?id=<?php  echo $id;?>" class="btn btn-warning" ><i class="icon-pencil icon-large"></i>&nbsp; Edit</a>
	<a href="#delete<?php echo $id; ?>" a data-toggle="modal" class="btn btn-danger">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a></td>
	
	<?php 
	include('modal_delete_product.php');
	?>
	
	
	  <?php } 
	  
?>
    </tr>
	
  </tbody>
  </table>

	  </div> 

	  
	  
	  <?php
	  
	  include('session_sidebar.php');
	  ?>
	   <div class="well">
	  <a button class="btn btn-block btn-success" type="button" href="add-produit.php" role="button"><i class="icon-pencil"></i> Add Products</button></a>

	  </div>
	   <div class="well">
	  <a button class="btn btn-block btn-success" type="button" href="add-brand.php" role="button"><i class="icon-pencil"></i> Add Brand</button></a>

	  </div>
	  
	  </div>
    </div>
  </div>
</div>
  </div>
<?php include('footer.php'); ?>
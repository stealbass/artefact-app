<div id="adddessert" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  <div class="alert alert-gray">
  Add Product
  </div>
  <div class="modal-body">
  <hr>
 <form class="form-horizontal" method="POST" enctype="multipart/form-data">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Product Name</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="Product_Name" placeholder="Product Name" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Price</label>
    <div class="controls">
      <input type="text" id="inputPassword" name="Price" placeholder="Price" required>
    </div>
  </div>
  
   <div class="control-group">
    <label class="control-label" for="inputPassword">Description</label>
    <div class="controls">
<textarea name="Description" rows="5" required></textarea>
    </div>
  </div>
  
  
								<div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="font" required> 
                                    </div>
                                </div>
 

  </div>
  <div class="modal-footer">
    <button name="add_product" type="submit" class="btn btn-success"><i class="icon-save"></i>&nbsp;Save</button>
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
    </form>  
  </div>
</div>


<?php
		if(isset($_POST['add_product'])){
		$Prodname=$_POST['Product_Name'];
		$price=$_POST['Price'];
		$desc=$_POST['Description'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $Photo = "upload/" . $_FILES["image"]["name"];
		
		
		$query = $pdo->query("insert into products (Name, Price, Description, Photo) VALUES('$Prodname','$price','$desc','$Photo')");
		header('location:product.php');
		
		
		}
		?>
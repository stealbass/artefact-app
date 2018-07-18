<?php

include_once 'dbconfig.php';



 require("libs/config.php");

 include("header.php");

?>



<script type="text/javascript">

$(document).ready(function()

{

	$(".country").change(function()

	{

		var id=$(this).val();

		var dataString = 'id='+ id;

	

		$.ajax

		({

			type: "POST",

			url: "get_state.php",

			data: dataString,

			cache: false,

			success: function(html)

			{

				$(".state").html(html);

			} 

		});

	});

	

	

	$(".state").change(function()

	{

		var id=$(this).val();

		var dataString = 'id='+ id;

	

		$.ajax

		({

			type: "POST",

			url: "get_city.php",

			data: dataString,

			cache: false,

			success: function(html)

			{

				$(".city").html(html);

			} 

		});

	});

	

});

</script>



 <div class="container">



    <div class="row-fluid">

      <div class="span12">

	 <div class="span9">

<div class="alert alert-success">

<h4>Edit Product</h4>

	  </div>

<div>

<legend></legend>

<form class="" method="POST" enctype="multipart/form-data">

  <?php 



	$res = $conn->query("SELECT * FROM tbl_produits WHERE prodID = ".$_GET['id']);

			$row = $res->fetch();

	?>

  <div class="control-group">

    <label class="control-label" for="inputEmail">Actif</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="actif" required value="1" <?php if ($row['prodActif'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="actif" required value="2" <?php if ($row['prodActif'] == '2') { echo 'checked'; } ?> />NON

    </div>

  </div>
  

    <div class="control-group">
    
    <label class="control-label" for="inputEmail">Title</label>

    <div class="controls">

    <input name="id" value="<?php echo $row['prodID']; ?>" type="hidden" id="inputEmail" placeholder="ID">

    <input name="title" value="<?php echo $row['prodTitle']; ?>" type="text" id="inputEmail" placeholder="Blog Title">

    </div>

    </div>


  <div class="control-group">
  
    <label class="control-label" for="inputEmail">Genre</label>

    <div class="controls">

      <input value="<?php echo $row['prodCont']; ?>" type="text" id="inputEmail" name="contenance" placeholder="genre" required class="span3">

    </div>

  </div>

    <div class="control-group">

    <label class="control-label" for="inputPassword">Content:</label>

    <div class="controls">

	<textarea rows="7" class="span8" placeholder="Write your blogs here..!" name="content" ><?php echo $row['prodDesc']; ?></textarea>  

    </div>

    </div>

  <div class="control-group">

    <label class="control-label" for="inputEmail" >Quantity</label>

    <div class="controls">

      <input type="number"  id="inputEmail" name="quantity" value="<?php echo $row['qty']; ?>" required class="span3">

    </div>

  </div>

  <div class="control-group">

    <label class="control-label" for="inputEmail">Price</label>

    <div class="controls">

      <input type="number" id="inputEmail" name="price" value="<?php echo $row['prodPrice']; ?>" required class="span3">

    </div>

  </div>

  

    <div class="control-group">

<select name="country" class="country">



<option selected="selected"><?php echo $row['cat_id']; ?></option>



</select>



<select name="state" class="state">

<option selected="selected"><?php echo $row['subcat_id']; ?></option>

</select>



</div>

	<img src="<?php echo $row['prodImg']; ?>"  width="180"/>

	<div class="control-group">

      <label class="control-label" for="input01">Photo:</label>

     <div class="controls">

     <input type="file" name="image" required class="font"> 

      </div>

      </div>

</div>

  

	<button name="edit" type="submit" class="btn btn-large btn-success"><i class="icon-save"></i>&nbsp;Save</button>

    </form>  



</div>

	<div style="margin-bottom: 21px;" class="pull-right">

                    <a class = "btn btn-primary" href = "product.php" ><i class = "fa fa-arrow-left"></i>Retour</a>

                </div>

<br />

</div>

</div>

</div>

		<?php

	if (isset($_POST['edit'])){

		$id = $_POST['id'];

		$cat = $_POST['country'];

		$subcat = $_POST['state'];

		$title=$_POST['title'];

		$prodSlug = slug($title);	

		$Contenance = $_POST['contenance'];

		$content = addslashes ($_POST['content']);

		$quantity = $_POST['quantity'];

		$price = $_POST['price'];

		$actif = $_POST['actif'];
		

								 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                                $image_name = addslashes($_FILES['image']['name']);

                                $image_size = getimagesize($_FILES['image']['tmp_name']);



                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);

                                $photo = "upload/" . $_FILES["image"]["name"];



			try {
	

	$query = $conn->query("update tbl_produits set cat_id = '$cat', subcat_id = '$subcat', prodTitle = '$title', prodCont = '$Contenance', prodSlug = '$prodSlug', prodDesc = '$content', qty = '$quantity', prodPrice = '$price', prodImg='$photo', prodActif = '$actif' where prodID = '$id' ");

			
	//redirect to index page
				header('Location: product.php');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

	

	

	}

	

 include("footer.php");

	?>
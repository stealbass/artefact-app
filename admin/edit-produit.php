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

    <div class="controls">

    <input name="id" value="<?php echo $row['prodID']; ?>" type="hidden" id="inputEmail" placeholder="ID">

    <input name="title" value="<?php echo $row['prodTitle']; ?>" type="text" id="inputEmail" placeholder="Blog Title">

    </div>

    </div>

  <div class="control-group">

    <label class="control-label" for="inputEmail">Brand</label>

    <div class="controls">

      <input type="text" class="span10" id="inputEmail" name="brand" value="<?php echo $row['prodBrand']; ?>" required class="span3">

    </div>

  </div>

  <div class="control-group">

    <div class="controls">

      <input value="<?php echo $row['prodCont']; ?>" type="text" id="inputEmail" name="contenance" placeholder="contenance" required class="span3">

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

    <label class="control-label" for="inputEmail">Réduction</label>

    <div class="controls">

      <input type="number" id="inputEmail" name="discount" value="0" placeholder="" required class="span3">

    </div>

  </div>
  
  <div class="control-group">

    <label class="control-label" for="inputEmail">Date d'Expiration Réduction</label>

    <div class="controls">

      <input type="date" id="Date" name="discountdate" value="<?php echo $row['prodDiscdate']; ?>" placeholder="" class="span3">

    </div>

  </div>


	

  <div class="control-group">

    <label class="control-label" for="inputEmail">Gel</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="gel" required value="1" <?php if ($row['prodGel'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="gel" required value="2" <?php if ($row['prodGel']== '2') { echo 'checked'; } ?> />NON

    </div>

  </div>

  <div class="control-group">

    <label class="control-label" for="inputEmail">Deo</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="deo" required value="1" <?php if ($row['prodDeo'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="deo" required value="2" <?php if ($row['prodDeo'] == '2') { echo 'checked'; } ?> />NON

    </div>

  </div>

  <div class="control-group">

    <label class="control-label" for="inputEmail">Lait</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="lait" required value="1" <?php if ($row['prodLait'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="lait" required value="2" <?php if ($row['prodLait'] == '2') { echo 'checked'; } ?> />NON

    </div>

  </div>

  <div class="control-group">

    <label class="control-label" for="inputEmail">Parfum</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="parf" required value="1" <?php if ($row['prodParfum'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="parf" required value="2" <?php if ($row['prodParfum'] == '2') { echo 'checked'; } ?> />NON

    </div>

  </div>
		
  <div class="control-group">

    <label class="control-label" for="inputEmail">Savon</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="sav" required value="1" <?php if ($row['prodSavon'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="sav" required value="2" <?php if ($row['prodSavon'] == '2') { echo 'checked'; } ?> />NON

    </div>

  </div>

	<img src="<?php echo $row['prodImg']; ?>"  width="180"/>

	<div class="control-group">

      <label class="control-label" for="input01">Photo:</label>

     <div class="controls">

     <input type="file" name="image" required class="font"> 

      </div>

      </div>

  

    <div class="control-group">

<select name="country" class="country">



<option selected="selected"><?php echo $row['cat_id']; ?></option>



</select>



<select name="state" class="state">

<option selected="selected"><?php echo $row['subcat_id']; ?></option>

</select>



<select name="city" class="city">

<option selected="selected"><?php echo $row['downcat_id']; ?></option>

</select>

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

		$downcat = $_POST['city'];

		$brand = $_POST['brand'];

		$title=$_POST['title'];

		$prodSlug = slug($title);	

		$Contenance = $_POST['contenance'];

		$content = addslashes ($_POST['content']);

		$quantity = $_POST['quantity'];

		$discount = $_POST['discount'];
		
		$discountdate = $_POST['discountdate'];

		$price = $_POST['price'];

		$fffffff = $price-($discount/100*$price);

		$gel = $_POST['gel'];

		$deo = $_POST['deo'];

		$lait = $_POST['lait'];
		
		$parfum = $_POST['parf'];
		
		$savon = $_POST['sav'];

		$actif = $_POST['actif'];
		

								 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                                $image_name = addslashes($_FILES['image']['name']);

                                $image_size = getimagesize($_FILES['image']['tmp_name']);



                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);

                                $photo = "upload/" . $_FILES["image"]["name"];



	

	$query = $conn->query("update tbl_produits set cat_id = '$cat', subcat_id = '$subcat', downcat_id = '$downcat', prodBrand = '$brand', prodTitle = '$title', prodCont = '$Contenance', prodSlug = '$prodSlug', prodDesc = '$content', qty = '$quantity', prodPrice = '$price', prodDiscount = '$discount', prodDiscdate = '$discountdate', prodAmount = '$fffffff', prodGel = '$gel', prodDeo = '$deo', prodLait = '$lait', prodParfum = '$parfum', prodSavon = '$savon', prodImg='$photo', prodActif = '$actif' where prodID = '$id' ");

			

	header('location:product.php');

	

	

	}

	

 include("footer.php");

	?>
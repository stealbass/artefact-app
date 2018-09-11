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

    <input type="hidden" name="user" value="<?php echo $row['prodUser']; ?>" />

  <div class="control-group">

    <label class="control-label" for="inputEmail">Actif</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="actif" required value="1" <?php if ($row['prodActif'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="actif" required value="0" <?php if ($row['prodActif'] == '0') { echo 'checked'; } ?> />NON

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
  
    <label class="control-label" for="inputEmail">Author</label>

    <div class="controls">

      <input value="<?php echo $row['prodCont']; ?>" type="text" id="inputEmail" name="contenance" placeholder="author" required class="span3">

    </div>

  </div>

    <div class="control-group">

    <label class="control-label" for="inputPassword">Content:</label>

    <div class="controls">

	<textarea rows="7" class="span8" placeholder="Write your blogs here..!" name="content" ><?php echo $row['prodDesc']; ?></textarea>  

    </div>

    </div>

  <div class="control-group">

    <label class="control-label" for="inputEmail" >Audience</label>

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

  

   <div class="form-group">


                                    <label for="input01">Category</label>
<select name="country" class="country">

<option selected="selected" class="form-control">--Select menu--</option>

<?php

	$stmt = $conn->prepare("SELECT * FROM tbl_main");

	$stmt->execute();

	while($drow=$stmt->fetch(PDO::FETCH_ASSOC))

	{

		?>

        <option value="<?php echo $drow['cat_id']; ?>" class="form-control"><?php echo $drow['cat_name']; ?></option>

        <?php

	} 

?>

</select>



                                    <label for="input01">Sub category</label>
<select name="state" class="state">

<option selected="selected" class="form-control">--Select Sub--</option>

</select>




</div>
  <div class="form-group">

                                    <label for="input01">Couverture:</label>


    <input type="hidden" name="image" value="<?php echo $row['prodImg']; ?>" />


                                </div>
<img src="<?php echo $row['prodImg']; ?>"  width="180"/>

  <div class="form-group">

                                    <label for="input01">Fichier pdf:</label>


    <input type="hidden" name="pdf" value="<?php echo $row['prodPdf']; ?>" />


                                </div>
                                <object
  data="<?php echo $row['prodPdf']; ?>"
  type="application/pdf"
  width="50%"
  height="100%">
  <iframe
    src="<?php echo $row['prodPdf']; ?>"
    width="50%"
    height="100%"
    style="border: none;">
    <p>Your browser does not support PDFs.
      <a href="<?php echo $row['prodPdf']; ?>">Download the PDF</a>.</p>
  </iframe>
</object>


</div>

  

	<button name="edit" type="submit" class="btn btn-large btn-success"><i class="icon-save"></i>&nbsp;Save</button>

    </form>  



</div>

	<div style="margin-bottom: 21px;" class="pull-right">

                    <a class = "btn btn-primary" href = "home.php" ><i class = "fa fa-arrow-left"></i>Retour</a>

                </div>

<br />

</div>

</div>

</div>

		<?php

	if (isset($_POST['edit'])){

		$user = $_POST['user'];

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
		
        $photo = $_POST['image'];
		
        $Pdf = $_POST['pdf'];
		



			try {
	

	$query = $conn->query("update tbl_produits set cat_id = '$cat', subcat_id = '$subcat', prodTitle = '$title', prodCont = '$Contenance', prodSlug = '$prodSlug', prodDesc = '$content', qty = '$quantity', prodPrice = '$price', prodImg='$photo', prodActif = '$actif', prodUser = '$user', prodPdf = '$Pdf' where prodID = '$id' ");

			
	//redirect to index page
				header('Location: home.php');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

	

	

	}

	

 include("footer.php");

	?>
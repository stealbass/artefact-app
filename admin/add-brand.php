<?php

include_once 'dbconfig.php';



require("libs/config.php");

  include('header.php');

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

  <br>

 <div class="row-fluid">



    <div class="row-fluid">

      <div class="span12">

	 <div class="span9">

<div>

<div class="alert alert-success">

<h4>Add Brand</h4>

	  </div>

<legend></legend>

<form class="" method="POST" enctype="multipart/form-data">

  <div class="control-group">

    <label class="control-label" for="inputEmail">Brand</label>

    <div class="controls">

      <input type="text" class="span10" id="inputEmail" name="brand" placeholder="Brand" required class="span3">

    </div>

  </div>

  

   <div class="control-group">

                                    <div class="controls">

<select name="country" class="country">

<option selected="selected">--Select menu--</option>

<?php

	$stmt = $conn->prepare("SELECT * FROM tbl_main");

	$stmt->execute();

	while($row=$stmt->fetch(PDO::FETCH_ASSOC))

	{

		?>

        <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>

        <?php

	} 

?>

</select>



<select name="state" class="state">

<option selected="selected">--Select Sub--</option>

</select>



<select name="city" class="city">

<option selected="selected">--Select Down--</option>

</select>

</div>

</div>

    <div class="controls">

    <button name="addinfo" type="submit" class="btn btn-success"><i class="icon-pencil"></i>&nbsp;Post</button>

    </div>

	</form>  



</div>

<br />

</div>

	<div style="margin-bottom: 21px;" class="pull-right">

                    <a class = "btn btn-primary" href = "product.php" ><i class = "fa fa-arrow-left"></i>Retour</a>

                </div>

</div>

</div>

</div>

</div>

<?php

		if(isset($_POST['addinfo'])){

		$cat = $_POST['country'];

		$subcat = $_POST['state'];

		$downcat = $_POST['city'];

		$brand = $_POST['brand'];

		

		

		$query = $conn->query("update tbl_produits set cat_id = '$cat', subcat_id = '$subcat', downcat_id = '$downcat', prodBrand = '$brand' where downcat_id = '$downcat' ");

	

			

	    header('location:product.php');

		

		}

		

		?>
<form class="" method="POST" enctype="multipart/form-data">


  

   <div class="control-group">

                                    <div class="controls">

<select name="brand" class="brand">

<option selected="selected">--Select menu--</option>

<?php

	$stmt = $conn->prepare("SELECT * FROM tbl_downsub");

	$stmt->execute();

	while($row=$stmt->fetch(PDO::FETCH_ASSOC))

	{

		?>

        <option value="<?php echo $row['downcat_id']; ?>"><?php echo $row['downcat_name']; ?></option>

        <?php

	} 

?>

</select>
</div>
</div>

    <div class="controls">

    <button name="modifbrand" type="submit" class="btn btn-success"><i class="icon-pencil"></i>&nbsp;Modif</button>

    </div>
</form>


<?php   include('footer.php'); ?>


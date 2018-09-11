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

<div class="alert alert-success">

<h4>Add SubMenu</h4>

	  </div>

<legend></legend>

<div>

<form class="form-horizontal" method="POST" enctype="multipart/form-data">

   <div class="control-group">

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

</div>



  <div class="control-group">

                                    <label class="form-control" for="input01">Image:</label>

                                    <div class="controls">

                                        <input type="file" name="image" class="font" required> 

                                    </div>

                                </div>

  <div class="control-group">

<input type="text" placeholder="menu name :" name="sub_down_name" />

<button type="submit" name="add_down_menu" class="btn btn-success">Add down menu</button>

</form>

</div>



</div>

<br />

</div>

	<div style="margin-bottom: 21px;" class="pull-right">

                    <a class = "btn btn-primary" href = "add_menu.php" ><i class = "fa fa-arrow-left"></i>Retour</a>

                </div>

</div>

</div>

</div>

</div>

<?php



if(isset($_POST['add_down_menu']))

{

 $parent = $_POST['state'];

 $proname = $_POST['sub_down_name'];

 $catSlug = slug($proname);

 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                                $image_name = addslashes($_FILES['image']['name']);

                                $image_size = getimagesize($_FILES['image']['tmp_name']);



                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);

                                $Photo = "upload/" . $_FILES["image"]["name"];

 $sql=$conn->prepare("INSERT INTO tbl_downsub(subcat_id,downcat_name,catSlug,photo) VALUES('$parent','$proname', '$catSlug', '$Photo')");

	$sql->execute();

			

		

}

		?>



<?php   include('footer.php'); ?>


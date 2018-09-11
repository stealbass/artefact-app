<?php

include_once 'dbconfig.php';



 require("libs/config.php");

 include("header.php");

?>









 <div class="container">

  <br>  

 <div class="row-fluid">



    <div class="row-fluid">

      <div class="span12">

	 <div class="span9">

<div class="alert alert-success">

<h4>Edit Info</h4>

	  </div>

<legend></legend>	

<div>

<form class="" method="POST" enctype="multipart/form-data">

  <?php 



	$res = $conn->query("SELECT * FROM tbl_info WHERE Information_ID = ".$_GET['id']);

			$row = $res->fetch();

	?>

  <div class="control-group">

    <label class="control-label" for="inputEmail">BioCare</label>

    <div class="controls">
    
	 <input type="radio" class="radio-inline" id="inputEmail" name="BioCare" required value="1" <?php if ($row['BioCare'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="BioCare" required value="2" <?php if ($row['BioCare'] == '2') { echo 'checked'; } ?> />NON
	</div>

  </div>
    <div class="controls">

    <label class="control-label" for="">Title:</label>

    <input name="id" value="<?php echo $row['Information_ID']; ?>" type="hidden" id="inputEmail" placeholder="ID">

    <input name="title" value="<?php echo $row['Title']; ?>" type="text" id="inputEmail" placeholder="Blog Title">

    </div>

    </div>

	  <div class="control-group">

		<label class="control-label" for="">Bref</label>

		<div class="controls">

	<textarea rows="7" class="span8" placeholder="Write your details here..!" name="bref"><?php echo $row['Bref']; ?></textarea>

    </div>

	  </div>

    <div class="control-group">

    <label class="control-label" for="">Content:</label>

    <div class="controls">

	<textarea rows="7" class="span8" placeholder="Write your blogs here..!" name="content"><?php echo $row['Content']; ?></textarea>  

    </div>

    </div>

	

		

	<img src="<?php echo $row['Photo']; ?>"  width="180"/>

	<div class="control-group">

      <label class="control-label" for="input01">Photo:</label>

     <div class="controls">

     <input type="file" name="image" required class="font"> 

      </div>

      </div>

 

	<button name="edit" type="submit" class="btn btn-large btn-success"><i class="icon-save"></i>&nbsp;Save</button>

    </form>  



</div>

	<div style="margin-bottom: 21px;" class="pull-right">

                    <a class = "btn btn-primary" href = "info.php" ><i class = "fa fa-arrow-left"></i>Retour</a>

                </div>

<br />

</div>

</div>

</div>

</div>

</div>

		<?php

	if (isset($_POST['edit'])){

		$id = $_POST['id'];
		
		$BioCare=$_POST['BioCare'];

		$title=$_POST['title'];

		$postSlug = slug($title);

		$bref = addslashes ($_POST['bref']);		

		$con = addslashes ($_POST['content']);

	

	

								 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                                $image_name = addslashes($_FILES['image']['name']);

                                $image_size = getimagesize($_FILES['image']['tmp_name']);



                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);

                                $photo = "upload/" . $_FILES["image"]["name"];



	
											
	$smt = "UPDATE tbl_info SET BioCare=:bioCare, Title=:title, postSlug=:postSlug, Bref=:bref, Content=:content, Photo=:photo WHERE Information_ID = :id";
	$qly = $conn->prepare($smt);
	$qly->execute(array(':id'=>$id,':bioCare'=>$BioCare,':title'=>$title,':postSlug'=>$postSlug,':bref'=>$bref,':content'=>$con,':photo'=>$photo));

		

	header('location:info.php');

	

	

	}

	?>



<?php   include('footer.php'); ?>


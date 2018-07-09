<?php

include_once 'dbconfig.php';



require("libs/config.php");

  include('header.php');

?>





 <div class="container">

  <br>  

 <div class="row-fluid">



    <div class="row-fluid">

      <div class="span12">

	 <div class="span9">

<div class="alert alert-success">

<h4>Add Conseil</h4>

	  </div>

<legend></legend>	

<div>

<form class="" method="POST" enctype="multipart/form-data">

  <?php 



	$res = $conn->query("SELECT * FROM tbl_conseil WHERE Conseil_ID = ".$_GET['id']);

			$row = $res->fetch();

	?>

    <div class="controls">

    <label class="control-label" for="">Title:</label>

    <input name="id" value="<?php echo $row['Conseil_ID']; ?>" type="hidden" id="inputEmail" placeholder="ID">

    <input name="title" value="<?php echo $row['Title']; ?>" type="text" id="inputEmail" placeholder="Blog Title">

    </div>
    
	  <div class="control-group">

		<label class="control-label" for="">Bref</label>

		<div class="controls">

	<textarea rows="7" class="span8" placeholder="Write your details here..!" name="bref"><?php echo $row['Bref']; ?></textarea>

    </div>

	  </div>

  <div class="control-group">

    <label class="control-label" for="inputPassword">Content</label>

    <div class="controls">

	<textarea rows="5" class="span10" required placeholder="Write your details here..!" id="content" name="content"><?php echo $row['Content']; ?></textarea>    </div>

  </div>

  	

  <div class="control-group">

    <label class="control-label" for="inputEmail">Visage et corps</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="visage" required value="1" <?php if ($row['Visage'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="visage" required value="2" <?php if ($row['Visage']== '2') { echo 'checked'; } ?> />NON

    </div>

  </div>

  <div class="control-group">

    <label class="control-label" for="inputEmail">Bebe</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="bebe" required value="1" <?php if ($row['Bebe'] == '1') { echo 'checked'; } ?> />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="bebe" required value="2" <?php if ($row['Bebe'] == '2') { echo 'checked'; } ?> />NON

    </div>

  </div>

  <div class="control-group">

	<img src="<?php echo $row['Photo']; ?>"  width="180"/>

                                    <label class="control-label" for="input01">Image:</label>

                                    <div class="controls">

                                        <input type="file" name="image" class="font" required> 

                                    </div>

                                </div>

  

    <button name="addinfo" type="submit" class="btn btn-success"><i class="icon-pencil"></i>&nbsp;Post</button>

    </form>  



</div>

<br />

</div>

	<div style="margin-bottom: 21px;" class="pull-right">

                    <a class = "btn btn-primary" href = "gallery_add.php" ><i class = "fa fa-arrow-left"></i>Retour</a>

                </div>

</div>

</div>

</div>

</div>

<?php

		if(isset($_POST['addinfo'])){
		
		$id = $_GET['id'];	

		$title=$_POST['title'];

		$postSlug = slug($title);	
        
		$bref = $_POST['bref'];

		$content= $_POST['content'];
        
		$visage = $_POST['visage'];

		$bebe = $_POST['bebe'];

		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                                $image_name = addslashes($_FILES['image']['name']);

                                $image_size = getimagesize($_FILES['image']['tmp_name']);



                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);

                                $Photo = "upload/" . $_FILES["image"]["name"];

		
     
															
	$smt = "UPDATE tbl_conseil SET Title=:title, postSlug=:postSlug, Bref=:bref, Content=:content, Visage=:visage, Bebe=:bebe, Photo=:photo WHERE Conseil_ID = :id";
	$qly = $conn->prepare($smt);
	$qly->execute(array(':id'=>$id,':title'=>$title,':postSlug'=>$postSlug,':bref'=>$bref,':content'=>$content,':visage'=>$visage,':bebe'=>$bebe,':photo'=>$Photo));



			

	    header('location:gallery_add.php');

		

		}

		

		?>



<?php   include('footer.php'); ?>


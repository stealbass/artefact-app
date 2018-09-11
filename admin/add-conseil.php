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

  <div class="control-group">

    <label class="form-control" for="inputEmail">Title</label>

    <div class="controls">

      <input type="text" class="span10" id="inputEmail" name="title" placeholder="Title" required class="span3">

    </div>

  </div>

  <div class="control-group">

    <label class="form-control" for="inputPassword">Bref</label>

    <div class="controls">

<textarea rows="5" class="span10" required placeholder="Write your details here..!" name="bref"></textarea>    </div>

  </div>
  
  <div class="control-group">

    <label class="form-control" for="inputPassword">Content</label>

    <div class="controls">

	<textarea rows="5" class="span10" required placeholder="Write your details here..!" id="content" name="content"></textarea>    </div>

  </div>

  
  <div class="control-group">

    <label class="form-control" for="inputEmail">Visage et corps</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="visage" required value="1" />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="visage" required value="2" />NON

    </div>

  </div>

  <div class="control-group">

    <label class="form-control" for="inputEmail">Bebe</label>

    <div class="controls">

	 <input type="radio" class="radio-inline" id="inputEmail" name="bebe" required value="1" />OUI

    <input type="radio" class="radio-inline" id="inputEmail" name="bebe" required value="2" />NON

    </div>

  </div>

  <div class="control-group">

                                    <label class="form-control" for="input01">Image:</label>

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
		
		$title=$_POST['title'];

		$postSlug = slug($title);
        
		$bref = $_POST['bref'];

		$content = $_POST['content'];
        
		$visage = $_POST['visage'];

		$bebe = $_POST['bebe'];

		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                                $image_name = addslashes($_FILES['image']['name']);

                                $image_size = getimagesize($_FILES['image']['tmp_name']);



                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);

                                $Photo = "upload/" . $_FILES["image"]["name"];

														
$smt = "INSERT INTO tbl_conseil (Title, postSlug, Bref, Content, Visage, Bebe Photo) VALUES (:title, :postSlug, :bref, :content, :visage, :bebe :photo)";
	$qly = $conn->prepare($smt);
	$qly->execute(array(':title'=>$title,':postSlug'=>$postSlug,':bref'=>$bref,':content'=>$content,':$visage'=>$visage,':$bebe'=>$bebe,':photo'=>$Photo));

			

	    header('location:gallery_add.php');

		

		}
		

		?>



<?php   include('footer.php'); ?>


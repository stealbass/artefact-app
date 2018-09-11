<?php
require("dbcon.php");
/*
 * @author Steal Bass
 * @website http://mapannoir.weebly.com/
 * @facebook https://www.facebook.com/happi.olivier
 */ 
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}

require("libs/config.php");
$page = "My account";
$pageDetails = $page;
$desc = "The african comics repository";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;
// Database connection
require __DIR__ . '/database.php';
$db = DB();

// Application library ( with DemoLib class )
require __DIR__ . '/libs/library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details
	
		
include("header.php");


?>
        <div id="page-wrapper">
            <div class="container">
       <div class="col-md-12">
        <div class="">
		<?php
						echo '<img src="admin/'. htmlentities($user->photo) .'"  class="pull-right profil" class="img img-responsive" style="width: 100px; height: 100px;"/>';
					
					?>
						<h3>Hi <?php echo htmlentities($user->name) ?>,</h3>
            <p>
				Welcome to artefacts
            </p>
			
			<a href="profile.php" class="btn btn-default" style="color: #fff;">My orders</a>
            <a href="update-profile.php"  class="btn btn-default" style="color: #fff;">Edit my details</a>
            <a href="logout.php"  class="btn btn-default" style="color: #fff;">Logout</a>
        </div>

<form class="" method="POST" enctype="multipart/form-data">

  <?php 



	$res = $DB->prepare("SELECT * FROM tbl_produits WHERE prodID = ".$_GET['id']);

									$res->execute();
			$row = $res->fetch();

	?>

    <input type="hidden" name="user" value="<?php echo $row['prodUser']; ?>" />
  

  <div class="form-group">
    
    <label for="inputEmail">Title</label>


    <input name="id" class="form-control" value="<?php echo $row['prodID']; ?>" type="hidden" id="inputEmail" placeholder="ID">

    <input name="title" class="form-control" value="<?php echo $row['prodTitle']; ?>" type="text" id="inputEmail" placeholder="Blog Title">

    </div>



  <div class="form-group">
  
    <label for="inputEmail">Author</label>


      <input class="form-control" value="<?php echo $row['prodCont']; ?>" type="text" id="inputEmail" name="contenance" placeholder="author" required class="span3">

    </div>


  <div class="form-group">

    <label for="inputPassword">Content:</label>


	<textarea rows="7" class="form-control" placeholder="Write your blogs here..!" name="content" ><?php echo $row['prodDesc']; ?></textarea>  

    </div>


  <div class="form-group">

    <label for="inputEmail" >Audience</label>


      <input type="number"  class="form-control" id="inputEmail" name="quantity" value="<?php echo $row['qty']; ?>" required class="span3">

    </div>


  <div class="form-group">

    <label for="inputEmail">Price</label>


      <input type="number" class="form-control" id="inputEmail" name="price" value="<?php echo $row['prodPrice']; ?>" required class="span3">


  </div>

  


   <div class="form-group">


                                    <label for="input01">Category</label>
<select name="country" class="country">

<option selected="selected" class="form-control">--Select menu--</option>

<?php

	$stmt = $db->prepare("SELECT * FROM tbl_main");

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


	<img src="admin/<?php echo $row['prodImg']; ?>"  width="180"/>

  <div class="form-group">

                                    <label for="input01">Couverture:</label>


                                        <input type="file" name="image" class="font" required> 


                                </div>
                                <object
  data="admin/<?php echo $row['prodPdf']; ?>"
  type="application/pdf"
  width="50%"
  height="100%">
  <iframe
    src="admin/<?php echo $row['prodPdf']; ?>"
    width="50%"
    height="100%"
    style="border: none;">
    <p>Your browser does not support PDFs.
      <a href="admin/<?php echo $row['prodPdf']; ?>">Download the PDF</a>.</p>
  </iframe>
</object>
  <div class="form-group">

                                    <label for="input01">Fichier pdf:</label>


                                        <input type="file" name="pdf" class="font" required> 


                                </div>



  

  <div class="form-group">
	<button name="edit" type="submit" class="btn btn-warning"><i class="icon-save"></i>&nbsp;Save</button>
</div>
    </form>  



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

		$actif = "0";
		

								 $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                                $image_name = addslashes($_FILES['image']['name']);

                                $image_size = getimagesize($_FILES['image']['tmp_name']);



                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);

                                $photo = "upload/" . $_FILES["image"]["name"];
		$pdf = addslashes(file_get_contents($_FILES['pdf']['tmp_name']));

                                $pdf_name = addslashes($_FILES['pdf']['name']);

                                $pdf_size = getimagesize($_FILES['pdf']['tmp_name']);



                                move_uploaded_file($_FILES["pdf"]["tmp_name"], "admin/upload/" . $_FILES["pdf"]["name"]);

                                $Pdf = "upload/" . $_FILES["pdf"]["name"];



			try {
	

	$query = $DB->prepare("update tbl_produits set cat_id = '$cat', subcat_id = '$subcat', prodTitle = '$title', prodCont = '$Contenance', prodSlug = '$prodSlug', prodDesc = '$content', qty = '$quantity', prodPrice = '$price', prodImg='$photo', prodUser = '$user', prodPdf = '$Pdf' where prodID = '$id' ");

			
									$query->execute();
	//redirect to index page
				header('Location: profile.php');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

	

	

	}

	

 include("footer.php");

	?>
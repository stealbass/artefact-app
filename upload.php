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
							if ($user->photo) {
						echo '<img src="admin/'. htmlentities($user->photo) .'"  class="pull-right profil" class="img img-responsive" style="width: 100px; height: 100px;"/>';
					}
					?>
						<h3>Hi <?php echo htmlentities($user->name) ?>,</h3>
            <p>
				Welcome to artefacts
            </p>
			
			<a href="profile.php" class="btn btn-default" style="color: #fff;">My orders</a>
            <a href="update-profile.php"  class="btn btn-default" style="color: #fff;">Edit my details</a>
            <a href="logout.php"  class="btn btn-default" style="color: #fff;">Logout</a>
        </div>




<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">

										<input type="hidden" name="user" value="<?php echo htmlentities($user->user_id) ?>" />

  <div class="form-group">

    <label for="inputEmail">Title</label>


      <input type="text" class="form-control" id="inputEmail" name="title" placeholder="Title" required class="span3">


  </div>

  <div class="form-group">

    <label for="inputEmail">Author</label>


      <input type="text" class="form-control" id="inputEmail" name="contenance" placeholder="genre" required value=" <?php echo htmlentities($user->username); ?>" class="span3">


  </div>

  <div class="form-group">

    <label for="inputPassword">Content</label>


<textarea rows="5" class="form-control" required placeholder="Write your details here..!" name="content"></textarea>   

  </div>


  <div class="form-group">

    <label for="inputEmail">Audience</label>


      <input type="number" class="form-control" id="inputEmail" name="quantity" required class="span3">


  </div>
  
  <div class="form-group">

    <label for="inputEmail">Price</label>


      <input type="number" class="form-control" id="inputEmail" name="price" placeholder="" required class="span3">


  </div>


  
  <div class="form-group">

                                    <label for="input01">Cover:</label>


                                        <input type="file" name="image" class="font" required> 


                                </div>
  <div class="form-group">

                                    <label for="input01">Pdf file:</label>


                                        <input type="file" name="pdf" class="font" required> 


                                </div>

  

   <div class="form-group">


                                    <label for="input01">Category</label>
<select name="country" class="country">

<option selected="selected" class="form-control">--Select menu--</option>

<?php

	$stmt = $db->prepare("SELECT * FROM tbl_main");

	$stmt->execute();

	while($row=$stmt->fetch(PDO::FETCH_ASSOC))

	{

		?>

        <option value="<?php echo $row['cat_id']; ?>" class="form-control"><?php echo $row['cat_name']; ?></option>

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

    <button name="addinfo" type="submit" class="btn btn-warning"><i class="icon-pencil"></i>&nbsp;Post</button>

    </div>

	</form>  



</div>


</div>

</div>


<?php

		if(isset($_POST['addinfo'])){

		$user = $_POST['user'];

		$cat = $_POST['country'];

		$subcat = $_POST['state'];

		$title = $_POST['title'];

		$prodSlug = slug($title);
        	
		$quantity = $_POST['quantity'];

		$Contenance = $_POST['contenance'];

		$content = $_POST['content'];

		$price = $_POST['price'];
		
		$actif = "0";

		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

                                $image_name = addslashes($_FILES['image']['name']);

                                $image_size = getimagesize($_FILES['image']['tmp_name']);



                                move_uploaded_file($_FILES["image"]["tmp_name"], "admin/upload/" . $_FILES["image"]["name"]);

                                $Photo = "upload/" . $_FILES["image"]["name"];

		$pdf = addslashes(file_get_contents($_FILES['pdf']['tmp_name']));

                                $pdf_name = addslashes($_FILES['pdf']['name']);

                                $pdf_size = getimagesize($_FILES['pdf']['tmp_name']);



                                move_uploaded_file($_FILES["pdf"]["tmp_name"], "admin/upload/" . $_FILES["pdf"]["name"]);

                                $Pdf = "upload/" . $_FILES["pdf"]["name"];


		
			try {

		$smt=$DB->prepare("INSERT into tbl_produits (cat_id, subcat_id, prodTitle, prodCont, prodSlug, prodDesc, prodImg, qty, prodPrice, prodActif, prodUser, prodPdf ) VALUES('$cat', '$subcat', '$title', '$Contenance', '$prodSlug', '$content', '$Photo', '$quantity', '$price','$actif','$user','$Pdf')");

	    $smt->execute();

			
	//redirect to index page
				header('Location: profile.php');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

		

		?>


<?php
include("footer.php");
?>
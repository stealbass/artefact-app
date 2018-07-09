<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */
require("libs/config.php");
$page = "Mon Compte";
$pageDetails = $page;
$desc = "Laboratoires Biopharma une marque d’excellence dans le domaine de la Beauté en Afrique; LAIT HYDRATANT ( BALNEO FOR MEN & WOMEN, BETTINA, HYDRACARE, LUMINA, PRIMO ), LAIT ECLAIRCISSANT ( BIOPUR PARIS, BIO SUCCESS, GOLDEN CLAIR, RAPID CLAIR, TALANGAI, WHITE EXPRESS ), GAMME BEBE ( MOBY BEBE, KIDOUX, SEPHORA )";
$pageDesc = $desc;
$key = "Gel de douche, Lait de toilette, Lait hydratant, Lait éclaircissant, Savon bébé, BALNEO FOR MEN & WOMEN, HYDRACARE, PRIMO, MOBY BEBE, KIDOUX, B-LIGHT, BIOPUR PARIS, WHITE EXPRESS, NEOTRYL, TALANGAI, SEPHORA";
$pageKey = $key;
 
// Start Session
session_start();

// Database connection
require __DIR__ . '/database.php';
$db = DB();

$result = $db->query('SELECT * FROM users WHERE user_id='.$_SESSION['user_id']);
							
	if($result) {
$obj = $result->fetch();
$user = $obj[name];

$Modifier_error_message = '';


// check Modif request
if(isset($_POST['submit'])){
    if ($_POST['name'] == "") {
        $Modifier_error_message = 'Le nom est requis!';
    } else if ($_POST['prenom'] == "") {
        $Modifier_error_message = 'Le prenom est requis!';
    } else if ($_POST['password'] == "") {
        $Modifier_error_message = 'Le mot de passe est requis!';
    } else if ($_POST['repassword'] != $_POST['password']) {
        $Modifier_error_message = 'Retapez correctement le mot de passe!';
    } else { 
		$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
		$password = trim($_POST['password']);
		$repassword = trim($_POST['repassword']);
        $enc_password = hash('sha256', $repassword);
								$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "admin/upload/" . $_FILES["image"]["name"]);
                                $photo = "admin/upload/" . $_FILES["image"]["name"];
	
        $smt = "UPDATE users SET name=:name, prenom=:prenom, password=:password, photo=:photo WHERE user_id=".$_SESSION['user_id'];
		$resultat = $db->prepare($smt);
		$resultat->execute(array(':name'=>$name,':prenom'=>$prenom,':password'=>$enc_password,':photo'=>$photo));

		
	 header("Location: profile.php");
	}
	}
include("header.php");
?>
        <div id="page-wrapper">
            <div class="container">
       <div class="col-md-12">
        <div class="">
		<?php
$result = $db->query('SELECT * FROM users WHERE user_id='.$_SESSION['user_id']);
							
	if($result) {
$obj = $result->fetch();
						echo '<img src="'. htmlentities($obj[photo]) .'"  class="pull-right profil" class="img img-responsive"/>';
					}
					?>
						<h3>Hi <?php echo htmlentities($user) ?>,</h3>
            <p>
				Welcome to artefact
            </p>
			
			<a href="orders.php" class="btn btn-default" style="color: #fff;">My orders</a>
            <a href="update-profile.php"  class="btn btn-default" style="color: #fff;">Edit my details</a>
            <a href="logout.php"  class="btn btn-default" style="color: #fff;">Logout</a>
        </div>
                    <div class="box">
						<?php
							if ($Modifier_error_message != "") {
								echo '<div class="alert alert-danger alert-dismissable"><button data-dismiss="alert" class="close" type="button">x</button><strong>Ereure: </strong> ' . $Modifier_error_message . '</div>';
							}
							?>
						<form method="POST" action="" enctype="multipart/form-data">
							
						  <?php  

								echo '<div class="content">
                                <div class="row">
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Name</label>';
                                            echo '<input type="text" class="form-control" name="name" id="name" value="'. stripslashes($obj[name]). '">';
                                        echo '</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Surname</label>';
                                            echo '<input type="text" class="form-control" name="prenom" id="prenom" value="'.stripslashes($obj[prenom]). '">';
                                        echo '</div>
                                    </div>
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">New Password</label>';
                                            echo '<input type="password" class="form-control" name="password" id="password" value="">';
                                        echo '</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Retype Password</label>';
                                            echo '<input type="password" class="form-control" name="repassword" id="repassword" value="">';
                                        echo '</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Photo profil dimensions (100 x 100)</label>';
                                            echo '<input type="file" name="image" class="form-control" required>';
                                        echo '</div>
                                    </div>
                                </div>';
								}
							?>
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <button type="submit" class="btn btn-warning" name="submit">Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
    </div>
    </div>
    </div>
<?php
include("footer.php");
?>

<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */
require("libs/config.php");
$page = "My account";
$pageDetails = $page;
$desc = "The african comics repository";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;
 
// Start Session
session_start();

// Database connection
require __DIR__ . '/database.php';
$db = DB();

// Application library ( with DemoLib class )
require __DIR__ . '/libs/library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details

$Modifier_error_message = '';


// check Modif request
if(isset($_POST['submit'])){
    if ($_POST['name'] == "") {
        $Modifier_error_message = 'Le nom est requis!';
    } else if ($_POST['prenom'] == "") {
        $Modifier_error_message = 'Le prenom est requis!';
    } else if ($_POST['pays'] == "") {
        $register_error_message = 'Pays est requis!';
    } else if ($_POST['ville'] == "") {
        $register_error_message = 'Ville est requis!';
    } else if (!filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT)) {
        $register_error_message = 'Le telephone est requis!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Email est requis!';
    } else {
		$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
		$prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_STRING);
		$pays = $_POST['pays'];
		$ville = filter_var($_POST['ville'], FILTER_SANITIZE_STRING);	
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$user = $_POST['username'];
		$auth = $_POST['auth'];
        
		$password = trim($_POST['password']);
		$repassword = trim($_POST['repassword']);
        $enc_password = hash('sha256', $repassword);
								$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "admin/upload/" . $_FILES["image"]["name"]);
                                $photo = "upload/" . $_FILES["image"]["name"];
	
        $smt = "UPDATE users SET name=:name, prenom=:prenom, pays=:pays, ville=:ville, phone=:phone, email=:email, username=:user, password=:pass, photo=:photo, author=:auth WHERE user_id=".$_SESSION['user_id'];
		$qly = $db->prepare($smt);
		$qly->execute(array(':name'=>$name,':prenom'=>$prenom,':pays'=>$pays,':ville'=>$ville,':phone'=>$phone,':email'=>$email,':user'=>$user,':pass'=>$enc_password,':photo'=>$photo,':auth'=>$auth));

		
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
							if ($user->photo) {
						echo '<img src="admin/'. htmlentities($user->photo) .'"  class="pull-right profil" class="img img-responsive" style="width: 100px; height: 100px;"/>';
					}
					?>
						<h3>Hi <?php echo htmlentities($user->name) ?>,</h3>
            <p>
				Welcome to artefacts
            </p>
			
			<a href="profile.php" class="btn btn-default" style="color: #fff;">My orders</a>
					<?php

					  if($user->author == 1){
						echo '<a href="upload.php"  class="btn btn-default" style="color: #fff;">Upload a book</a>';
					  }
					  ?>
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

                                $ip = $_REQUEST['REMOTE_ADDR']; // the IP address to query
                                $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
                                if($query && $query['status'] == 'success') {
                                    
								echo '
                                
										<input type="hidden" name="username" value="'. stripslashes($user->username). '" /><div class="content">
										<input type="hidden" name="auth" value="'. stripslashes($user->author). '" /><div class="content">
                                <div class="row">
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Name</label>';
                                            echo '<input type="text" class="form-control" name="name" id="name" value="'. stripslashes($user->name). '">';
                                        echo '</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Surname</label>';
                                            echo '<input type="text" class="form-control" name="prenom" id="prenom" value="'.stripslashes($user->prenom). '">';
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
                                            echo '<input type="password" class="form-control" name="repassword" id="repassword" value="">
                                        </div>
                                        </div>';
                                        echo '
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>';
                                            echo '<input type="text" class="form-control" name="pays" id="country" value="'.stripslashes($query[country]). '">';
                                        echo '</div>
                                    </div>';
                                    echo '<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="city">State</label>
                                            <input type="text" class="form-control" name="ville" id="city" value="'. stripslashes($query[city]). '">
                                        </div>
                                    </div>';
                                    echo '<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Telephone</label>
                                            <input type="text" class="form-control" name="phone" id="phone" value="'. stripslashes($user->phone). '">
                                        </div>
                                    </div>';
                                    echo '<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="'.stripslashes($user->email). '">
                                        </div>
                                    </div>';

                     
                                    echo '<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Photo profil dimensions (100 x 100)</label>';
                                            echo '<input type="file" name="image" class="form-control" required>';
                                        echo '</div>
                                    </div>
                                </div>';
                                } else {
                                        echo '<div class="form-group">
                                            <label for="email">Check your network we cant locate you</label>
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

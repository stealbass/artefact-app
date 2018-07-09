<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.weebly.com/
 * @facebook https://www.facebook.com/happi.olivier
 */

include('dbcon.php');
require("libs/config.php");
$page = "Modifier mot de passe";
$pageDetails = $page;
$desc = "Laboratoires Biopharma une marque d’excellence dans le domaine de la Beauté en Afrique; LAIT HYDRATANT ( BALNEO FOR MEN & WOMEN, BETTINA, HYDRACARE, LUMINA, PRIMO ), LAIT ECLAIRCISSANT ( BIOPUR PARIS, BIO SUCCESS, GOLDEN CLAIR, RAPID CLAIR, TALANGAI, WHITE EXPRESS ), GAMME BEBE ( MOBY BEBE, KIDOUX, SEPHORA )";
$pageDesc = $desc;
$key = "Gel de douche, Lait de toilette, Lait hydratant, Lait éclaircissant, Savon bébé, BALNEO FOR MEN & WOMEN, HYDRACARE, PRIMO, MOBY BEBE, KIDOUX, B-LIGHT, BIOPUR PARIS, WHITE EXPRESS, NEOTRYL, TALANGAI, SEPHORA";
$pageKey = $key;

// Database connection
require __DIR__ . '/database.php';
$db = DB();

$id = $_GET['id'];

$result = $db->prepare('SELECT * FROM users WHERE name = :id');
$result->execute(array(':id' => $id));	
							
	if($result) {
$obj = $result->fetch();
$user = $obj[name];

$Modifier_error_message = '';


// check Modif request
if(isset($_POST['submit'])){
    if ($_POST['password'] == "") {
        $Modifier_error_message = 'Le mot de passe est requis!';
    } else if ($_POST['repassword'] != $_POST['password']) {
        $Modifier_error_message = 'Retapez correctement le mot de passe!';
    } else { 
		$password = trim($_POST['password']);
		$repassword = trim($_POST['repassword']);
        $enc_password = hash('sha256', $repassword);
		
        $resultat = $db->query("UPDATE users SET password='$enc_password' WHERE name = $id");
			
	 header("Location: index.php");
	}
	}

include("header.php");
?>

        <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Acceuil</a>
                        </li>
                        <li>Modifier mon mot de passe</li>
                    </ul>
                </div>
				
				<div class="col-md-12">
					<div class="box" id="contact">
					<?php
							if ($Modifier_error_message != "") {
								echo '<div class="alert alert-danger alert-dismissable"><button data-dismiss="alert" class="close" type="button">x</button><strong>Ereure: </strong> ' . $Modifier_error_message . '</div>';
							}
							?>
						<form method="POST" action="">
							
						  <?php  

								echo '<div class="content">
                                <div class="row">
                                   <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Nouveau mot de passe</label>';
                                            echo '<input type="password" class="form-control" name="password" id="password" value="">';
                                        echo '</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Retapez le mot de passe</label>';
                                            echo '<input type="password" class="form-control" name="repassword" id="repassword" value="">';
                                        echo '</div>
                                    </div>
                                </div>';
								}
							?>
                            </div>

                            <div class="box-footer">
                                <div>
                                    <button type="submit" class="btn btn-primary" name="submit">Validez<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>

                    


                </div>
                <!-- /.col-md-9 -->
		</div>	
<?php
include("footer.php");
?>
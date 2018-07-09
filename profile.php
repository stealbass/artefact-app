<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */
require("libs/config.php");
$page = "My account";
$pageDetails = $page;
$desc = "Vente de livres en ligne";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;
 
// Start Session
session_start();

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: register.php");
}

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
$result = $db->query('SELECT * FROM users WHERE user_id='.$_SESSION['user_id']);
							
	if($result) {
$obj = $result->fetch();
						echo '<img src="'. htmlentities($obj[photo]) .'"  class="pull-right profil" class="img img-responsive"/>';
					}else {}
					?>
						<h3>Hi <?php echo htmlentities($user->name) ?>,</h3>
            <p>
				Welcome to artefact
            </p>
			
			<a href="orders.php" class="btn btn-default" style="color: #fff;">My orders</a>
            <a href="update-profile.php"  class="btn btn-default" style="color: #fff;">Edit my details</a>
            <a href="logout.php"  class="btn btn-default" style="color: #fff;">Logout</a>
        </div>
    </div>
    </div>
    </div>
<?php
include("footer.php");
?>

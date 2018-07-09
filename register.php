<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.alwaysdata.net/
 * @facebook https://www.facebook.com/happi.olivier
 */

require("libs/config.php");
$page = "Membership";
$pageDetails = $page;
$desc = "Vente de templates en ligne";
$pageDesc = $desc;
$key = "Templates, Ventes en ligne";
$pageKey = $key;

// Start Session
session_start();

// Database connection
require __DIR__ . '/database.php';
$db = DB();

// Application library ( with DemoLib class )
require __DIR__ . '/libs/library.php';
$app = new DemoLib();

$login_error_message = '';
$register_error_message = '';

// check Login request
if (!empty($_POST['btnLogin'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username == "") {
        $login_error_message = 'Le pseudo est requis!';
    } else if ($password == "") {
        $login_error_message = 'Le mot de passe est requis!';
    } else {
        $user_id = $app->Login($username, $password); // check user login
        if($user_id > 0)
        {
            $_SESSION['user_id'] = $user_id; // Set Session
            header("Location: cart.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Details invalides!';
        }
    }
}

// check Register request
if (!empty($_POST['btnRegister'])) {
    if ($_POST['name'] == "") {
        $register_error_message = 'Le nom est requis!';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Email est requis!';
    } else if ($_POST['username'] == "") {
        $register_error_message = 'Le pseudo est requis!';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Le mot de passe est requis!';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Email invalide!';
    } else if ($app->isEmail($_POST['email'])) {
        $register_error_message = 'Email déjà utulisé!';
    } else if ($app->isUsername($_POST['username'])) {
        $register_error_message = 'Pseudo déjà utulisé!';
    } else {
        $user_id = $app->Register($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password']);
        // set session and redirect user to the profile page
        $_SESSION['user_id'] = $user_id;
        header("Location: cart.php");
    }
}
include("header.php");


?>
            <?php include("login.php"); ?>
        
<?php
include("footer.php");
?>
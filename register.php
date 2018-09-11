<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.alwaysdata.net/
 * @facebook https://www.facebook.com/happi.olivier
 */

require("libs/config.php");
$page = "Membership";
$pageDetails = $page;
$desc = "The african comics repository";
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
        $login_error_message = 'Pseudo field required!';
    } else if ($password == "") {
        $login_error_message = 'Password field required!';
    } else {
        $user_id = $app->Login($username, $password); // check user login
        if($user_id > 0)
        {
            $_SESSION['user_id'] = $user_id; // Set Session
            header("Location: profile.php"); // Redirect user to the profile.php
        }
        else
        {
            $login_error_message = 'Invalid details!';
        }
    }
}

// check Register request
if (!empty($_POST['btnRegister'])) {
    if ($_POST['name'] == "") {
        $register_error_message = 'Name field required!';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Email field required!';
    } else if ($_POST['username'] == "") {
        $register_error_message = 'Pseudo field required!';
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Password field required';
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $register_error_message = 'Email not valide!';
    } else if ($app->isEmail($_POST['email'])) {
        $register_error_message = 'Email in use';
    } else if ($app->isUsername($_POST['username'])) {
        $register_error_message = 'Pseudo in use!';
    } else if ($_POST['author'] == "") {
        $register_error_message = 'Author field required';
    } else {
        $user_id = $app->Register($_POST['name'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['author']);
        // set session and redirect user to the profile page
        $_SESSION['user_id'] = $user_id;
        header("Location: profile.php");
    }
}
include("header.php");


?>
            <?php include("login.php"); ?>
        
<?php
include("footer.php");
?>
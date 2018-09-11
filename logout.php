<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Logout
 */

// start session
session_start();

// Unset all of the session variables.
unset($_SESSION['user_id']);
// Finally, destroy the session.    
session_destroy();
// Redirect to index.php page
header("Location: index.php");
?>
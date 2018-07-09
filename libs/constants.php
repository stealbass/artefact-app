<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.weebly.com/
 * @facebook https://www.facebook.com/happi.olivier
 */

date_default_timezone_set('Africa/Douala');
 
// dont add a trailing / at the end
define('HTTP_SERVER', 'http://localhost');
// add slash / at the end
define('SITE_DIR', '/artefact/');

// database prefix if you use
define('DB_PREFIX', 'mp_');

define('DB_DRIVER', 'mysql');
define('DB_HOST', 'mysql-mysecondwebsitetest.alwaysdata.net');
define('DB_HOST_USERNAME', '162515');
define('DB_HOST_PASSWORD', 'Mapan1409');
define('DB_DATABASE', 'mysecondwebsitetest_artefact');


define('SITE_NAME', 'Artefact');

// define database tables
define('TABLE_PAGES', DB_PREFIX.'pages');
define('TABLE_TAGLINE', DB_PREFIX.'tagline');

/* * ***** facebook related activities start ** */
require 'facebook_library/facebook.php';

// site URL and facebook credentials
define("APP_ID", "1925217534411897");
define("APP_SECRET", "8617f5914bed06a96988cac2d11b69e8");
/* make sure the url end with a trailing slash */
define("SITE_URL", "http://localhost/amado/cart.php");
/* the page where you will be redirected after login */
define("REDIRECT_URL", SITE_URL."facebook_login.php");
/* Email permission for fetching emails. */
define("PERMISSIONS", "zamahappi@gmail.com");

// create a facebook object
$facebook = new Facebook(array('appId' => APP_ID, 'secret' => APP_SECRET));
$userID = $facebook->getUser();

// Login or logout url will be needed depending on current user login state.
if ($userID) {
  $logoutURL = $facebook->getLogoutUrl(array('next' => SITE_URL . 'logout.php'));
} else {
  $loginURL = $facebook->getLoginUrl(array('scope' => PERMISSIONS, 'redirect_uri' => REDIRECT_URL));
}

define("CLIENT_ID", "827291851-5qy8cjCgexHyApo7VrV0RKmbFAuaRU86h7RIqMSP");
define("SECRET_KEY", "Nmo6W1m0z8LGGarDtZSfLCZeRPvEDz0kSxfI05pRHGKuu");
/* make sure the url end with a trailing slash, give your site URL */
define("SITE_URL", "http://localhost/artefact/");
/* the page where you will be redirected for authorization */
define("REDIRECT_URL", SITE_URL."twitter_login.php");

define("LOGOUT_URL", SITE_URL."logout.php");
?>
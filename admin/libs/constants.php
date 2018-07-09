<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.alwaysdata.net/
 * @facebook https://www.facebook.com/happi.olivier
 */

date_default_timezone_set('Africa/Lagos');
 
// dont add a trailing / at the end
define('HTTP_SERVER', 'http://localhost');
// add slash / at the end
define('SITE_DIR', '/LabBio/Midori/');

// database prefix if you use
define('DB_PREFIX', 'mp_');

define('DB_DRIVER', 'mysql');
define('DB_HOST', 'localhost');
define('DB_HOST_USERNAME', 'root');
define('DB_HOST_PASSWORD', 'root');
define('DB_DATABASE', 'artefact');

define('SITE_NAME', 'Artefact');

// define database tables
define('TABLE_PAGES', DB_PREFIX.'pages');
define('TABLE_TAGLINE', DB_PREFIX.'tagline');


?>
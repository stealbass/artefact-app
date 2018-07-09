<?php


//database credentials
define('DBHOST','mysql-mysecondwebsitetest.alwaysdata.net');
define('DBUSER','162515');
define('DBPASS','Mapan1409');
define('DBNAME','mysecondwebsitetest_artefact');

$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//set timezone
date_default_timezone_set('Africa/Douala');
?>

<?php

 $host = "localhost";
    $user = "root";
    $password = "root";
    $database_name = "artefact";
    $pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ));
?>

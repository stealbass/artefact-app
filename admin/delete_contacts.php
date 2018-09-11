<?php 

include('dbcon.php');
$id=$_GET['id'];


$query = $pdo->prepare("delete  from tbl_contacts where Name_ID='$id'");
header('location:contacts.php');
?>
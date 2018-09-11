<?php 

include('dbcon.php');
$id=$_GET['id'];


$query = $pdo->prepare("delete  from tbl_admin where user_id='$id'");			$query->execute();
header('location:admin.php');
?>
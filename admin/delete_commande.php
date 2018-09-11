<?php 

include('dbcon.php');
$id=$_GET['id'];


$query = $pdo->prepare("delete  from tbl_payment where order_ID='$id'");
			$query->execute();
header('location:home.php');
?>
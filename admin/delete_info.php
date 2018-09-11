<?php 

include('dbcon.php');
$id=$_GET['id'];


$query = $pdo->prepare("delete  from tbl_info where Information_ID='$id'");
			$query->execute();
header('location:info.php');
?>
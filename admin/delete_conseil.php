<?php 

include('dbcon.php');
$id=$_GET['id'];


$query = $pdo->prepare("delete  from tbl_conseil where Conseil_ID='$id'");
			$query->execute();
header('location:gallery_add.php');
?>
<?php 

include('dbcon.php');
$id=$_GET['id'];

$query = $pdo->prepare("delete  from tbl_produits where prodID='$id'");
			$query->execute();
header('location:product.php');
?>
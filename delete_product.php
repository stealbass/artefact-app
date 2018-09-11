<?php 



require("libs/config.php");

$id=$_GET['id'];



$query = $DB->prepare("delete  from tbl_produits where prodID='$id'");

			$query->execute();

header('location:profile.php');

?>
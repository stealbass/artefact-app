<?php 

include('dbcon.php');
$id=$_GET['id'];


$query = $pdo->prepare("delete  from tbl_reviews where Review_ID='$id'");
header('location:reviews.php');
?>
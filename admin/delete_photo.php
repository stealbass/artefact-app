<?php 

include('dbcon.php');
$id=$_GET['id'];


$query = $pdo->prepare("delete  from tbl_gallery where Photo_ID='$id'");
header('location:gallery_add.php');
?>
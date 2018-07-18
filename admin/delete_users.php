<?php 



include('dbcon.php');

$id=$_GET['id'];





$query = $pdo->prepare("delete  from users where user_id='$id'");

			$query->execute();

header('location:admin.php');

?>
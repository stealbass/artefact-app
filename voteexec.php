<?php
require("dbcon.php");

$emailadd= $_POST['email']; 

$id= $_POST['radiobutton'];

if (isset($_POST["btnVote"])) {
	
$sql=$db->prepare("UPDATE vote SET vote = vote + 1  where id=:id");
	$sql->execute(array(':id' => $id));

$sql_in=$db->prepare("INSERT into vote_ip (vote_fk,emailadd) values (:id,:emailadd)");
	$sql_in->execute(array(':emailadd' => $emailadd, ':id' => $id));

	echo "<script>alert('Merci de votre participation au sondage !')</script>"; 
header("location:poll.php");
}
else
{
header("location:poll.php");
}

$id= $_POST['radiobutton2'];

if (isset($_POST["btnClari"])) {
	
$sql=$db->prepare("UPDATE voteclari SET vote = vote + 1  where id=:id");
	$sql->execute(array(':id' => $id));

$sql_in=$db->prepare("INSERT into vote_ip (vote_fk,emailadd) values (:id,:emailadd)");
	$sql_in->execute(array(':emailadd' => $emailadd, ':id' => $id));

	echo "<script>alert('Merci de votre participation au sondage !')</script>"; 
header("location:poll.php");
}
else
{
header("location:poll.php");
}

$id= $_POST['radiobutton3'];

if (isset($_POST["btnBB"])) {
	
$sql=$db->prepare("UPDATE voteped SET vote = vote + 1  where id=:id");
	$sql->execute(array(':id' => $id));

$sql_in=$db->prepare("INSERT into vote_ip (vote_fk,emailadd) values (:id,:emailadd)");
	$sql_in->execute(array(':emailadd' => $emailadd, ':id' => $id));
	
	if ($sql_in) {
echo '<script language="javascript">';
echo 'alert("Merci de votre participation au sondage !");';
echo 'window.location.href="poll.php";';
echo '</script>';
	}
}
else
{
header("location:poll.php");
}
?>
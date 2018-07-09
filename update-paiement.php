<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}
require("dbcon.php");

$a = $_POST['code'];
$c = $_POST['date'];
$e = $_POST['amount'];
$delivery = $_POST['delivery'];
$actif = 0;
$status = 'En Attente';

$date = date('Y-m-d H:i:s');

$dmonth = date('F');
$dyear = date('Y');

$usera = $_POST['nom'];
$userb = $_POST['prenom'];
$userc = $_POST['pays'];
$userd = $_POST['province'];
$usere = $_POST['ville'];
$userf = $_POST['state'];
$userg = $_POST['phone'];
$userh = $_POST['email'];


									if(isset($_SESSION['cart']))
									{
													$total = 0;
												foreach($_SESSION['cart'] as $product_id => $quantity) {
																				
												$result = $db->prepare('SELECT * FROM tbl_produits WHERE prodID = :product_id');
												$result->execute(array(':product_id' => $product_id));
												

												if($result){
													
												$obj = $result->fetch();
													   $cost = $obj['prodAmount'] * $quantity; //work out the line cost
														$img = $obj['prodImg'];
$b = $obj['prodTitle'];		
$d = $quantity;		
$brand = $obj['prodBrand'];		
$cont = $obj['prodCont'];												
$smt = "INSERT INTO tbl_purchase (order_ID,Name,Brand,Titre,Cont,Qty,Cost,Image) VALUES (:a,:usera,:brand,:b,:cont,:d,:cost,:img)";
	$qly = $db->prepare($smt);
	$qly->execute(array(':a'=>$a,':usera'=>$usera,':brand'=>$brand,':b'=>$b,':cont'=>$cont,':d'=>$d,':cost'=>$cost,':img'=>$img));

												}
											}
									}
	
if($_POST['ptype']=='Cash') {

	$f = $_POST['ptype'];
	$cost = $_POST['cost'];
	
	$sql = "INSERT INTO tbl_payment (order_ID,Name,Prenom,Email,Province,Country,City,State,Phone,Paiement,Date,Month,Year,Cost,Delivery,Total_Amount,Actif,Status) VALUES (:a,:usera,:userb,:userh,:userd,:userc,:usere,:userf,:userg,:f,:c,:dmonth,:dyear,:cost,:delivery,:e,:actif,:status)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$a,':usera'=>$usera,':userb'=>$userb,':userh'=>$userh,':userd'=>$userd,':userc'=>$userc,':usere'=>$usere,':userf'=>$userf,':userg'=>$userg,':f'=>$f,':c'=>$date,':dmonth'=>$dmonth,':dyear'=>$dyear,':cost'=>$cost,':delivery'=>$delivery,':e'=>$e,':actif'=>$actif,':status'=>$status));
	header("location: preview.php?invoice=$a");
	exit();
}
if($_POST['ptype']==='MTN Mobile Money') {
	
	$f = $_POST['ptype'];
	$cost = $_POST['cost'];
	
	$sql = "INSERT INTO tbl_payment (order_ID,Name,Prenom,Email,Province,Country,City,State,Phone,Paiement,Date,Month,Year,Cost,Delivery,Total_Amount,Actif,Status) VALUES (:a,:usera,:userb,:userh,:userd,:userc,:usere,:userf,:userg,:f,:c,:dmonth,:dyear,:cost,:delivery,:e,:actif,:status)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$a,':usera'=>$usera,':userb'=>$userb,':userh'=>$userh,':userd'=>$userd,':userc'=>$userc,':usere'=>$usere,':userf'=>$userf,':userg'=>$userg,':f'=>$f,':c'=>$date,':dmonth'=>$dmonth,':dyear'=>$dyear,':cost'=>$cost,':delivery'=>$delivery,':e'=>$e,':actif'=>$actif,':status'=>$status));
	header("location: preview.php?invoice=$a");
	exit();
}
if($_POST['ptype']==='Orange Money') {
	
	$f = $_POST['ptype'];
	$cost = $_POST['cost'];
	
	$sql = "INSERT INTO tbl_payment (order_ID,Name,Prenom,Email,Province,Country,City,State,Phone,Paiement,Date,Month,Year,Cost,Delivery,Total_Amount,Actif,Status) VALUES (:a,:usera,:userb,:userh,:userd,:userc,:usere,:userf,:userg,:f,:c,:dmonth,:dyear,:cost,:delivery,:e,:actif,:status)";
	$q = $db->prepare($sql);
	$q->execute(array(':a'=>$a,':usera'=>$usera,':userb'=>$userb,':userh'=>$userh,':userd'=>$userd,':userc'=>$userc,':usere'=>$usere,':userf'=>$userf,':userg'=>$userg,':f'=>$f,':c'=>$date,':dmonth'=>$dmonth,':dyear'=>$dyear,':cost'=>$cost,':delivery'=>$delivery,':e'=>$e,':actif'=>$actif,':status'=>$status));
	header("location: preview.php?invoice=$a");
	exit();
}
// query
?>

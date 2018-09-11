<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.weebly.com/
 * @facebook https://www.facebook.com/happi.olivier
 */
require("libs/config.php");
require('vote/_drawrating.php');
require("dbcon.php");

if(isset($_GET['id']))
        {	
$stmt=$db->prepare('select * FROM tbl_produits WHERE prodSlug = :prodSlug');
								$stmt->execute(array(':prodSlug' => $_GET['id']));

$row = $stmt->fetch();
$pageDetails = $row['prodBrand'].' '.$row['prodTitle'];
		}
$desc = "Vente de livres en ligne";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;


include("header.php");
?>
		<?php include("produitdesc.php"); ?>		
<?php
include("footer.php");
?>
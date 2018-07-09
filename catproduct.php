<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.alwaysdata.net/
 * @facebook https://www.facebook.com/happi.olivier
 */

require("libs/config.php");
$pageDetails = $_GET['id'];
$desc = "Vente de livres en ligne";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;

include("header.php");
?>
		<?php include("products.php"); ?>
<?php
include("footer.php");
?>
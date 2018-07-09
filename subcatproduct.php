<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.weebly.com/
 * @facebook https://www.facebook.com/happi.olivier
 */

require("libs/config.php");
$pageDetails = $_GET['id'];
$desc = "Vente de livres en ligne";
$pageDesc = $desc;
$key = "Books, Ventes en ligne";
$pageKey = $key;

include("header.php");
?>
		<?php include("subproducts.php"); ?>
<?php
include("footer.php");
?>
<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.alwaysdata.net/
 * @facebook https://www.facebook.com/happi.olivier
 */

require("libs/config.php");
$page = "Search";
$pageDetails = $page;
$desc = "Vente de livres en ligne";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;
include("header.php");
	$name = $_GET['name'];
	$chainesearch = addslashes($name); 
//instantiate the class
$pages = new Paginator('5','p');

//collect all records fro the next function
$stmt = $db->query("SELECT prodID FROM tbl_produits WHERE (prodSlug LIKE '%$chainesearch%' OR prodBrand LIKE '%$chainesearch%' OR prodTitle LIKE '%$chainesearch%' OR prodDesc LIKE '%$chainesearch%') ");

//determine the total number of records
$pages->set_total($stmt->rowCount());
?>

        <div id="page-wrapper">
				<div class="row">
				
				<div class="col-md-12">
				<?php
							if (isset($_GET['name'])){
							?> 
                    <div class="panel panel-default">
                            <div class="table-responsive">
                                <table class="table table-hover">
 
				  <tbody>
				 
				  <?php
				  $query = $db->prepare("SELECT * FROM tbl_produits WHERE (prodSlug LIKE '%$chainesearch%' OR prodBrand LIKE '%$chainesearch%' OR prodTitle LIKE '%$chainesearch%' OR prodDesc LIKE '%$chainesearch%') ".$pages->get_limit());
							$query->execute();
							while($product = $query->fetch()){
					$id=$product['prodSlug'];
					$sid=$product['prodCont'];
                    $pid=$product['prodID'];

					?>
					
                        <script>
                          fbq('track', 'Search');
                        </script>
					<tr>
					  <td width="100"><img class="img-rounded" src="admin/<?php echo $product['prodImg']; ?>" width="100"></td>
					  
                                            <td width="100">
            								<?php
            										echo '
                                <h4><a href="detail.php?id='.$id.'&cont='.$sid.'">
                                    '.$product['prodBrand'].' '.$product['prodTitle'].' '.$product['prodCont'].'
                                </a></h4>';
                                            ?>
                                            <p class="text-muted">Humour</p>
                                            <p>By Mandresak</p>
                                            <button type="button" class="btn btn-danger btn-circle">-18
                                            </button>
															<?php
																echo '<a href="update-cart.php?action=add&id='.$pid.'" class="btn btn-warning">Buy</a>';
																
															?>
                                            </td>
					
					  <?php } 							
				?>
					</tr>
					
				  </tbody>
				  </table>
                  </div>
                  </div>
				  <?php
							} 
							else if(empty($_GET['name'])){
							echo '<h4>Tapez une recherche!</h4>';
							} else	{			
							echo '<h4>Pas de resultat!</h4>';
							}
					?>
			 			
                        <?php  echo $pages->page_links('search.php?name='.$_GET['name'].'&'); ?>  
					   
                <!-- /.col-md-9 -->
		</div>	
		</div>	
		</div>	
<?php
include("footer.php");
?>
<?php
require("dbcon.php");
/*
 * @author Steal Bass
 * @website http://mapannoir.weebly.com/
 * @facebook https://www.facebook.com/happi.olivier
 */ 
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}

require("libs/config.php");
$pageDetails = "Mon Compte";
$desc = "Laboratoires Biopharma une marque d’excellence dans le domaine de la Beauté en Afrique; LAIT HYDRATANT ( BALNEO FOR MEN & WOMEN, BETTINA, HYDRACARE, LUMINA, PRIMO ), LAIT ECLAIRCISSANT ( BIOPUR PARIS, BIO SUCCESS, GOLDEN CLAIR, RAPID CLAIR, TALANGAI, WHITE EXPRESS ), GAMME BEBE ( MOBY BEBE, KIDOUX, SEPHORA )";
$pageDesc = $desc;
$key = "Gel de douche, Lait de toilette, Lait hydratant, Lait éclaircissant, Savon bébé, BALNEO FOR MEN & WOMEN, HYDRACARE, PRIMO, MOBY BEBE, KIDOUX, B-LIGHT, BIOPUR PARIS, WHITE EXPRESS, NEOTRYL, TALANGAI, SEPHORA";
$pageKey = $key;
// Database connection
require __DIR__ . '/database.php';
$db = DB();

// Application library ( with DemoLib class )
require __DIR__ . '/libs/library.php';
$app = new DemoLib();

$user = $app->UserDetails($_SESSION['user_id']); // get user details
	
		
include("header.php");

$pages = new Paginator('5','p');

//collect all records fro the next function
$stmt = $db->prepare('SELECT tbl_payment.Transaction_ID, tbl_payment.order_ID, tbl_payment.Email, users.email FROM users, tbl_payment WHERE users.email = tbl_payment.Email ORDER BY 
									tbl_payment.Transaction_ID');
									$stmt->execute(array());
								
//determine the total number of records
$pages->set_total($stmt->rowCount());

?>

        <div id="page-wrapper">
            <div class="container">
       <div class="col-md-12">
        <div class="">
		<?php
$result = $db->query('SELECT * FROM users WHERE user_id='.$_SESSION['user_id']);
							
	if($result) {
$obj = $result->fetch();
						echo '<img src="'. htmlentities($obj[photo]) .'"  class="pull-right profil" class="img img-responsive"/>';
					}
					?>
						<h3>Hi <?php echo htmlentities($user->name) ?>,</h3>
            <p>
				Welcome to artefact
            </p>
			
			<a href="orders.php" class="btn btn-default" style="color: #fff;">My orders</a>
            <a href="update-profile.php"  class="btn btn-default" style="color: #fff;">Edit my details</a>
            <a href="logout.php"  class="btn btn-default" style="color: #fff;">Logout</a>
        </div>
					<div class="col-md-8 col-md-offset-2">
                        <h1>Last orders</h1>
						
                    <div class="box">	
						<div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="800">Code</th>
                                            <th width="100" align="right">Check</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
																	
									$result = $db->prepare('SELECT tbl_payment.Transaction_ID, tbl_payment.order_ID, tbl_payment.Email, tbl_payment.Date, tbl_payment.Total_Amount, tbl_payment.Status, users.email FROM users, tbl_payment WHERE users.email = tbl_payment.Email ORDER BY 
									tbl_payment.Transaction_ID DESC ' .$pages->get_limit());
									$result->execute(array());
									

									if($result){
										
									  while($obj = $result->fetch()) {
										$id=$obj['order_ID'];
										$dt=$obj['Date'];
									?>
                                        <tr>
                                            <td>
                                            <?php
												echo '<h3>'.$obj['order_ID'].'</h3>';
											?>
                                            </td>
                                            <td>
											<?php
												echo '<p id="deposez"><a itemprop="url" href="downloadproduct.php?id='.$id.'&cont='.$sid.'" class="btn btn-default" ><i class="fa fa-search"></i>Preview</a></p>';
											?>
											<div class="modal fade" id="view-modal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
														<div class="modal-dialog">

															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	<h3 class="modal-title" id="Login">Order : <strong><?php echo $id; ?></strong> from <br /> <?php echo $dt; ?></h3>
																	<h3 class="modal-title" id="Login">Total : <strong><?php echo $obj['Total_Amount']; ?> FCFA</h3>
																</div>	
																<div class="modal-header">
																											
																											<div class="bocus">
																	<?php 
																	if ($obj['Status'] == 'Pay'){
																	?>
																		<h6 class="btn btn-default btn-primary enabled" role="button"><i class="fa fa-money" aria-hidden="true"></i> Payé</h6>
																		<h6 class="btn btn-default disabled" role="button"><i class="fa fa-truck" aria-hidden="true"></i> Delivré</h6>
																	<?php 
																	} else if ($obj['Status'] == 'Deliver') {
																	?>
																		<h6 class="btn btn-default btn-primary enabled" role="button"><i class="fa fa-money" aria-hidden="true"></i> Payé</h6>
																		<h6 class="btn btn-default btn-primary enabled" role="button"><i class="fa fa-truck" aria-hidden="true"></i> Delivré</h6>
																	<?php 
																	} else if ($obj['Status'] == 'Waiting') {
																	?>
																		<h6 class="btn btn-default disabled" role="button"><i class="fa fa-money" aria-hidden="true"></i> Payé</h6>
																		<h6 class="btn btn-default disabled" role="button"><i class="fa fa-truck" aria-hidden="true"></i> Delivré</h6>
																	<?php 
																	} 
																	?>
																											</div>
																</div>	
																<div class="modal-body">
																<div class="container">
																<div class="row">
																	  <div class="margin10"></div>
																	<div class="col-sm-4">
																<div class="table-responsive">
																		<table class="table">
																			<thead>
																			<tr>
																				<th>Product</th>
																				<th>Name</th>
																				<th>Price</th>
																			</tr>
																			</thead>
																			<tbody>
																				<?php
																												
																				$resultat = $db->prepare('SELECT * FROM tbl_purchase WHERE order_ID = :id');
																				$resultat->execute(array(':id' => $id));
																				

																				if($resultat){
																					
																				  while($obj = $resultat->fetch()) {

																				?>
																					<tr>
																						<td>
																						<?php
																							echo '<img src="admin/'.$obj['Image'].'" class="img img-responsive"/>';
																						?>
																						</td>
																						<td>
																						<?php
																							echo '<h3>'.$obj['Titre'].'</h3>';
																						?>
																						</td>
																						<td>
																						<?php    
																							echo $obj['Cost'];
																						?></td>
																					</tr>
																				<?php
																					  }
																					}																					
																				?>

																					
																				<tfoot> 
																				<?php
																				$resultas = $db->prepare("SELECT sum(Cost) FROM tbl_purchase WHERE order_ID = :id");
																				$resultas->execute(array(':id' => $id));
																				for($i=0; $rowas = $resultas->fetch(); $i++){
																					$fgfg=$rowas['sum(Cost)'];
																				}
																				  echo '<tr>';
																				  echo '<th align="right">Total</td>';
																				  echo '<th>'.$fgfg.' FCFA</td>';
																				  echo '</tr>';
																				?>
																				</tfoot>
																				</tbody>
																			</table>

																	</div>
																	  
																	</div>
																				<?php
																												
																				$stmt = $db->prepare('SELECT * FROM tbl_purchase, tbl_payment WHERE tbl_purchase.order_ID = tbl_payment.order_ID AND tbl_purchase.order_ID = :id');
																				$stmt->execute(array(':id' => $id));
																				

																				if($stmt){
																					
																				  $row = $stmt->fetch();

																				?>
																					<div class="col-sm-2">
																					<?php
																						echo '<h8>Buyer information</h8>
																						<hr>';
																																	
																						echo '<h4>Pays : <strong>'.$row['Country'].'</h4>
																							  <h4>Province : <strong>'.$row['Province'].'</h4>
																							  <h4>Ville : <strong>'.$row['City'].'</h4>
																							  <h4>Quartier : <strong>'.$row['State'].'</h4>
																							  <h4>Phone : <strong>'.$row['Phone'].'</h4>';
																					?>
																					<div class="margin10"></div>
																					</div>
																				<?php
																					  
																					}
																				?>
																</div>
																</div>
																</div>
																</div>
																</div>


											  </div>
                                            </td>
                                        </tr>
									<?php
										  }
										}
										else {
										  echo "
																					<tr>
																						<td>Vous n'avez pas de commandes pour le moment.</td>
																					</tr>";
										}
									?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.table-responsive -->
						<div class="pager"><?php  echo $pages->page_links(); ?></div>
                           
                    </div>
                    <!-- /.box -->

                </div>
				
                
				</div>
                <!-- /.col-md-9 --> 
		</div>	
		</div>	
<?php
include("footer.php");
?>
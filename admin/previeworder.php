<?php

include_once 'dbconfig.php';



 require("libs/config.php");

include("header.php");

if(isset($_GET['id']))

        {

$stmt = $pdo->prepare('SELECT * FROM tbl_payment WHERE Name = :name');

$stmt->execute(array(':name' => $_GET['id']));

$row = $stmt->fetch();

?>



        <div class="container">



                

            <div class="span9">

			<div class="alert alert-success">

			<h4>Commandes du client <?php echo $row['Name']; ?></h4>

				  </div>

			<legend></legend>

				


                    <div class="box">	
						<div class="table-responsive">
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">



                        <thead>
                                        <tr>
                                            <th width="800">Code</th>
                                            <th width="100" align="right">Voir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
																	
									$result = $pdo->prepare('SELECT tbl_payment.Transaction_ID, tbl_payment.order_ID, tbl_payment.Email, tbl_payment.Date, tbl_payment.Total_Amount, tbl_payment.Status, users.email FROM users, tbl_payment WHERE users.email = tbl_payment.Email ORDER BY 
									tbl_payment.Transaction_ID DESC ');
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
												echo '<p id="deposez"><a href="#" class="btn" data-toggle="modal" data-target="#view-modal'.$id.'" ><i class="fa fa-search"></i>Apercu</a></p>';
											?>
											<div class="modal fade" id="view-modal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
														<div class="modal-dialog">

															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
																	<h3 class="modal-title" id="Login">Commande : <strong><?php echo $id; ?></strong> du <?php echo $dt; ?></h3>
																	<h3 class="modal-title" id="Login">Montant Total : <strong><?php echo $obj['Total_Amount']; ?></h3>
																</div>	
																<div class="modal-header">
																											
																											<div class="bocus">
																	<?php 
																	if ($obj['Status'] == 'Payé'){
																	?>
																		<h6 class="btn btn-default btn-primary enabled" role="button"><i class="fa fa-money" aria-hidden="true"></i> Payé</h6>
																		<h6 class="btn btn-default disabled" role="button"><i class="fa fa-truck" aria-hidden="true"></i> Delivré</h6>
																	<?php 
																	} else if ($obj['Status'] == 'Delivré') {
																	?>
																		<h6 class="btn btn-default btn-primary enabled" role="button"><i class="fa fa-money" aria-hidden="true"></i> Payé</h6>
																		<h6 class="btn btn-default btn-primary enabled" role="button"><i class="fa fa-truck" aria-hidden="true"></i> Delivré</h6>
																	<?php 
																	} else if ($obj['Status'] == 'En Attente') {
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
																				<th>Produit(s)</th>
																				<th colspan="2">Nom</th>
																				<th>Quantité</th>
																				<th>Prix</th>
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
																							echo '<td>'.$obj['Qty'].'</td>';
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
																				  echo '<th colspan="4" align="right">Total</td>';
																				  echo '<th>'.$fgfg.'</td>';
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
																						echo '<h8>Addresse de livraison</h8>
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
                           
                    </div>

                    </div>

                    <!-- /.box -->





                </div>

                <!-- /.col-md-9 --> 







                </div>

                <!-- /.col-md-3 -->

		</div>	

<?php

		}

include("footer.php");

?>
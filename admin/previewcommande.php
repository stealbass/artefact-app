<?php
 include('dbcon.php');
 require("libs/config.php");
 include("header.php");

if(isset($_GET['id']))
        {
$stmt = $pdo->prepare('SELECT * FROM tbl_payment WHERE order_ID = :invoice');
$stmt->execute(array(':invoice' => $_GET['id']));
$row = $stmt->fetch();
	
if(isset($_POST['edit'])){
$status = $_POST['country'];
	
$result = $pdo->prepare("UPDATE tbl_payment SET Status='$status' WHERE order_ID = :invoice");
$result->execute(array(':invoice' => $_GET['id']));
	 header("Location: previewcommande.php?id=" .$row['order_ID']);
}
?>

        <div class="container">
  
 <div class="row-fluid">
  <div class="span12">

    <div class="row-fluid">
      <div class="span12">
	 <div class="span9">
	
<div class="alert alert-success">
<h4>Bon de commande: #<?php echo $row['order_ID']; ?> Le <?php echo date('d-m-Y H:i:s', strtotime($row['Date'])) ; ?></h4>
	  </div>
<legend></legend>
				
                <div class="container">

                    <div class="span9">
					<div class="span6 ">
					<div  class="well">

                        <h4><i class="fa fa-sign-in"></i> Details de la facture</h4>
						<hr>
                            <?php
								echo '<h5>Commande : <strong><i class="fa fa-hashtag" aria-hidden="true"></i> '.$row['order_ID'].'</strong></h5>';
							?>
                            <?php
								echo '<h5>Date :<strong> '.$row['Date'].'</strong></h5>';
							?>
                            <?php
								echo '<h5>Methode de payement :<strong> '.$row['Paiement'].'</strong></h5>';
							?>
					</div>		
					</div>	
					<div class="span6">
						<form method="POST" action="edit-commande.php">
					<div class="well">
					<div class="bocus">
                                        <a class="btn btn-success" href="edit-commande.php?id=<?php echo $row['order_ID']; ?>">
                                            <span><i class="icon-pencil icon-large"></i> Editez</span>
                                        </a>
                        <h4><i class="fa fa-sign-in"></i> Addresse De Livraison</h4>
					</div>		
						<hr>
                                        <ul>
                                            <li><strong>Nom :</strong>
                                            <?php
												echo $row['Name'];
											?>
                                            </li>
                                            <li><strong>Prenom :</strong>
                                            <?php
												echo $row['Prenom'];
											?>
                                            </li>
                                            <li><strong>Pays :</strong>
                                            <?php
												echo $row['Country'];
											?>
											</li>
                                            <li><strong>Province :</strong>
                                            <?php
												echo $row['Province'];
											?>
											</li>
                                            <li><strong>Ville :</strong>
                                            <?php
												echo $row['City'];
											?>
                                            </li>
                                            <li><strong>Quartier :</strong>
                                            <?php
												echo $row['State'];
											?>
											</li>
                                            <li><strong>Telephone :</strong>
                                            <?php
												echo $row['Phone'];
											?>
											</li>
                                            <li><strong>Email :</strong>
                                            <?php
												echo $row['Email'];
											?>
											</li>
                                        </ul>
					</div>	
						</form>	
					</div>	
						
						<input type="hidden" name="code" value = "<?php echo $row['order_ID']; ?>" />	
						<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
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
																	
									$result = $pdo->prepare('SELECT * FROM tbl_purchase WHERE order_ID = :order_ID');
									$result->execute(array(':order_ID' => $row['order_ID']));
									

									if($result){
										
									  while($obj = $result->fetch()) {

									?>
                                        <tr>
                                            <td width="10%">
                                            <?php
												echo '<img src="'.$obj['Image'].'" class="img img-responsive"/>';
											?>
                                            </td>
                                            <td>
											<?php
												echo '<h3>'.$obj['Brand'].' '.$obj['Titre'].' '.$obj['Cont'].'</h3>';
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
									$resultas = $pdo->prepare("SELECT sum(Cost) FROM tbl_purchase WHERE order_ID = :order_ID");
									$resultas->execute(array(':order_ID' => $row['order_ID']));
									for($i=0; $rowas = $resultas->fetch(); $i++){
										$fgfg=$rowas['sum(Cost)'];
									}
									  echo '<tr>';
									  echo '<th colspan="4" align="right">Sous Total</td>';
									  echo '<th>'.$fgfg.'</td>';
									  echo '</tr>';
									?>
									<?php
									  echo '<tr>';
									  echo '<th colspan="4" align="right">Frais De Livraison</td>';
									  echo '<th>'.$row['Delivery'].'</td>';
									  echo '</tr>';
									?>
									<?php
									  echo '<tr>';
									  echo '<th colspan="4" align="right">Total</td>';
									  echo '<th>'.$row['Total_Amount'].'</td>';
									  echo '</tr>';
									?>
                                    </tfoot>
                                    </tbody>
                                </table>
					<div  class="well">
						<form method="POST" action="">
							<div class="control-group">
							  <h4>Statut</h4>
							 <div class="controls">
							<select name="country" class="country">
							<option selected="selected"><?php echo $row['Status']; ?></option>
											  <option value="En Attente">En Attente</option>
											  <option value="Payé">Payé</option>
											  <option value="Delivré">Delivré</option>
											  <option value="Annulé">Annulé</option>
							</select>
							<h4><button name="edit" type="submit" class="btn btn-success"><i class="icon-save"></i> &nbsp;Ok</button></h4>
							</div>	
							</div>	
							</form>  
					</div>	

                            </div>
                            
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 --> 
	  </div>
	  <?php
	  include('session_sidebar.php');
	  ?>
	<div style="margin-bottom: 21px;" class="pull-right">
                    <a class = "btn btn-primary" href = "view_commande.php" ><i class = "fa fa-arrow-left"></i>Retour</a>
                </div>
    </div>
    </div>
 
</div>
  </div>
		</div>	
<?php
  }
include("footer.php");
?>
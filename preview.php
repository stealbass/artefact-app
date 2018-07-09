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
$page = "Finish your order";
$pageDetails = $page;
$desc = "Vente de livres en ligne";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;
	
		
include("header.php");

if(isset($_GET['invoice']))
        {
$stmt = $db->prepare('SELECT * FROM tbl_payment WHERE order_ID = :invoice');
$stmt->execute(array(':invoice' => $_GET['invoice']));
$row = $stmt->fetch();
	
?>

        <div id="page-wrapper">
            <div class="container">

				
                <div class="col-md-12" id="checkout">
                            <h2>Invoice</h2>
							<hr>

                    <div class="box">
						<form method="POST" action="confirm-paiement.php">
                            <ul class="nav nav-pills nav-justified">
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Verification</a>
                                </li>
                            </ul>
						<div class="pull-left">
                            <?php
								echo '<h3>Commande : <strong><i class="fa fa-hashtag" aria-hidden="true"></i> '.$row['order_ID'].'</strong></h3>';
							?>
                            <?php
								echo '<h3>Date :<strong> '.$row['Date'].'</strong></h3>';
							?>
                            <?php
								echo '<h3>Payment :<strong> '.$row['Paiement'].'</strong></h3>';
							?>
						</div>	
						
						<input type="hidden" name="code" value = "<?php echo $row['order_ID']; ?>" />
                    <div class="panel panel-default">

                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product)</th>
                                            <th>name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
																	
									$result = $db->prepare('SELECT * FROM tbl_purchase WHERE order_ID = :order_ID');
									$result->execute(array(':order_ID' => $row['order_ID']));
									

									if($result){
										
									  while($obj = $result->fetch()) {

									?>
                                        <tr>
                                            <td>
                                            <?php
												echo '<img src="admin/'.$obj['Image'].'" class="img img-responsive"/>';
											?>
                                            </td>
                                            <td>
											<?php
												echo '<h3>'.$obj['Brand'].' '.$obj['Titre'].' '.$obj['Cont'].'</h3>';
											?>
                                            </td>
                                        </tr>
									<?php
										  }
										}
									?>

                                        
                                    <tfoot> 
									<?php
									$resultas = $db->prepare("SELECT sum(Cost) FROM tbl_purchase WHERE order_ID = :order_ID");
									$resultas->execute(array(':order_ID' => $row['order_ID']));
									for($i=0; $rowas = $resultas->fetch(); $i++){
										$fgfg=$rowas['sum(Cost)'];
									}
									  echo '<tr>';
									  echo '<th align="right">Price</td>';
									  echo '<th>'.$fgfg.'</td>';
									  echo '</tr>';
									?>
									<?php
									  echo '<tr>';
									  echo '<th align="right">Charge</td>';
									  echo '<th>'.$row['Delivery'].'</td>';
									  echo '</tr>';
									?>
									<?php
									  echo '<tr>';
									  echo '<th align="right">Total</td>';
									  echo '<th>'.$row['Total_Amount'].' FCFA</td>';
									  echo '</tr>';
									?>
                                    </tfoot>
                                    </tbody>
                                </table>

                            </div>
                            </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-warning" name="btnCommandez">Finish your order
                                    </button>
                                </div>
								
                            <div class="box-footer">
                                <div class="text-center">
                                            <p class="text-muted">(Check your email for your invoice. )</p>
                                </div>
								
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 --> 
		</div>	
		</div>	
<?php
  }
include("footer.php");
?>
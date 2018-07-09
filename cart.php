<?php
require("dbcon.php");
/*
 * @author Steal Bass
 * @website http://mapannoir.weebly.com/
 * @facebook https://www.facebook.com/happi.olivier
 */
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){
	session_start();

            $_SESSION['start'] = time(); // Taking now logged in time.
            // Ending a session in 24 hours from the starting time.
            $_SESSION['expire'] = $_SESSION['start'] + (24 * 3600);

        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            
    header("Location: index.php");
        }}

require("libs/config.php");
$page = "Cart";
$pageDetails = $page;
$desc = "Vente de livres en ligne";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;

include("header.php");
    
if(isset($_SESSION['cart']))
						{
    $delivery = 0;
foreach ($_SESSION['cart'] as $delivery) {

 $delivery  = $_SESSION['delivery'];
}
}
?>

        <div id="page-wrapper">
            <div class="container">
                <div class="row">

				
                <div class="col-12" id="basket">


                        <form method="post" class="input-group" action="paiement.php">
                            <h1>My cart</h1>
						<?php
							  if(isset($_SESSION['cart'])) {

										$total = 0;
								$delivery =  0;
								$items = 0;

								foreach ($_SESSION['cart'] as $item) {

									$items++;

								}			
                            echo '<h3>You have <strong>'.$items.'</strong> product(s) in the cart.</h3>';
							?>
                    <div class="panel panel-default">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									foreach($_SESSION['cart'] as $product_id => $quantity) {
																	
									$result = $db->prepare('SELECT * FROM tbl_produits WHERE prodID = :product_id');
									$result->execute(array(':product_id' => $product_id));
									

									if($result){
										
									  while($obj = $result->fetch()) {
										$id=$obj['prodSlug'];
										$sid=$obj['prodCont'];
															if ($obj['prodDiscount'] > 0) {
										   $cost = $obj['prodAmount'] * $quantity; //work out the line cost
															} else {
										   $cost = $obj['prodPrice'] * $quantity; }
											$total = $total + $cost; //add to the total cost

									?>
                                        <tr>
                                            <td>
                                
                                            <?php
												echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'"><img src="admin/'.$obj['prodImg'].'" class="img img-responsive"/></a>';
											?>
                                            </td>
                                            <td>
											<?php
												echo '<h3>'.$obj['prodBrand'].' '.$obj['prodTitle'].' '.$obj['prodCont'].'</h3>';
											?>
                                            </td>
                                        </tr>
									<?php
										  }
										}
									  }
									?>

                                        
                                    </tbody>
                                    <tfoot> 
									<?php
									  echo '<tr>';
									  echo '<th>Total</td>';
									  echo '<th>'.$total.' FCFA</td>';
									  echo '</tr>';
									?>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                            <a href="update-cart.php?action=empty" class="btn btn-success active"> Empty card</a>
                                </div>
									<?php
									if(isset($_SESSION['user_id'])){
									?>	
                                    <button class="btn btn-warning"> Checkout</button>
                                    <?php
									}
									  else {
										echo '<a href="#" data-toggle="modal" data-target="#login-modal"  class="btn btn-warning">Connexion</a>';
									  }
									?>
                            </div>
							<?php
							}

							else {
							  echo "<p>Vous n'avez pas de produits dans le panier.</p>";
							}
							?>

                        </form>

                    
                    </div>
                    <!-- /.box -->



                   

                    </div>

                <!-- /.col-md-9 -->


                </div>
                    


                </div>
                <!-- /.col-md-9 -->
		</div>	
<?php
include("footer.php");
?>
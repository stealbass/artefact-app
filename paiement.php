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
$page = "Pay your order";
$pageDetails = $page;
$desc = "The african comics repository";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;


include("header.php");
    
if(isset($_SESSION['cart']))
						{
 $delivery  = $_SESSION['delivery'];
}
function redirect($url) {
  echo '<script type="text/javascript">window,location = "' . $url . '";</script>';
}
?>

    <?php
    function productcode() {
        $chars = "003232303232023232023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
        while ($i <= 7) {

            $num = rand() % 33;

            $tmp = substr($chars, $num, 1);

            $pass = $pass . $tmp;

            $i++;

        }
        return $pass;
    }
    $pcode='P-'.productcode();
    ?>
        <div id="page-wrapper">
            <div class="container">

				
                <div class="col-md-12" id="checkout">
                            <h2>Choose payment</h2>
							<hr>
                <div class="col-md-9" id="checkout">

                    <div class="box">
						<form method="POST" action="update-paiement.php">
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-money"></i><br>Payment</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Verification</a>
                                </li>
                            </ul> 

                            <div class="content">
                                <div class="row">
							<?php
									if(isset($_SESSION['cart']))
									{
													$total = 0;
												foreach($_SESSION['cart'] as $product_id => $quantity) {
																				
												$result = $db->prepare('SELECT * FROM tbl_produits WHERE prodID = :product_id');
												$result->execute(array(':product_id' => $product_id));
												

												if($result){
													
												$obj = $result->fetch();
													   $cost = $obj['prodPrice'] * $quantity; //work out the line cost
														$total = $total + $cost; //add to the total cost
														$grandtotal = $total + $delivery;
										?>
										<input type="hidden" name="date" value="<?php echo date("m/d/Y"); ?>" />
										<input type="hidden" name="code" value = "<?php echo $pcode; ?>" />
										<input type="hidden" name="amount" value="<?php echo $grandtotal; ?>" />
										<input type="hidden" name="title" value="<?php echo $obj['prodTitle']; ?>" />
										<input type="hidden" name="quantity" value="<?php echo $quantity; ?>" />
										<input type="hidden" name="cost" value="<?php echo $total; ?>" />
										<input type="hidden" name="delivery" value="<?php echo $delivery; ?>" />
								<?php
												}
											}
										$users_id = $_SESSION['user_id'];
								        $query = $db->prepare("SELECT * FROM users WHERE user_id=:user_id");
										$query->execute(array(':user_id' => $users_id));
												$row = $query->fetch();
								?>		
										<input type="hidden" name="nom" value="<?php echo $row['name']; ?>" />
										<input type="hidden" name="prenom" value = "<?php echo $row['prenom']; ?>" />
										<input type="hidden" name="pays" value="<?php echo $row['pays']; ?>" />
										<input type="hidden" name="province" value="<?php echo $row['province']; ?>" />
										<input type="hidden" name="ville" value="<?php echo $row['ville']; ?>" />
										<input type="hidden" name="state" value="<?php echo $row['state']; ?>" />
										<input type="hidden" name="phone" value="<?php echo $row['phone']; ?>" />
										<input type="hidden" name="email" value="<?php echo $row['email']; ?>" />
										
                                        <div class="tab-content">

                                            <h4>Pay with MTN Mobile Money</h4>
											<hr>
                                            

                                            <div class="box-footer text-center">
                                                <label><img class="img-rounded" src="assets/img/mtn.png" width="100"></label>
                                                <input type="radio" name="ptype" value="MTN Mobile Money" <?php if ($_POST['ptype'] == 'MTN Mobile Money') { echo "checked"; } ?>>
                                            </div>
                                        </div>
                                        <div class="tab-content">

                                            <h4>Pay with Orange Money</h4>
											<hr>

                                            	

                                            <div class="box-footer text-center">
                                                <label><img class="img-rounded" src="assets/img/orange.png" width="100"></label>

                                                <input type="radio" name="ptype" value="Orange Money" <?php if ($_POST['ptype'] == 'Orange Money') { echo "checked"; } ?>>
                                            </div>
                                        </div>
                                </div>
                                <!-- /.row -->

                            </div>
                            <!-- /.content -->

                    <div class="panel panel-default text-center">
								
									<button  type="submit"class="btn btn-warning" name="btnPaiement">Vérification</button>
									
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 --> 
							<?php
									if(isset($_SESSION['cart']))
									{
													$total = 0;
												foreach($_SESSION['cart'] as $product_id => $quantity) {
																				
												$result = $db->prepare('SELECT * FROM tbl_produits WHERE prodID = :product_id');
												$result->execute(array(':product_id' => $product_id));
												

												if($result){
													
												$obj = $result->fetch();
													   $cost = $obj['prodPrice'] * $quantity; //work out the line cost
														$total = $total + $cost; //add to the total cost
														$grandtotal = $total + $delivery;
										?>
				 <div class="col-md-3">
                    <div class="panel panel-default">

                            <div class="table-responsive">
                                <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td>Cost</td>
									<?php  echo '<th>'.$total.'</td>'; ?>
                                    </tr>
                                    <tr>
                                        <td>Charge</td>
									<?php  echo '<th>'.$delivery.'</td>'; ?>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
									<?php  echo '<th>'.$grandtotal.' FCFA</td>'; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>



                </div>
								<?php
												}
											}
                                            }
								?>	
                <!-- /.col-md-3 -->
		</div>		
		</div>		
<?php
									}
include("footer.php");
?>
<?php
/**
 * Tutorial: PHP Login Registration system
 *
 * Page : Profile
 */
require("libs/config.php");
$page = "My account";
$pageDetails = $page;
$desc = "The african comics repository";
$pageDesc = $desc;
$key = "Book, Ventes en ligne";
$pageKey = $key;
 
// Start Session
session_start();

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: register.php");
}

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
$stmt = $db->prepare('SELECT tbl_payment.Transaction_ID, tbl_payment.order_ID, tbl_payment.Email, users.email, users.user_id FROM users, tbl_payment WHERE users.user_id='.$_SESSION['user_id'].' AND users.email = tbl_payment.Email ORDER BY 
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
							if ($user->photo) {
						echo '<img src="admin/'. htmlentities($user->photo) .'"  class="pull-right profil" class="img img-responsive" style="width: 100px; height: 100px;"/>';
					}
					?>
						<h3>Hi <?php echo htmlentities($user->name); ?>,</h3>
            <p>
				Welcome to artefacts
            </p>
			
            <a href="update-profile.php"  class="btn btn-default" style="color: #fff;">Edit my details</a>
					<?php

					  if($user->author == 1){
						echo '<a href="upload.php"  class="btn btn-default" style="color: #fff;">Upload a book</a>';
					  }
					  ?>
            
            <a href="logout.php"  class="btn btn-default" style="color: #fff;">Logout</a>
        </div>
    </div>
					<div class="col-md-12">
					<?php

					  if($user->author == 1){
					  ?>
                        <h1>Last post</h1>
						
                    <div class="box">	 
						<div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">

                                 
                                
                                  <tbody>
                                
                                  
                                
                                  <?php
                                  $author = htmlentities($user->username);
                                  $query = $db->prepare('select tbl_produits.prodID, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodDesc, tbl_produits.prodCont, tbl_produits.prodPrice, tbl_produits.qty, tbl_produits.prodImg, tbl_produits.prodUser, tbl_produits.prodPdf, users.user_id FROM tbl_produits, users WHERE users.user_id='.$_SESSION['user_id'].' AND tbl_produits.prodUser = users.user_id ORDER BY tbl_produits.prodID');
                                
								    $query->execute();
                                
									if($query){
                                			while($product = $query->fetch()){
                                
                                	
                        													$id=$product['prodSlug'];
                        													$sid=$product['prodCont'];
                        													$pid=$product['prodID'];
                                
                                
                                
                                	?>
                                
                                	
                                        <tr>
                    					  <td width="100"><img class="img img-responsive" src="admin/<?php echo $product['prodImg']; ?>" width="100"></td>
                    					  
                    					  <td>
                                            <td>
                							<?php
                										echo '<h4>'.$product['prodTitle'].'</h4>';
                                                ?>
                                            <p class="text-muted"><?php echo $product['subcatSlug'] ?></p>
                                            <p>By <a href="detailprofil.php?id=<?php echo $product['prodUser'] ?>"><?php echo $product['prodCont'] ?></a></p>
                                            <button type="button" class="btn btn-danger btn-circle">-<?php echo $product['qty'] ?>
                                            </button>
															<?php
                                                            if ($product['prodPrice'] == 0) {
                                                            echo '<a itemprop="url" href="download.php?filename='.$product['prodPdf'].'" class="btn btn-warning" >Read</a>';
                                                            } else {
																echo '<a href="update-cart.php?action=add&id='.$pid.'"><input type="submit" value="'.$product['prodPrice'].' XAF" style="clear:both; background: #ffd400; border: 1px solid #000000; border-radius: 3px; color: #000; font-size: 0.9em; font-weight: 700; padding: 5px; text-transform: uppercase; text-align: center;"/></a>';
																}
															?>
							                 <p class="text-muted"><div class="sharethis-inline-share-buttons"></div></p>
                                                            </td>
                                    <td witdh = "30%">

										<a data-toggle="modal" href="#delete<?php echo $pid; ?>" class="btn btn-danger">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>

                                        &nbsp;

                                        <a class="btn btn-warning" href="edit-produit.php?id=<?php  echo $pid;?>">

                                            <span><i class="icon-pencil icon-large"></i> Edit</span>

                                        </a>

                                    </td>
                                        
                                
                                	<?php 
                                
                                	include('modal_delete_product.php');
                                
                                	?>
                                
                                	
                                
                                	
                                    </tr>
                                
                                	  <?php } 
                                } 
                                	  
                                
                                ?>
                                
                                
                                	
                                
                                  </tbody>
                                
                                  </table>
                                </div>
                                </div>
                                <?php } ?>
                        <h1>Last orders</h1>
                    <div class="box">
						<div class="table-responsive">
                                <table class="table table-hove">
                                    <tbody>
									<?php
																	
									$result = $db->prepare('SELECT tbl_payment.Transaction_ID, tbl_payment.order_ID, tbl_payment.Email, tbl_payment.Date, tbl_payment.Total_Amount, tbl_payment.Status, users.email, users.user_id FROM users, tbl_payment WHERE users.user_id='.$_SESSION['user_id'].' AND users.email = tbl_payment.Email ORDER BY 
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
                                                $resultat = $db->prepare('SELECT * FROM tbl_purchase WHERE order_ID = :id');
																				$resultat->execute(array(':id' => $id));
															
																					
																				  $obj = $resultat->fetch();
																				    $name = $obj['Pdf'];
		
	
												echo '<p id="deposez"><strong>Download : </strong><a itemprop="url" href="download.php?filename='.$name.'" class="btn btn-default" ><i class="fa fa-download fa-fw"></i></a></p>';
											?>
                                            </td>
                                        </tr>
									<?php
										  }
										}
										else {
										  echo "<tr>
												<td>No order for now.</td>
												<td></td>
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
    </div>
<?php
include("footer.php");
?>

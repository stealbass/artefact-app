<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.alwaysdata.net/
 * @facebook https://www.facebook.com/happi.olivier
 */

require("libs/config.php");
$page = "Library";
$pageDetails = $page;
$desc = "The african comics repository";
$pageDesc = $desc;
$key = "Templates, Ventes en ligne, Livres";
$pageKey = $key;
include("header.php");
?>
<?php
require("dbcon.php");


if(isset($_GET['id']))
        {
$stmt = $db->prepare('SELECT * FROM users WHERE user_id = :user_id');
$stmt->execute(array(':user_id' => $_GET['id']));
$row = $stmt->fetch();
							
//if post does not exists redirect user.
if($id == ''){
	header('Location: ./');
	exit;
}

?>

        <div id="page-wrapper">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="100">
            								<?php
            										echo '<img itemprop="image" src="admin/'.$row['photo'].'" class="img img-responsive" alt="'.$row['name'].'"/>';
                                            ?>
                                            </td>
                                            
                                            <td><p><strong>Nom :</strong>

                                            <?php

												echo $row['name'];

											?>

                                            </p>

                                            <p><strong>Prenom :</strong>

                                            <?php

												echo $row['prenom'];

											?>

                                            </p>

                                            <p><strong>Pays :</strong>

                                            <?php

												echo $row['pays'];

											?>

											</p>

                                            <p><strong>Ville :</strong>

                                            <?php

												echo $row['ville'];

											?>

                                            </p>

                                            <p><strong>Telephone :</strong>

                                            <?php

												echo $row['phone'];

											?>

											</p>

                                            <p><strong>Email :</strong>

                                            <?php

												echo $row['email'];

											?>
                                            </p>    
											</td>

                                        </tr>
                                    </tbody>
                                </table>

					</div>	
					</div>	
					</div>	
					</div>	

					<div class="col-md-12">
                        <h1>Last post from <?php echo $row['name']; ?></h1>
						
                    <div class="box">	 
						<div class="table-responsive">
                                <table class="table table-hover" id="dataTables-example">

                                 
                                
                                
                                  <tbody>
                                
                                  
                                
                                  <?php
                                  $author = $row['user_id'];
                                  $query = $db->prepare("select tbl_produits.prodID, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodDesc, tbl_produits.prodCont, tbl_produits.qty, tbl_produits.prodPrice, tbl_produits.prodImg, tbl_produits.prodUser, users.user_id FROM tbl_produits, users WHERE tbl_produits.prodUser = users.user_id AND users.user_id = :author ORDER BY tbl_produits.prodID");
                                
								    $query->execute(array(':author' => $author));
                                
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
                										echo '<h4><a itemprop="url" href="detail.php?id='.$id.'">'.$product['prodTitle'].'</a></h4>';
                                                ?>
                                            <p class="text-muted"><?php echo $product['subcatSlug'] ?></p>
                                            <p>By <a href="detailprofil.php?id=<?php echo $product['prodUser'] ?>"><?php echo $product['prodCont'] ?></a></p>
                                            <button type="button" class="btn btn-danger btn-circle">-<?php echo $product['qty'] ?>
                                            </button>
															<?php
																echo '<a href="update-cart.php?action=add&id='.$pid.'"><input type="submit" value="'.$product['prodPrice'].' XAF" style="clear:both; background: #ffd400; border: 1px solid #000000; border-radius: 3px; color: #000; font-size: 0.9em; font-weight: 700; padding: 5px; text-transform: uppercase; text-align: center;"/></a>';
																
															?>
							                 <p class="text-muted"><div class="sharethis-inline-share-buttons"></div></p>
                                                            </td>
                                        </tr>
                                
                                	  <?php } 
                                
                                	  
                                
                                ?>
                                
                                
                                	
                                
                                  </tbody>
                                
                                  </table>
                                </div>
                                </div>
                                
                                    <h1>Check also</h1>
                    <div class="panel panel-default">
                            <div class="">
                                <table class="table table-hover">
                                    <tbody>
                        			<?php
                        							  $query=$db->prepare('SELECT * FROM users WHERE user_id = :user_id AND user_id != :user_id ORDER BY 
                                            RAND()	LIMIT 3');
                        								$query->execute(array(':user_id' => $_GET['id']));
                        								?>
                        								<?php
                        										while($row = $query->fetch()){
                        													$id=$row['user_id'];
                        							?>
                                        <tr>
                                            <td width="100">
            								<?php
            										echo '<a itemprop="url" href="detailprofil.php?id='.$id.'"><img itemprop="image" src="admin/'.$row['photo'].'" class="img img-responsive" alt="'.$row['name'].'"/></a>';
                                            ?>
                                            </td width="100">
                                            <td>
            								<?php
            										echo '<h4 itemprop="name"><a itemprop="url" href="detailprofil.php?id='.$id.'">'.$row['name'].'</a></h4>';
                                            ?>               
                                            </td>
                        					  <?php } 							
                        				?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>

            <!-- /.container -->
			<?php
		}        
?>


<?php
include("footer.php");
?>
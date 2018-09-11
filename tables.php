<?php
/*
 * @author Steal Bass
 * @website 
 * @facebook 
 * @twitter 
 * @googleplus 
 */
require("dbcon.php");
$pages = new Paginator('4','p');

//collect all records fro the next function
$stmt=$db->prepare('select tbl_produits.prodID, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodCont, tbl_produits.prodDesc, tbl_produits.prodImg, tbl_produits.qty, tbl_produits.prodPrice, tbl_produits.prodActif, tbl_produits.prodUser, tbl_submain.subcatSlug FROM tbl_produits, tbl_submain WHERE tbl_produits.subcat_id = tbl_submain.subcat_id AND tbl_produits.prodActif = 1 ');
$stmt->execute(array());
								
//determine the total number of records
$pages->set_total($stmt->rowCount());
?>
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="">
            <div class="col-lg-12">
            
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  </ol>
            
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                                            <?php
															  $query=$db->query('select * FROM tbl_produits WHERE prodSlug = "agissons-tous-no-3" AND prodActif = 1 ');
														$row = $query->fetch();
												$id=$row['prodSlug'];
												$sid=$row['prodCont'];
																?>
                    <div class="item active">
            								<?php
            										echo '<a itemprop="url" href="detail.php?id='.$id.'"><img src="assets/img/book1.jpg" alt="..."></a>';
                                            ?>
                      <div class="carousel-caption">
                        <h5>Agissons tous No 3</h5>
                      </div>
                    </div>
                                            <?php
															  $query=$db->query('select * FROM tbl_produits WHERE prodSlug = "les-nombrilcs-no-1" AND prodActif = 1 ');
														$row = $query->fetch();
												$id=$row['prodSlug'];
												$sid=$row['prodCont'];
																?>
                    <div class="item">
            								<?php
            										echo '<a itemprop="url" href="detail.php?id='.$id.'"><img src="assets/img/book2.jpg" alt="..."></a>';
                                            ?>
                      <div class="carousel-caption">
                        <h5>Les nombrilCs No 1</h5>
                      </div>
                    </div>
                                            <?php
															  $query=$db->query('select * FROM tbl_produits WHERE prodSlug = "les-voyageurs-du-graal" AND prodActif = 1 ');
														$row = $query->fetch();
												$id=$row['prodSlug'];
												$sid=$row['prodCont'];
																?>
                    <div class="item">
            								<?php
            										echo '<a itemprop="url" href="detail.php?id='.$id.'"><img src="assets/img/book3.jpg" alt="..."></a>';
                                            ?>
                      <div class="carousel-caption">
                        <h5>Les voyageurs du graal</h5>
                      </div>
                    </div>
                  </div>
            
                </div>
              </div>
            
            
            <div class="row">
                <div class="col-lg-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                    <?php
							  $query=$db->prepare('select tbl_produits.prodID, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodCont, tbl_produits.prodDesc, tbl_produits.prodImg, tbl_produits.qty, tbl_produits.prodPrice, tbl_produits.prodActif, tbl_produits.prodUser, tbl_submain.subcatSlug FROM tbl_produits, tbl_submain WHERE tbl_produits.subcat_id = tbl_submain.subcat_id AND tbl_produits.prodActif = 1  
                      ORDER BY 
                    prodID DESC '.$pages->get_limit());
								$query->execute(array());
								?>
							<?php
										while($row = $query->fetch()){
								$id=$row['prodSlug'];
								$sid=$row['prodCont'];
                                $pid=$row['prodID'];
							?>
                                        <tr>
                                            <td width="100">
            								<?php
            										echo '<a itemprop="url" href="detail.php?id='.$id.'"><img itemprop="image" src="admin/'.$row['prodImg'].'" class="img img-responsive" alt="'.$row['prodTitle'].'"/></a>';
                                            ?>
                                            </td width="100">
                                            <td>
                                            <div class="single_product_desc">
            								<?php
            										echo '<h4 itemprop="name"><a itemprop="url" href="detail.php?id='.$id.'"><br/> '.$row['prodTitle'].'</a></h4>';
                                            ?>
                                            <p class="text-muted"><?php echo $row['subcatSlug'] ?></p>
                                            <p>By <a href="detailprofil.php?id=<?php echo $row['prodUser'] ?>"><?php echo $row['prodCont'] ?></a></p>
                                            <button type="button" class="btn btn-danger btn-circle">-<?php echo $row['qty'] ?>
                                            </button>
															<?php
                                                            if ($row['prodPrice'] == 0) {
                                                            echo '<a itemprop="url" href="download.php?filename='.$row['prodPdf'].'" class="btn btn-warning" >Read</a>';
                                                            } else {
																echo '<a href="update-cart.php?action=add&id='.$pid.'"><input type="submit" value="'.$row['prodPrice'].' XAF" style="clear:both; background: #ffd400; border: 1px solid #000000; border-radius: 3px; color: #000; font-size: 0.9em; font-weight: 700; padding: 5px; text-transform: uppercase; text-align: center;"/></a>';
																}
															?>
                                            </div>                
                                            </td>
                        					  <?php } 							
                        				?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <!-- End  Hover Rows  -->
						 <?php  echo $pages->page_links(); ?>
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->
              </div>


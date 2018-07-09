<?php
/*
 * @author Steal Bass
 * @website 
 * @facebook 
 * @twitter 
 * @googleplus 
 */
require("dbcon.php");
?>
        <!--  page-wrapper -->
        <div id="page-wrapper">
            <div class="container">
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
                    <div class="item active">
                      <img src="assets/img/book1.jpg" alt="...">
                      <div class="carousel-caption">
                        <h5>Agissons tous No 3</h5>
                      </div>
                    </div>
                    <div class="item">
                      <img src="assets/img/book2.jpg" alt="...">
                      <div class="carousel-caption">
                        <h5>Les nombrilCs No 1</h5>
                      </div>
                    </div>
                    <div class="item">
                      <img src="assets/img/book3.jpg" alt="...">
                      <div class="carousel-caption">
                        <h5>Les voyageurs du graal</h5>
                      </div>
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
                                        <tr>
                                            <td width="100"><a href="#"><img class="img-rounded" src="assets/img/cover1.jpg" width="100"></a></td>
                                            <td width="100"><h4><a href="#">Agissons tous No 3</a></h4>
                                            <p class="text-muted">Action</p>
                                            <p>By Joëlle Epée Mandengue</p>
                                            <button type="button" class="btn btn-danger btn-circle">-18
                                            </button>
                                            <button type="button" class="btn btn-warning"><i class="fa fa-download fa-fw"></i></button></td>
                                        </tr>
                    <?php
							  $query=$db->prepare('select tbl_produits.prodID, tbl_produits.prodBrand, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodCont, tbl_produits.prodDesc, tbl_produits.prodImg, tbl_produits.prodPrice, tbl_produits.prodDiscount, tbl_produits.prodAmount FROM tbl_produits, tbl_downsub WHERE tbl_produits.downcat_id = tbl_downsub.downcat_id 
                      ORDER BY 
                    RAND() LIMIT 6 ');
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
            										echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" class="img-rounded"><img itemprop="image" src="admin/'.$row['prodImg'].'" class="img img-responsive" alt="'.$row['prodBrand'].' '.$row['prodTitle'].' '.$row['prodCont'].'"/></a>';
                                            ?>
                                            </td>
                                            <td width="100">
            								<?php
            										echo '<h4 itemprop="name"><a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'">'.$row['prodBrand'].'<br/> '.$row['prodTitle'].'<br/> '.$row['prodCont'].'</a></h4>';
                                            ?>
                                            <p class="text-muted">Humour</p>
                                            <p>By Mandresak</p>
                                            <button type="button" class="btn btn-danger btn-circle">-18
                                            </button>
															<?php
																echo '<a href="update-cart.php?action=add&id='.$pid.'"><input type="submit" value="Buy" style="clear:both; background: #f0ad4e; border: 1px solid #eea236; border-radius: 3px; color: #fff; font-size: 1em; padding: 5px; font-weight: 400; text-transform: uppercase; text-align: center;"/></a>';
																
															?>
                                            </td>
                        					  <?php } 							
                        				?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
            </div>
        </div>
        <!-- end page-wrapper -->


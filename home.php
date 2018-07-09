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
        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix mt-50">
        <div class="container">
                <ul class="nav nav-tabs nav-justified">
                    <li class="nav-item">
                        <a class="nav-link amado-btn active" data-toggle="tab" href="#panel1" role="tab">Featured</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link amado-btn" data-toggle="tab" href="#panel2" role="tab">Best seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link amado-btn" data-toggle="tab" href="#panel3" role="tab">On sale</a>
                    </li>
                </ul>
					<div class="tab-content card">

						<div class="tab-pane fade in show active" id="panel1" role="tabpanel">
            <div class="row">
        
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
							?>
                <!-- Single Catagory -->
                <div class="single-products-catagory col-12 col-lg-4 clearfix">
								<?php
										echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" class="text-center product-img"><img itemprop="image" src="admin/'.$row['prodImg'].'" class="img img-responsive" alt="'.$row['prodBrand'].' '.$row['prodTitle'].' '.$row['prodCont'].'"/>';
                                ?>
                                    <div class="overlay">
                                        <a href="cart.html" class="btn amado-btn">Preview</a>
													<?php
														echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" class="btn clever-btn">Details</a>';
													?>
                                    </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                                    <div class="pull-right">
													<?php
														echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""> <span>(0)</span></a>';
													?>
                                    </div>
															<?php 
														      $today = date('Y-m-d',strtotime('-1 days'));
															  $deadline_ts = $row['prodDiscdate'];
															
																$smt = $db->prepare("UPDATE tbl_produits SET prodDiscount=0 WHERE DATE(prodDiscdate) = DATE( DATE_SUB( NOW() , INTERVAL 1 DAY ) )");
															$smt->execute(); 
															if ($row['prodDiscount'] > 0) {
															?>
                                    <p class="product-price"><s></samp><?php
																echo $row['prodPrice'];
															?> FCFA</s></p>
                                    <p class="product-price"><?php
																echo $row['prodAmount'];
															?>  FCFA</p>
															<?php
															} else {
															?>
                                    <p class="product-price"><?php
																echo $row['prodPrice'];
															?> FCFA</p>
															<?php
															}
															?>
								<?php
										echo '<h4 itemprop="name"><a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'"><strong>'.$row['prodBrand'].'</strong><br/> '.$row['prodTitle'].' '.$row['prodCont'].'</a></h4>';
                                ?>
                        </div>
                    </a>
                </div>
								<?php } ?>


            </div>
            </div>
            
            <div class="tab-pane fade" id="panel2" role="tabpanel">
            <div class="row">
        
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
							?>
                <!-- Single Catagory -->
                <div class="single-products-catagory col-12 col-lg-4 clearfix">
								<?php
										echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" class="text-center product-img"><img itemprop="image" src="admin/'.$row['prodImg'].'" class="img img-responsive" alt="'.$row['prodBrand'].' '.$row['prodTitle'].' '.$row['prodCont'].'"/>';
                                ?>
                                    <div class="overlay">
                                        <a href="cart.html" class="btn amado-btn">Preview</a>
													<?php
														echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" class="btn clever-btn">Details</a>';
													?>
                                    </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                                    <div class="pull-right">
													<?php
														echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""> <span>(0)</span></a>';
													?>
                                    </div>
															<?php 
														      $today = date('Y-m-d',strtotime('-1 days'));
															  $deadline_ts = $row['prodDiscdate'];
															
																$smt = $db->prepare("UPDATE tbl_produits SET prodDiscount=0 WHERE DATE(prodDiscdate) = DATE( DATE_SUB( NOW() , INTERVAL 1 DAY ) )");
															$smt->execute(); 
															if ($row['prodDiscount'] > 0) {
															?>
                                    <p class="product-price"><s></samp><?php
																echo $row['prodPrice'];
															?> FCFA</s></p>
                                    <p class="product-price"><?php
																echo $row['prodAmount'];
															?>  FCFA</p>
															<?php
															} else {
															?>
                                    <p class="product-price"><?php
																echo $row['prodPrice'];
															?> FCFA</p>
															<?php
															}
															?>
								<?php
										echo '<h4 itemprop="name"><a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'"><strong>'.$row['prodBrand'].'</strong><br/> '.$row['prodTitle'].' '.$row['prodCont'].'</a></h4>';
                                ?>
                        </div>
                    </a>
                </div>
								<?php } ?>


            </div>
        </div>
        <div class="tab-pane fade" id="panel3" role="tabpanel">
            <div class="row">
        
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
							?>
                <!-- Single Catagory -->
                <div class="single-products-catagory col-12 col-lg-4 clearfix">
								<?php
										echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" class="text-center product-img"><img itemprop="image" src="admin/'.$row['prodImg'].'" class="img img-responsive" alt="'.$row['prodBrand'].' '.$row['prodTitle'].' '.$row['prodCont'].'"/>';
                                ?>
                                    <div class="overlay">
                                        <a href="cart.html" class="btn amado-btn">Preview</a>
													<?php
														echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" class="btn clever-btn">Details</a>';
													?>
                                    </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                                    <div class="pull-right">
													<?php
														echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""> <span>(0)</span></a>';
													?>
                                    </div>
															<?php 
														      $today = date('Y-m-d',strtotime('-1 days'));
															  $deadline_ts = $row['prodDiscdate'];
															
																$smt = $db->prepare("UPDATE tbl_produits SET prodDiscount=0 WHERE DATE(prodDiscdate) = DATE( DATE_SUB( NOW() , INTERVAL 1 DAY ) )");
															$smt->execute(); 
															if ($row['prodDiscount'] > 0) {
															?>
                                    <p class="product-price"><s></samp><?php
																echo $row['prodPrice'];
															?> FCFA</s></p>
                                    <p class="product-price"><?php
																echo $row['prodAmount'];
															?>  FCFA</p>
															<?php
															} else {
															?>
                                    <p class="product-price"><?php
																echo $row['prodPrice'];
															?> FCFA</p>
															<?php
															}
															?>
								<?php
										echo '<h4 itemprop="name"><a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'"><strong>'.$row['prodBrand'].'</strong><br/> '.$row['prodTitle'].' '.$row['prodCont'].'</a></h4>';
                                ?>
                        </div>
                    </a>
                </div>
								<?php } ?>


            </div></div>
        <!-- Product Catagories Area End -->
    </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
    </div>

    </div>
    <!-- ##### Newsletter Area Start ##### -->
    <section class="newsletter-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <!-- Newsletter Text -->
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="newsletter-text mb-100">
                        <h2>Subscribe for a <span>25% Discount</span></h2>
                        <p>Nulla ac convallis lorem, eget euismod nisl. Donec in libero sit amet mi vulputate consectetur. Donec auctor interdum purus, ac finibus massa bibendum nec.</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-lg-6 col-xl-5">
                    <div class="newsletter-form mb-100">
                        <a href="#" class="btn amado-btn mb-15">Join us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Newsletter Area End ##### -->
            


<?php
require("dbcon.php");
//instantiate the class

if(isset($_GET['id']))
        {
$stmt = $db->prepare('SELECT * FROM tbl_downsub WHERE catSlug = :catSlug');
$stmt->execute(array(':catSlug' => $_GET['id']));
$row = $stmt->fetch();

$pages = new Paginator('6','p');

//collect all records fro the next function
$stmt=$db->prepare('select tbl_produits.prodID FROM tbl_produits, tbl_downsub WHERE tbl_produits.downcat_id = tbl_downsub.downcat_id 
                     AND tbl_downsub.downcat_id = :downcat_id');
$stmt->execute(array(':downcat_id' => $row['downcat_id']));
								
//determine the total number of records
$pages->set_total($stmt->rowCount());
?>
        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
						<?php
						 $res_pro=$db->prepare("SELECT * FROM tbl_submain");
						 $res_pro->execute();
						 ?>
						<ul class="nav nav-pills nav-stacked category-menu">
												<?php  
												  while($pro_row=$res_pro->fetch())
												  {
													  $id=$pro_row['subcatSlug'];
												   ?>
												   <?php 
														echo '<li><a href="subcatproduct.php?id='.$id.'">'.$pro_row['subcat_name'].'</a></li>';
													?>
												<?php
												  }
												  ?>

                            </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget brands mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Brands</h6>

                <div class="widget-desc">
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="amado">
                        <label class="form-check-label" for="amado">Amado</label>
                    </div>
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="ikea">
                        <label class="form-check-label" for="ikea">Ikea</label>
                    </div>
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="furniture">
                        <label class="form-check-label" for="furniture">Furniture Inc</label>
                    </div>
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="factory">
                        <label class="form-check-label" for="factory">The factory</label>
                    </div>
                    <!-- Single Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="artdeco">
                        <label class="form-check-label" for="artdeco">Artdeco</label>
                    </div>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget color mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Color</h6>

                <div class="widget-desc">
                    <ul class="d-flex">
                        <li><a href="#" class="color1"></a></li>
                        <li><a href="#" class="color2"></a></li>
                        <li><a href="#" class="color3"></a></li>
                        <li><a href="#" class="color4"></a></li>
                        <li><a href="#" class="color5"></a></li>
                        <li><a href="#" class="color6"></a></li>
                        <li><a href="#" class="color7"></a></li>
                        <li><a href="#" class="color8"></a></li>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
            <div class="widget price mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Price</h6>

                <div class="widget-desc">
                    <div class="slider-range">
                        <div data-min="10" data-max="1000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="10" data-value-max="1000" data-label-result="">
                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                        </div>
                        <div class="range-price">$10 - $1000</div>
                    </div>
                </div>
            </div>
        </div>
                <div class="amado_product_area section-padding-100">
                    <div class="container-fluid">

			<?php
							  $query=$db->prepare('select tbl_produits.prodID, tbl_produits.prodBrand, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodCont, tbl_produits.prodDesc, tbl_produits.prodImg, tbl_produits.prodPrice, tbl_produits.prodDiscount, tbl_produits.prodAmount FROM tbl_produits, tbl_downsub WHERE tbl_produits.downcat_id = tbl_downsub.downcat_id 
                     AND tbl_downsub.downcat_id = :downcat_id ORDER BY 
                    prodID ' .$pages->get_limit());
								$query->execute(array(':downcat_id' => $row['downcat_id']));
								?>
                        <div class="row">
        
												<?php
															while($row = $query->fetch()){
													$id=$row['prodSlug'];
													$sid=$row['prodCont'];
													$pid=$row['prodID'];
													
												?>
                            <!-- Single Product Area -->
                            <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
													<?php
														echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'"><img itemprop="image" src="admin/'.$row['prodImg'].'" class="img img-responsive" alt="'.$row['prodBrand'].' '.$row['prodTitle'].' '.$row['prodCont'].'"/></a>';
													?>
                                        <!-- Hover Thumb -->
                                    <div class="overlay">
                                        <a href="cart.html" class="btn amado-btn">Preview</a>
													<?php
														echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" class="btn clever-btn">Details</a>';
													?>
                                    </div>
                                    </div>
                                        <div class="mt-3 text-center">
                                            <a href="product-details.html">
															<?php
																echo '<h6 itemprop="name"><strong>'.$row['prodBrand'].'</strong><br/> '.$row['prodTitle'].' '.$row['prodCont'].'</h6>';
															?>
                                            </a>
                                        </div>
        
                                    <!-- Product Description -->
                                    <div class="product-description d-flex align-items-center justify-content-between">
                                        <!-- Product Meta Data -->
                                        <div class="product-meta-data">
                                            <div class="line"></div>
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
                                        </div>
                                        <!-- Ratings & Cart -->
                                        <div class="ratings-cart text-right">
                                            <a href="product-details.html">
                                                <img src="img/core-img/cart.png" alt=""> <span>(0)</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
												<?php } ?>
        
                        </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
						 <?php  echo $pages->page_links('catproduct.php?id='.$_GET['id'].'&'); ?>
                    </div>
                </div>
                            </div>
                        </div>
				</div>

            </div>
            <!-- /.container -->
			<?php
		}
?>


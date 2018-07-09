<?php
require("dbcon.php");


if(isset($_GET['id']))
        {
$stmt = $db->prepare('SELECT * FROM tbl_submain WHERE subcatSlug = :subcatSlug');
$stmt->execute(array(':subcatSlug' => $_GET['id']));
$row = $stmt->fetch();

$pages = new Paginator('8','p');

//collect all records fro the next function
$stmt=$db->prepare('select tbl_produits.prodID FROM tbl_produits, tbl_submain WHERE tbl_produits.subcat_id = tbl_submain.subcat_id 
                     AND tbl_submain.subcat_id = :subcat_id');
$stmt->execute(array(':subcat_id' => $row['subcat_id']));
								
//determine the total number of records
$pages->set_total($stmt->rowCount());
?>
        <div id="page-wrapper">
            <div class="container">

			<?php
							  $query=$db->prepare('select tbl_produits.prodID, tbl_produits.prodBrand, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodCont, tbl_produits.prodDesc, tbl_produits.prodImg, tbl_produits.prodPrice, tbl_produits.prodDiscount, tbl_produits.prodAmount FROM tbl_produits, tbl_submain WHERE tbl_produits.subcat_id = tbl_submain.subcat_id 
                     AND tbl_submain.subcat_id = :subcat_id ORDER BY 
                    prodID ' .$pages->get_limit());
								$query->execute(array(':subcat_id' => $row['subcat_id']));
								?>
                        <div class="row">
        
												<?php
															while($row = $query->fetch()){
													$id=$row['prodSlug'];
													$sid=$row['prodCont'];
													$pid=$row['prodID'];
												?>
                            <!-- Single Product Area -->
                            <div class="col-12">
                    <div class="panel panel-default">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
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
					  <td width="100"><img class="img-rounded" src="admin/<?php echo $row['prodImg']; ?>" width="100"></td>
					  
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
                        <!-- Pagination -->
						 <?php  echo $pages->page_links('subcatproduct.php?id='.$_GET['id'].'&'); ?>
                    
                </div>
            </div>
        </div>

            </div>
            <!-- /.container -->
			<?php
		}
        }        
?>


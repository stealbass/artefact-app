<?php
require("dbcon.php");
if(isset($_GET['id'], $_GET['cont']))
        {	
$stmt=$db->prepare('select tbl_produits.prodID, tbl_produits.downcat_id, tbl_produits.prodBrand, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodCont, tbl_produits.prodDesc, tbl_produits.prodImg, tbl_produits.prodGel, tbl_produits.prodDeo, tbl_produits.prodLait, tbl_produits.prodPrice, tbl_produits.prodDiscount, tbl_produits.prodAmount, tbl_downsub.downcat_id, tbl_downsub.downcat_name, tbl_downsub.catSlug, tbl_downsub.Photo FROM tbl_produits, tbl_downsub WHERE tbl_produits.downcat_id = tbl_downsub.downcat_id 
                     AND tbl_produits.prodSlug = :prodSlug AND tbl_produits.prodCont = :prodCont ORDER BY 
                    prodID DESC');
								$stmt->execute(array(':prodSlug' => $_GET['id'], ':prodCont' => $_GET['cont']));

$row = $stmt->fetch();
$id=$row['catSlug'];
$pid=$row['prodID'];
?>
        <!--  page-wrapper -->
        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                    					  <td width="100"><img class="img-rounded" src="admin/<?php echo $row['prodImg']; ?>" width="100"></td>
                    					  
                    					  <td>
                                            <td width="100">
                							<?php
                										echo '<h4>'.$row['prodBrand'].' '.$row['prodTitle'].'</h4>';
                                                ?>
                                            <p class="text-muted">Aventure</p>
                                            <p>By Bibi Benzo</p>
                                            <button type="button" class="btn btn-danger btn-circle">-18
                                            </button>
															<?php
																echo '<a href="update-cart.php?action=add&id='.$pid.'"><input type="submit" value="Buy" style="clear:both; background: #f0ad4e; border: 1px solid #eea236; border-radius: 3px; color: #fff; font-size: 1em; padding: 5px; font-weight: 400; text-transform: uppercase; text-align: center;"/></a>';
																
															?>
                                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
            </div>
            <hr />
                     <!--Basic Tabs   -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab"><i class="fa fa-eye fa-fw"></i> <h4>Short description</h4></a>
                                </li>
                                <li><a href="#profile" data-toggle="tab"><i class="fa fa-comments fa-fw"></i> <h4>Comment</h4></a>
                                </li>
                                <li><a href="#messages" data-toggle="tab"><i class="fa fa-flag fa-fw"></i> <h4>Read also</h4></a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4 >Short Description</h4>
								<?php
										echo '<p itemprop="description">'.$row['prodDesc'].'</h3>';
                                ?>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Comment</h4>
						<div class="p-t-40">

							<form>
								<div class="form-group">
									<textarea class="form-control" name="cmt" placeholder="Comment..."></textarea>
								</div>

								<div class="form-group">
									<input class="form-control" type="text" name="name" placeholder="Name *">
								</div>

								<div class="form-group">
									<input class="form-control" type="text" name="email" placeholder="Email *">
								</div>

    								<div class="form-group">
    									<button class="btn btn-block btn-warning" id = "btn" name = "post">Post</button>
    								</div>
							</form>
						</div>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Read also</h4>
                    <div class="panel panel-default">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                        			<?php
                        							  $query=$db->prepare('select tbl_produits.prodID, tbl_produits.prodBrand, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodCont, tbl_produits.prodImg, tbl_produits.prodPrice, tbl_produits.prodDiscount, tbl_produits.prodAmount FROM tbl_produits, tbl_downsub WHERE tbl_produits.downcat_id = tbl_downsub.downcat_id 
                                             AND tbl_downsub.downcat_id = :downcat_id ORDER BY 
                                            RAND()	LIMIT 3');
                        								$query->execute(array(':downcat_id' => $row['downcat_id']));
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
            										echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'" class="img-rounded"><img class="img-rounded" src="admin/'.$row['prodImg'].'" width="100">';
                                            ?>
                                            </td>
                                            <td width="100">
            								<?php
            										echo '<h4 itemprop="name"><a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'"><strong>'.$row['prodBrand'].'</strong><br/> '.$row['prodTitle'].' '.$row['prodCont'].'</a></h4>';
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Basic Tabs   -->
        </div>
        <!-- end page-wrapper -->

            <!-- /.container -->
			<?php
		}
?>
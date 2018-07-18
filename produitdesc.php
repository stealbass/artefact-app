<?php
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
require("dbcon.php");
if(isset($_GET['id'], $_GET['cont']))
        {	
$stmt=$db->prepare('select tbl_produits.prodID, tbl_produits.subcat_id, tbl_produits.prodBrand, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodCont, tbl_produits.prodDesc, tbl_produits.prodImg, tbl_produits.prodPrice, tbl_submain.subcat_id, tbl_submain.subcat_name, tbl_submain.subcatSlug, tbl_submain.cat_id FROM tbl_produits, tbl_submain WHERE tbl_produits.subcat_id = tbl_submain.subcat_id 
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
                    					  <td width="100"><img class="img img-responsive" src="admin/<?php echo $row['prodImg']; ?>" width="100"></td>
                    					  
                    					  <td>
                                            <td>
                							<?php
                										echo '<h4>'.$row['prodBrand'].' '.$row['prodTitle'].'</h4>';
                                                ?>
                                            <p class="text-muted"><?php echo $row['subcatSlug'] ?></p>
                                            <p>By Bibi Benzo</p>
                                            <button type="button" class="btn btn-danger btn-circle">-18
                                            </button>
															<?php
																echo '<a href="update-cart.php?action=add&id='.$pid.'"><input type="submit" value="'.$row['prodPrice'].' XAF" style="clear:both; background: #ffd400; border: 1px solid #000000; border-radius: 3px; color: #000; font-size: 0.9em; font-weight: 700; padding: 5px; text-transform: uppercase; text-align: center;"/></a>';
																
															?>
							                 <p class="text-muted"><div class="sharethis-inline-share-buttons"></div></p>
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
									<?php
									if(isset($_SESSION['user_id'])){
									?>	
    									<button class="btn btn-block btn-warning" id = "btn" name = "post">Post</button>
                                    <?php
									}
									  else {
										echo '<a href="#" data-toggle="modal" data-target="#login-modal"  class="btn btn-block btn-warning">Connexion</a>';
									  }
									?>
    								</div>
							</form>
						</div>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Read also</h4>
                    <div class="panel panel-default">
                            <div class="">
                                <table class="table table-hover">
                                    <tbody>
                        			<?php
                        							  $query=$db->prepare('select tbl_produits.prodID, tbl_produits.subcat_id, tbl_produits.prodBrand, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodCont, tbl_produits.prodImg, tbl_produits.prodPrice, tbl_submain.subcat_id, tbl_submain.subcat_name, tbl_submain.subcatSlug, tbl_submain.cat_id FROM tbl_produits, tbl_submain WHERE tbl_produits.subcat_id = tbl_submain.subcat_id 
                                             AND tbl_submain.subcat_id  = :subcat_id ORDER BY 
                                            RAND()	LIMIT 3');
                        								$query->execute(array(':subcat_id' => $row['subcat_id']));
                        								?>
                        								<?php
                        										while($row = $query->fetch()){
                        													$id=$row['prodSlug'];
                        													$sid=$row['prodCont'];
                        													$pid=$row['prodID'];
                        							?>
                                        <tr>
                                            <td>
            								<?php
            										echo '<a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'"><img class="img-rounded" src="admin/'.$row['prodImg'].'" width="100">';
                                            ?>
                                            </td>
                                            <td>
                                            <div class="single_product_desc">
            								<?php
            										echo '<h4 itemprop="name"><a itemprop="url" href="detail.php?id='.$id.'&cont='.$sid.'"><strong>'.$row['prodBrand'].'</strong><br/> '.$row['prodTitle'].' '.$row['prodCont'].'</a></h4>';
                                            ?>
                                            <p class="text-muted"><?php echo $row['subcatSlug'] ?></p>
                                            <p>By Mandresak</p>
                                            <button type="button" class="btn btn-danger btn-circle">-18
                                            </button>
															<?php
																echo '<a href="update-cart.php?action=add&id='.$pid.'"><input type="submit" value="'.$row['prodPrice'].' XAF" style="clear:both; background: #ffd400; border: 1px solid #000000; border-radius: 3px; color: #000; font-size: 0.9em; font-weight: 700; padding: 5px; text-transform: uppercase; text-align: center;"/></a>';
																
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
<?php

require("libs/config.php");
$page = "Download Book";
$pageDetails = $page;
$desc = "Vente de livres en ligne";
$pageDesc = $desc;
$key = "Templates, Ventes en ligne, Livres";
$pageKey = $key;
include("header.php");
require("dbcon.php");
if(isset($_GET['id']))
        {	
$resultat = $db->prepare('SELECT * FROM tbl_purchase WHERE order_ID = :id');
																				$resultat->execute(array(':id' => $_GET['id']));
																				

																				if($resultat){
																					
																				  $obj = $resultat->fetch();
																				    $name = $obj['Image'];
		
																				
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
                    					  <td width="100"><img class="img img-responsive" src="admin/<?php echo $obj['Image']; ?>" width="100"></td>
                    					  
                    					  <td>
                                            <td>
                							<?php
                										echo '<h4>'.$obj['Titre'].'</h4>';
                                                ?>
                                            <p class="text-muted"><?php echo $obj['Cont'] ?></p>
                                            <p>By <?php echo $row['prodCont'] ?></p>
                                            <button type="button" class="btn btn-danger btn-circle">-<?php echo $row['qty'] ?>
                                            </button>
                                                                                        <a href="download.php?filename=<?php echo $name; ?>" class="btn btn-warning"><i class="fa fa-download fa-fw"></i></a>
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
                    <!--End Basic Tabs   -->
        </div>
        <!-- end page-wrapper -->

            <!-- /.container -->
			<?php
		}
        }
?>	
<?php
include("footer.php");
?>
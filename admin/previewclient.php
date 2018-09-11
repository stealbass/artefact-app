<?php

 include('dbcon.php');

 require("libs/config.php");

 include("header.php");



if(isset($_GET['id']))

        {

$stmt = $pdo->prepare('SELECT * FROM users WHERE user_id = :users');

$stmt->execute(array(':users' => $_GET['id']));

$row = $stmt->fetch();

	


?>



        <div class="container">

  

 <div class="row-fluid">

  <div class="span12">



    <div class="row-fluid">

      <div class="span12">

	 <div class="span9">

	

<div class="alert alert-success">

<h4>Name : <?php echo $row['name']; ?> </h4>

	  </div>

<legend></legend>

				

                <div class="container">



                    <div class="span9">


					<div class="well">
					<div class="row-fluid">
					<div class="span6 ">

					<div class="bocus">


                        <h4><i class="fa fa-sign-in"></i> Member Information</h4>

					</div>		

						<hr>

                                        <ul>

                                            <li><strong>Nom :</strong>

                                            <?php

												echo $row['name'];

											?>

                                            </li>

                                            <li><strong>Prenom :</strong>

                                            <?php

												echo $row['prenom'];

											?>

                                            </li>

                                            <li><strong>Pays :</strong>

                                            <?php

												echo $row['pays'];

											?>

											</li>

                                            <li><strong>Ville :</strong>

                                            <?php

												echo $row['ville'];

											?>

                                            </li>

                                            <li><strong>Telephone :</strong>

                                            <?php

												echo $row['phone'];

											?>

											</li>

                                            <li><strong>Email :</strong>

                                            <?php

												echo $row['email'];

											?>

											</li>

                                        </ul>

					</div>	
					<div class="span6 "> <img class="img-rounded" src="<?php echo htmlentities($row['photo']); ?>" ></div>
					</div>	


					</div>	

						


						<div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <th>Cover</th>  
                                    <th>Title</th>  
                                    <th>Description</th> 
                                    <th>Pdf file</th>   
                                    </thead>

                                    <tbody>
                                
                                  
                                
                                  <?php
                                  $author = $row['user_id'];
                                  $query = $pdo->prepare("select tbl_produits.prodID, tbl_produits.prodTitle, tbl_produits.prodSlug, tbl_produits.prodDesc, tbl_produits.prodCont, tbl_produits.qty, tbl_produits.prodPrice, tbl_produits.prodImg, tbl_produits.prodUser, tbl_produits.prodPdf, users.user_id FROM tbl_produits, users WHERE tbl_produits.prodUser = users.user_id AND users.user_id = :author ORDER BY tbl_produits.prodID");
                                
								    $query->execute(array(':author' => $author));
                                
                                			while($product = $query->fetch()){
                                
                        													$id=$product['prodSlug'];
                        													$sid=$product['prodCont'];
                        													$pid=$product['prodID'];
                                
                                
                                
                                	?>
                                
                                	
                                        <tr>
                    					  <td width="100"><img class="img img-responsive" src="<?php echo $product['prodImg']; ?>" width="100"></td>
                    					  
                                            <td>
                							<?php
                										echo '<h4>'.$product['prodTitle'].'</h4>';
                                                ?>
                                             </td>  
                                            <td> 
                                            <p class="text-muted"><?php echo $product['prodDesc'] ?></p>
                                                            </td>
                                            <td> 
                                            <object
                                              data="<?php echo $product['prodPdf']; ?>"
                                              type="application/pdf"
                                              width="100%"
                                              height="100%">
                                              <iframe
                                                src="<?php echo $product['prodPdf']; ?>"
                                                width="100%"
                                                height="100%"
                                                style="border: none;">
                                                <p>Your browser does not support PDFs.
                                                  <a href="<?php echo $product['prodPdf']; ?>">Download the PDF</a>.</p>
                                              </iframe>
                                            </object>
                                                            </td>
                                        </tr>
                                
                                	  <?php } 
                                
                                	  
                                
                                ?>
                                
                                
                                	
                                
                                  </tbody>
                                </table>




                            </div>

                            


                    </div>

                    <!-- /.box -->





                </div>

                <!-- /.col-md-9 --> 

	  </div>

	  <?php

	  include('session_sidebar.php');

	  ?>

	<div style="margin-bottom: 21px;" class="pull-right">

                    <a class = "btn btn-primary" href = "home.php" ><i class = "fa fa-arrow-left"></i>Retour</a>

                </div>

    </div>

    </div>

 

</div>

  </div>

		</div>	

<?php

  }

include("footer.php");

?>
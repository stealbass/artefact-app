<?php

 include('dbcon.php');

 require("libs/config.php");

 include("header.php");

?>

  <div class="container">





  

 <div class="row-fluid">

  <div class="span12">



    <div class="row-fluid">

      <div class="span12">

	 <div class="span9">

	



<div class="alert alert-success">

<h4>Rapport des ventes</h4>

	  </div>

		<div class="well">

					<h4>

						<?php

						function formatMoney($number, $fractional=false) {

							if ($fractional) {

                                    $number = sprintf('%.0f', $number);

							}

							while (true) {

								$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);

								if ($replaced != $number) {

									$number = $replaced;

								} else {

									break;

								}

							}

							return $number;

						}

						?>



						<?php 

						$today = date('Y-m-d',strtotime('-1 days'));

						$sql = "SELECT sum(Total_Amount) FROM tbl_payment WHERE DATE(Date) = DATE( DATE_SUB( NOW() , INTERVAL 1 DAY ) )";

						$query = $pdo->prepare($sql);

						$query->execute(array($today));

						$fetch = $query->fetchAll();



						foreach ($fetch as $key => $value) {

							$data = $value['sum(Total_Amount)'];

						}

						$json = json_encode($data);

						?>



						<?php echo "<font style = 'color:black;'>Amount sales from yesterday  </font>";

						echo "<span class='pull-right badge'><font><strong>[" . formatMoney($data, true) . "]</strong></font>" . " ";

						echo  $today;  ?> 

					</span>

					</h4>

					<hr/>

					<h4><a  style = 'color:black;' class="list-group" href ="view_commande.php">

						Last orders<span class="pull-right badge">

						<?php 

						$result = $pdo->prepare("SELECT * FROM tbl_payment WHERE Actif = 1 ORDER BY Transaction_ID DESC");

						$result->execute();

						$rowcount = $result->rowcount();

						?>

						<?php echo "<font><strong>" . $rowcount . "</strong></font>";?>

					</span>

				</a></h4>

		</div>		

<div class="alert alert-success">
<h4>Latest post from members</h4>
	  </div>

    <!-- Page Content -->

        <div class="container">

                    <div style="margin-top: -19px; margin-bottom: 21px;">

                    </div>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

 

  <thead>

    <tr>


      <th>Product Name</th>

      <th>Description</th>

      <th width="80">Author</th>

      <th width="80">Price</th>

      <th>Cover</th>

      <th>Actif</th>

      <th width="180">Action</th>

    </tr>

  </thead>

  <tbody>

  

  <?php

  $query = $pdo->prepare("select * from tbl_produits ORDER BY prodID ASC");

			$query->execute();

			while($product = $query->fetch()){

	$id=$product['prodID'];



	?>

	

    <tr>


      <td><?php echo $product['prodTitle']; ?></td>

	  <td><?php echo $product['prodDesc']; ?></td>

      <td><?php echo $product['prodCont']; ?></td>

      <td><?php echo $product['prodPrice']; ?></td>

      <td width="100"><img class="img-rounded" src="<?php echo $product['prodImg']; ?>" width="100"></td>

      <td><?php echo $product['prodActif']; ?></td>

                                    <td witdh = "30%">

										<a data-toggle="modal" href="#delete<?php echo $id; ?>" class="btn btn-danger">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>

                                        &nbsp;

                                        <a class="btn btn-warning" href="preview.php?id=<?php  echo $id;?>">

                                            <span><i class="icon-pencil icon-large"></i> Edit</span>

                                        </a>

                                    </td>

	<?php 

	include('modal_delete_product.php');

	?>

	

	

	  <?php } 

	  

?>

    </tr>

	

  </tbody>

  </table>



                    <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>

        </div>

        <!-- /.row -->

                    <div style="margin-top: -19px; margin-bottom: 21px;">

                    </div>






	  </div>

	  



	  <?php

	  include('session_sidebar.php');

	  ?>

	  </div>

    </div>

    </div>

 

</div>

  </div>

<?php   include('footer.php'); ?>
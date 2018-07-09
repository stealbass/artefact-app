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
<h4>Dernieres Commandes</h4>
	  </div>	
<legend></legend>
    <!-- Page Content -->
                    <div style="margin-top: 30px; margin-bottom: 21px;">
                    </div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <thead>
                            <tr>
                                <th > Transaction ID </th>
                                <th > Order ID </th>
                                <th > Date </th>
                                <th > Nom Facture </th>
                                <th > Addresse Livraison </th>
                                <th > Type De Payement </th>
                                <th > Montant </th>
                                <th > Actif </th>
                                <th > Statut </th>
                                <th > Action </th>
                            </tr>
                        </thead>
                        <tbody>

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
                            $result = $pdo->prepare("SELECT * FROM tbl_payment WHERE Actif = 1 ORDER BY Transaction_ID DESC");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
							$id = $row['order_ID'];
							include('modal_delete_commande.php');
                                ?>
                                <tr class="record">
                                    <td style="color:red;">STI-000<?php echo $row['Transaction_ID']; ?></td>
                                    <td><?php echo $row['order_ID']; ?></td>
                                    <td><?php echo $row['Date']; ?></td>
                                    <td><?php echo $row['Name']; ?> <?php echo $row['Prenom']; ?></td>
                                    <td><?php echo $row['City']; ?> <?php echo $row['State']; ?></td>
                                    <td><?php echo $row['Paiement']; ?></td>
                                    <td><?php
                                        $dsdsd=$row['Total_Amount'];
                                        echo formatMoney($dsdsd, true);
                                        ?>
                                    </td>
                                    <td><?php echo $row['Actif']; ?></td>
                                    <td><?php echo $row['Status']; ?></td>
                                    <td witdh = "30%">
										<a data-toggle="modal" href="#delete_commande<?php echo $id; ?>" class="btn btn-danger">  <i class="icon-trash icon-large"></i>&nbsp;Effacez</a>
                                        &nbsp;
                                        <a class="btn btn-primary" href="previewcommande.php?id=<?php echo $row['order_ID']; ?>">
                                            <span><i class="icon-pencil icon-large"></i> Editez</span>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6" style="border-top:1px solid #999999"> Vente Totale </th>
                                <th colspan="6" style="border-top:1px solid #999999"> 
                                    <?php
                                    $results = $pdo->prepare("SELECT sum(Total_Amount) FROM tbl_payment WHERE Actif = 1 AND Status = 'En Attente' ");
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['sum(Total_Amount)'];
                                        echo formatMoney($dsdsd, true);
                                    }
                                    ?>
                                </th>
                            </tr>
                        </tfoot>  
                    </table>

        <!-- /.row -->



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
<?php   include('footer.php'); ?>
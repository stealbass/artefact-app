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
<h4>Member list</h4>
	  </div>

                    <div style="margin-top: -19px; margin-bottom: 21px;">

                    </div>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>Telephone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

  <?php

  $query = $pdo->prepare("select * from users ORDER BY user_id ASC");

			$query->execute();

			while($row = $query->fetch()){

	$id=$row['user_id'];



	?>
                                        <tr>
      <td width="100"><img class="img-rounded" src="<?php echo htmlentities($row['photo']); ?>" width="100"></td>
                                            <td>
                                            <?php
												echo $row['name'];
											?>
                                            </td>
                                            <td>
                                            <?php
												echo $row['prenom'];
											?>
                                            </td>
                                            <td>
                                            <?php
												echo $row['pays'];
											?>
											</td>
                                            <td>
                                            <?php
												echo $row['ville'];
											?>
                                            </td>
                                            <td>
                                            <?php
												echo $row['phone'];
											?>
											</td>
                                            <td>
                                            <?php
												echo $row['email'];
											?>
											</td>
                                    <td witdh = "30%">

										<a data-toggle="modal" href="#delete<?php echo $id; ?>" class="btn btn-danger">  <i class="icon-trash icon-large"></i>&nbsp;Effacez</a>
               &nbsp;

                                        <a class="btn btn-warning" href="previewclient.php?id=<?php  echo $id;?>">

                                            <span><i class="icon-pencil icon-large"></i> View</span>

                                        </a>
                                    </td>
	<?php 

	include('modal_delete_user.php');

	?>

	

	

	  <?php } 

	  

?>
                                        </tr>
                                    </tbody>
                                </table>


                    <a href="" onclick="window.print()" class="btn btn-primary"><i class="icon-print icon-large"></i> Print</a>


        <!-- /.row -->


	  </div>

	  



	  <?php

	  include('session_sidebar.php');

	  ?>

	  <div class="well">

	  <a button class="btn btn-block btn-success" type="button" href="#addadmin" role="button"  data-toggle="modal"><i class="icon-edit icon-large"></i> Add Admin</button></a>

		<?php include("modal_addadmin.php");?>

	  </div>

	  </div>

    </div>

    </div>

 

</div>

  </div>

<?php   include('footer.php'); ?>
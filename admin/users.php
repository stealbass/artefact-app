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

<h4>Admin List</h4>

	  </div>

<legend></legend>

 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">





  <caption></caption>

  <thead>

    <tr>

      <th>Photo</th>

      <th width="80">Full Name</th>

      <th>Email</th>

      <th width="180">Action</th>

    </tr>

	

  </thead>

  <tbody>

    <?php

    $query = $pdo->prepare("select * from users");

	$query->execute();

	while($row = $query->fetch()){

	$id=$row['user_id'];
	


	

	?>

    <tr>

      <td width="100"><img class="img-rounded" src="<?php echo htmlentities($row['photo']); ?>" width="100"></td>

      <td><?php echo $row['name'];?> <?php echo $row['prenom'];?></td>

      <td><?php echo $row['email'];?></td>


<?php include('modal_edit_admin.php');?>
     	<td> <a href="#delete<?php echo $id; ?>" a data-toggle="modal" class="btn btn-danger">  <i class="icon-trash"></i>&nbsp; Delete</a>

<?php include('modal_delete_users.php');?>

	</td>
	

    </tr>

	<?php } ?> 

  </tbody> 

</table>	  







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
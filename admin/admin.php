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
      <th>Username</th>
      <th width="80">Password</th>
      <th>Full Name</th>
      <th width="180">Action</th>
    </tr>
	
  </thead>
  <tbody>
    <?php
    $query = $pdo->prepare("select * from tbl_admin");
	$query->execute();
	while($row = $query->fetch()){
	$id=$row['User_ID'];	
	
	?>
    <tr>
      <td><?php echo $row['Username'];?></td>
      <td><?php echo $row['Password'];?></td>
      <td><?php echo $row['Full_Name'];?></td><?php include('modal_edit_admin.php');?>     	<td> <a href="#edit<?php  echo $id;?>"  data-toggle="modal"  class="btn btn-warning" ><i class="icon-pencil"></i>&nbsp; Edit</a>	<a href="#delete<?php echo $id; ?>" a data-toggle="modal" class="btn btn-danger">  <i class="icon-trash"></i>&nbsp; Delete</a><?php include('modal_delete_admin.php');?>	</td>	
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
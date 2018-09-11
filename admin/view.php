<?php
 include('dbcon.php');
 require("libs/config.php");

 ?>
  <?php include('header.php'); ?>
  <div class="container">
  <br>


  
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
      <th>Total Number of Visitors</th>
      <th>Total Number of Visitors per day</th>
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
  
  
 
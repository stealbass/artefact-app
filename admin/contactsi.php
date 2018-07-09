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
	  


<div class="alert alert-gray">
<h4>Messages</h4>
	  </div>	
<legend></legend>
 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">




  <caption></caption>
  <thead>
    <tr>
      <th>Name</th>
      <th>Subject</th>
      <th>Email</th>
	   <th width="200">Message</th>
      <th>Date and Time</th>
      <th>Action</th>
    </tr>
	
  </thead>
  <tbody>
    <?php
  $query = $pdo->prepare("select * from tbl_contacts");
			$query->execute();
			while($row = $query->fetch()){
	$id=$row['Name_ID'];
	
	?>
    <tr>
      <td><?php echo $row['Name'];?></td>
      <td><?php echo $row['Subject'];?></td>
      <td><?php echo $row['Email'];?></td>
	  <td><?php echo $row['Message'];?></td>
	  <td width="100"><?php echo $row['Date_and_Time'];?></td>
	  <td width="100">
	<a data-toggle="modal" href="#<?php echo $id; ?>" class="btn btn-danger">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a></td>
	
    </tr>
		<?php include('modal_delete_contacts.php');
	?>
	<?php } ?> 

  </tbody> 
  
</table>	  
	


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

  
 <?php
 
 require("libs/config.php");

 ?>
<?php include('header.php'); ?> 

  <div class="container">
  <br>
 <div class="row-fluid">

    <div class="row-fluid">
      <div class="span12">
	 <div class="span9">

<div class="alert alert-success">
<h4>Conseil</h4>
	  </div>
<legend></legend>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
  <caption></caption>
   <thead>
    <tr>
      <th>Title</th>
      <th>Content</th>
      <th>Photo</th>
      <th width="180">Action</th>
    </tr>
  </thead>
 
  <tbody>
    <?php
  $query = $pdo->prepare("select * from tbl_conseil");
			$query->execute();
			while($row = $query->fetch()){
	$id=$row['Conseil_ID'];
	 include('modal_delete_conseil.php');
	?>
	
  
    <tr>
      <td><?php echo $row['Title']; ?></td>
      <td><?php echo $row['Content']; ?></td>
      <td><img src="<?php echo $row['Photo']; ?>"  width="180"/></td>
     	<td> <a href="edit-conseil.php?id=<?php  echo $id;?>"  data-toggle="modal"  class="btn btn-warning" ><i class="icon-pencil icon-large"></i>&nbsp; Edit</a>
	<a data-toggle="modal" href="#delete_info<?php echo $id; ?>" class="btn btn-danger">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>
	 <?php include('modal_edit_info.php'); ?>
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
	  <a button class="btn btn-block btn-success" type="button" href="add-conseil.php" role="button" ><i class="icon-pencil"></i> Add Conseil</button></a>

 <?php
    include('modal_addinfo.php');

  ?>
	  </div>
	  
	  </div>
    </div>
  </div>
</div>
<?php   include('footer.php'); ?>

  
  
  
  
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

<h4>Update Information</h4>

	  </div>

<legend></legend>



                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

  <caption></caption>

   <thead>

    <tr>

      <th>Title</th>

      <th>Bref</th>

      <th>Photo</th>

      <th width="180">Action</th>

    </tr>

  </thead>

 

  <tbody>

    <?php

  $query = $pdo->prepare("select * from tbl_info");

			$query->execute();

			while($row = $query->fetch()){

	$id=$row['Information_ID'];

	 include('modal_delete_info.php');

	?>

	

  

    <tr>

      <td><?php echo $row['Title']; ?></td>

      <td><?php echo $row['Bref']; ?></td>

      <td><img src="<?php echo $row['Photo']; ?>"  width="180"/></td>

     	<td> <a href="edit-info.php?id=<?php  echo $id;?>"  data-toggle="modal"  class="btn btn-warning" ><i class="icon-pencil icon-large"></i>&nbsp; Edit</a>

	<a data-toggle="modal" href="#delete_info<?php echo $id; ?>" class="btn btn-danger">  <i class="icon-trash icon-large"></i>&nbsp;Delete</a>


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

	  <a button class="btn btn-block btn-success" type="button" href="add-info.php" role="button" ><i class="icon-pencil"></i> Add Information</button></a>



	  </div>

	  </div>

    </div>

    </div>

 

</div>

  </div>

<?php   include('footer.php'); ?>
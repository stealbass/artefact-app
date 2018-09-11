<div class="span3">  

	  <div class="alert alert-success">
	     Welcome:
	    <?php 
		$User_ID=$_SESSION['User_ID'];
		$query = $pdo->prepare("select * from tbl_admin where User_ID='$User_ID'");
			$query->execute();
			while($row = $query->fetch()){

		$Full_Name=$row['Full_Name'];

		echo htmlentities($Full_Name);
	}
  ?>
	  </div>
	   <div class="well">
	   <a button class="btn btn-block btn-danger" type="button" href="#myModal" role="button"  data-toggle="modal"><i class="icon-signout icon-large"></i> Sign Out</button></a>
	<?php include("logout_modal.php");?>
	  </div>
	  
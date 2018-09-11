<div id="addadmin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-header">

  <div class="alert alert-gray">

  Add Admin

  </div>



  <div class="modal-body">

  <hr>

 <form class="form-horizontal" method="POST">

  <div class="control-group">

    <label class="control-label" for="inputEmail">Username</label>

    <div class="controls">

      <input type="text" id="inputEmail" name="username" placeholder="Username" required>

    </div>

  </div>

  <div class="control-group">

    <label class="control-label" for="inputPassword">Password</label>

    <div class="controls">

      <input type="password" id="inputPassword" name="password" placeholder="Password" required>

    </div>

  </div>

  

   <div class="control-group">

    <label class="control-label" for="inputPassword">Full Name</label>

    <div class="controls">

      <input type="text" id="inputPassword"  name="fullname" placeholder="Full Name" required>

    </div>

  </div>

 



  </div>

  <div class="modal-footer">

    <button name="save" type="submit" class="btn btn-success"><i class="icon-save"></i>&nbsp;Save</button>

      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>

    </form>  

	

	 <?php
     
include_once 'dbconfig.php';

		if(isset($_POST['save'])){

		$Username=$_POST['username'];

		$Password=$_POST['password'];
		
		$enc_password = hash('sha256', $Password);

		$FullName=$_POST['fullname'];

		

			try {

		$smt=$DB->prepare("INSERT INTO tbl_admin(Username, Password, Full_Name) VALUES('$Username','$enc_password','$FullName')");

	    $smt->execute();

			
	//redirect to index page
		header('location:admin.php');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		


		}

		?>

  </div>

</div>
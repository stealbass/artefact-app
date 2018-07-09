 <?php
include('dbcon.php');
 
 
  if (isset($_POST['login'])) {
$Username=$_POST['Username'];
$Password=$_POST['Password'];
 $query = $pdo->prepare("select * from tbl_admin where Username='$Username' and Password='$Password'");
			$query->execute();
			$row = $query->fetch();	
		
		if ($row > 0){
		session_start();
		$_SESSION['User_ID']=$row['User_ID'];
		header('location:admin.php');
		}else{
									  
                                        ?>
                                      <br>
                                            <div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">&times;</button>
											<strong>Attention!</strong> Verifiez votre Pseudo ou votre Email!
											</div>
                                        <?php
                                    }
                                }
                                ?>
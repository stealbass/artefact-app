 <?phpinclude('dbcon.php');?>
<!DOCTYPE html>

<html>

<head>

<title>Backend</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
 
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="screen">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<link href="css/custom.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="CLEditor/jquery.cleditor.css" />
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="CLEditor/jquery.cleditor.min.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>



</head>
 
     
   
  <div class="container">
  <body>
    <div class="row-fluid">
  <div class="span12">
  
	<br>
   
      <div class="span3">

    </div>

      <div class="span6">
	  <br>
	  <br>
	  <div class="well">
	  <legend>
	 <div class="alert alert-success"><h4>Administrateur</h4> </div>
</legend>
<form class="form-horizontal" method="POST" action="">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Pseudo</label>
    <div class="controls">
      <input type="text" id="inputEmail" name="Username" placeholder="Username" class="span8" required>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Mot de passe</label>
    <div class="controls">
      <input type="password" id="inputPassword" name="Password" placeholder="Password" class="span8" required>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      
 <button type="submit" name="login" class="btn btn-success"><i class="icon-signin"></i>&nbsp;Connection</button>
    </div>
  </div>
</form>
 <?php 
 
  if (isset($_POST['login'])) {$Username = filter_var($_POST['Username'], FILTER_SANITIZE_STRING);
$Password= md5 ($_POST['Password']);
 $query = $pdo->prepare("select * from tbl_admin where Username='$Username' and Password='$Password'");
			$query->execute();
			$row = $query->fetch();	
		
		if ($row > 0){
		session_start();
		$_SESSION['User_ID']=$row['User_ID'];
		echo "<script>location.href = 'home.php';</script>";
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
    </div>
    </div>
  </div>

</div>

</body>
  </div>
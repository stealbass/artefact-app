<?php
/*
 * @author Steal Bass
 * @website 
 * @facebook 
 * @twitter 
 * @googleplus 
 */


?>
        <!--  page-wrapper -->
        <div id="page-wrapper">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-4 col-md-offset-4">
    				<div class="login-panel panel panel-default">
    					<ul class="nav nav-pills">
    						<li><a data-toggle="pill" href="#home">Create an account</a></li>
    						<li class="active"><a data-toggle="pill" href="#menu2">Connexion</a></li>
    					</ul>
    					<div class="tab-content">
    						<!-- Department -->
    						<div id="home" class="tab-pane fade in">
    							<br />
							<form action="register.php" method="post">
								<div class="form-group">
									<label for="">Name</label>
									<input type="text" name="name" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" name="email" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="">Pseudo</label>
									<input type="text" name="username" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" class="form-control"/>
								</div>
								<div class="form-group">
									<input type="submit" name="btnRegister" class="btn amado-btn active" value="Register"/>
								</div>
							</form>
    						</div>
    						<div id="menu2" class="tab-pane fade in active">
    							<br />
							<form action="register.php" method="post">
								<div class="form-group">
									<label for="">Pseudo/Email</label>
									<input type="text" name="username" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" class="form-control"/>
								</div>
								<div class="form-group">
									<input type="submit" name="btnLogin" class="btn amado-btn active" value="Connection"/>
    								<div class="form-group" id="alert-msg1">
    								</div>
    							</form>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
        </div>
        <!-- end page-wrapper -->
			<?php
// unset if after it display the error.
$_SESSION["e_msg"] = "";
?>
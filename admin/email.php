<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.alwaysdata.net/
 * @facebook https://www.facebook.com/happi.olivier
 */

include('dbcon.php');
require("libs/config.php");
?>

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
		<?php
		if(isset($_POST['envoi'])) //On a tapé le message.

{
$filtered_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
if ( $filtered_email == false ) {
echo '<div class="alert alert-success">
<h4>Inserez votre addresse email.</h4>
	  </div>';
} else {
$email = $_POST['email'];
// On récupère l'email
$result = $db->prepare("SELECT * FROM tbl_admin WHERE Email = :email");
$result->execute(array(':email' => $email));	
							$row = $result->fetch();

if($email == $row['email']) //On a tapé le message.

{ 



 

$fichier_message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>'; //On définit le message.
$fichier_message = '<!-- If you delete this meta tag, the ground will open and swallow you. -->
<meta name="viewport" content="width=device-width" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Newsletter des Laboratoires Biopharma</title>
	
<link rel="stylesheet" type="text/css" href="css/email.css" >

</head>
<body style="margin:0; padding: 15px 15px 15px 15px; border: solid 1px #0080c2;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;" bgcolor="#F8F8F8">

<!-- HEADER -->
<table class="head-wrap" align="center" width="100%%">
	<tr>
		<td></td>
		<td class="header container" align="center">
			
			<!-- /content -->
			<div class="content" align="left" style="bgcolor: #FFFFFF;">
			            <div style="display: block;">
			            <a href="https://laboratoiresbiopharma.000webhostapp.com/"  target="_blank" style="padding-top: 10px;"><img src="https://laboratoiresbiopharma.000webhostapp.com/img/images/logobio_1-01.png" alt="Logo" style="width:186px;border:0;"/>
						</a>
						</div>
				        <div style="display: inline-block; color: #0080c2; text-transform: uppercase;">
					       <h5>L EXPERT BEAUTE DES PEAUX NOIRES ET METISSEES</h5>
				        </div>
			</div><!-- /content -->
			
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->

<!-- BODY -->
<table cellpadding="0" cellspacing="0" width="100%%" style="margin-bottom: 10px;">
	<tr>
		<td></td>
		<td class="container" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">

<!-- content -->
			<div class="content">
				<table cellpadding="0" cellspacing="0" width="100%%" style="margin-bottom: 10px;">
					<tr>
						<td align="center" style="
 border: solid 1px #e6e6e6;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; 
  margin: 0 0 30px; 
  padding: 20px;">
						<div style="color: #0080c2; text-transform: uppercase;">	
							<h4><strong>Salut "' . $row['name'] . '"</strong></h4>
						</div>	
							<p style="padding: 10px 0 10px 0; font-family: Avenir, sans-serif;">Nous avons reçu une requette de mot de passe oublié.<br/><br/>
							Pour changer de mot de passe cliquez sur ce <a href="laboratoiresbiopharma.000webhostapp.com/editpassword.php?id='.$row['name'].'" target="_blank" >lien</a><br/><br/>
							Si vous n avez pas faite cette requette, ne faites rien !<br/><br/>
							Merci !<br/><br/>
							Les Laboratoires Biopharma</p>
							
						</td>
					</tr>
				</table>
			</div><!-- /content -->
		</td>
		<td></td>
	</tr>
</table>
			
			<!-- content -->';


$fichier_message .= '<!-- content -->
			<div class="content" bgcolor="#FFFFFF">
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" width="100%%" style="margin-bottom: 10px;">
					<tr>
						<td align="center">
							
							<!-- social & contact -->
								<tr>
									<td>
										
										<!--- column 1 -->
										<div class="column">
											<table bgcolor="" cellpadding="" align="center">
										<tr>
											<td>				
												<a href="https://www.facebook.com/LaboBiopharma/" target="_blank" style="color: #FFFFFF;"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_color-128.png" alt="Facebook" 
                                                         style="display: block; width: 30px; height: 30px;"/></a> 
											</td>
											<td>
												<a href="https://twitter.com/lab_biopharma?lang=fr" target="_blank" style="color: #FFFFFF;"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_circle_color-128.png" alt="Twitter" 
                                                         style="display: block; width: 30px; height: 30px;"/></a>
											</td>
											<td>
												<a href="https://plus.google.com/communities/113893834372416181060" target="_blank" style="color: #FFFFFF;"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/google_circle_color-128.png" alt="Google" 
                                                         style="display: block; width: 30px; height: 30px;"/></a>
											</td>
											<td>
												<a href="https://www.instagram.com/lab_biopharma/" target="_blank" style="color: #FFFFFF;"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/instagram_circle_color-128.png" alt="Instagram" 
                                                         style="display: block; width: 30px; height: 30px;"/></a>
											</td>
										</tr>
									</table><!-- /column 1 -->
										</div>
										
										
										<div class="clear"></div>
	
									</td>
								</tr><!-- /social & contact -->
							
						</td>
					</tr>
				</table>
			</div><!-- /content -->
			
<!-- /BODY -->

<!-- FOOTER -->
			<div class="content" bgcolor="#333">
<table bgcolor="#333" style="
 border: solid 1px #e6e6e6;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; padding: 15px 15px 15px 15px;" cellpadding="0" cellspacing="0" width="100%%">
	<tr>
        <td align="left" style="color: #ccc; padding: 10px 0 10px 0; font-family: Avenir, sans-serif; font-size: 11px;">
                
                    <p>© <strong>2017 Les Laboratoires Biopharma.</strong> All Rights Reserved <a href="https://laboratoiresbiopharma.000webhostapp.com/termesetconditionsfr.pdf"  target="_blank" style="color: #FFFFFF;"> Taxe & Condition</a></p>

							</td>
		<td align="right" style="color: #ccc; padding: 10px 0 10px 0; font-family: Avenir, sans-serif; font-size: 11px;">
                    <p>Design by <a href="http://mapannoir.alwaysdata.net/" target="_blank"style="color: #FFFFFF;">Steal Bass</a>
                    </p> 
							</td>
	</tr>
</table><!-- /FOOTER -->
</div>

</body>
</html>'; //On termine le message.

 

$destinataire = $email; //On adresse une copie a l'administrateur.
 

$objet = "Requette mot de passe oublié"; //On définit l'objet qui contient la date.

 

//On définit le reste des paramètres.

$headers  =  'From: Laboratoires Biopharma <care@laboratoires-biopharma.com>' . "\n" .
                'Bcc:' . $liste . '' . "\n" .
                'X-Mailer: PHP/' . phpversion() . "\n" .
                'X-Priority: 3' . "\n" .
                'Content-Type: text/html; charset=iso-8859-1'."\r\n".
                'Content-Type: multipart/mixed;'."\r\n".
                'Content-Type: multipart/alternative;'."\r\n".
                'MIME-Version: 1.0'."\r\n";

    //On envoie l'e-mail.

    if ( mail($destinataire, $objet, $fichier_message, $headers) ) 

    {

?>
<div class="alert alert-success">
<h4>Pour continuer veillez cliquer sur le lien envoyé à votre addresse email.</h4>
	  </div>


<?php

    }

    else

    {

?>
<div class="alert alert-success">
<h4>Échec lors de l'envoi.</h4>
	  </div>	
<?php

    }
}
} //Fin de la condition de validité du formulaire.
}
?>




    <div class="row-fluid">

  <div class="span12">

  

	<br>

   

      <div class="span3">



    </div>



      <div class="span6">

	  <br>

	  <br>

						<?php
						if (($err_formulaire) || (!isset($_POST['envoi'])))
						{
							// afficher le formulaire
							echo '
	  <div class="well">

	  <legend>

	 <div class="alert alert-success"><h4>Votre Email</h4> </div>

</legend>
						
							<form id="contact" method="post" action="email.php">
								<div class="form-group">
										<input class="form-control" type="email" id="email" name="email" value="'.stripslashes($email).'" tabindex="2" />
                                    </div>

                            
                            <div class="box-footer">
                                <div>
                                    <button type="submit" class="btn btn-primary" name="envoi">Envoyez<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
							</form>	

                    </div>';
						};

						?>
                </div>
                </div>
                </div>
                </div>
                </div>

                </div>
                <!-- /.col-md-9 -->
		</div>
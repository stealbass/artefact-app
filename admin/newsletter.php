<?php

 include('dbcon.php');

require("libs/config.php");



 ?>

  <?php include('header.php'); ?>



  <div class="container">

  <br>





    <div class="row-fluid">

      <div class="span12">

	 <div class="span9">

	



<div class="alert alert-success">

<h4>Newsletter</h4>

	  </div>





<?php



if(isset($_POST['message'])) //On a tapé le message.



{ 



// On récupère les 5 dernières news



$news = $pdo->query("select * from tbl_info ORDER by information_id DESC LIMIT 3");





 



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

<table class="body-wrap" bgcolor="">

	<tr>

		<td></td>

		<td class="container" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">



<!-- content -->

			<div class="content">

				<table cellpadding="0" cellspacing="0" width="100%%" style="margin-bottom: 10px;">

					<tr>

						<td align="left" style="

 border: solid 1px #e6e6e6;

  -webkit-box-sizing: border-box;

  -moz-box-sizing: border-box;

  box-sizing: border-box; 

  margin: 0 0 30px; 

  padding: 20px;">

						<div style="color: #0080c2; text-transform: uppercase;">	

							<h4>Consultez nos dernières Actualités :</h4>

						</div>	

							<p>' . $_POST['message'] . '</p>

							

						</td>

					</tr>

				</table>

			</div><!-- /content -->

			

			<!-- content -->';

 



    while($donnee = $news->fetch())



    {

		$id=$donnee['postSlug'];

		$fichier = file_get_contents("admin/".$donnee['Photo']);


						



    $fichier_message .= '<div class="content">

						<table style="
 border: solid 1px #e6e6e6;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; 
  margin: 0 0 30px; 
  padding: 20px;" cellpadding="0" cellspacing="0" width="100%%">

						<tr>

						<td align="left" style="padding: 10px 0 10px 0;"><img src="cid:'.$fichier.'"/></td>

						<td align="left" style="padding: 10px 0 10px 0; margin-bottom: 10px; font-family: Avenir, sans-serif; font-size: 16px;">

						<h4><a href="laboratoiresbiopharma.000webhostapp.com/page.php?id='.$id.'">'.$donnee['Title'].'</a></h4>'; //On ajoute les news au message.

    $fichier_message .= '<p style="word-break:break-all;">'.$donnee['Bref'].'...</p>';

	$fichier_message .= '</td>

					</tr>

				</table>

			

			</div>';



    }





$fichier_message .= '<!-- content -->

			<div class="content" bgcolor="#FFFFFF">

				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" width="100%%">

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

			



		</td>

		<td></td>

	</tr>

</table><!-- /BODY -->



<!-- FOOTER -->

			<div class="content" bgcolor="#0080c2">

<table bgcolor="#0080c2" style="
 border: solid 1px #e6e6e6;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; " cellpadding="0" cellspacing="0" width="100%%">

	<tr>

							<td align="center" style="color: #FFFFFF; padding: 10px 0 10px 0; font-family: Avenir, sans-serif; font-size: 13px;">';

							

							$result = $pdo->query("SELECT name FROM newsletter");	

							$row = $result->fetch();					

$fichier_message .= '<p>

									Vous ne souhaitez plus recevoir ce mail : <a href="laboratoiresbiopharma.000webhostapp.com/unsubscribe.php?id='.$row['name'].'" style="color: #FFFFFF;">Desabonnez-vous</a>

								</p>

							</td>

							<td align="center" style="color: #FFFFFF; padding: 10px 0 10px 0; font-family: Avenir, sans-serif; font-size: 13px;">															

								<p>Consultez toutes les actualités de notre <a href="laboratoiresbiopharma.000webhostapp.com/category.php" style="color: #FFFFFF;">Blog</a></p>

                

							</td>

	</tr>

</table><!-- /FOOTER -->

</div>

			<div class="content" bgcolor="#333">

<table bgcolor="#333" style="

 border: solid 1px #e6e6e6;

  -webkit-box-sizing: border-box;

  -moz-box-sizing: border-box;

  box-sizing: border-box; padding: 15px 15px 15px 15px;" cellpadding="0" cellspacing="0" width="100%%">

	<tr>

        <td align="left" style="color: #ccc; padding: 10px 0 10px 0; font-family: Avenir, sans-serif; font-size: 11px;">

                

                    <p>© <strong>2017 Les Laboratoires Biopharma.</strong> All Rights Reserved <a href="http://www.laboratoires-biopharma.com/termesetconditionsfr.pdf"  target="_blank" style="color: #FFFFFF;"> Taxe & Condition</a></p>



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



 



 



//On récupère de la table newsletter les personnes inscrites.



$liste_vrac = $pdo->query("SELECT email FROM newsletter");



 



//On définit la liste des inscrits.



$liste = 'care@laboratoires-biopharma.com';



    while ($donnees = $liste_vrac->fetch())



    {



    $liste .= ','; //On sépare les adresses par une virgule.



    $liste .= $donnees['email'];



    }



$message = $fichier_message;



$destinataire = 'care@laboratoires-biopharma.com'; //On adresse une copie a l'administrateur.



 



$date = date("d/m/Y");



 



$objet = "Newsletter des Laboratoires Biopharma du $date"; //On définit l'objet qui contient la date.



 



//On définit le reste des paramètres.



$headers  =  'From: Newsletter Biopharma <care@laboratoires-biopharma.com>' . "\n" .

                'Bcc:' . $liste . '' . "\n" .

                'X-Mailer: PHP/' . phpversion() . "\n" .

                'X-Priority: 3' . "\n" .

                'Content-Type: text/html; charset=iso-8859-1'."\r\n".

				'Content-Type: image/jpg; name="$fichier"'."\r\n".

				'Content-Transfer-Encoding: base64'."\r\n".

				'Content-ID: <$fichier>'."\r\n".

                'Content-Type: multipart/mixed;'."\r\n".

                'MIME-Version: 1.0'."\r\n";

				chunk_split(base64_encode($fichier));

    //On envoie l'e-mail.



    if ( mail($destinataire, $objet, $fichier_message, $headers) ) 



    {



?>

<div class="alert alert-success">

<h4>Envoi de la newsletter réussi.</h4>

	  </div>





<?php



    }



    else



    {



?>

<div class="alert alert-success">

<h4>Échec lors de l'envoi de la newsletter.</h4>

	  </div>







<?php



    }



} //Fin de la condition de validité du formulaire.



?>



<legend></legend>

<br />

<br />

  <div class="container">

<h4>Liste des inscrits :</h4><br />





                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

  <caption></caption>

   <thead>

    <tr>

<th>Nom</th>



<th>E-mail</th>



</tr>

   </thead>

<?php

$sql=$pdo->prepare("SELECT * FROM newsletter ");

	$sql->execute();

while($r = $sql->fetch()){

?>

<tr>

<td><?php echo ($r['name']); ?></td>



<td><?php echo ($r['email']); ?></td>



</tr>

<?php

}

?>

 

</table>


<h3>Rediger un message</h3>



<form method="post" action="newsletter.php">

<div class="controls">

<textarea rows="5" class="span10" required placeholder="Write your details here..!" id="content" name="message"></textarea>    </div>

  </div>

    <div class="controls">

<input type="submit" class="btn btn-success" value="Envoyer la newsletter" />

</div>

</form>

</div>

	  <?php

	  include('session_sidebar.php');

	  ?>
<a href="exportData.php" class="btn btn-success pull-right">Exportez csv</a>




	  </div>

	  

	  </div>

    </div>

    </div>

 



<?php   include('footer.php'); ?>

  

  

 
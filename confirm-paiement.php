<?php
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

// check user login
if(empty($_SESSION['user_id']))
{
    header("Location: index.php");
}
require("dbcon.php");

//============== L'ajout de pièce jointe à un message a été réalisé grâce à un très bon tutoriel de "siteduzero.com"
//============== lien de la page : http://www.siteduzero.com/informatique/tutoriels/e-mail-envoyer-un-e-mail-en-php-1/annexe-joindre-un-fichier-1

if(isset($_POST['btnCommandez'])){
$actif = 1;
$order = $_POST['code'];
	
$smt = $db->prepare("UPDATE tbl_payment SET Actif='$actif' WHERE order_ID = :order");
$smt->execute(array(':order' => $order));

										
        //send mail script
        $result = $db->prepare("SELECT * FROM tbl_payment WHERE order_ID = :order");
		$result->execute(array(':order' => $order));
        if($result){
          $obj = $result->fetch();
			// Déclaration de l'adresse de destination.
			
			$user = $obj['Email']; //****** Le formulaire d'envoi de message a été validé

	//====Une fois la ligne ci-dessus enlevée, enlever les commentaires au début de la ligne ci-dessous pour écrire l'adresse du destinataire (vous) en dur dans le programme.
	$mail_destinataire = $user; //=====Mail du destinataire final du message envoyé

	//=====Vérification de l'existence d'une pièce jointe.
	if ($_FILES['piecejointe']['name']<>"") $ispiece = true; else $ispiece = false;

	//=====Vérification de l'adresse de destination.
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail_destinataire)) $passage_ligne = "\r\n"; else $passage_ligne = "\n";

	//=====Récupération du mail, du nom de l'expéditeur et du sujet.
$date = date("d/m/Y");

 

$sujet = "Your order : $order du $date"; //On définit l'objet qui contient la date.
	
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";

	
			$msg_body .= '<body style="margin:0; padding: 15px 15px 15px 15px; border: solid 1px #ffd400;
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
				        <div style="display: inline-block; color: #ffd400; font-size: 18px; font-weight: 900; text-transform: uppercase;">
					       <h1>ARTEFACT</h1>
				        </div>
			</div><!-- /content -->
			
		</td>
		<td></td>
	</tr>
</table><!-- /HEADER -->


			<!-- BODY -->
			<table class="body-wrap" bgcolor="" width="100%%" align="center">
				<tr>
					<td></td>
					<td class="container" bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" width="100%%" style="padding: 40px 30px 40px 30px;">';
            $msg_body .= '<table bgcolor="#FFFFFF" style="
 border: solid 1px #e6e6e6;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; margin-bottom: 10px; padding: 15px 15px 15px 15px;" cellpadding="0" cellspacing="0" width="100%%">
				<tr>
					<td align="left" style="padding: 10px 0 10px 0; display: block;">
					<div style="color: #ffd400; text-transform: uppercase;">	
							<h4>Your order</h4>
							<hr>
						</div>	
					<p><h3>No order : <strong>'.$obj['order_ID'].'</strong></h3></p>';
            $msg_body .= '<p><strong>Date</strong>: '.$obj['Date'].'</p>';
            $msg_body .= '<p><strong>Method of payement</strong>: '.$obj['Paiement'].'</p>';
            $msg_body .= '<h3><strong>Total amount</strong>: <strong>'.$obj['Total_Amount'].'</strong></h3></td>';
            $msg_body .= '<td align="right" style="padding: 10px 0 10px 0; display: block;">
					<div style="color: #ffd400; text-transform: uppercase;">	
							<h4>Informations buyer</h4>
							<hr>
						</div>	
					
					<p><strong>Mr/Mme</strong>: '.$obj['Name'].'</p>';
            $msg_body .= '<p><strong>Pays</strong>: '.$obj['Country'].'</p>';
            $msg_body .= '<p><strong>Province</strong>: '.$obj['Province'].'</p>';
            $msg_body .= '<p><strong>Ville</strong>: '.$obj['City'].'</p>';
            $msg_body .= '<p><strong>Lieu</strong>: '.$obj['State'].'</p>';
            $msg_body .= '<p><strong>Telephone</strong>: '.$obj['Phone'].'</p></td>
					</tr>
				</table>';
			$msg_body .= '<table width="100%%" border="1" cellpadding="0" cellspacing="0" align="center" width="100%%" style="padding: 15px 15px 15px 15px; margin-bottom:20px;">
						  <thead bgcolor="#E8E8E8" border="1" cellpadding="0" cellspacing="0" width="100%%" style="padding: 10px 10px 10px 10px;">
                                        <tr>
                                            <th colspan="2" align="left">Name</th>
                                            <th>Quantité</th>
                                            <th align="right">Download</th>
                                        </tr>
                                    </thead>
                                    <tbody bgcolor="#FFFFFF" border="1" cellpadding="0" cellspacing="0" width="100%%" style="padding: 10px 10px 10px 10px;">';
			$resultas = $db->prepare('SELECT * FROM tbl_purchase WHERE order_ID = :order_ID');
			$resultas->execute(array(':order_ID' => $order));
									

									if($resultas){
										
									  while($row = $resultas->fetch()) {
																				    $name = $row['Pdf'];
            $msg_body .= '<tr><td colspan="2" align="left" style="font-size: 15px;">'.$row['Titre'].' by '.$row['Cont'].'</td>';
            $msg_body .= '<td align="right">'.$row['Qty'].'</td>';
            $msg_body .= '<td align="right" style="font-size: 15px;"><a itemprop="url" href="http://mysecondwebsitetest.alwaysdata.net/download.php?filename='.$name.'" class="btn btn-default" >Download</a></td></tr>';
										  }
										}
			$msg_body .= '<tfoot bgcolor="#E8E8E8" border="1" cellpadding="0" cellspacing="0" width="100%%" style="padding: 10px 10px 10px 10px;">';
			$msg_body .= '<tr>';
			$msg_body .= '<th colspan="3" align="left">Sous Total</th>';
			$msg_body .= '<td align="right">'.$obj['Cost'].'</td>';
			$msg_body .= '</tr>';
			$msg_body .= '<tr>';
			$msg_body .= '<th colspan="3" align="left">Frais De Livraison</th>';
			$msg_body .= '<td align="right">'.$obj['Delivery'].'</td>';
			$msg_body .= '</tr>';
			$msg_body .= '<tr>';
			$msg_body .= '<th colspan="3" align="left" style="font-size: 15px;">Total</th>';
			$msg_body .= '<td align="right" style="font-size: 15px;">'.$obj['Total_Amount'].'</td></tr>';
            $msg_body .= '</tfoot></tbody>
                                </table>';
            $msg_body .= '<!-- content -->
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
												<a href="https://www.facebook.com/" target="_blank" style="color: #FFFFFF;"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_circle_color-128.png" alt="Facebook" 
                                                         style="display: block; width: 30px; height: 30px;"/></a> 
											</td>
											<td>
												<a href="https://twitter.com/" target="_blank" style="color: #FFFFFF;"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_circle_color-128.png" alt="Twitter" 
                                                         style="display: block; width: 30px; height: 30px;"/></a>
											</td>
											<td>
												<a href="https://plus.google.com/" target="_blank" style="color: #FFFFFF;"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/google_circle_color-128.png" alt="Google" 
                                                         style="display: block; width: 30px; height: 30px;"/></a>
											</td>
											<td>
												<a href="https://www.instagram.com/" target="_blank" style="color: #FFFFFF;"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/instagram_circle_color-128.png" alt="Instagram" 
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
			<div class="content" bgcolor="#ffd400">
<table bgcolor="#ffd400" style="
 border: solid 1px #e6e6e6;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; " cellpadding="0" cellspacing="0" width="100%%">
	<tr>
		<td align="center" style="color: #FFFFFF; padding: 10px 0 10px 0; font-family: Avenir, sans-serif; font-size: 13px;">															
			<p>Si vous avez des problemes avec votre commande contactez nous <a href="#">ici</a></p>
                
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
                
                    <p><strong>2018 Artefact.</strong> All Rights Reserved</p>

							</td>
		<td align="right" style="color: #ccc; padding: 10px 0 10px 0; font-family: Avenir, sans-serif; font-size: 11px;">
                    <p>Design by <a href="http://mapannoir.alwaysdata.net/" target="_blank" style="color: #FFFFFF;">Steal Bass</a>
                    </p> 
							</td>
	</tr>
</table><!-- /FOOTER -->
</div>

</body>';

	$message_html = '<html><head></head>'.$msg_body.'</html>';
	
	//=====Création de la boundary.
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	  
	//=====Création du header de l'e-mail.
	$header = "From: Facture Artefact info@artefact.com".$passage_ligne;
	$header.= "Reply-To: ".$nom_expediteur." <".$mail_expediteur.">".$passage_ligne;
	$header .= "Cc: zamahappi@gmail.com".$passage_ligne;
	$header .= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    $header .= "X-Priority: 3".$passage_ligne;
	  
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	//==========
	  
	$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
	  
	//=====Ajout du message au format HTML.
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	  
	//=====On ferme la boundary alternative.
	$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	  
	//=====Ajout de la pièce jointe.
	if ($ispiece) { //===Ajout de la pièce jointe seulement si le champ du formulaire a été renseigné
		$message.= "Content-Type: ".$attach_type."; name=\"".$attach_name."\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: base64".$passage_ligne;
		$message.= "Content-Disposition: attachment; filename=\"".$attach_name."\"".$passage_ligne;
		$message.= $passage_ligne.$attachement.$passage_ligne.$passage_ligne;
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	}
	//=====Envoi de l'e-mail.
    if ( mail($mail_destinataire,$sujet,$message,$header)) 
		{
		session_destroy();
		 header("Location: register.php");
		}
}
}

?>

<?php
/*
 * @author Steal Bass
 * @website http://mapannoir.weebly.com/
 * @facebook https://www.facebook.com/happi.olivier
 */

include('dbcon.php');
require("libs/config.php");
$page = "Espace membre";
$pageDetails = $page;
$desc = "Laboratoires Biopharma une marque d’excellence dans le domaine de la Beauté en Afrique; LAIT HYDRATANT ( BALNEO FOR MEN & WOMEN, BETTINA, HYDRACARE, LUMINA, PRIMO ), LAIT ECLAIRCISSANT ( BIOPUR PARIS, BIO SUCCESS, GOLDEN CLAIR, RAPID CLAIR, TALANGAI, WHITE EXPRESS ), GAMME BEBE ( MOBY BEBE, KIDOUX, SEPHORA )";
$pageDesc = $desc;
$key = "Gel de douche, Lait de toilette, Lait hydratant, Lait éclaircissant, Savon bébé, BALNEO FOR MEN & WOMEN, HYDRACARE, PRIMO, MOBY BEBE, KIDOUX, B-LIGHT, BIOPUR PARIS, WHITE EXPRESS, NEOTRYL, TALANGAI, SEPHORA";
$pageKey = $key;

include("header.php");
?>

        <div class="container">

<?php
//============== L'ajout de pièce jointe à un message a été réalisé grâce à un très bon tutoriel de "siteduzero.com"
//============== lien de la page : http://www.siteduzero.com/informatique/tutoriels/e-mail-envoyer-un-e-mail-en-php-1/annexe-joindre-un-fichier-1

if (isset($_POST["envoi_message"])) { //****** Le formulaire d'envoi de message a été validé

	//====Une fois la ligne ci-dessus enlevée, enlever les commentaires au début de la ligne ci-dessous pour écrire l'adresse du destinataire (vous) en dur dans le programme.
	$mail_destinataire = $_POST["mail_expediteur"]; //=====Mail du destinataire final du message envoyé

	//=====Vérification de l'existence d'une pièce jointe.
	if ($_FILES['piecejointe']['name']<>"") $ispiece = true; else $ispiece = false;

	//=====Vérification de l'adresse de destination.
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail_destinataire)) $passage_ligne = "\r\n"; else $passage_ligne = "\n";

	//=====Récupération du mail, du nom de l'expéditeur et du sujet.
	$mail_expediteur = $_POST["mail_expediteur"];
// On récupère l'email
$result = $db->prepare("SELECT * FROM users WHERE email = :email");
$result->execute(array(':email' => $mail_expediteur));	
							$row = $result->fetch();

	$sujet = "Requette mot de passe oublié";
	
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";

	$msg_body  = '
<body style="margin:0; padding: 15px 15px 15px 15px; border: solid 1px #0080c2;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;" bgcolor="#F8F8F8">

<!-- HEADER -->
<table class="head-wrap" align="center" width="100%%">
	<tr>
		<td></td>
		<td class="header container" align="center">
			
			
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
							Pour changer de mot de passe cliquez sur ce <a href="http://www.laboratoires-biopharma.com/editpassword.php?id='.$row['name'].'" target="_blank" >lien</a><br/><br/>
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
	$msg_body .= '<!-- content -->
			<div class="content" bgcolor="">
				<table bgcolor="" cellpadding="0" cellspacing="0" width="100%%" style="margin-bottom: 10px;">
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
                
                    <p>© <strong>2017 Les Laboratoires Biopharma.</strong> All Rights Reserved <a href="http://www.laboratoires-biopharma.com/termesetconditionsfr.pdf"  target="_blank" style="color: #FFFFFF;"> Taxe & Condition</a></p>

							</td>
		<td align="right" style="color: #ccc; padding: 10px 0 10px 0; font-family: Avenir, sans-serif; font-size: 11px;">
                    <p>Design by <a href="http://mapannoir.weebly.com/" target="_blank"style="color: #FFFFFF;">Steal Bass</a>
                    </p> 
							</td>
	</tr>
</table><!-- /FOOTER -->
</div>

</body>';

	$message_html = '<html><head></head><body>'.$msg_body.'</body></html>';
	
	//=====Transfert de la pièce jointe sur le serveur.
	if ($ispiece) { //===traitement de la pièce jointe seulement si le champ du formulaire a été renseigné
		$uploaddir = './'; //===Chemin du dossier de votre serveur web dans lequel sera transféré la pièce jointe avant d'être traitée
		$upload_file = $uploaddir . $_FILES['piecejointe']['name']; 
		if (move_uploaded_file($_FILES['piecejointe']['tmp_name'], $upload_file)) {
			$ext = explode(".", basename($_FILES['piecejointe']['name'])); 
			switch($ext[1]) { 
				default:       
				$attach_type =  "application/octet-stream";  
			break; 
				case "gz":    
				$attach_type =  "application/x-gzip";  
			break; 
				case "tgz":   
				$attach_type =  "application/x-gzip";  
			break; 
				case "zip":   
				$attach_type =  "application/zip"; 
			break; 
				case "pdf":   
				$attach_type =  "application/pdf"; 
			break; 
				case "png":   
				$attach_type =  "image/png"; 
			break; 
				case "gif":   
				$attach_type =  "image/gif"; 
			break; 
				case "jpg": 
				case"jpeg":   
				$attach_type =  "image/jpeg"; 
			break; 
				case "txt":   
				$attach_type =  "text/plain"; 
			break; 
				case "htm":   
				$attach_type =  "text/html";   
			break; 
				case "html":  
				$attach_type =  "text/html"; 
			break; 
			} 
			$attach_name = $_FILES["piecejointe"]["name"]; 
		} 
		//=====Lecture et mise en forme de la pièce jointe.
		if (file_exists($upload_file)) { 
			$fichier = fopen($upload_file, "r");
			$attachement = fread($fichier, filesize($upload_file));
			$attachement = chunk_split(base64_encode($attachement));
			fclose($fichier);
		}
	}
	//=====Création de la boundary.
	$boundary = "-----=".md5(rand());
	$boundary_alt = "-----=".md5(rand());
	  
	//=====Création du header de l'e-mail.
	$header = "From: Mot de passe oublié care@laboratoires-biopharma.com".$passage_ligne;
	$header.= "Reply-To: ".$nom_expediteur." <".$mail_expediteur.">".$passage_ligne;
	$header .= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	  
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
	mail($mail_destinataire,$sujet,$message,$header);
	//========== 
	echo "<script>alert('Pour continuer veillez cliquer sur le lien envoyé à votre addresse email.')</script>"; 
}
?>



				
				<div class="col-md-6">
				
					<div class="box" id="contact">
                        <h2>Votre email</h2>
						
							<form method="post" onsubmit="return VerificationFormulaire(this)">
							<div class="content">
                                <div class="row">
								
                                <div class="col-sm-12">
                                    <div class="form-group">
										<input class="form-control" name="mail_expediteur" type="text" id="mail_expediteur" name="email" value="" tabindex="2" />
                                    </div>
								</div>
								</div>
							</div>

                            
                            <div class="box-footer">
                                <div>
                                    <button type="submit" class="btn btn-primary" name="envoi_message" id="submit_btn">Envoyez<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
							</form>	

                    </div>
                </div>

                    


                </div>
                <!-- /.col-md-9 -->
		</div>
<script type="text/javascript">
	<!--
	function VerificationFormulaire(frm) {
		if (frm.elements['mail_destinataire'].value == "") {
			alert('L\'adresse électronique est obligatoire !');
			frm.elements['mail_destinataire'].focus();
			return false;
		}
		if (frm.elements['mail_expediteur'].value == "") {
			alert('L\'adresse électronique est obligatoire !');
			frm.elements['mail_expediteur'].focus();
			return false;
		}
		if (frm.elements['sujet'].value == "") {
			alert('Le sujet ne peut pas être vide.');
			frm.elements['sujet'].focus();
			return false;
		}
		adresse = frm.elements['mail_destinataire'].value;
		var place = adresse.indexOf("@",1);
		var point = adresse.indexOf(".",place+1);
		if ( (place > -1)&&(adresse.length >2)&&(point > 1)) {
			return true;
		} else {
			alert('Votre adresse électronique ne paraît pas valide, veuillez la ressaisir !');
			frm.elements['mail_destinataire'].focus();
			return false;
		}
		adresse = frm.elements['mail_expediteur'].value;
		var place = adresse.indexOf("@",1);
		var point = adresse.indexOf(".",place+1);
		if ( (place > -1)&&(adresse.length >2)&&(point > 1)) {
			return true;
		} else {
			alert('Votre adresse électronique ne paraît pas valide, veuillez la ressaisir !');
			frm.elements['mail_expediteur'].focus();
			return false;
		}
		return true;
	}
	//-->
</script>
<?php
include("footer.php");
?>
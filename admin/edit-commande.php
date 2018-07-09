<?php
include_once 'dbconfig.php';

 require("libs/config.php");
include("header.php");
if(isset($_GET['id']))
        {
$stmt = $pdo->prepare('SELECT * FROM tbl_payment WHERE order_ID = :invoice');
$stmt->execute(array(':invoice' => $_GET['id']));
$row = $stmt->fetch();
// check Adress request
	if (isset($_POST['btnAdress'])){
		if ($_POST['name'] == "") {
        $register_error_message = 'Le nom est requis!';
    } else if ($_POST['prenom'] == "") {
        $register_error_message = 'Prenom est requis!';
    } else if ($_POST['pays'] == "") {
        $register_error_message = 'Pays est requis!';
    } else if ($_POST['province'] == "") {
        $register_error_message = 'province est requis!';
    } else if ($_POST['ville'] == "") {
        $register_error_message = 'Ville est requis!';
    } else if ($_POST['state'] == "") {
        $register_error_message = 'Le quartier est requis!';
    } else if ($_POST['phone'] == "") {
        $register_error_message = 'Le telephone est requis!';
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Email est requis!';
    } else {
		$name = $_POST['name'];
		$prenom = $_POST['prenom'];
		$pays = $_POST['pays'];
		$province = $_POST['province'];
		$ville = $_POST['ville'];
		$state = $_POST['state'];	
		$phone = $_POST['phone'];
		$email = $_POST['email'];
	
        $result = $pdo->prepare("UPDATE tbl_payment SET Name=UPPER('$name'), Prenom=UPPER('$prenom'), Country=UPPER('$pays'), Province=UPPER('$province'), City=UPPER('$ville'), State=UPPER('$state'), Phone=UPPER('$phone'), Email='$email' WHERE order_ID = :invoice");
		$result->execute(array(':invoice' => $_GET['id']));
	
	 header("Location: previewcommande.php?id=" .$row['order_ID']);
	}
	}
?>

        <div class="container">

                
            <div class="span9">
			<div class="alert alert-success">
			<h4>Editez la commande: #<?php echo $row['order_ID']; ?></h4>
				  </div>
			<legend></legend>
				

                    <div class="box">
						<?php
							if ($register_error_message != "") {
								echo '<div class="alert alert-danger alert-dismissable"><button data-dismiss="alert" class="close" type="button">x</button><strong>Ereure: </strong> ' . $register_error_message . '</div>';
							}
							?>
						<form method="POST" action="">
							
						  <?php 
								echo '<div class="form-group">
                                            <label for="firstname">Nom</label>';
                                            echo '<input type="text" class="form-control" name="name" id="name" value="'. stripslashes($row[Name]). '">';
                                        echo '</div>
                                        <div class="form-group">
                                            <label for="lastname">Prenom</label>';
                                            echo '<input type="text" class="form-control" name="prenom" id="prenom" value="'.stripslashes($row[Prenom]). '">';
                                        echo '</div>';

                                echo '<div class="form-group">
                                            <label for="country">Pays</label>
                                            <select class="form-control" name="pays" id="country">
											  <option selected="selected">'.stripslashes($row[Country]).'</option>
											  <option value="BJ" countrynum="229">Benin</option>
											  <option value="BW" countrynum="267">Botswana</option>
											  <option value="BF" countrynum="226">Burkina Faso</option>
											  <option value="BI" countrynum="257">Burundi</option>
											  <option value="CM" countrynum="237">Cameroun</option>
											  <option value="CV" countrynum="238">Cape Verde</option>
											  <option value="CF" countrynum="236">Republique Centrafricaine</option>
											  <option value="TD" countrynum="235">Tchad</option>
											  <option value="ZR" countrynum="243">Republique Democratique Du Congo</option>
											  <option value="CG" countrynum="242">Republique Du Congo</option>
											  <option value="CI" countrynum="225">Cote Ivoire</option>
											  <option value="DJ" countrynum="253">Djibouti</option>
											  <option value="EG" countrynum="20">Egypt</option>
											  <option value="GQ" countrynum="240">Guinee Equatoriale</option>
											  <option value="ER" countrynum="291">Eritree</option>
											  <option value="ET" countrynum="251">Ethiopie</option>
											  <option value="GA" countrynum="241">Gabon</option>
											  <option value="GM" countrynum="220">Gambi</option>
											  <option value="GH" countrynum="233">Ghana</option>
											  <option value="GN" countrynum="224">Guinee</option>
											  <option value="GW" countrynum="245">Guinee-Bissau</option>
											  <option value="KE" countrynum="254">Kenya</option>
											  <option value="LY" countrynum="218">Libye</option>
											  <option value="MG" countrynum="261">Madagascar</option>
											  <option value="MW" countrynum="265">Malawi</option>
											  <option value="ML" countrynum="223">Mali</option>
											  <option value="MA" countrynum="212">Maroc</option>
											  <option value="MZ" countrynum="258">Mozambique</option>
											  <option value="NE" countrynum="227">Niger</option>
											  <option value="NG" countrynum="234">Nigeria</option>
											  <option value="RW" countrynum="250">Rwanda</option>
											  <option value="SN" countrynum="221">Senegal</option>
											  <option value="ZA" countrynum="27">Afrique Du Sud</option>
											  <option value="TZ" countrynum="255">Tanzanie</option>
											  <option value="TG" countrynum="228">Togo</option>
											  <option value="TN" countrynum="216">Tunisie</option>
											  <option value="UG" countrynum="256">Uganda</option>
											  <option value="ZM" countrynum="260">Zambie</option>
											  <option value="ZW" countrynum="263">Zimbabwe</option>
											</select>
                                        </div>';
                                    echo '<div class="form-group">
                                            <label for="province">Province</label>
                                            <select class="form-control" name="province" id="province">
											  <option selected="selected">'.stripslashes($row[Province]).'</option>
											  <option value="ouest">Ouest</option>
											  <option value="nord-ouest">Nord-Ouest</option>
											  <option value="sud-ouest">Sud-Ouest</option>
											  <option value="littoral">Littoral</option>
											  <option value="center">Centre</option>
											  <option value="est">Est</option>
											  <option value="sud">Sud</option>
											  <option value="extreme-nord">Exrême-Nord</option>
											  <option value="nord">Nord</option>
											  <option value="adamaoua">Adamaoua</option>
											</select>
                                        </div>';
                                    echo '<div class="form-group">
                                            <label for="city">Ville</label>
                                            <input type="text" class="form-control" name="ville" id="city" value="'. stripslashes($row[City]). '">
                                        </div>';
                                    echo '<div class="form-group">
                                            <label for="state">Quartier</label>
                                            <input type="text" class="form-control" name="state" id="state" value="'. stripslashes($row[State]). '">
                                        </div>';

                                    echo '<div class="form-group">
                                            <label for="phone">Telephone</label>
                                            <input type="text" class="form-control" name="phone" id="phone" value="'. stripslashes($row[Phone]). '">
                                        </div>';
                                    echo '<div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="'.stripslashes($row[Email]). '">
                                        </div>';
							?>
                            </div>

                                    <button type="submit" class="btn btn-success" name="btnAdress"><i class="icon-save"></i> Enregistrez
                                    </button>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 --> 



                </div>
                <!-- /.col-md-3 -->
		</div>	
<?php
		}
include("footer.php");
?>
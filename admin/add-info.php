<?php
include_once 'dbconfig.php';

require("libs/config.php");
  include('header.php');
?>

<script type="text/javascript">
$(document).ready(function()
{
	$(".country").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_state.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		var id=$(this).val();
		var dataString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "get_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				$(".city").html(html);
			} 
		});
	});
	
});
</script>

 <div class="container">
  <br>
 <div class="row-fluid">

    <div class="row-fluid">
      <div class="span12">
	 <div class="span9">
<div>
<div class="alert alert-success">
<h4>Add Products</h4>
	  </div>
<form class="" method="POST" enctype="multipart/form-data">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Title</label>
    <div class="controls">
      <input type="text" class="span10" id="inputEmail" name="title" placeholder="Title" required class="span3">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Contenance</label>
    <div class="controls">
      <input type="text" class="span10" id="inputEmail" name="contenance" placeholder="contenance" required class="span3">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Content</label>
    <div class="controls">
<textarea rows="5" class="span10" required placeholder="Write your details here..!" name="content"></textarea>    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Gel</label>
    <div class="controls">
	 <input type="radio" class="radio-inline" id="inputEmail" name="gel" required value="1" />OUI
    <input type="radio" class="radio-inline" id="inputEmail" name="gel" required value="2" />NON
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Deo</label>
    <div class="controls">
	 <input type="radio" class="radio-inline" id="inputEmail" name="deo" required value="1" />OUI
    <input type="radio" class="radio-inline" id="inputEmail" name="deo" required value="2" />NON
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Lait</label>
    <div class="controls">
	 <input type="radio" class="radio-inline" id="inputEmail" name="lait" required value="1" />OUI
    <input type="radio" class="radio-inline" id="inputEmail" name="lait" required value="2" />NON
    </div>
  </div>
  <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="font" required> 
                                    </div>
                                </div>
  
   <div class="control-group">
                                    <div class="controls">
<select name="country" class="country">
<option selected="selected">--Select menu--</option>
<?php
	$stmt = $conn->prepare("SELECT * FROM tbl_main");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
        <?php
	} 
?>
</select>

<select name="state" class="state">
<option selected="selected">--Select Sub--</option>
</select>

<select name="city" class="city">
<option selected="selected">--Select Down--</option>
</select>
</div>
</div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Actif</label>
    <div class="controls">
	 <input type="radio" class="radio-inline" id="inputEmail" name="actif" required value="1" />OUI
    <input type="radio" class="radio-inline" id="inputEmail" name="actif" required value="2" />NON
    </div>
  </div>
    <div class="controls">
    <button name="addinfo" type="submit" class="btn btn-success"><i class="icon-pencil"></i>&nbsp;Post</button>
    </div>
	</form>  

</div>
<br />
</div>
</div>
</div>
</div>
</div>
<?php
		if(isset($_POST['addinfo'])){
		$cat = $_POST['country'];
		$subcat = $_POST['state'];
		$downcat = $_POST['city'];
		$title=$_POST['title'];
		$prodSlug = slug($title);	
		$Contenance = $_POST['contenance'];
		$content = $_POST['content'];
		$gel = $_POST['gel'];
		$deo = $_POST['deo'];
		$lait = $_POST['lait'];
		$actif = $_POST['actif'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $Photo = "upload/" . $_FILES["image"]["name"];
		
		$sql=$conn->prepare("INSERT into tbl_produits (cat_id, subcat_id, downcat_id, prodTitle, prodCont, prodSlug, prodDesc, prodGel, prodDeo, prodLait, prodImg, prodActif) VALUES('$cat', '$subcat', '$downcat', '$title', '$Contenance', '$prodSlug', '$content', '$gel', '$deo', '$lait', '$Photo', '$actif')");
	    $sql->execute();
			
	    header('location:product.php');
		
		}
		
		?>

<?php   include('footer.php'); ?>

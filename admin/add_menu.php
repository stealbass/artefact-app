<?phpinclude_once 'dbconfig.php';
require("libs/config.php");
include("header.php");$pageTitle = "Add menu";$msg = '';if(isset($_POST['add_main_menu'])){ $menu_name = $_POST['menu_name']; $maincatSlug = slug($menu_name);	$stmt = $conn->prepare("INSERT INTO tbl_main(cat_name, maincatSlug) VALUES(:menu_name, :maincatSlug)");	$stmt->execute(array(':menu_name'=>$menu_name, ':maincatSlug'=>$maincatSlug));}if(isset($_POST['add_sub_menu'])){ $parent = $_POST['country']; $proname = $_POST['sub_menu_name'];  $subcatSlug = slug($proname);	$stmt = $conn->prepare("INSERT INTO tbl_submain(cat_id,subcat_name,subcatSlug) VALUES(:parent,:proname,:subcatSlug)");	$stmt->execute(array(':parent'=>$parent, ':proname'=>$proname, ':subcatSlug'=>$subcatSlug));}
?>

<div class="container">
 <div class="row-fluid">
  <div class="span12">

    <div class="row-fluid">
      <div class="span12">
	 <div class="span9">
<div class="alert alert-success">
<h4>Add Menu</h4>
	  </div>
	  <legend></legend>
<div class=""><form class="form-horizontal" method="POST" action="add_menu.php">
<input type="text" placeholder="menu name :" name="menu name" /><br />
<button type="submit" name="add_main_menu" class="btn btn-success">Add main menu</button>
</form><form class="form-horizontal" method="POST" action="add_menu.php">
<select name="country" class="country">
<option selected="selected">select parent menu</option>
<?php	$stmt = $conn->prepare("SELECT * FROM tbl_main");	$stmt->execute();	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
 ?>
    <option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></option>
    <?php
}
?>

</select>
<input type="text" placeholder="menu name :" name="sub_menu_name" /><br />
<button type="submit" name="add_sub_menu" class="btn btn-success">Add sub menu</button>
</form>
</div>

   </div>
	  <?php
	  include('session_sidebar.php');
	  ?>
	  <div class="well">
<a href="add-submenu.php" type="button" class="btn btn-primary btn-large">Ajouter Menu Supplementaire</a>
   </div>
   </div>
   </div>
   </div>
   </div>
   </div>
<?php   include('footer.php'); ?>

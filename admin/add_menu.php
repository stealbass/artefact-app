<?php
require("libs/config.php");
include("header.php");
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
<div class="">
<input type="text" placeholder="menu name :" name="menu name" /><br />
<button type="submit" name="add_main_menu" class="btn btn-success">Add main menu</button>
</form>
<select name="country" class="country">
<option selected="selected">select parent menu</option>
<?php
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
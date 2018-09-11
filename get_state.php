<?php
require("dbcon.php");
require("libs/config.php");
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $db->prepare("SELECT * FROM tbl_submain WHERE cat_id=:id");

	$stmt->execute(array(':id'=>$id));
	?><option selected="selected" class="form-control">Sub Category :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['subcat_id']; ?>" class="form-control"><?php echo $row['subcat_name']; ?></option>
        <?php
	}
}
?>
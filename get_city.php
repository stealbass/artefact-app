<?php
require("dbcon.php");
require("libs/config.php");
if($_POST['id'])
{
	$id=$_POST['id'];
	
	$stmt = $db->prepare("SELECT * FROM tbl_downsub WHERE subcat_id=:id");

	$stmt->execute(array(':id'=>$id));

	
	?><option selected="selected" class="form-control">Down Sub Category :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['downcat_id']; ?>" class="form-control"><?php echo $row['downcat_name']; ?></option>
		<?php
	}
}
?>
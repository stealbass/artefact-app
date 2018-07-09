<?php
include_once 'dbconfig.php';
require("libs/config.php");
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $conn->prepare("SELECT * FROM tbl_submain WHERE cat_id=:id");

	$stmt->execute(array(':id'=>$id));
	?><option selected="selected">Sub Category :</option><?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['subcat_id']; ?>"><?php echo $row['subcat_name']; ?></option>
        <?php
	}
}
?>
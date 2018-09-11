<?php
$dbcon = new MySQLi("localhost","id1533662_root","mapan1409","id1533662_laboratoire_bio");

if (isset($_POST['parent'])) {
	$parent= $row['m_menu_id'];
$reson=$dbcon->query("SELECT * FROM sub_menu WHERE m_menu_id = $parent");
while($row=$reson->fetch_array())
{
 ?>
    <option value="<?php echo $row['m_menu_id']; ?>"><?php echo $row['s_menu_name']; ?></option>
    <?php
}
}
?>
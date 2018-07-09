<?php

/*

 * @author Steal Bass

 * @website http://mapannoir.alwaysdata.net/

 * @facebook https://www.facebook.com/happi.olivier

 */



require("libs/config.php");

  include('header.php'); 

 ?>



  <div class="container">

  <br>

  <div class="row-fluid">

  <div class="span12">



    <div class="row-fluid">

      <div class="span12">

	 <div class="span9">

<div class="alert alert-success">

<h4>Manage Pages</h4>

	  </div>

<legend></legend>

	  

 

  <?php

$pageTitle = "Manage Pages";

$msg = '';

if (isset($_GET["del"]) && $_GET["del"] != "") {

    $sql = "DELETE FROM  " . TABLE_PAGES . " WHERE `page_id` = :id";

    try {

        $stmt = $DB->prepare($sql);

        $stmt->bindValue(":id", db_prepare_input($_GET["del"]));

        $stmt->execute();

    } catch (Exception $ex) {

        echo errorMessage($ex->getMessage());

    }



    if ($stmt->rowCount() > 0) {

        $msg = successMessage("Record deleted successfully");

    } else {

        $msg = errorMessage(mysql_error());

    }

}

?>   

<?php echo $msg; ?>

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

    <caption></caption>

  <thead>

    <tr>

      <th>Title</th>

      <th>Parent</th>

      <th>Sort Order</th>

      <th>Status</th>

      <th width="180">Action</th>

    </tr>

	 </thead>

  <tbody>

    <?php

    $sql = "SELECT * FROM " . TABLE_PAGES . " WHERE 1 ORDER BY page_title ASC, page_id DESC";

    try {

        $stmt = $DB->prepare($sql);

        $stmt->execute();

        $results = $stmt->fetchAll();

    } catch (Exception $ex) {

        echo errorMessage($ex->getMessage());

    }

    foreach ($results as $rs) {

        ?>

        <tr>

            <td ><?php echo stripslashes($rs["page_title"]); ?></td>

            <td><?php echo stripslashes(getParentCategoryName($rs["parent"])); ?></td>

            <td><?php echo stripslashes($rs["sort_order"]); ?></td>

            <td><?php echo ($rs["status"] == 'A') ? "Active" : "Inactive"; ?></td>

            <td><a class="btn btn-warning" href="add_edit_page.php?edit=<?php echo ($rs["page_id"]); ?>">Edit</a> 

                <a class="btn btn-danger" href="manage_pages.php?del=<?php echo ($rs["page_id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a> </td>

        </tr>

	<?php } ?> 

  </tbody> 

</table>	  



	  </div>

<?php

	  include('session_sidebar.php');

	  ?>

	  <div class="well">

	  <a button class="btn btn-block btn-success" type="button" href="add_edit_page.php" role="button"><i class="icon-edit icon-large"></i> Add Page</button></a>

	  </div>

	  </div>

    </div>

    </div>

 

</div>

  </div>

<?php   include('footer.php'); ?>
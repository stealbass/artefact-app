
<div id="addinfo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  <div class="alert alert-gray">
  Add Information
  </div>
  <div class="modal-body">
  <hr>
 <form class="form-horizontal" method="POST" enctype="multipart/form-data">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Title</label>
    <div class="controls">
      <input type="text" class="span10" id="inputEmail" name="title" placeholder="Title" required class="span3">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Content</label>
    <div class="controls">
<textarea rows="5" class="span10" required placeholder="Write your details here..!" name="content"></textarea>    </div>
  </div>
  
  <div class="control-group">
                                    <label class="control-label" for="input01">Image:</label>
                                    <div class="controls">
                                        <input type="file" name="image" class="font" required> 
                                    </div>
                                </div>
  
   <div id="select_box">
<label>Main :</label> 
<select name="country" class="country">
<option selected="selected">--Main Category--</option>
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

<label>SubCat :</label>
<select name="state" class="state">
<option selected="selected">--Sub Category--</option>
</select>

<label>DownSub :</label>
<select name="city" class="city">
<option selected="selected">--Down SubCategry--</option>
</select>
	  
</div>
 

  </div>
  <div class="modal-footer">
    <button name="addinfo" type="submit" class="btn btn-success"><i class="icon-pencil"></i>&nbsp;Post</button>
      <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
    </form>  
  </div>
</div>

 <?php
		if(isset($_POST['addinfo'])){
		$title=$_POST['title'];
		$postSlug = slug($title);	
		$content=$_POST['content'];
		$m_menu_id=$_POST['category'];
		$s_menu_id=$_POST['subcategory'];
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $_FILES["image"]["name"]);
                                $Photo = "upload/" . $_FILES["image"]["name"];
		
		
		$query = $pdo->query("insert into tbl_info (Title, m_menu_id, s_menu_id, postSlug, Content, Photo) VALUES('$title', '$m_menu_id', '$s_menu_id', '$postSlug', '$content','$Photo')");
			
	    header('location:info.php');
		
		}
		
		?>
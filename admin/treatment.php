<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

	<div class="span9">
		<div class="content">
			<div class="module">
				<div class="module-head">
					<h3>Add New Treatment</h3>
				</div>
		<div class="module-body">

    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);
            $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
            $author = mysqli_real_escape_string($db->link, $_POST['author']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($title == '' || $body == '' || $cat == '' || $author == ''){
                echo "<span class='error'>Field must not be empty. !!</span>";
            }elseif (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_post(title,image,cat,body,author) VALUES('$title','$uploaded_image','$cat','$body','$author')";
            $inserted_rows = $db->insert($query);
            if ($inserted_rows) {
             echo "<span style='font-size:18px;color:green'>Treatment Inserted Successfully.
             </span>";
            }else {
             echo "<span style='font-size:18px;color:red'>Treatment is not inserted !!</span>";
            }
        }
    }
    ?>

	<form class="form-horizontal row-fluid" action="" method="post" enctype="multipart/form-data">
		<div class="control-group">
			<label class="control-label" for="basicinput">Title: </label>
			<div class="controls">
				<input type="text" name="title" class="span8">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="basicinput">Image: </label>
			<div class="controls">
				<input type="file" name="image" />
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="basicinput">Catagory: </label>
			<div class="controls">
				<select tabindex="1" data-placeholder="Select One.." name="cat" class="span8">
					<option value="">Select here..</option>
				<?php 
					$query = "SELECT * FROM tbl_category";
					$data = $db->select($query);
					if($data != false){
						while($result = $data->fetch_assoc()){
				?>
					<option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
				<?php } } ?>
				</select>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="basicinput">Treatment Details: </label>
			<div class="controls">
				<textarea class="span8" rows="5" name="body"></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="basicinput">Author: </label>
			<div class="controls">
				<input type="text" name="author" class="span4">
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn">Upload!</button>
			</div>
		</div>
	</form>
</div>
</div>
</div><!--/.content-->
</div><!--/.span9-->
<?php include 'inc/footer.php'; ?>
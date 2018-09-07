<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

	<div class="span9">
		<div class="content">
			<div class="module">
				<div class="module-head">
					<h3>Add New Catagory for Treatment</h3>
				</div>
		<div class="module-body">

    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $name = mysqli_real_escape_string($db->link, $_POST['name']);

            if($name == ''){
                echo "<span class='error'>Field must not be empty. !!</span>";
            }else{
            $query = "INSERT INTO tbl_category(name) VALUES('$name')";
            $inserted_rows = $db->insert($query);
            if ($inserted_rows) {
             echo "<span style='font-size:18px;color:green'>Catagory Inserted Successfully.
             </span>";
            }else {
             echo "<span style='font-size:18px;color:red'>Catagory is not inserted !!</span>";
            }
        }
    }
    ?>

	<form class="form-horizontal row-fluid" action="" method="post>
		<div class="control-group">
			<label class="control-label" for="basicinput">Name of the catagory: </label>
			<div class="controls">
				<input type="text" name="name" class="span8">
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
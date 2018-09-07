<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

	<div class="span9">
		<div class="content">
<?php 
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $iaddress = mysqli_real_escape_string($db->link, $_POST['iaddress']);
    $haddress = mysqli_real_escape_string($db->link, $_POST['haddress']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $dob = mysqli_real_escape_string($db->link, $_POST['dob']);
    $phone = mysqli_real_escape_string($db->link, $_POST['phone']);
    $website = mysqli_real_escape_string($db->link, $_POST['website']);

    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;

    if($name == '' || $iaddress == '' || $haddress == '' || $email == '' || $dob == '' || $phone == ''){
        echo "<span class='error'>Field must not be empty. !!</span>";
    }
    if(!empty($file_name)){
        if (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
        }else{
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "UPDATE tbl_profile
                  SET name='$name',
                    iaddress='$iaddress',
                    haddress='$haddress',
                    email='$email',
                    dob='$dob',
                    phone='$phone',
                    website='$website',
                    image='$uploaded_image'
                    WHERE id='1'";
        $updated_rows = $db->update($query);
        if ($updated_rows) {
         echo "<span style='font-size:18px;color:green'>Your profile is Updated Successfully.
         </span>";
        }else {
         echo "<span style='font-size:18px;color:red'>Something went wrong !!</span>";
        }
        }
    }else{
        $query = "UPDATE tbl_profile
                  SET name='$name',
                    iaddress='$iaddress',
                    haddress='$haddress',
                    email='$email',
                    dob='$dob',
                    phone='$phone',
                    website='$website'
                    WHERE id='1'";
        $updated_rows = $db->update($query);
        if ($updated_rows) {
         echo "<span style='font-size:18px;color:green'>Your profile is Updated Successfully.
         </span>";
        }else {
         echo "<span style='font-size:18px;color:red'>Something went wrong !!</span>";
        }
        }
    }
?>

			<div class="module">
				<div class="module-head">
					<h3>Update My Profile</h3>
				</div>
				<div class="module-body">
<?php
	$query = "SELECT * FROM tbl_profile WHERE id='1'";
	$result = $db->select($query);
	if($result != false){
		$value = mysqli_fetch_array($result);
?>
		<form class="form-horizontal row-fluid" action="" method="POST" enctype="multipart/form-data">
			<div class="control-group">
				<label class="control-label" for="basicinput">Name: </label>
				<div class="controls">
					<input type="text" id="name" name="name" value="<?php echo $value['name']; ?>" class="span6">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">My Image</label>
				<div class="controls">
					<img src="<?php echo $value['image']; ?>" height="80px" width="60px"/>
					<input type="file" id="image" name="image" value=" class="span8">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">Institute Address: </label>
				<div class="controls">
					<input type="text" id="iaddress" name="iaddress" value="<?php echo $value['iaddress']; ?>" class="span6">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">Home address: </label>
				<div class="controls">
					<input type="text" id="haddress" name="haddress" value="<?php echo $value['haddress']; ?>" class="span6">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">Email: </label>
				<div class="controls">
					<input type="text" id="email" name="email" value="<?php echo $value['email']; ?>" class="span6">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">Date of birth: </label>
				<div class="controls">
					<input type="date" id="dob" name="dob" value="<?php echo $value['dob']; ?>" class="span3">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">Phone: </label>
				<div class="controls">
					<input type="text" id="phone" name="phone" value="<?php echo $value['phone']; ?>" class="span4">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">Website: </label>
				<div class="controls">
					<input type="text" id="website" name="website" value="<?php echo $value['website']; ?>" class="span6">
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" name="submit" class="btn">Update</button>
				</div>
			</div>
		</form>

<?php } ?>
				</div>
			</div>
		</div><!--/.content-->
	</div><!--/.span9-->

<?php include 'inc/footer.php'; ?>
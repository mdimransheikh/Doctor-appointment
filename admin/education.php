<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Add your new education field</h3>
							</div>
							<div class="module-body">
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
	$degree = mysqli_real_escape_string($db->link, $_POST['degree']);
	$year = mysqli_real_escape_string($db->link, $_POST['year']);
	$name = mysqli_real_escape_string($db->link, $_POST['name']);
	$details = mysqli_real_escape_string($db->link, $_POST['details']);
	if($degree == "" || $year == "" || $name == ""){
		echo "<span style='font-size:18px;color:red'>Field must not be error !!</span>";
	}else{
	$query = "INSERT INTO tbl_education(degree,year,name,details) VALUES('$degree','$year','$name','$details')";
	$data = $db->insert($query);
	if($data){
		echo "<span style='font-size:18px;color:green'>Education Field inserted successfully !!</span>";
	}else{
		echo "<span style='font-size:18px;color:red'>Education Field can not be inserted !!</span>";
	}
	}
}
?>
		<form class="form-horizontal row-fluid" action="" method="post">
			<div class="control-group">
				<label class="control-label" for="basicinput">Name of Degree: </label>
				<div class="controls">
					<input type="text" id="basicinput" name="degree" class="span8">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">Passing Year: </label>
				<div class="controls">
					<input type="text" id="basicinput" name="year" class="span8">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">Institution name: </label>
				<div class="controls">
					<input type="text" id="basicinput" name="name" class="span8">	
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="basicinput">Description</label>
				<div class="controls">
					<textarea class="span8" rows="5" name="details"></textarea>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn">Submit</button>
				</div>
			</div>
		</form>
		</div>
	</div>

						
						
</div><!--/.content-->
</div><!--/.span9-->
<?php include 'inc/footer.php'; ?>
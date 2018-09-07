<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
	<div class="span9">
		<div class="content">

		<div class="module">
			<div class="module-head">
				<h3>My experience</h3>
			</div>
			<?php 
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					$year = mysqli_real_escape_string($db->link, $_POST['year']);
					$name = mysqli_real_escape_string($db->link, $_POST['name']);
					$details = mysqli_real_escape_string($db->link, $_POST['details']);
					if($year == '' || $name == '' || $details == ''){
						echo "<span style='font-size:18px;color:red'>Field must not be empty !!</span>";
					}else{
					$query = "INSERT INTO tbl_experience(year, name,details) VALUES('$year','$name','$details')";
					$result = $db->insert($query);
					if($result){
						echo "<span style='font-size:18px;color:green'>Your experience is updated !!</span>";
					}else{
						echo "<span style='font-size:18px;color:red'>Your experience is not updated !!</span>";
					}
				}
			} 
			?>
			<div class="module-body">
				<form class="form-horizontal row-fluid" action="" method="post">
					<div class="control-group">
						<label class="control-label" for="basicinput">Year: </label>
						<div class="controls">
							<input type="text" id="year" name="year" class="span8">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="basicinput">Institute name: </label>
						<div class="controls">
							<input type="text" id="name" name="name" class="span8">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="basicinput">Details: </label>
						<div class="controls">
							<textarea class="span12" rows="15" name="details">
							</textarea>
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<button type="submit" name="submit" class="btn">Update!</button>
						</div>
					</div>
				</form>
			</div>
		</div>

			
			
		</div><!--/.content-->
	</div><!--/.span9-->
<?php include 'inc/footer.php'; ?>
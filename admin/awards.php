<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
	<div class="span9">
		<div class="content">

		<div class="module">
			<div class="module-head">
				<h3>My awards</h3>
			</div>
			<?php 
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					$award = mysqli_real_escape_string($db->link, $_POST['award']);
					$query = "INSERT INTO tbl_award(award) VALUES('$award')";
					$result = $db->insert($query);
					if($result){
						echo "<span style='font-size:18px;color:green'>Your awards is updated !!</span>";
					}else{
						echo "<span style='font-size:18px;color:red'>Your awards is not updated !!</span>";
					}
				}
			?>
			<div class="module-body">
				<form class="form-horizontal row-fluid" action="" method="post">
					<div class="control-group">
						<label class="control-label" for="basicinput">Award name: </label>
						<div class="controls">
							<input type="text" id="award" name="award" class="span8">
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
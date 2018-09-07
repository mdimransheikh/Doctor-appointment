<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
	<div class="span9">
		<div class="content">

		<div class="module">
			<div class="module-head">
				<h3>About me</h3>
			</div>
			<?php 
				if($_SERVER['REQUEST_METHOD'] == "POST"){
					$content = mysqli_real_escape_string($db->link, $_POST['content']);
					$query = "UPDATE tbl_about
							SET content = '$content'
							WHERE id = '1'";
					$result = $db->update($query);
					if($result){
						echo "<span style='font-size:18px;color:green'>Your about is updated !!</span>";
					}else{
						echo "<span style='font-size:18px;color:red'>Your about is not updated !!</span>";
					}
				}
			?>
			<div class="module-body">
			<?php 
				$query = "SELECT * FROM tbl_about WHERE id='1'";
				$data = $db->select($query);
				if($data){
					$value = mysqli_fetch_array($data);
			?>
				<form class="form-horizontal row-fluid" action="" method="post">
					<div class="control-group">
						<label class="control-label" for="basicinput">Textarea</label>
						<div class="controls">
							<textarea class="span12" rows="15" name="content">
								<?php echo $value['content']; ?>
							</textarea>
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<button type="submit" name="submit" class="btn">Update!</button>
						</div>
					</div>
				</form>
			<?php } ?>
			</div>
		</div>

			
			
		</div><!--/.content-->
	</div><!--/.span9-->
<?php include 'inc/footer.php'; ?>
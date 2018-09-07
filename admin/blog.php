<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

	<div class="span9">
		<div class="content">
			<div class="module">
				<div class="module-head">
					<h3>Forms</h3>
				</div>
				<div class="module-body">
						<form class="form-horizontal row-fluid">
							<div class="control-group">
								<label class="control-label" for="basicinput">Basic Input</label>
								<div class="controls">
									<input type="text" id="basicinput" placeholder="Type something here..." class="span8">
									<span class="help-inline">Minimum 5 Characters</span>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="basicinput">Dropdown Button</label>
								<div class="controls">
									<div class="dropdown">
										<a class="dropdown-toggle btn" data-toggle="dropdown" href="#">Dropdown Button <i class="icon-caret-down"></i></a>
										<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
											<li><a href="#">First Row</a></li>
											<li><a href="#">Second Row</a></li>
											<li><a href="#">Third Row</a></li>
											<li><a href="#">Fourth Row</a></li>
										</ul>
									</div>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="basicinput">Dropdown</label>
								<div class="controls">
									<select tabindex="1" data-placeholder="Select here.." class="span8">
										<option value="">Select here..</option>
										<option value="Category 1">First Row</option>
										<option value="Category 2">Second Row</option>
										<option value="Category 3">Third Row</option>
										<option value="Category 4">Fourth Row</option>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="basicinput">Textarea</label>
								<div class="controls">
									<textarea class="span8" rows="5"></textarea>
								</div>
							</div>

							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn">Submit Form</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div><!--/.content-->
	</div><!--/.span9-->
<?php include 'inc/footer.php'; ?>
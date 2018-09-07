<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

		<div class="span9">
			<div class="content">
				<div class="module">
					<div class="module-head">
						<h3>Experience list</h3>
					</div>
					<div class="module-body table">
						<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Title</th>
									<th>Image</th>
									<th>Catagory</th>
									<th>Decription</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
					<?php 
						$query = "SELECT tbl_post.*, tbl_category.name FROM tbl_post INNER JOIN tbl_category ON tbl_post.cat = tbl_category.id ORDER BY tbl_post.id DESC";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $data['title']; ?></td>
							<td><img src="<?php echo $data['image']; ?>" height="80px" width="100px"/></td>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $fm->textShorten($data['body'], 100); ?></td>
							<td>
								<a href="edittreatment.php?editId=<?php echo $data['id']; ?>">Edit</a> 
								<a onclick="return confirm('Are you sure to delete?');"  href="deletetreatment.php?deleteId=<?php echo $data['id']; ?>">Delete</a>
			 				</td>
						</tr>
					<?php 
						$i++;
						} } 
					?>
						</tbody>
					</table>
				</div>
			</div><!--/.module-->
						
<?php include 'inc/footer.php'; ?>

<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
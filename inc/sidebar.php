<div class="sidebar">
<div class="sidebar_top">
    <h3>Categories</h3>
<div class="sidebar_top_list">
	 <ul>
	 <?php 
	 	$query = "SELECT * FROM tbl_category";
	 	$data = $db->select($query);
	 	if($data){
	 		while($category = $data->fetch_assoc()){
	 ?>
		<li><a href="posts.php?category=<?php echo $category['id']; ?>"><span class="category-name"><?php echo $category['name']; ?></span><div class="clear"></div></a></li>
	<?php } } ?>
	</ul>
</div>
</div>
		<div class="popular-post">
			<h3>popular-posts</h3>
			<?php 
				$query = "SELECT * FROM tbl_post ORDER BY id DESC LIMIT 5";
	 			$data = $db->select($query);
	 			if($data){
	 				while($post = $data->fetch_assoc()){
			?>
				<div class="post-grid">
					<img src="admin/<?php echo $post['image']; ?>" alt="image"/>
					<p><?php echo $fm->textShorten($post['body'], 50); ?><a href="post.php?id=<?php echo $post['id']; ?>">>>></a></p>
					<div class="clear"> </div>
				</div>
				<div class="clear"></div>
			<?php } } ?>
		</div>
	</div>
	<div class="clear"></div>
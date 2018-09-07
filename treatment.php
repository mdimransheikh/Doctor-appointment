<?php include 'inc/header.php'; ?>
<body>
<div class="wrap">
	<div class="main">
		<div class="content">
<!--pagination-->
<?php
	$per_page = 5;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	$start_form = ($page-1)*$per_page;
?>
<!--pagination-->
		<?php
			$query = "SELECT * FROM tbl_post LIMIT $start_form, $per_page";
			$result = $db->select($query);
			if($result != false){
				while($value = $result->fetch_assoc()){
		?>
			<div class="box1">
   				 <h3><a href="post.php?id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h3>
    				<span>By <?php echo $value['author']; ?> - <?php echo $fm->formatDate($value['date']); ?></span> 
			   <div class="view">
					<a href="post.php?id=<?php echo $value['id']; ?>"><img src="admin/<?php echo $value['image']; ?>" /></a>
				</div>
				<div class="data">
				    <p><?php echo $fm->textShorten($value['body'], 400); ?></p>
				    <span><a href="post.php?id=<?php echo $value['id']; ?>">Continue reading >>></a></span>
				</div>
			<div class="clear"></div>
		</div>
	<?php } } ?>
<!--pagination-->
<center>
<?php
	$query = "SELECT * FROM tbl_post";
	$result = $db->select($query);
	$total_rows = mysqli_num_rows($result);
	$total_pages = ceil($total_rows/$per_page);

	echo "<span class='pagination'><a href='treatment.php?page=1'>"."First page "."</a>";
	for($i=1; $i <= $total_pages; $i++){
		echo "<a href='treatment.php?page=".$i ."'>".$i."</a>";
	};
	echo "<a href='treatment.php?page=$total_pages'>"." Last page"."</a></span>";
?>
</center>
<!--pagination-->
</div>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>


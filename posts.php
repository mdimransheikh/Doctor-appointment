<?php include 'inc/header.php'; ?>

<?php 
	if(!isset($_GET['category']) || $_GET['category'] == NULL){
		header("Location:treatment.php");
	}else{
		$id = $_GET['category'];
	}
?>
<body>
<div class="wrap">
	<div class="main">
		<div class="content">
		<?php
			$query = "SELECT * FROM tbl_post WHERE cat='$id'";
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
	<?php } }else{
		echo "<h2>No Treatment available in this catagory. !! </h2>";
		} ?>
</div>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>


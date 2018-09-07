<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>

<?php
    $db = new Database();
    $fm = new format();
?>

<!DOCTYPE HTML>
<head>
<title>My Treatment</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/styleB.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
<!-- light-box -->
	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel-3.0.6.pack.js"></script>	
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
     <script type="text/javascript">
		$(document).ready(function() {

			$('.fancybox').fancybox();

		});
	</script>
<!---- End Light-box ------>
</head>
<body>
<?php 
	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		header("Location:treatment.php");
	}else{
		$postid = $_GET['id'];
	}
?>
<div class="wrap">
	<div class="main">
		<div class="content">
		<?php 
			$query = "SELECT * FROM tbl_post WHERE id='$postid'";
			$result = $db->select($query);
			if($result){
				while($data = $result->fetch_assoc()){
		?>
			<div class="box1">
   				 <h3><a href="#"><?php echo $data['title']; ?></a></h3>
    				<span>By <?php echo $data['author']; ?> - <?php echo $data['date']; ?></span>
			   <div class="blog-img">
					<div class="view-back">
						<span class="views" title="views">(566)</span>
						<span class="likes" title="likes">(124)</span>
						<span class="link" title="link">(24)</span>
						<a href="#"> </a>
					</div>
					<img src="admin/<?php echo $data['image']; ?>">
				</div>
				<div class="blog-data">
				    <p><?php echo $data['body']; ?></p>
				</div>
			<div class="clear"></div>
		</div>			
	<?php } } ?>
	<div class="clear"> </div>			
 </div>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>
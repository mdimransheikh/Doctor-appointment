<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>

<?php
    $db = new Database();
    $fm = new format();
?>

<!DOCTYPE html>
<html>
<head>
<title>Mr. Doctor</title>
<!--mobile apps-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Resume Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--mobile apps-->
<!--Custom Theme files-->
<link href="css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
<link href="css/style.css" type="text/css" rel="stylesheet" media="all">
<link rel="stylesheet" href="css/swipebox.css">
<!--//Custom Theme files-->
<!--js-->
<script src="js/jquery-1.11.1.min.js"></script> 
<!-- //js -->
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Overlock:400,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//web-fonts-->
<!--start-smooth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!--//end-smooth-scrolling-->
</head>
<body>
	<!--banner-->
	<div id="home" class="banner">
		<div class="banner-info">
		<?php
			$query = "SELECT * FROM tbl_profile WHERE id='1'";
			$result = $db->select($query);
			if($result != false){
				$value = mysqli_fetch_array($result);
		?>
	<div class="container">
	<div class="col-md-8 header-right">
			<h2>Hello</h2>
			<h1>I'm <?php echo $value['name']; ?></h1>
			<h6><?php echo $value['iaddress']; ?></h6>
			<ul class="address">
				<li>
					<ul class="address-text">
						<li><b>D.O.B</b></li>
						<li><?php echo $value['dob']; ?></li>
					</ul>
				</li>
				<li>
					<ul class="address-text">
						<li><b>PHONE </b></li>
						<li><?php echo $value['phone']; ?></li>
					</ul>
				</li>
				<li>
					<ul class="address-text">
						<li><b>ADDRESS </b></li>
						<li><?php echo $value['haddress']; ?></li>
					</ul>
				</li>
				<li>
					<ul class="address-text">
						<li><b>E-MAIL </b></li>
						<li><a href="mailto:example@mail.com"><?php echo $value['email']; ?></a></li>
					</ul>
				</li>
				<li>
					<ul class="address-text">
						<li><b>WEBSITE </b></li>
						<li><a href="#"><?php echo $value['website']; ?></a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="col-md-4 header-left">
			<img src="admin/<?php echo $value['image']; ?>" alt=""/>
		</div>
		
		<div class="clearfix"> </div>
	</div>
	<?php } ?>
		</div>
	</div>
	<!--//banner-->
	<!--top-nav-->
	<div class="top-nav wow">
		<div class="container">
			<div class="navbar-header logo">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					Menu
				</button>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="menu">
					<ul class="nav navbar">
						<li><a href="#about" class="scroll">About</a></li>
						<li><a href="#work" class="scroll">Experience</a></li>
						<li><a href="#education" class="scroll">Education</a></li>
						<li><a href="treatment.php">My Treatment</a></li>
						<li><a href="#contact" class="scroll">Contact</a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>	
	<!--//top-nav-->
	<!--about-->
	<div id="about" class="about">
		<div class="container">
			<h3 class="title"> About Me</h3>
		<?php 
			$query = "SELECT * FROM tbl_about WHERE id='1'";
			$data = $db->select($query);
			if($data){
				$value = mysqli_fetch_array($data);
		?>
			<div class="col-md-8 about-left">
				<p><?php echo $value['content']; ?></p>
			</div>
		<?php } ?>
			<div class="col-md-4 about-right">
			
				<ul>
					<h5>Awards</h5>
					<?php 
						$query = "SELECT * FROM tbl_award ORDER BY id DESC";
						$data = $db->select($query);
						if($data){
							while($value = $data->fetch_assoc()){
					?>
					<li><span class="glyphicon glyphicon-menu-right"></span><?php echo $value['award']; ?></li>
					<?php } } ?>
				</ul>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//about-->
	<!--work-experience-->
	<div id="work" class="work">
		<div class="container">
			<h3 class="title">Work Experience</h3>
			<?php 
				$query = "SELECT * FROM tbl_experience ORDER BY id ASC";
				$data = $db->select($query);
				if($data){
					while($value = $data->fetch_assoc()){
			?>
				<div class="work-info"> 
					<div class="col-md-6 work-left"> 
						<h4><?php echo $value['year']; ?></h4>
					</div>
					<div class="col-md-6 work-right"> 
						<h5><span class="glyphicon glyphicon-briefcase"> </span><?php echo $value['name']; ?></h5>
						<p><?php echo $value['details']; ?></p>
					</div>
					<div class="clearfix"> </div>
				</div>
			<?php } } ?>
		</div>
	</div>
	<!--//work-experience-->
	<!--education-->
	<div id="education" class="education">
		<div class="container">
			<h3 class="title">Education</h3>
		<?php 
			$query = "SELECT * FROM tbl_education WHERE degree='MSc'";
			$data = $db->select($query);
			if($data){
				$value = mysqli_fetch_array($data);
		?>	
			<div class="work-info"> 
				<div class="col-md-6 work-left"> 
					<h4><?php echo $value['degree']; ?>. Degree - <?php echo $value['year']; ?></h4>
				</div>
				<div class="col-md-6 work-right"> 
					<h5><span class="glyphicon glyphicon-education"> </span><?php echo $value['name']; ?></h5>
					<p><?php echo $value['details']; ?></p>
				</div>
				<div class="clearfix"> </div>
			</div>
		<?php } ?>

		<?php 
			$query = "SELECT * FROM tbl_education WHERE degree='BSc'";
			$data = $db->select($query);
			if($data){
				$value = mysqli_fetch_array($data);
		?>
			<div class="work-info"> 
				<div class="col-md-6 work-right work-right2"> 
					<h4><?php echo $value['degree']; ?>. Degree - <?php echo $value['year']; ?></h4>
				</div>
				<div class="col-md-6 work-left work-left2"> 
					<h5><?php echo $value['name']; ?><span class="glyphicon glyphicon-education"></span></h5>
					<p><?php echo $value['details']; ?></p>
				</div>
				<div class="clearfix"> </div>
			</div>
		<?php } ?>
		</div>
	</div>
	<!--//education-->

	<!--contact -->
	<div class="welcome contact" id="contact">
		<div class="container">
			<h3 class="title">Contact with me</h3>
			<div class="contact-row">
				<div class="col-md-6 contact-left">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250261.21285550427!2d-60.42919264432581!3d46.13039392716506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b67ef033cc4082f%3A0xbf0517bb7d9ecd34!2sNorth+Sydney%2C+NS%2C+Canada!5e0!3m2!1sen!2sin!4v1460613320469"></iframe>
				</div>
				<?php 
					$query = "SELECT * FROM tbl_contact WHERE id='1'";
					$result = $db->select($query);
					if($result){
						while($data = $result->fetch_assoc()){
				?>
				<div class="col-md-6 contact-right">
					<div class="address-left">
						<p><?php echo $data['address']; ?></p>
					</div>
					<div class="address-right">
						<p>Call us :  <?php echo $data['phone']; ?></p>
						<p>E-mail : <a href="mailto:<?php echo $data['email']; ?>"><?php echo $data['email']; ?></a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php } } ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//contact -->
	<!--footer-->
	<div class="footer">
		<div class="container">
			<p>Designed || Developed by <a href="">jessoresheba</a></p>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
<?php
include("functions.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Pedro's homepage.</title>
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/bootstrap.css" rel="stylesheet">
<!-- Animate.css -->
<link rel="stylesheet" href="assets/css/animate.css">
<!-- Icomoon Icon Fonts-->
<link rel="stylesheet" href="assets/css/icomoon.css">
<!-- Flexslider  -->
<link rel="stylesheet" href="assets/css/flexslider.css">
<!-- Flaticons  -->
<link rel="stylesheet" href="assets/css/flaticon.css">
<!-- Owl Carousel -->
<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
<!-- Theme style  -->
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div id="colorlib-page">
	<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
	<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
		<h1 id="colorlib-logo"><a href="index.php">Pedro Moreno</a></h1>
		<?php
			include("navigation.php");
		?>
	</aside>
	
	<?php
	if (!isset($_GET['page']))
		$page="home";
	else
		$page=$_GET['page'];
	switch($page) 
	{
		case "school":
			include("school.php");
			break;
		case "hobbies":
			include("hobbies.php");
			break;
		case "work":
			include("work.php");
			break;
		case "contact":
			include ("contact.php");
			break;
		case "results":
			include ("results.php");
			break;
		case "login":
			include("login.php");
			break;
		case "register":
			include("register.php");
			break;				
		default:
			include("home.php");
			break;
	}
?>
	
</div>
</body>
</html>
<script src="assets/js/add-content.js"></script>

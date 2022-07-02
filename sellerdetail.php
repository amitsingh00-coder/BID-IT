<?php
session_start();
require_once('config1.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Seller details</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="generator" content="">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,600,700" rel="stylesheet">
</head>
<body>


<!-- HEADER =============================-->
<header class="item header margin-top-0">
<div class="wrapper">
	<nav role="navigation" class="navbar navbar-white navbar-embossed navbar-lg navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
			<i class="fa fa-bars"></i>
			<span class="sr-only">Toggle navigation</span>
			</button>
			<div class="imag">
			<a href="index.php" class="navbar-brand brand"><img src="../userlogin/img/logo2.png"></a>
		
			</div>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="sell.php">Sell</a></li>
				<li class="propClone"><a href="allproducts.php">Live Auctions</a></li>
				<li class="propClone"><a href="dashboard.php">Dashboard</a></li>
				<li class="propClone"><a href="about.php">About us</a></li>
				<li class="propClone"><a href="contact.php">Contact</a></li>
				<li class="propClone" onclick="myFunction()"><a href="logout.php">Logout</a></li>
				<script>
function myFunction() {
  alert("Logged out Successfully");
  location.replace("logout.php")
}
</script>
			</ul>
		</div>
	</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.0s">
						 Make contact and seal the deal!!
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>


<!-- STEPS =============================-->
<section class="item content">
<div class="container toparea">
	<div class="underlined-title">
		<div class="editContent">
			<h1 class="text-center latestitems">Seller details</h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
    <?php

include 'connection.php';
$title1 = $_GET['title'];

$name_search = "select email from products where title = '$title1' ";
$query = mysqli_query($con,$name_search);
while($row = mysqli_fetch_assoc($query)){
 $m = $row['email'];
}

?>
<?php
include 'config.php';



$search = "select * from users where email = '$m'";
$query = mysqli_query($con,$search);
while($row = mysqli_fetch_assoc($query)){
 $firstname = $row['firstname'];
 $lastname = $row['lastname'];
 $phone = $row['phone'];
 $location = $row['location'];
}


?>


    <div class="col-md-4" style="font-family: 'Times New Roman', Times, serif;text-align:center;margin-left:33%;">
        <h2>NAME</h2>
        <p style="font-size: x-large;"><?php echo $firstname; ?> <?php echo $lastname;?></p>
        <h2>EMAIL</h2>
        <p style="font-size: x-large;"><?php echo $m; ?></p>
        <h2>CONTACT NUMBER</h2>
        <p style="font-size: x-large;"><?php echo $phone; ?></p>
        <h2>LOCATION</h2>
        <p style="font-size: x-large;"><?php echo $location; ?></p>
        

        
    </div>

	</div>
</div>
</section>

	<br>
	
	

<!-- FOOTER =============================-->
<div class="footer text-center">
	<div class="container">
		<div class="row">
			<p class="footernote">
				 Connect with the developers
			</p>
			<ul class="social-iconsfooter">
				<li><a href="#"><i class="fa fa-phone"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
			</ul>
			<p>
				 &copy; 2021 BID IT!!!<br/>
                 © 2021 Copyright of LTCE SEB(248,249,252)</a>
			</p>
		</div>
	</div>
	
</div>
<!-- SCRIPTS =============================-->
<script src="js/jquery-.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/anim.js"></script>
<script>
//----HOVER CAPTION---//	  
jQuery(document).ready(function ($) {
	$('.fadeshop').hover(
		function(){
			$(this).find('.captionshop').fadeIn(150);
		},
		function(){
			$(this).find('.captionshop').fadeOut(150);
		}
	);
});
</script>
	
</body>
</html>





        

   
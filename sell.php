<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Sell your product</title>
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
						 Start Your Auction
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
			<h1 class="text-center latestitems">Sell your Product</h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
    <form action="index.php" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			
			
				
					<input type="text" name="title" id="title" class="form-control" placeholder="TITLE *" required>
                    <br>
                    <input type="text" name="category" id="category" class="form-control" placeholder="CATEGORY *"  list="dropdown" required>
					<datalist id="dropdown">
                    <option value="Books">
                    <option value="Clothing">
                    <option value="Furniture">
                    <option value="Electronics">
                    <option value="Sports">
                    <option value="Others">
                    </datalist>
                    <br>
                    <input type="text" name="description" id="description" class="form-control" placeholder="DESCRIBE YOUR PRODUCT *" required>
                    <br>
                    <input type="Digits" name="bidstartrs" id="bidstartrs" class="form-control" placeholder="AMOUNT YOU WANT TO START THE BID WITH *">
                    <br>
                    <input type="date" name="bidenddate" id="bidenddate" class="form-control" placeholder="DATE YOU WANT TO CLOSE YOUR AUCTION ON *" required>
                    <br>
                    <input type="text" name="location" id="location" class="form-control" placeholder="YOUR CURRENT LOCATION *" required>
                    <br>
                    <input type="file" name="photo" id="photo" class="form-control" placeholder="AMOUNT YOU WANT TO START THE BID WITH *" required>
                    <br>
                    
					<input type="submit" class="btn btn-primary"   id="submit" name="submit" value="GO LIVE" >
                 
			
		</div>
	</div>
    </form>
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





        

   
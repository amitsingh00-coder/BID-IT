<?php
session_start();
require_once('config1.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Contact Us</title>
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
						 We'll reach you soon
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
			<h1 class="text-center latestitems">Contact Us</h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
    <form action="" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			
			
				
					<input type="text" name="name" id="name" class="form-control" placeholder="NAME *" required>
                    <br>
                    <input type="text" name="email" id="email" class="form-control" placeholder="ENTER YOUR EMAIL ID *" required>
                    <br>
                    <input type="Digits" name="phone" id="phone" class="form-control" placeholder="ENTER YOUR PHONE NUMBER *">
                    <br>
                    <textarea type="text" name="message" id="message" class="form-control"row="3" placeholder="ENTER YOUR MESSAGE *" required></textarea>
                    <br>
                    
                    
					<input type="submit" class="btn btn-primary"   id="button" name="create" value="SEND" >
                 
			
		</div>
	</div>
    </form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script type="text/javascript">
		    $(function(){
				$('#button').click(function(e){

                      var valid = this.form.checkValidity();

					  
					  if(valid){

						var name = $('#name').val();
					  var email = $('#email').val();
					  var phone = $('#phone').val();
					  var message = $('#message').val();
					  
						  e.preventDefault();

						  $.ajax({
							  type: 'POST',
							  url: 'process.php',
							  data: {name: name,email: email,phone: phone,message: message},
							  success: function(data){
								Swal.fire({
                                'title' : "Successful",
					             'text'  : data,
					             'type' : 'success'
				               })
							  },
							  error: function(data){
								Swal.fire({
                                'title' : "Errors",
					            'text'  : "There were errors while saving the data",
					            'type' : 'error'
				                 })
							  }
						  });
						  
					  }else{
						  
					  } 

					 


				
					});
				
			});
		</script>
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





        

   
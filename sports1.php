<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Live Auctions</title>
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
			<a href="display.php" class="navbar-brand brand"><img src="../userlogin/img/logo2.png"></a>
		
			</div>
		</div>
		<div id="navbar-collapse-02" class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="propClone"><a href="allproddisplay.php">All</a></li>
				<li class="propClone"><a href="books1.php">Books</a></li>
				<li class="propClone"><a href="clothing1.php">Clothing</a></li>
				<li class="propClone"><a href="electronics1.php">Electronics</a></li>
				<li class="propClone"><a href="furniture1.php">Furniture</a></li>
				<li class="propClone"><a href="sports1.php">Sports</a></li>
				<li class="propClone"><a href="others1.php">Others</a></li>
			
			</ul>
		</div>
	</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="text-pageheader">
					<div class="subtext-image" data-scrollreveal="enter bottom over 1.7s after 0.1s">
						 All products currently on Auction
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>

<!-- CONTENT =============================-->
<section class="item content">
<div class="container toparea">
	<div class="underlined-title">
		<div class="editContent">
			<h1 class="text-center latestitems">MAKE A BID !!!</h1>
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
        $con = mysqli_connect('localhost','root');
        mysqli_select_db($con, 'sell');

        if(isset($_POST['submit']))
        {

          $title = $_POST['title'] ; 
          $category = $_POST['category'] ; 
          $description = $_POST['description'] ; 
          $bidstartrs = $_POST['bidstartrs'] ; 
          $bidenddate = $_POST['bidenddate'] ;
          $location = $_POST['location'] ; 
          $photo = ($_FILES['photo']) ; 
          $email = $_SESSION['email'];
          
          $filename = $photo['name'];
          //  print_r($filename);
          $fileerror = $photo['error'];
          $filetmp = $photo['tmp_name'];
        
          $fileext = explode('.',$filename);
          $filecheck = strtolower(end($fileext));
          $fileextstored = array('png','jpg','jpeg');
          
          if(in_array($filecheck,$fileextstored))
          {
            $destinationfile = "upload/".$filename;
            move_uploaded_file($filetmp,$destinationfile);
            $q = "INSERT INTO `products`( title, category, description, bidstartrs, bidenddate, location, photo, email) 
            VALUES ('$title', '$category', '$description', '$bidstartrs', '$bidenddate', '$location', '$destinationfile','$email')";
            $query = mysqli_query($con,$q);
           
            
              }
            }
         
        ?>

        
		<div class="row">
		<?php

include 'connection.php';
$condition = "sports";
$selectquery = "select * from products  WHERE category = '$condition'";
$query = mysqli_query($con,$selectquery);
$num = mysqli_num_rows($query);

// while($res = mysqli_fetch_array($query)){
$displayquery = "select * from products  WHERE category = '$condition'" ;
$querydisplay = mysqli_query($con, $displayquery);
 $row = mysqli_num_rows($querydisplay);
 $i=1;
 
 while(($result = mysqli_fetch_array($querydisplay))) {
   ?>
			<div class="col-md-4">
				<div class="productbox">
					<div class="fadeshop">
						<div class="captionshop text-center" style="display: none;">
							<h3><?php echo $result['title']; ?></h3>
							<p>
                                Last Date to make a bid
                            <?php echo $result['bidenddate']; ?>
							</p>
							<p>
								<!-- <a href="#" class="learn-more detailslearn"><i class="fa fa-shopping-cart"></i> Purchase</a> -->
								<a href="../userlogin/login2.php?id=<?php echo $result['id'];?>&title1=<?php echo $result['title'];?>&bidend=<?php echo $result['bidenddate'];?>" class="learn-more detailslearn"><i class="fa fa-link"></i> Details</a>
							</p>
						</div>
						<span class="maxproduct"><img src="<?php echo $result['photo']; ?> " height="400px" width="500px" ></span>
					</div>
					<div class="product-details">
						<a href="#">
						<h1><a href="../userlogin/login2.php?id=<?php echo $result['id'];?>&title1=<?php echo $result['title'];?>&bidend=<?php echo $result['bidenddate'];?>"><?php echo $result['title']; ?></a></h1>
						</a>
						<span class="price">
						<span class="edd_price"> RS <?php echo $result['bidstartrs']; ?></span>
						</span>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		
	</div>
	
</div>


</section>

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

<!-- Load JS here for greater good =============================-->
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
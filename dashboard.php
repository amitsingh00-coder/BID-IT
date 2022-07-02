<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
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
				<li class="propClone"><a href="dasboard.php">Dashboard</a></li>
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
                    Hello <?php echo $_SESSION['firstname'];?>,
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
			<h1 class="text-center latestitems">Products you've put on auction </h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
    <div class="table-responsive">
  <table class="table table-bordered table-striped table-hovered text-align:center " style="border: 3px solid black;" >     
    <thead class="bg-dark text-white">
          <th style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center" > SR NO. </th>
          <th style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center"> Title </th>
          <th style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center"> Category </th>
          <th style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center"> STATUS </th>
    </thead>

    <tbody>

    <?php

        include 'connection.php';
        $email = $_SESSION['email'];

        $selectquery = "select * from products where email='$email'";
        $query = mysqli_query($con,$selectquery);
        // $row = mysqli_num_rows($query);

        // while($res = mysqli_fetch_array($query)){
        $displayquery = "select * from products where email='$email'" ;
        $querydisplay = mysqli_query($con, $displayquery);
        //  $row = mysqli_num_rows($querydisplay);
        $i=1;
         while($row = mysqli_fetch_assoc($querydisplay)) {

        ?><tr>
        <td style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center; font-weight:bold;"> <?php echo $i; ?></td>
        <td style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center; font-weight:bold;"> <a href="product.php?id=<?php echo $row['id'];?>&title1=<?php echo $row['title'];?>&bidend=<?php echo $row['bidenddate'];?>"><?php echo $row['title']; ?></a></td>
        <?php 
        $titl = $row['title'];
        $bidend = $row['bidenddate'];
        
        ?>
        <td style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center; font-weight:bold;"> <?php echo $row['category']; ?></td>
        
      
      <?php
      
  
  //  include 'config2.php';
  
  //  $name_search = "select bidenddate from userss where title = '$titl' ";
  //  $query = mysqli_query($mysqli,$name_search);
  //  while($row = mysqli_fetch_assoc($query)){
  //   $bidend = $row['bidenddate'];
    
  // }
  // echo $bidend;
  ?>
  <?php 

  $cdate = date("Y-m-d");
  
    if(($cdate)>=($bidend)){
     ?>
  
      <td style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center; font-weight:bold;">COMPLETED <br><a href = "winnerdetail.php?title=<?php echo $titl;  ?>">View Winners details</a></td>
    </tr>
    <?php
    }else{
      ?>
      <td style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center; font-weight:bold;">ACTIVE </td>
      </tr>
      <?php
    }
    ?>
      <?php
        $i++; }
         ?>
      </tbody>     
    </table> 
  </div>
</div>

</div>

</section>

	<br>
	



    <!-- STEPS =============================-->
<section class="item content">
<br>
<div class="container toparea">
	<div class="underlined-title">
		<div class="editContent">
			<h1 class="text-center latestitems">Auctions you've won and products you've made a bid on </h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
   
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hovered text-align:center " style="border: 3px solid black;" >     
    <thead class="bg-dark text-white">
          <th style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center" > SR NO. </th>
          <th style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center"> Title </th>
          <th style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center"> BIDS you made </th>
          
    </thead>

    <tbody>

    <?php

        include 'config2.php';
        include 'connection.php';
        $email = $_SESSION['email'];

      
     $result = mysqli_query($mysqli,"SELECT * from userss where email='$email' ");
     
       $j=1;
         while($row = mysqli_fetch_assoc($result)) {

        ?><tr>
        <td style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center; font-weight:bold;"> <?php echo $j; ?></td>
        <td style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center; font-weight:bold;"> <a href="product1.php?id=<?php echo $row['id'];?>&title1=<?php echo $row['title'];?>"><?php echo $row['title']; ?></a></td>
        <?php 
        $tit = $row['title'];
        $bidend = $row['bidenddate'];
        $m = 0;
        if(($cdate)>=($bidend)){
          
            include 'config2.php';
            
           // $titl = $row['title'];
            $query = "SELECT MAX(bid) AS maxbid from userss where title = '$tit' ";
            $query_result = mysqli_query($mysqli , $query);
            while($ro = mysqli_fetch_assoc($query_result)){
              $maxbid = $ro['maxbid'];
            }
           
            
            ?>
           
            <?php
       
          include 'config2.php';
         
          $name_search = "select email from userss where bid = $maxbid ";
          $query = mysqli_query($mysqli,$name_search);
          while($r = mysqli_fetch_assoc($query)){
           $m = $r['email'];
         }
        
         
        
       }
        ?>
        <td style="font-size:15px; border-right:solid #000;border-bottom:solid #000; text-align:center; font-weight:bold;"> <?php echo $row['bid']; ?></td>
        
    </tr>
      <?php
          if($m==$_SESSION['email']){
          ?>
          <h3 style="font-family: 'Times New Roman', Times, serif;margin-left:12px;">CONGRATULATIONS!!! You've won the <?php echo $row['title']; ?> auction with the Highest bid of <?php echo $maxbid; ?><a href="sellerdetail.php?title=<?php echo $row['title'];?>"> View Seller details</a><h4>
          <?php
        
        }
      $j++;}
         ?>
      </tbody>     
    </table> 
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





        

   
<?php
session_start();
include("config2.php");

?>
<!DOCTYPE html>
<html>
<head>
<title>Product details</title>
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
						 Make the highest bid to WIN !!!
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</header>

<!-- CONTENT =============================-->
<section class="item content">

<?php

        include 'connection.php';

        $id = $_GET['id'];
        $title1 = $_GET['title1'];
        
        $query = "SELECT bidenddate as bidend FROM products WHERE title='$title1'";
       
        $query_result = mysqli_query($con , $query);
        while($row = mysqli_fetch_assoc($query_result)){
          $bidend = $row['bidend'];
         
        }
        // echo $bidend;
        
       ?>

      
       <?php 

        $selectquery = "select * from products where title='$title1'";
        

        $query = mysqli_query($con,$selectquery);
        // $num = mysqli_num_rows($query);
        $result = mysqli_fetch_assoc($query);
        

        ?>
        <?php 

$cdate = date("Y-m-d");

  if(($cdate)>=($bidend)){
   ?>
   <?php
     include 'config2.php';
     $title1 = $_GET['title1'];
     $query = "SELECT MAX(bid) AS maxbid from userss where title = '$title1' ";
     $query_result = mysqli_query($mysqli , $query);
     while($row = mysqli_fetch_assoc($query_result)){
       $maxbid = $row['maxbid'];
     }
     
   ?>
     <div class="main-content-header">
              <!-- <h1><span class= "colorchange">ENGUIDE.</span></h1> -->
              <h1 style="color: black;
font-size: 200%;
font-style: normal;
text-align: center;
font-family: 'Flamenco', cursive;"><span class= "colorchange">SORRY...Too Late!!!.</span></h1>
             
  <p style="color: black;
font-size: 200%;
font-style: normal;
text-align: center;
font-family:Roboto;">The last date to enter BIDS have passed<br>
     We have many other products to try your luck on.
  </div>
<?php
//  $email = $_POST['email'];
//  $password = $_POST['password'];
 include 'config2.php';

 $name_search = "select email from userss where bid = $maxbid ";
 $query = mysqli_query($mysqli,$name_search);
 while($row = mysqli_fetch_assoc($query)){
  $m = $row['email'];
}

//  echo $m;
?>
<?php
include 'config.php';

$search = "select firstname from users where email = '$m'";
$query = mysqli_query($con,$search);
while($row = mysqli_fetch_assoc($query)){
  $nme = $row['firstname'];
}

?>
 <div class="header">
            <!-- <h1><span class= "colorchange">ENGUIDE.</span></h1> -->
            <h2  style="color: black;
font-size: 200%;
font-style: normal;
text-align: center;
font-family:Roboto;"><span>This Auction is won by <?php echo $nme; ?>(<?php echo $m; ?>) with the maximum bid of <?php echo $maxbid; ?> .</span></h2>
     </div>  

<?php
}else{


        ?>
<div class="container toparea">
	<div class="underlined-title">
		<div class="editContent">
			<h1 class="text-center latestitems"><?php echo $result['title']; ?></h1>
		</div>
		<div class="wow-hr type_short">
			<span class="wow-hr-h">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			</span>
		</div>
	</div>
    

	<div class="row">
		<div class="col-md-8">
			<div class="productbox">
				<img src="<?php echo $result['photo']; ?>" alt="" style="margin-left:70px; margin-top:20px; width: 75%;height:75%">
				<div class="clearfix">
				</div>
				<br/>
				<!-- <div class="product-details text-left">
					<p>
						Your description here. Serenity is a highly-professional & modern website theme crafted with you, the user, in mind. This light-weight theme is generous, built with custom types and enough shortcodes to customize each page according to your project. You will notice some examples of pages in demo, but this theme can do much more.
					</p>
				</div> -->
			</div>
		</div>
		<div class="col-md-4">
			
			<div class="properties-box">
				<ul class="unstyle">
					<li><b class="propertyname">DESCRIPTION: </b><?php echo $result['description']; ?></li>
                    <br>
					<li><b class="propertyname">CATEGORY:</b> <?php echo $result['category']; ?></li>
                    <br>
					<li><b class="propertyname">LAST DATE TO ENTER BID: </b> <?php echo $result['bidenddate']; ?></li>
                    <br>
					<li><b class="propertyname">LOCATION:</b> <?php echo $result['location']; ?></li>
                    <br>
					</ul>
			</div>
            <br>
            <!-- <a href="#" class="btn btn-buynow">$49.00 - Purchase</a> -->
            <?php
     include 'connection.php';
     $title1 = $_GET['title1'];
     $query = "SELECT email  from products where title = '$title1' ";
     $query_result = mysqli_query($con , $query);
     while($row = mysqli_fetch_assoc($query_result)){
       $selleremail = $row['email'];
     }
   
     if($selleremail==$_SESSION['email'])
     {

     ?>
            
       
        <form action="" method="POST"  enctype="multipart/form-data" >
        
             
              
              <input type="text" name="bid" id="bid" class="form-control" placeholder="Bid starts with Rs:<?php echo $result['bidstartrs']; ?>  " disabled>
              
              <br>
              <!-- <input class="btn btn-warning"  type="submit" id="submit" name="submit" value="MAKE A BID"  > -->
              
            
        
        
        </form>
        <?php
     }else{
      ?>
            
    
      <form action="" method="POST"  enctype="multipart/form-data" >
      
            <input type="text" name="bid" id="bid" class="form-control" placeholder="Bid starts with Rs:<?php echo $result['bidstartrs']; ?>  " >
            
            <br>
            <input class="btn btn-warning"  type="submit" id="submit" name="submit" value="MAKE A BID"  >
            
          
      
      
      </form>
      <?php
     }
     ?>
     <br>
  <h1 style="font-size:20px;text-align:center;">
     <span style="padding:.2rem 8% .2rem 8%; background-color:#000;color:#fff;border-radius:3px;">
      Bid Amounts
     </span>
  </h1> 
  <br>
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hovered text-align:center " style="border: 3px solid black;" >     
    <thead class="bg-dark text-white">
          <th style="font-size:15px; border-right:solid #000; text-align:center" > Sr.no </th>
          <th style="font-size:15px; border-right:solid #000; text-align:center"> Bids </th>
       
    </thead>
   <?php
    
    if(isset($_POST['submit']))
    {
      
      $bid=$_POST['bid'];
      $title1 = $_GET['title1'];
      // $bidend = $_GET['bidend'];
      $email = $_SESSION['email'];
      

      

      $res=mysqli_query($mysqli,"INSERT into userss (id,title,bid,email,bidenddate) values('','$title1','$bid','$email','$bidend')");
      
    }

   ?>

    <tbody>
     
     <?php
     $title1 = $_GET['title1'];
     $result = mysqli_query($mysqli,"SELECT * from userss where title='$title1' ");
     $i=1;
       while($row = mysqli_fetch_assoc($result)){
       ?>
        <tr>
      <td style="font-size:15px; border-right:solid #000; text-align:center; font-weight:bold;"> <?php echo $i;?></td>
      <td style="font-size:15px; border-right:solid #000; text-align:center; font-weight:bold;"> <?php echo $row['bid']; ?></td>
       </tr>
       <?php
        $i++; }
         ?>
      </tbody>     
    </table> 
          
    </div>
      
		
      
        
	</div>
    
</div>
<?php
}?>

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

</body>
</html>
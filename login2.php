<?php

require_once('configsign.php');
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style2.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  </style>

<script type="text/javascript">
	

	function RegisterValid()
	{


    var firstname     =Registerform.firstname;
    var lastname    =Registerform.lastname;
    var email    =Registerform.email;
	var phone    =Registerform.phone;
	var location =Registerform.location;
	var password =Registerform.password;


    if (firstname.value == "")
    {
        window.alert("Please enter your name.");
        firstname.focus();
        return false;
    }

    if (!/^[a-zA-Z]*$/g.test(firstname.value)) {
        alert("Invalid Characters For First Name");
        firstname.focus();
        return false;
    }

    if (lastname.value == "")
    {
        window.alert("Please enter your username.");
        lastname.focus();
        return false;
    }

	if (!/^[a-zA-Z]*$/g.test(lastname.value)) {
        alert("Invalid Characters For Last Name");
        lastname.focus();
        return false;
    }

	if (email.value == "")
    {
        window.alert("Please enter your email.");
        email.focus();
        return false;
    }

     if (!validateCaseSensitiveEmail(email.value))
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

	if (phone.value == "")
    {
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }

    if (phone.value.length != 10)
    {
        window.alert("Please  your telephone number must be 10 digit.");
        phone.focus();
        return false;
    }

	if (location.value == "")
    {
        window.alert("Please enter your username.");
        location.focus();
        return false;
    }

	if (!/^[a-zA-Z]*$/g.test(location.value)) {
        alert("Invalid Characters For Last Name");
        location.focus();
        return false;
    }
    if (Password.value == "")
    {
        window.alert("Please enter your Password.");
        Password.focus();
        return false;
    }  

    return true;
}

 
function validateCaseSensitiveEmail(email) 
{ 
 var reg = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/;
 if (reg.test(email)){
 return true; 
}
 else{
 return false;
 } 
} 

</script>

</head>

<body>
  

<?php
include 'config.php';
 
if(isset($_POST['submit'])){
    $email = $_POST['emailid'];
    $password = $_POST['passwrd'];
    

    $email_search = "select * from users where email='$email' ";
    $query = mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);
    if($email_count){
        $email_pass = mysqli_fetch_assoc($query);
        $db_pass = $email_pass['password'];
        $_SESSION['firstname'] = $email_pass['firstname'];
        $_SESSION['email'] = $email_pass['email'];

        // $pass_decode = password_verify($password, $db_pass);

        if($db_pass == $password){
            
        ?>
        <script>
        alert("Login Successfully");
        </script>
           <script> 
            location.replace("upload.php");
            </script>
        
            <?php
        }else{
            ?>
            <script>
        alert("Invalid password");
        </script>
        <?php
        }
    }else{
        ?>
       <script>
        alert("Invalid email");
        </script>
        <?php
    }
}


 
?>
<div class="cont">
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    <div class="form sign-in">
      <h2>Sign In</h2>
      <label>
        <span>Email Address</span>
        <input type="text" name="emailid" id="emailid" >
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="passwrd" id="passwrd" >
      </label>
      <button class="submit" type="submit" name="submit" id="submit" >login In</button>
      <a class="forgot-pass" href="ForgotPass.php">Forgot Password ?</a>

      <div class="social-media">
        <ul>
          <li><img src="images/facebook.png"></li>
          <li><img src="images/twitter.png"></li>
          <li><img src="images/linkedin.png"></li>
          <li><img src="images/instagram.png"></li>
        </ul>
      </div>
    </div>
</form>
    <div class="sub-cont">
    <form action="" method="POST"  enctype="multipart/form-data" name="Registerform"  onsubmit="return RegisterValid();" >
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover the great world full of Auctions!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already have an account, just Log in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Sign Up</h2>
        <label>
          <span>Firstname</span>
          <input type="text" class="form-control" name="firstname" id="firstname"  required>
        </label>
        <label>
          <span>Lastname</span>
          <input type="text" class="form-control" name="lastname" id="lastname" required>
        </label>
        <label>
          <span>Email</span>
          <input type="email" class="form-control" name="email" id="email" required>
        </label>
        <label>
        <label>
          <span>Phone Number</span>
          <input type="text" class="form-control" name="phone" id="phone" required>
        </label>
        <label>
          <span>Location</span>
          <input type="text" class="form-control" name="location" id="location" required>
        </label>
        <label>
          <span>Password</span>
          <input type="password" class="form-control" name="password" id="password" required>
        </label>
        <button type="submit" name="create" id="button"  class="submit">Sign Up Now</button>
      </div>
    </form>
    </div>
  </div>
<script type="text/javascript" src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<script type="text/javascript">
		    $(function(){
				$('#button').click(function(e){

                      var valid = this.form.checkValidity();

					  
					  if(valid){

						var firstname = $('#firstname').val();
					  var lastname = $('#lastname').val();
					  var email = $('#email').val();
					  var phone = $('#phone').val();
					  var location = $('#location').val();
					  var password = $('#password').val();
					  
						  e.preventDefault();
                debugger
						  $.ajax({
							  type: 'POST',
							  url: 'processsign.php',
							  data: {firstname: firstname,lastname: lastname,email: email,phone: phone,location: location,password: password},
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
</body>
</html>
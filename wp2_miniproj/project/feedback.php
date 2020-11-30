<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshmart</title>

    <link rel="stylesheet" href="resources/css/style_index.css">
    <link rel="stylesheet" href="resources/css/queries.css">
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link rel="stylesheet" href="vendors/css/ionicons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendors/css/grid.css">
    <style>
        header{
            height: 70%;
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("resources/css/img/bgpages.jpg");

        }
        ;.hero-text-box{
            align-items: center;
        }
        h1{
            font-weight: 400;
            font-size: 300%;
        }
     
        label{
            margin-top: 10px;
            font-weight: 400;
        }
        input[type=submit] {
            background-color: #2980b9;
            color: #fff;
            border: 1px solid #2980b9;
            margin-right: 15px;

        }
        input,select,textarea{
            margin-top:10px;
        }
        input[type=submit]:hover,
        input[type=submit]:active{
            background-color: #1d5a82;
            border: 1px solid #1d5a82;

        }
        .error{
            color:red;
        }
        .rating {
      overflow: hidden;
      display: inline-block;
  }
  .rating-input {
      float: right;
      width: 16px;
      height: 16px;
      padding: 0;
      margin: 0 0 0 -16px;
      opacity: 0;
  }

.rating:hover .rating-star:hover,
  .rating:hover .rating-star:hover ~ .rating-star,
  .rating-input:checked ~ .rating-star {
      background-position: 0 0;
  }

   .rating-star,
  .rating:hover .rating-star {
    position: relative;
      display: block;
    float: right;
      width: 16px;
      height: 16px;
      background: url('https://www.everythingfrontend.com/samples/star-rating/star.png') 0 -16px;
  }
    
    </style>

  
</head>
<body>

<?php
	$nameErr = "";
	$emailErr="";
	$purErr = "";

if(isset($_POST["submit"])){
	if (isset($_POST["fname"])) {
		if (empty($_POST["fname"])) {
		  $nameErr = "Name is required";
		} 
		else if(!preg_match("/^[a-zA-Z' ]*$/",$_POST["fname"])){
			$nameErr ="Should have only alphabetic characters";
			  
		  }
		else {
		  $fname =$_POST["fname"];
		}
	}


	if(isset($_POST["email"])){
		if (empty($_POST["email"])) {
			$emailErr = "Email Required";
		  } 
		else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
			$emailErr ="Invalid Email Format!";
			  
		  }
		else {
			$email = $_POST["email"];
		  }
	}

//Dropdown
		if(isset($_POST["purpose"])){
		if($_POST["purpose"]=="empty"){
			$purErr ="Value is Required";
		}
		else{
			$purpose = $_POST["purpose"];
        }
    
    }
}
  
	?>
      <?php
    if(isset($_POST["submit"])){
        $_SESSION["fname"]=$_POST["fname"];
        $_SESSION["email"]=$_POST["email"];
        $_SESSION["purpose"]=$_POST["purpose"];
        $_SESSION["message"]=$_POST["message"];

        if(empty($_SESSION["fname"])){
            header("Location:feedback.php?error=FisrtNameRequired");
            exit();
        }
        else if(!preg_match("/^[a-zA-Z' ]*$/",$_SESSION["fname"])){
            header("Location:feedback.php?error=FisrtNameMustBeAlphabetic");
            exit();
        }
        else if(empty($_SESSION["email"])){
            header("Location:feedback.php?error=EmailRequired");
            exit();
        }
        else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            header("Location:feedback.php?error=InvalidEmailFormat");
            exit();
        }
        else if(empty($_SESSION["purpose"])){
            header("Location:feedback.php?error=PurposeRequired");
            exit();
        }
        else{
        
        header("Location:feedback-inc.php");
        exit();
        }
    }
    ?>  
    
    

    <!-- HEADER AND NAVBAR -->
    <header>

    <nav>
            <div class="row">
                <a href="index.php"><img src="resources/img/logo-white.png" alt="Omnifood Logo" class="logo"></a>
                <a href="index.php"><img src="resources/img/logo-black.png" alt="Omnifood logo" class="logo-black"></a>
                <ul class="main-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="aboutUs.php">About Us</a></li>
                    <li><a href="categ.php">Categories</a></li>
                   <?php
                        if(count($_SESSION)>0)
                        {
                            ?>
                            <li><a href="mycart.php"><i class="ion-ios-cart-outline icon-small" style="color: #fff;"></i>My Cart</a></li>
                            
                            <li><a href="logout.php">Logout</a></li>
                            <li><a href="myProfile.php"><i class="ion-ios-person-outline icon-small" style="color: #fff;"></i><?php echo $_SESSION["username"];?></a></li>
                            
                            <?php
                        }
                        else
                        {
                   ?>
                    <li><a href="login_sess.php">Login</a></li>
                    <li><a href="signup.php">Sign Up</a></li>
                    <?php
                        }
                    ?>
                 


                </ul>
            </div>
        </nav>


        <div class="hero-text-box">

        <h1>Feedback Form</h1>
        </div>
    </header>

   
    <!-- FORM SECTION -->
    <section class="section-form">
        <div class="row">
            <h2>We're happy to hear from you</h2>
        </div>
        <div class="row" id="feedback">
            <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="contact-form">
            <label for="fname"><strong>First Name:</strong></label>
		<input type="text" name="fname" id="fname" placeholder="John" autocomplete autofocus><br>
        <span class="error">*<?php echo "$nameErr";?></span>
        <br>
		<br>
		<label for="email"><strong>Email Id:</strong></label>
        <input type="text" name="email" id="email"  placeholder="john21@gmail.com"><br>
		<span class="error">*<?php echo "$emailErr";?></span>
		<br>
		<br>

		<h4>Newsletter:</h4>
        <input type="checkbox" name="sub[]" id="yes" value="Yes">Yes Please!
		<br>
		
		<label for="purpose"><strong>How did you find us?:</strong></label>
		<select name="purpose" id="purpose">
			<option value= "empty">Select option</option>
			<option value="Friend">Friend</option>
			<option value="Search Engine">Search Engine</option>
            <option value="Advertisement">Advertisement</option>
            <option value="Others">Others</option>
		</select>
		<br>
		<span class="error">*<?php echo "$purErr";?></span>
		<br>
        <br>
        <!-- <label for="rate"><strong>Rate your experience:</strong></label>
        <span class="rating">
        <input type="radio" class="rating-input"
        id="rating-input-1-5" name="rating-input-1">
        <label for="rating-input-1-5" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-4" name="rating-input-1">
        <label for="rating-input-1-4" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-3" name="rating-input-1">
        <label for="rating-input-1-3" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-2" name="rating-input-1">
        <label for="rating-input-1-2" class="rating-star"></label>
        <input type="radio" class="rating-input"
            id="rating-input-1-1" name="rating-input-1">
        <label for="rating-input-1-1" class="rating-star"></label>
    </span>
    <br>
    <br> -->
        <h4>Drop us a line</h4>
		<textarea rows="5" cols="40" placeholder="Write something Here..." name="message" id="message"></textarea>
		<br>
		<br>
		<input type="submit"  Value="Submit" name="submit">
	
	</form>
 
        </div>
    </section>
  

    
    

    <footer>
        <div class="row">
            <div class="col span-1-of-2">
                <ul class="footer-nav">
                    <li><a href="aboutUs.php">About us</a></li>
                    <li><a href="categ.php">Place your order</a></li>
                    <li><a href="signup.php">Register now</a></li>
                    <li><a href="#">iOS app</a></li>
                    <li><a href="#">Android app</a></li>

                </ul>
            </div>
            <div class="col span-1-of-2">
                <ul class="social-links">
                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>

                </ul>
            </div>
        </div>
        <div class="row">
            <p>
                Copyright &copy; 2015 by Freshmart. All rights reserved.
            </p>
        </div>
    </footer>
 

<!-- Js plugins -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>8
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
<script src="vendors/js/jquery.waypoints.min.js"></script>
<script src="resources/Js/script.js"></script>



</body>

</html>


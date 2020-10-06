<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshmart</title>

    <link rel="stylesheet" href="resources/css/style.css">
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

        .container{
            margin-left: 40%;
            margin-bottom:7%;
            margin-top:1%;
        }
        .column-card {
  float: left;
  width: 33.33%;
  padding: 0 2%;
}

/* Remove extra left and right margins, due to padding */
.row-card {
    margin-left:10%;
    margin-right:10%;
margin-bottom:5%;
}

/* Clear floats after the columns */
.row-card:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column-card {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #fff;
}
.card-text{
    margin-bottom:5px;
}
     
    </style>

  
</head>
<body>
<!-- HEADER AND NAVBAR -->
<header>

<nav>
    <div class="row">
        <img src="resources/img/logo-white.png" alt="Freshmart Logo" class="logo">
        <img src="resources/img/logo-black.png" alt="Freshmart logo" class="logo-black">
        <ul class="main-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">How it works</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Sign Up</a></li>
            <li><a href="#"><i class="ion-ios-cart-outline icon-small" style="color: #fff;"></i>My Cart</a></li>


        </ul>
    </div>
</nav>

<div class="hero-text-box">

<h1>We value your Reviews</h1>
</div>
</header>


<?php

    //add dbconn
    require 'feedbackDatabase.php';
    $fname = $_SESSION["fname"];
    $email = $_SESSION["email"];
    $purpose = $_SESSION["purpose"];
    $message = $_SESSION["message"];

    if($email != ""){
    $sqlin = "INSERT into feedbackdata (fname,email,purpose,message) VALUES ('$fname','$email','$purpose','$message')";
    $new = mysqli_query($conn,$sqlin);        
    echo "<h2 style='margin-top:1%;'>Thank You for your feedback!</h2>"."<br>";
    }
?>
<div class="container">
<a class="btn btn-full" href="#">Shop More</a>
<a class="btn btn-ghost" href="#">About Us</a>
</div>


<div class="row-card">
  <div class="column-card">
    <div class="card">
    <img src="resources/img/categ.png" alt="" style="width:100%">
      <p class="card-text">Shop according to categories and buy the products at their best prices.</p>
      <a class="btn btn-ghost" href="#">Shop by Category</a>
    </div>
  </div>

   <div class="column-card">
    <div class="card">
    <img src="resources/img/categ.png" alt="" style="width:100%">
      <p class="card-text">Shop according to categories and buy the products at their best prices.</p>
      <a class="btn btn-ghost" href="#">Shop by Category</a>
    </div>
  </div>
  <div class="column-card">
    <div class="card">
    <img src="resources/img/categ.png" alt="" style="width:100%">
      <p class="card-text">Shop according to categories and buy the products at their best prices.</p>
      <a class="btn btn-ghost" href="#">Shop by Category</a>
    </div>
  </div>

</div>

</body>
<footer>
        <div class="row">
            <div class="col span-1-of-2">
                <ul class="footer-nav">
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Place your order</a></li>
                    <li><a href="#">Register now</a></li>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
<script src="vendors/js/jquery.waypoints.min.js"></script>
<script src="resources/Js/script.js"></script>



</html>
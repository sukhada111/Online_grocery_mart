<?php
session_start();
?>
<?php


$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "wp_freshmart";

$conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

if(!$conn){
    die('Database Connection failed!');
}
foreach($_SESSION['cart_item'] as $x => $quant){

	$sql="SELECT * FROM products WHERE id='$x'";
	$result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
  $record = mysqli_fetch_array($result);


$uname=$_SESSION["username"];
$prodid=$record["id"];
$prodname = $record["name"];
$cat = $record["category"];
$sel = $record["seller"];
$qua = $record["quantity"];
$price = $record["price"];



$sqlin = "INSERT into orders(order_id,username,name,category,seller,quantity,price) VALUES ('$prodid','$uname','$prodname','$cat','$sel','$qua','$price')";
$new = mysqli_query($conn,$sqlin);        

}

unset($_SESSION["cart_item"]);
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

<h1>Order Successful!</h1>
</div>
</header>

       
   <h2 style='margin-top:2%;'>Thank You for Shopping! Hoping to see you again soon.</h2>
    <img src="resources/img/tenor.gif" alt="" style="margin-left:35%">

<div class="container">
</div>


<div class="row-card">
  <div class="column-card">
    <div class="card">
    <img src="resources/img/categ.png" alt="" style="width:100%">
      <p class="card-text">Shop according to categories and buy the products at their best prices.</p>
      <a class="btn btn-ghost" href="categ.php">Shop by Category</a>
    </div>
  </div>

   <div class="column-card">
    <div class="card">
    <img src="resources/img/card4.jpg" alt="" style="width:100%">
      <p class="card-text">Find out more about Freshmart and how we work.</p>
      <a class="btn btn-ghost" href="aboutUs.php">How It Works</a>
    </div>
  </div>
  <div class="column-card">
    <div class="card">
    <img src="resources/img/card3.jpg" alt="" style="width:100%">
      <p class="card-text">Tell us what you think about us and what we need to improve.</p>
      <a class="btn btn-ghost" href="feedback.php">Feedback</a>
    </div>
  </div>

</div>

</body>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
<script src="vendors/js/jquery.waypoints.min.js"></script>
<script src="resources/Js/script.js"></script>



</html>
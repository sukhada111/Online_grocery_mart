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

  img{
      border-radius:50%;
      margin-bottom:5%;
      margin-right:5%;
  }
  td{
      width:33.3%;
  }
  .rounded-circle:after {
    content: '\A';
    position: absolute;
    width: 100%; height:100%;
    top:0; left:0;
    background:rgba(0,0,0,0.6);
    opacity: 0;
    transition: all 1s;
    -webkit-transition: all 1s;
}
.card{
    margin-left:30%;
    margin-top:5%;
    margin-bottom:5%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.card-text{
    padding:4%;
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
                    <li><a href="#">About Us</a></li>
                    <li><a href="categ.php">Categories</a></li>
                   <?php
                        if(count($_SESSION)>0)
                        {
                            ?>
                            <li><a href="change_pass.php">Change password</a></li>
                            <li><a href="mycart.php"><i class="ion-ios-cart-outline icon-small" style="color: #fff;"></i>My Cart</a></li>
                            <li><a href="myProfile.php"><i class="ion-ios-person-outline icon-small" style="color: #fff;"></i></a></li>
                            <li><a href="logout.php">Logout</a></li>

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

        <h1>My Profile</h1>
        </div>
    </header>
    <div class="card" >
    <h2>User Information</h2>
    <div class="card-text">
    <strong>Username: </strong><?php echo $_SESSION["username"] ;?> <br><br>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wp_freshmart";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
$uname=$_SESSION['username'];
$sql="SELECT * FROM user WHERE username='$uname'";
$result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$record = mysqli_fetch_array($result);

echo "<strong>Email ID: </strong>". $record['email']."<br><br>";
echo "<strong>Address: </strong>". $record['address']."<br><br>";

?>
    </div>
    
    </div>
   
    <!-- Profile section -->
    

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



</body>

</html>


<?php
//new index file
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshmart</title>

    
    <link rel="stylesheet" href="resources/css/queries.css">
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link rel="stylesheet" href="vendors/css/ionicons.min.css">

    
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendors/css/grid.css">
    <link rel="stylesheet" href="resources/css/style_index.css">
    <link href='https://fonts.googleapis.com/css?family=Almendra' rel='stylesheet'>
    
    <style>
        .bcontent {
            margin-top: 10px;
        } 
        .card-text {
            font-family: 'Almendra';
        }
    </style> 
</head>
<body>

    <!-- HEADER AND NAVBAR -->
    <header>

        <nav>
            <div class="row">
                <img src="resources/img/logo-white.png" alt="Omnifood Logo" class="logo">
                <img src="resources/img/logo-black.png" alt="Omnifood logo" class="logo-black">
                <ul class="main-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">How it works</a></li>
                   <?php
                        if(count($_SESSION)>0)
                        {
                            ?>
                            <li><a href="#"><i class="ion-ios-cart-outline icon-small" style="color: #fff;"></i>My Cart</a></li>
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

            <h1>Compare and Find <br> your groceries at the best price. </h1>
            <a class="btn btn-full" href="#">Order Now</a>
            <a class="btn btn-ghost" href="#">Know More</a>
        </div>
    </header>
    <!-- FEATURES SECTION  -->

    <section class="features js--section-features js--wp-1">
        
        <div class="row">

<?php

if(count($_SESSION)>0)
                        {
                            ?>
                            <h2>Welcome <?php echo $_SESSION['username'];?> !</h2>
                            <br>
                            <?php
                        }
                        ?>
            
            <p class="long-copy">

                Hello, we’re Freshmart, your new premium grocery delivery service. We know you’re always busy. Freshmart gives shoppers the power to make their best decision, every time, every trip.

            </p>
        </div>
<br><br><br><br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wp_freshmart";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$sql = "SELECT * FROM products WHERE name='Butter'";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while( $record = mysqli_fetch_array($resultset) ) {
?>
<center>
<div class="container bcontent">
        <hr />
        <div class="card" style="max-width: 1000px;">
            <div class="row no-gutters">
                <div class="col-sm-5">
                    <img class="card-img" alt="" src=<?php echo "resources/img/$record[img]";?>>
                </div>
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $record['name']; ?></h5>
                        <p class="card-text">Seller:&nbsp;&nbsp;<?php echo $record['seller']; ?><br><b>Product:&nbsp;&nbsp;</b><?php echo $record['name']; ?><br><b>Category:&nbsp;&nbsp;</b><?php echo $record['category']; ?><br><b>Price:&nbsp;&nbsp;Rs. </b><?php echo $record['price']; ?></p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>

<?php }

?>
</center>
<br><br><br>


    </section>

    

    
    

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


<?php
    session_start();

    if(isset($_SESSION['username']))
    {
        $_SESSION['msg'] = "Successfully registered";
    }
    else
    {
        $_SESSION['msg'] = "You must login or sign up to view this page";
        header("location: login_form.php");
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omnifood</title>

    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="stylesheet" href="resources/css/queries.css">
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link rel="stylesheet" href="vendors/css/ionicons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendors/css/grid.css">
    <style>
        h3{
    font-size: 110%;
    margin-bottom: 15px;
    color: #fff;
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
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#"><i class="ion-ios-cart-outline icon-small" style="color: #fff;"></i>My Cart</a></li>


                </ul>
            </div>
        </nav>

        <div class="hero-text-box">

            <h1>Compare and Find <br> your groceries at the best price. </h1>
            <a class="btn btn-full" href="#">Order Now</a>
            <a class="btn btn-ghost" href="#">Know More</a>
            <br><br><br><br>
            <?php if(isset($_SESSION['username'])) : ?>
                <h3>Welcome, <strong><?php echo $_SESSION['username']; ?></strong></h3>
            <?php endif ?>
        </div>

        


    </header>
    <!-- FEATURES SECTION  -->

    <section class="features js--section-features">


        <?php if(isset($_SESSION['success'])) : ?>
        
        <div class="row">

            <?php
                echo $_SESSION['success']."<br><br><br><br>";
                unset($_SESSION['success']);
            ?>

            <h2>Never overpay for groceries again.</h2>
            <p class="long-copy">

                Hello, we’re Freshmart, your new premium grocery delivery service. We know you’re always busy. Freshmart gives shoppers the power to make their best decision, every time, every trip.

            </p>
        </div>
        <?php endif ?>

        <div class="row">
            <div class="col span-1-of-4 box">
                <i class="ion-ios-infinite-outline icon-big"></i>
                <h3>All year round</h3>
                <p>
                    Never waste time again! We work towards saving your time and money on groceries and everyday purchases.

                </p>
            
            </div>

            <div class="col span-1-of-4 box">
                <i class="ion-ios-stopwatch-outline icon-big"></i>
                <h3>Delivery in 2 days</h3>
                <p>
                    You're only 2 days away from your fresh groceries delivered right to your home. We work with only the best to ensure that you're a 100% happy.
                </p>
            
            </div>

            <div class="col span-1-of-4 box">
                <i class="ion-ios-nutrition-outline icon-big"></i>
                <h3>100% fresh</h3>
                <p>
                    All our products are fresh, organic and local. Animals are raised without added hormones or antibiotics. Good for your health, the environment, and it also tastes better!

                </p>
            
            </div>

            <div class="col span-1-of-4 box">
                <i class="ion-ios-cart-outline icon-big"></i>
                <h3> Order anything</h3>
                <p>
                    We don't limit ourselves, which means you can order whatever you feel like, at the best prices.  Freshmart lets you instantly see which stores have your favourite products and what the price is at each store.

                </p>
            
            </div>
        </div>

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


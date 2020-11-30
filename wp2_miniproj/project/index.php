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

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendors/css/grid.css">
    <link rel="stylesheet" href="resources/css/style_index.css">
    
  
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

            <h1>Compare and Find <br> your groceries at the best price. </h1>
            <a class="btn btn-full" href="categ.php">Order Now</a>
            <a class="btn btn-ghost" href="aboutUs.php">Know More</a>
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
                            
                            <?php if(isset($_SESSION['pass_msg']))
                            {
                                ?>
                                <h2 style="font-size:25px;">
                                <?php echo $_SESSION['pass_msg'];
                                ?>
                                </h2>
                                <?php
                            }
                            ?>
                            
                            <?php

                        }
                        ?>
            <h2>Never overpay for groceries again.</h2>
            <p class="long-copy">

                Hello, we’re Freshmart, your new premium grocery delivery service. We know you’re always busy. Freshmart gives shoppers the power to make their best decision, every time, every trip.

            </p>
        </div>

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

    <!-- TESTIMONIALS SECTION -->
    <section class="section-testimonials">

        <div class="row">
            <h2>Our customers can't live without us</h2>
        </div>

        <div class="row">
            <div class="col span-1-of-3">
                <blockquote>
                    Freshmart is just awesome! I just launched a startup which leaves me with no time for visiting grocery stores, so Freshmart is a life-saver. Now that I got used to it, I don't feel the need to go to the grocery store anymore!
                    
                    <cite>
                        <img src="resources/img/customer-1.jpg" alt=""> 
                        Alberto Duncan
                    </cite>
                </blockquote>
            </div>
            <div class="col span-1-of-3">
                <blockquote>
                    Saving money, quick service, access to the best stores and delivered right to my home. We have lots of Online grocery marts here in Mumbai, but no one comes even close to Freshmart. Me and my family are so in love!
                    
                    <cite>
                        <img src="resources/img/customer-2.jpg" alt=""> 
                        Joana Silva
                    </cite>
                </blockquote>
            </div>
            <div class="col span-1-of-3">
                <blockquote>
                    I was looking for a quick and easy Online Grocery Store service in Mumbai. I tried a lot of them and ended up with Freshmart. One of the best e-stores I have seen. Keep up the great work!
                    
                    <cite>
                        <img src="resources/img/customer-3.jpg" alt=""> 
                        Milton Chapman
                    </cite>
                </blockquote>
            </div>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
<script src="vendors/js/jquery.waypoints.min.js"></script>
<script src="resources/Js/script.js"></script>



</body>

</html>


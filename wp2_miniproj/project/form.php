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
            <h1>Feedback Form</h1>
        </div>
    </header>
    <section class="section-form">
        <div class="row">
            <h2>We're happy to hear from you</h2>
        </div>
        <div class="row">
            <form action="#" method="POST" class="contact-form">
                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="name">Name </label>
                    </div>

                    <div class="col span-2-of-3">
                        <input type="text" name="name" id="name" placeholder="Your name" required>
                    </div>
                </div>


                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="email">Email</label>
                    </div>

                    <div class="col span-2-of-3">
                        <input type="email" name="email" id="email" placeholder="Your Email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="find-us">How did you find us?</label>
                    </div>

                    <div class="col span-2-of-3">

                        <select name="find-us" id="find-us">
                            <option value="friends" selected>Friends</option>
                            <option value="search" >Search Engine</option>
                            <option value="ad">Advertisement</option>
                            <option value="others">Others</option>
                        </select>

                    </div>
                </div>


                
                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="news">Newsletter</label>
                    </div>

                    <div class="col span-2-of-3">

                        <input type="checkbox" name="news" id="news" checked>
                        Yes, please
                    </div>
                </div>

                  
                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="message">Drop us a line</label>
                    </div>

                    <div class="col span-2-of-3">

                        <textarea name="message" id="message" placeholder="Your message"></textarea>
                    </div>
                </div>



                <div class="row">
                    <div class="col span-1-of-3">
                        <label>&nbsp;</label>
                    </div>

                    <div class="col span-2-of-3">
                        <input type="submit" value="Send it!">
                    </div>
                </div>
            </form>
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

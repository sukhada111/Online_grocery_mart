<?php include('server.php')  ?>

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
        body{
            color:#cccccc;
        }
        header{
            height: 70%;
            background-image: linear-gradient(rgba(0,0,0,0.7), 
            rgba(0,0,0,0.7)), url("resources/css/img/bgpages.jpg");

        }
        ;.hero-text-box{
            align-items: center;
        }
        h1{
            font-weight: 400;
            font-size: 300%;
        }
        
        *,:after,:before{box-sizing:border-box}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}
a{color:inherit;text-decoration:none}

.login-wrap{
    width:100%;
    margin:auto;
    max-width:525px;
    min-height:670px;
    position:relative;
    font:600 16px/18px 'Open Sans',sans-serif;
    background:url("resources/img/veg5.jpg") no-repeat center;
    box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
}
.login-html{
    width:100%;
    height:100%;
    position:absolute;
    padding:90px 70px 50px 70px;
    background:rgba(26, 27, 28,0.75)
;}
.login-html .sign-in-htm,
.login-html .sign-up-htm{
    top:0;
    left:0;
    right:0;
    bottom:0;
    position:absolute;
    transform:rotateY(180deg);
    backface-visibility:hidden;
    transition:all .4s linear;
}
.login-html .sign-in,
.login-html .sign-up,
.login-form .group .check{
    display:none;
}
.login-html .tab,
.login-form .group .label,
.login-form .group .button{
    text-transform:uppercase;
}
.login-html .tab{
    font-size:22px;
    margin-right:15px;
    padding-bottom:5px;
    margin:0 15px 10px 0;
    display:inline-block;
    border-bottom:2px solid transparent;
  
}
.login-html .sign-in:checked + .tab,
.login-html .sign-up:checked + .tab{
    color:#fff;
    border-color:#02a3de;
}
.login-form{
    min-height:345px;
    position:relative;
    perspective:1000px;
    transform-style:preserve-3d;
   
}
.login-form .group{
    margin-bottom:15px;
}
.login-form .group .label,
.login-form .group .input,
.login-form .group .button{
    width:100%;
    /* change */
    color:#999999;
    display:block;
}
.login-form .group input[type=text]
{
    color:white;
}
.login-form .group .button
{
    color:white;
}
.login-form .group .input,
.login-form .group .button{
    border:none;
    padding:15px 20px;
    border-radius:25px;
    background:rgba(255,255,255,.1);
}
.login-form .group input[data-type="password"]{
    text-security:circle;
    -webkit-text-security:circle;
}
.login-form .group .label{
    color:#aaa;
    font-size:12px;
}
.login-form .group .button{
    background:#02a3de;
}
.login-form .group label .icon{
    width:15px;
    height:15px;
    border-radius:2px;
    position:relative;
    display:inline-block;
    background:rgba(255,255,255,.1);
}
.login-form .group label .icon:before,
.login-form .group label .icon:after{
    content:'';
    width:10px;
    height:2px;
    background:#fff;
    position:absolute;
    transition:all .2s ease-in-out 0s;
}
.login-form .group label .icon:before{
    left:3px;
    width:5px;
    bottom:6px;
    transform:scale(0) rotate(0);
}
.login-form .group label .icon:after{
    top:6px;
    right:0;
    transform:scale(0) rotate(0);
}
.login-form .group .check:checked + label{
    color:#fff;
}
.login-form .group .check:checked + label .icon{
    background:#02a3de;
}
.login-form .group .check:checked + label .icon:before{
    transform:scale(1) rotate(45deg);
}
.login-form .group .check:checked + label .icon:after{
    transform:scale(1) rotate(-45deg);
}
.login-html .sign-in:checked + .tab + .sign-up + .tab + .login-form .sign-in-htm{
    transform:rotate(0);
}
.login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
    transform:rotate(0);
}

.hr{
    height:2px;
    margin:60px 0 50px 0;
    background:rgba(255,255,255,.2);
}
.foot-lnk{
    text-align:center;
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
            <h1>Login Form</h1>
        </div>
    </header>
    <section class="section-form">
    
        <div class="row">
            <h2 style="color:black">Sign in to find fresh groceries at the best price!</h2>
        </div>
        <br>
        <div class="row">
        <div class="login-wrap">
        <div class="login-html">
        <form action="login_sess.php" method="post">
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
           
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                    <br>
                        <label for="user" class="label">Username</label>
                        <input id="user" type="text" class="input" name="username">
                        <br>
                        <?php if(isset($_POST["username"]))
                        {
                            ?>
                        <span class="error"><?php echo $unameErr;?> </span>
                        <span class="error"><?php echo $wrongErr;?> </span>
                        <br>
                        <?php
                        }
                        ?>
                    <br>
                    </div>
                    <div class="group">
                        <label for="pwd" class="label">Password</label>
                        <input id="pass" name="pwd" type="password" class="input" data-type="password">
                        <br>
                        <?php if(isset($_POST["pwd"]))
                        {
                            ?>       
                        <span class="error"><?php echo $passErr; ?> </span>  
                        <?php
                        }
                        ?>
                    <br>
                    </div>
                    <br>
                    <div class="group">
                        <input id="check" name="agree" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    <br>
                     
                    </div>
                    <div class="group">
                        <input type="submit" name="login" class="button" value="Sign In">
                    </div>
                    
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot"><h5>Forgot Password?</h5></a>
                    </div>

                </div>
               
                <div class="sign-up-htm">
                    <br><br>
                   <h3 style="color:white">Don't have an account?</h3><br>
                   <h3 style="color:white">Click on the button below to Sign up!</h3>
                   <br>
                   <div class="group">
                        <input type="submit" class="button si" value="Sign Up">
                    </div>
            </div>
            
        </div>
      
        </div>
        
    </div> 
    
        </div>
        </form>
      
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
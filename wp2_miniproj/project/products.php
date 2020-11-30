<?php
session_start();
if(count($_SESSION)>0)
{

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshmart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/css/queries.css">
    <link rel="stylesheet" href="vendors/css/normalize.css">
    <link rel="stylesheet" href="vendors/css/ionicons.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="vendors/css/grid.css">
    <link rel="stylesheet" href="resources/css/style_index.css">
    <style>
    .card:hover{
     transform: scale(1.02);
  box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
}
header{
            height: 20%;
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("resources/css/img/bgpages.jpg");

        }



    </style>
</head>
<body>

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

       </header>
<div class="container">
<br><br>
<h2>Get the best quality products only at Freshmart!</h2>
<br>
<br>




    <div class="row">
    <?php
    $categ=$_GET['cat'];

$connection = mysqli_connect('localhost', 'root', '', 'wp_freshmart') or die("Could not connect to database");
if($stmt = $connection->query("SELECT * FROM products where category='$categ'")){



while ($row = $stmt->fetch_assoc()) {
    ?>
    <div class="col-sm-4">
    <div class="card shadow mb-4 "style="max-height:400px" >
        <img class="card-img-top" src= <?php echo "resources/img/$row[img]";?> alt="Card image" width="400px" height="200px">
        <div class="card-body">
        <h4 class="card-title"> <?php echo "$row[name]"; ?></h4>
        <p class="card-text">Quantity: <?php echo "$row[quantity]"; ?><br>
        Sold by: <?php echo "$row[seller]"; ?>
        <br>
        Price: Rs. <?php echo "$row[price]"; ?>
        </p>
        <a href="product.php?&pro=<?php echo $row['name'];?>" class=" stretched-link"></a>
        </div>
    </div>

</div>


<?php
}
?>
</div>
<?php
}

else{
echo $connection->error;
}

     ?>
     </div>  
   

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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>



</body>
</html>

<?php
}
else
{
    echo "<h2>Please Login First!";
}
?>
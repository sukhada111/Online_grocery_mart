<?php
session_start();

   if(isset($_POST['submit']))
   {
       $store=$_POST['nam'];
       $_SESSION['store']=$store;

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
    .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 50%;
  border-radius: 5px;
 
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

input[type=submit]{
  width: 30%;
  background-color:#5bb6fc;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=text], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
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
                    <li><a href="#">Sign Up</a></li>
                    <?php
                        }
                    ?>


                </ul>
            </div>
        </nav>

        <div class="hero-text-box">

            <h1>Compare and Find <br> your groceries at the best price.</h1>
            <a class="btn btn-full" href="#">Order Now</a>
            <a class="btn btn-ghost" href="#">Know More</a>
        </div>
    </header>
<br>
<br>
<div align="center">
    
      <div class="card" style="max-width:600px;background-color: #99003f;color:white">
      <br><br>
      <h3>

      
<?php echo "Hello ".$_SESSION['username']." !";




?>
</h3>
<br>
<h3>Your preferred store is:</h3>
<br>
<h3>
<?php echo " ".$_SESSION['store'].".";
?>
</h3>
<br><br>

<form action="logout.php" method="post">


            <input type="submit" name="submit" value="Logout">

</form>

<br>
<br>
</div>
</div>
<br>
</body>
</html>

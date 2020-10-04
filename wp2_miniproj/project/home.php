<?php
    session_start();
    
    // $password=$_COOKIE['password'];
  

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

input[type=submit] {
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
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#"><i class="ion-ios-cart-outline icon-small" style="color: #fff;"></i>My Cart</a></li>


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

      
<?php echo "Welcome ".$_SESSION['username']." !";



?>
</h3>

<br><br>
<form action="dashboard.php" method="post">

<label for="fact">Enter your preferred wholesaler/store name:</label><br>
            <input type="text" id="nam" name="nam"><br>
            <br><br>
            <input type="submit" name="submit">

</form>
</div>
</div>
<br>
</body>
</html>
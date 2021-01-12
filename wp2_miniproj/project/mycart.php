<?php
session_start();?>

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
		.table-data{
			border:1px solid #333;
			margin-left:10%;
			margin-bottom:7%;
			
		}
		th,td{
			padding:2%;
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
<h2>Cart Summary</h2>
<br>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wp_freshmart";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());


if(isset($_GET['action'])){
	$action=$_GET['action'];

if($action=='add'){
    function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
     }
if(isset($_GET['id'])){
    $id=$_GET['id'];
    }
            $quant=$_POST['quantity'];

			if(!isset($_SESSION['cart_item'])){
            $_SESSION['cart_item']=array();
          
         $_SESSION['cart_item']=array_push_assoc($_SESSION['cart_item'], $id, $quant);

			}
			else
			{
				if(!in_array($id,$_SESSION['cart_item'])){
                    $quant=$_POST['quantity'];
                    
                    $_SESSION['cart_item']=array_push_assoc($_SESSION['cart_item'],$id,$quant);
				}
			
			}
}
if($action=='remove'){
    $id=$_GET['id'];
	if(!empty($_SESSION["cart_item"])) {
       
       
		unset($_SESSION["cart_item"][$id]);
		if(empty($_SESSION["cart_item"])){
           
			unset($_SESSION["cart_item"]);
		}
	}
}
}


if(isset($_SESSION["cart_item"])){
   
?>
<table class='table-data' border=1px>
	<tr>
	<th>Name</th>
	<th>Seller</th>
	<th>Quantity</th>
	<th>Price (Rs.)</th>
    <th>Product count</th>
    <th>Total price (Rs.)</th>
	<th>Remove Product</th>
	</tr>

<?php 
    $total_price=array();
	foreach($_SESSION['cart_item'] as $x => $quant){
	$sql="SELECT * FROM products WHERE id='$x'";
	$result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    $record = mysqli_fetch_array($result);
    $price= $quant*($record['price']);
    array_push($total_price,$price);
    
	echo "
	<tr>
	<td width=15%>".$record["name"];?>
	<img src=<?php echo "resources/img/$record[img]";?> width=50% height=30%>
	<?php
	echo"</td>"."<td width=10%>".$record["seller"]."</td>"
    ."<td width=5%>".$record["quantity"]."</td>"
    
    ."<td width=5%>".$record["price"]."</td>".
    "<td width=5%>".$quant."</td>"
    ."<td width=5%>".$quant*$record['price']."</td>"
    ."<td width=5% style='text-align:center;'>" ;?>
	<a href="mycart.php?&action=remove&id=<?php echo $record["id"]; ?>"><img src="resources/css/img/icon-delete.png"></a>
	<?php
	echo "</td></tr>";
}
?>
</table>
<br>
<?php
$sum=array_sum($total_price);
?>
<br><h2>Cart total: Rs. <?php echo "$sum"; ?></h2>
<?php
echo "<a class='btn btn-ghost' href='categ.php' style='margin-left:20%; margin-bottom:5%;'>Shop More</a>";
echo "<a class='btn btn-full' href='checkout.php' style='margin-left:2%; margin-bottom:5%'>Proceed to checkout</a>";

}
else{
	echo "<h2>Your Cart is Empty</h2>";
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


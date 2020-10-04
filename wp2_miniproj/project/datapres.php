<?php
session_start();?>
<?php
$_SESSION["uname"]= $_COOKIE["Username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">

    <title>Freshmart</title>
<style>
body{
    margin-top: 100px;
}
label{
            margin-bottom: 10px;
            padding-bottom:15px;
            font-weight: 400;
        }
        input[type=submit] {
            background-color: #2980b9;
            color: #fff;
            border: 1px solid #2980b9;
            margin-right: 15px;
        }
        input[type=submit]:hover,
        input[type=submit]:active{
            background-color: #1d5a82;
            border: 1px solid #1d5a82;

        }
        input[type="text"]{
            margin-bottom:15px;
        }
</style>
</head>

<body>
    <?php
        echo "<h2>WELCOME ".$_COOKIE["Username"];
        echo "<br>"."We are happy to have you at Freshmart!</h2>";
    ?>
    <section class="section-form">
    <div class="row" id="feedback">
    <form action="sessdata.php" method="POST" class="contact-form">
            <label for="area"><strong>Enter your preffered area:</strong></label>
		    <input type="text" name="area" id="area" placeholder="Navi Mumbai" autocomplete autofocus><br>
            <input type="Submit" Value="Send It!" name="submit">
    </form>
    </div>
    
    
    </section>
</body>
</html>
<?php
session_start();?>
<?php
$_SESSION["area"]=$_POST["area"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freshmart</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/style.css">
    <style>
body{
    margin-top: 100px;
}
a{
    margin-left:500px;
}
</style>
</head>
<body>
<?php
    echo "<h2> Congratulations ".$_SESSION["uname"]."<br><br>"." We function in ".$_SESSION["area"]."!!</h2>";
    setcookie("Username", "", time() - 3600);
    session_unset();
    session_destroy();
?>
<br>                
<a class="btn btn-full" href="index.html">Logout</a>

</body>
</html>
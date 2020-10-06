<?php

session_start();

// Initialising variables

$username = "";
$email = "";
$pwd = "";
$check = "";
$address = "";

$errors = array();

// Connect to db

$db = mysqli_connect('localhost', 'root', '', 'wp_freshmart') or die("Could not connect to database");

// Registering users

if(isset($_POST['submit'])){
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$pwd = mysqli_real_escape_string($db, $_POST['pwd']);
$check = mysqli_real_escape_string($db, $_POST['check']);
$address = mysqli_real_escape_string($db, $_POST['address']);

// Form Validation

$unameErr=$passErr=$emailErr=$addressErr=$checkErr="";
      
if (empty($username))
{  
    $unameErr = "Username is required";  
    array_push($errors, $unameErr);
} 

if (empty($pwd)) {  
    $passErr = "Password is required";
    array_push($errors, $passErr);
}   
else {   
    // check if name only contains letters and whitespace  
    if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/",$pwd)) {  
        $passErr = "Password must contain atleast one number, one letter and should be 8-12 characters long!";  
        array_push($errors, $passErr);
} 
    
} 


if (empty($check)) {  
    $checkErr = "Please confirm password";  
    array_push($errors, $checkErr);
} 
else { 
    // check if name only contains letters and whitespace  
    if ($check != $pwd) {  
        $checkErr = "Passwords should match!";  
        array_push($errors, $checkErr);
} 
      
} 


if (empty($email)) {  
    $emailErr = "Email is required";  
    array_push($errors, $emailErr);
} 
else {    
    // check that the e-mail address is well-formed  
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
        $emailErr = "Invalid email format";  
        array_push($errors, $emailErr);
} 
    
} 


if (empty($address)) {  
    $addressErr = "Address is required";  
    array_push($errors, $addressErr);
} 





// Check for existing users

$user_check_query = "SELECT * FROM user WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
    if($user['username'] === $username)
    {
        array_push($errors, "Username already exists");
    }

    if($user['email'] === $email)
    {
        array_push($errors, "This email id already has a registered username");
    }
}

// Register new user if no error

if(count($errors) == 0)
{
    $password = password_hash($pwd, PASSWORD_DEFAULT); // for encrypting password
    $query = "INSERT INTO user (username, password, email, address) VALUES ('$username', '$password', '$email', '$address')";
    
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are logged in";

    header('location: index.php');

}

}



?>
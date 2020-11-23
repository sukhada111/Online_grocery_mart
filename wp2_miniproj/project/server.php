<?php
//starting session
session_start();

// Connect to db

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "wp_freshmart";

$db = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

if(!$db){
    die('Database Connection failed!');
}

// Initialising variables

$username = "";
$email = "";
$pwd = "";
$check = "";
$address = "";

$errors = array();


// Registering users

if(isset($_POST['submit'])){
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$pwd = mysqli_real_escape_string($db, $_POST['pwd']);
$check = mysqli_real_escape_string($db, $_POST['check']);
$address = mysqli_real_escape_string($db, $_POST['address']);

// Form Validation

$unameErr=$passErr=$emailErr=$addressErr=$checkErr=$existErr=$exist1Err="";
      
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
        $existErr = "Username already exists";  
        array_push($errors, $existErr);
    }

    if($user['email'] === $email)
    {
        $exist1Err = "This email id already has a registered username";  
        array_push($errors, $exist1Err);
    }
}

// Register new user if no error

if(count($errors) == 0)
{
    $password = password_hash($pwd, PASSWORD_DEFAULT); // for encrypting password

    $sqlin = "INSERT into user (username, password, email, address) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($db);

    if(mysqli_stmt_prepare($stmt,$sqlin)){

        mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $email, $address);
        mysqli_stmt_execute($stmt);
        $_SESSION['username'] = $username;
    
        // Close statement
        mysqli_stmt_close($stmt);
    }

    
    // Close connection
    mysqli_close($db);
    header("Location: index.php");

}

}

// LOGIN USER
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);

    $unameErr = $passErr = $wrongErr = $notexistErr = "";
  
    if (empty($username)) {
        $unameErr = "Username is required";
        array_push($errors, $unameErr);
    }
    if (empty($pwd)) {
        $passErr = "Password is required";
        array_push($errors, $passErr);
    }
  
    if (count($errors) == 0) {
        $query = "SELECT * FROM user WHERE username = '$username'";  
        $result = mysqli_query($db, $query);  
        if(mysqli_num_rows($result) > 0)  
        {  
             while($row = mysqli_fetch_array($result))  
             {  
                  if(password_verify($pwd, $row["password"]))  
                  {  
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "You are now logged in";
                    //pass index_pass.php in header for change password functionality
                    header('location: index.php'); 
                  }  
                  else  
                  {  
                    $wrongErr = "Wrong username/password combination";
                    array_push($errors, $wrongErr);
                  }  
             }  
        }  
        else  
        {  
             $wrongErr = "User does not exist! Sign Up for more...";
             array_push($errors, $notexistErr);
        }  
   } 
  }



?>
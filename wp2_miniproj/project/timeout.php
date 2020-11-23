<?php
//starting session
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

$unameErr=$passErr=$emailErr=$addressErr=$checkErr=$existErr=$exist1Err=$timeoutErr="";
      
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
    $query = "INSERT INTO user (username, password, email, address) VALUES ('$username', '$password', '$email', '$address')";
    
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are logged in";
    //pass index_pass.php in header for change password functionality
    header('location: index_pass.php');

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
                    mysqli_query($db,"delete from loginlogs where IpAddress='$ip_address'");
                    //pass index_pass.php in header for change password functionality
                    header('location: index_pass.php'); 
                  }  
                  else  
                  {  
                   
                    $time=time()-300;
                    $ip_address=getIpAddr();
                    // Getting total count of hits on the basis of IP
                    $query=mysqli_query($db,"select count(*) as total_count from loginlogs where TryTime > $time and IpAddress='$ip_address'");
                    $check_login_row=mysqli_fetch_assoc($query);
                    $total_count=$check_login_row['total_count'];
                    //Checking if the attempt 3, or youcan set the no of attempt her. For now we taking only 3 fail attempted
                    $total_count++;
                    $rem_attm=3-$total_count;
                    $wrongErr = "Wrong username/password combination."."<br>".$rem_attm."attempts remaining."."<br>";
                    array_push($errors, $wrongErr);
                    if($rem_attm==0){
                    $timeoutErr="Too many failed login attempts. Please login after 15 seconds";
                    array_push($errors,$timeoutErr);

                    }
                    else{
                        $timeoutErr="";
                    }
                    if($total_count==4){
                        sleep(15);
                        header("location:loginDummy.php?TimeoutError");
                        $total_count=0;
                        exit();
                    }
                    $try_time=time();
                    mysqli_query($db,"insert into loginlogs(IpAddress,TryTime) values('$ip_address','$try_time')");
                    }
                  }  
             }  
        }  
        else  
        {  
             $wrongErr = "User does not exist! Sign Up for more...";
             array_push($errors, $notexistErr);
        } 
       
   }

// Getting IP Address
function getIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ipAddr=$_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
    $ipAddr=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
    $ipAddr=$_SERVER['REMOTE_ADDR'];
    }
    return $ipAddr;
    }


?>
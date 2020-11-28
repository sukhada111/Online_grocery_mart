<?php
 session_start();

 
$servername="localhost";
$username="root";
$password="";
$dbname="wp_freshmart";

$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    die("Connection failed:".mysqli_connect_error());
}



$unameErr=$passErr="";     
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
  
    if (empty($_POST["uname"])) {  
        $unameErr = "Username is required";  
   } else {  
       $user = input_data($_POST["uname"]);  
           
   } 

    if (empty($_POST["password"])) {  
        $passErr = "Password is required";  
   } else {  
       $new_password = input_data($_POST["password"]);  
       $new_pwd=password_hash($new_password,PASSWORD_DEFAULT);
           // check if name only contains letters and whitespace  
           if (!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/",$new_password)) {  
               $passErr = "Password must contain atleast one number, one letter and should be 8-12 characters long!";  
           }  
   } 

   
}
function input_data($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
  }  

   
  if($unameErr == "" && $passErr == "") {  
      
    


if($_SESSION['username']==$user)
{
$sql="Update user SET password='$new_pwd' where username='$user'";
if(mysqli_query($conn,$sql))
{
    echo "Password updated successfully!";
    $_SESSION['pass_msg']="Password updated successfully!";
    header('Location:index.php');
}
else
{
    echo "Error!";
}

}

else
{
    $error="Can't update details of other user!";
    header("Location:change_pass.php?&error=".$error);
}
      }
      else
      {
        header("Location:change_pass.php?&passErr=".$passErr."&unameErr=".$unameErr);
      }

?>
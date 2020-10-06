<?php
session_start();

    

$sess_name=session_name();
$sess_id=session_id();

session_unset();
session_destroy();
setcookie($sess_name,"",time()-3600,"/");
setcookie('username',"",time()-3600,"/");
setcookie('password',"",time()-3600,"/");

header('Location:index.php');


?>
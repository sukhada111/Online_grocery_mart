<?php

    //4 params are required for a successful database conectivity

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "wp_freshmart";

    $conn = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

    if(!$conn){
        die('Database Connection failed!');
    }



?>
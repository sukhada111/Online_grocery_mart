<?php

    if(isset($_POST['submit'])){

        //add dbconn
        require 'feedbackDatabase.php';
        $fname = $_POST["fname"];
        $email = $_POST["email"];
        $purpose = $_POST["purpose"];
        $message = $_POST["message"];

        $sqlin = "INSERT into feedbackdata (fname,email,purpose,message) VALUES ('$fname','$email','$purpose','$message')";
        $new = mysqli_query($conn,$sqlin);
        if($new){
            echo "<b>New records added successfully!</b>"."<br>";
        }

        $sql="SELECT fname, email, purpose, message FROM feedbackdata";
        $result =mysqli_query($conn,$sql);
        $rowCount = mysqli_num_rows($result);

                if($rowCount>0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo "First name:".$row["fname"].", Email: ".$row["email"].", Purpose: ".$row["purpose"].", Message: ".$row["message"];
                        echo "<br>";
                    }
                }
                else{
                    echo "0 Results!";
                }
            }


    


?>
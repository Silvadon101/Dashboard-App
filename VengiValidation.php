
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    </style>

</head>
<body>

</body>
</html>

<?php

session_start();


// Links Mysql To PHP!!
include 'VengiConnect.php';


 // Code to check if user inforation info matches what is already in the database
// in order to log into the form.

 if (isset($_POST['submit'])) {
     $username=$_POST['username'];
     $password=$_POST['password'];



 $query= "SELECT * FROM `users` WHERE Username='$username' AND Password='".$password."'
    limit 1";


    $result= mysqli_query($connect, $query);

    if(mysqli_num_rows($result)==1){
        // Code to check log in time
        date_default_timezone_set("Jamaica");
        $_SESSION['logtime'] = date("d-M-Y h:i:sa");
        $ses_time = $_SESSION['logtime'];
        $logtime = "INSERT INTO session (User_name,start_time)VALUES ('$username','$ses_time');";
        mysqli_query($connect, $logtime);
        $_SESSION['username']=$username;
     header('location:index.php');
    }else{
        header('location:VengiForm.php');
    }

  }






?>

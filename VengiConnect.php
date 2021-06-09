<?php


// Links Mysql To PHP!!
$server='localhost';
$username= 'root';
$password='';
$database= 'drips';
 $connect= new mysqli($server, $username, $password, $database);
//  mysqli_select_db($connect, $database);

//include 'mysqlLoginForm.php';

// if($connect->connect_error){
//     die("failed to connect:" . $connect->connect_error);
// }else{
//     echo "connected";
//     echo "</br>";
// }
?>
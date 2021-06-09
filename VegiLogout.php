<?php
session_start();
ob_start();
include 'VengiConnect.php';
// Code To Enter Logout Time
    date_default_timezone_set("Jamaica");
    $ses_time = $_SESSION['logtime'];
    $logouttime = date("d-M-Y h:i:sa");
    $logtime = "update session set end_time = '$logouttime' where start_time = '$ses_time';";
    mysqli_query($connect, $logtime);
    session_unset();
    session_destroy();



header('location:VengiForm.php');



?>
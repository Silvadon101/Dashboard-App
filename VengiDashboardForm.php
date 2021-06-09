
<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>New Dashboard</title>
<style>
    body{
        background-color:#4043ed;
    }

    #signup {
    background: #36393F;
    width: 450px;
    height: auto;
    margin: 100px auto 50px auto;
    padding: 20px;
    position: relative;
    border-radius: 6px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.17), 0 -6px 20px rgba(0, 0, 0, 0.17);

    }

    /*#signup::before, */
    /*#signup::after {*/
    /*    content: "";*/
    /*    position: absolute;*/
    /*    bottom: -3px;*/
    /*    left: 2px;*/
    /*    right: 2px;*/
    /*    top: 0;*/
    /*    z-index: -1;*/
    /*    background: #fff;*/
    /*    border: 1px solid #ccc;         */
    /*}*/

/*#signup::after {*/
/*    left: 4px;*/
/*    right: 4px;*/
/*    bottom: -5px;*/
/*    z-index: -2;*/
/*    box-shadow: 0 8px 8px -5px rgba(0,0,0,.3);*/
/*}*/
#signup h1 {
    position: relative;
    font: 1em/3.5em Arial, Helvetica;
    color: #fff;
    font-size: 25px;
    text-align: center;
    margin: 0 0 20px;
}

#signup h1::before,
#signup h1::after{
    content:'';
    position: absolute;
    border: 1px solid rgba(0,0,0,.15);
    top: 10px;
    bottom: 10px;
    left: 0;
    right: 0;
}

#signup h1::after{
    top: 0;
    bottom: 0;
    left: 10px;
    right: 10px;
}
::-webkit-input-placeholder {
   color: #bbb;
}
::-webkit-select-placeholder {
   color: #bbb;
}


:-moz-placeholder {
   color: #bbb;
}

.placeholder{
    color: #bbb; /* polyfill */
}

#signup input{
    background: #303339;
    margin: 5px 0;
    padding: 15px;
    width: 100%;
   /* width: 518px; IE7 and below */
    box-sizing: border-box;
    border: 1px solid #060607;
    border-radius: 3px;
    color: #8E9297;
}
#signup select{
    margin: 5px 0;
    padding: 15px;
    width: 100%;
     /* width: 518px;  IE7 and below */
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 3px;

}

#signup input:focus{
        outline: 0;
        border-color: #2653f5;
}
#signup select:focus{
        outline: 0;
        border-color: #aaa;
        box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
}

#signup button{
    margin: 20px 0 0 0;
    padding: 15px 8px;
    width: 100%;
    cursor: pointer;
    border: none;
    overflow: visible;
    color: #fff;
    font: bold 1.0rem arial, helvetica;
    background-color: #4649f1;
    transition: background-color .2s ease-out;
    border-radius: 2px;

}

#signup button:hover{
    background-color: #3436dd;
}

#signup button:active{
    position: relative;
    top: 3px;
    text-shadow: none;
    box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
}
    .main-container{
        min-height: 100%;
    }

    .sub-main_container{
        overflow:auto;
        padding-bottom: 50px;
    }


</style>
</head>

<script  type="text/javascript">
function myFunction() {
  alert("Hello! Dashboard created successfully! Welcome");
}
</script>
</style>
         <script  type="text/javascript">
function myemailFunction() {
  alert("Hello! Dashboard  Name/ID already exsist! Please try entering another Name/ID.");
}
</script>

<script  type="text/javascript">
function myemailnotFunction() {
  alert("Hello! Registration Denied! Please try again.");
}
</script>
<body>
<!------------------------Nav Menu----------------------------->
<?php include 'VengiNav.html' ?>
<!-----------||-----------Nav Menu-----------||---------------->

<div class="main-container">
    <div class="sub-main_container">

<!----------------------Dashboard Form------------------------>
    <form action="" method="post" id="signup" >
        <h1>Enter your dashboard information</h1>
        <input type="text" name="dbid"  placeholder="Dashboard ID" >
        <input type="text" name="dname" placeholder="Dashboard Name" >
        <!-- <input type="text" name="dcby"   placeholder="Dashboard Created By" > -->
        <!-- <input type="text" namme="dcdate"     placeholder="Dashboard Created Date" required=""> -->

        <button type="submit" name="submit" id="create-btn" >Create Dashboard</button>
<button type="submit" name="csubmit" id="cancel-btn">Cancel</button>
    </form>
<!-------------||-------Dashboard Form-----------||------------>
    </div>
</div>

<br />
<!--------Footer--------->
<div>
    <?php include 'VengiFooter.html' ?>
</div>
<?php
//-------Database connection----------
include 'VengiConnect.php';

//-----------collecting form data---------
if (isset($_POST['submit'])) {
    $dashid=$_POST['dbid'];
    $dashname=$_POST['dname'];

    $query= mysqli_query($connect, "SELECT * FROM `dashboard` WHERE DB_ID='$dashid' AND DB_NAME= '$dashname'");
    date_default_timezone_set("Jamaica");
    $_SESSION['logtime'] = date("d-M-Y h:i:sa");
    $ses_time = $_SESSION['logtime'];

//    ------------adding data from form to database-----------
    if(mysqli_num_rows($query) > 0) {
        echo '<script type="text/javascript">myemailFunction();</script>';
   }else{
        $username= $_SESSION['username'];
       $sql = "INSERT INTO `dashboard` (`DB_ID`,`DB_NAME`,`Created_by`,`Created_dt`)
   VALUES ('$dashid', '$dashname', '$username', '$ses_time');";
        $dash_user = "insert into dashboard_user (DB_ID, Username) Values ('$dashid','$username')";
       mysqli_query($connect, $sql);
       mysqli_query($connect, $dash_user);
       echo '<script type="text/javascript">myFunction();</script>';
       header("Location: Vengidashboardsuccess.php"); //put success page here
       exit;
   }
}

if (isset($_POST['csubmit'])) {
    header("Location: index.php"); //put success page here
    exit;
}
?>
</body>
</html>

<?php
session_start();
// include file you that accesses the database here
include 'VengiConnect.php';
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Dashboards List</title>
    <style>
        body{
            background-color:#4043ed;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100%;
        }

        .sub-main_container{
            overflow:auto;
            padding-bottom: 50px;
        }


        .list-container {
            width: 100%;
            background: #fff8ff;
            padding: 12px 12px;
            border-radius: 8px;
        }
        #header-title{
            text-align:center;
            color: dimgrey;
        }

button {
    appearance: auto;
    -webkit-writing-mode: horizontal-tb !important;
    text-rendering: auto;
    color: -internal-light-dark(black, white);
    letter-spacing: normal;
    word-spacing: normal;
    text-transform: none;
    text-indent: 0px;
    text-shadow: none;
    display: inline-block;
    text-align: center;
    align-items: flex-start;
    cursor: default;
    background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
    box-sizing: border-box;
    margin: 0em;
    font: 400 13.3333px Arial;
    padding: 1px 6px;
    border-width: 2px;
    border-style: outset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
    border-image: initial;
}

.bu{
    background-color:	#FF1493;
}

    /*--------------------2nd style-------------*/
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

        /*#signup::before,*/
        /*#signup::after {*/
        /*    content: "";*/
        /*    position: absolute;*/
        /*    bottom: -3px;*/
        /*    left: 2px;*/
        /*    right: 2px;*/
        /*    top: 0;*/
        /*    z-index: -1;*/
        /*    background: #fff;*/
        /*    border: 1px solid #ccc;*/
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
            margin: 5px 0;
            padding: 15px;
            width: 100%;
            /* width: 518px; IE7 and below */
            box-sizing: border-box;
            border: 1px solid #060607;
            border-radius: 2px;
            background: #303339;
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


    </style>
</head>

<body>
<!---------Nav Menu---------->
<?php include 'VengiNav.html' ?>

<div class="main-container">
    <div class="sub-main_container">

<?php
//--------------Add User Form----------------
if (isset($_POST['add'])) {
    $dashid=$_POST['add'];
    echo "<form action='' method='POST' id='signup' >
        <h1>Dashboard Add User</h1>
        <input type='text' name='username'  placeholder=' Enter Username' >
         
        <button type='submit' name='add_submit' value='$dashid' >Submit</button>   
        <button type='reset' >Reset</button> 
        <button type='submit' name='cancelbtn'>Cancel</button> 
    </form>";
//-----||-------Add User Form------||--------

    // $query= mysqli_query($connect, "SELECT * FROM `dashboard` WHERE DB_ID='$dashid' AND DB_NAME= '$dashname'");
  
}elseif(isset($_POST['add_submit'])){
    $id = $_POST['add_submit'];
    $username = $_POST['username'];
    $checksql = "select username from dashboard_user where username = '$username' and DB_ID = '$id' and active_flg = 'yes'";
    
    $user_checksql = "select username from users where username = '$username'"; //To only add users who already sign up
    $r_check = mysqli_query($connect,$checksql);
    if(mysqli_num_rows($r_check) > 0){
        echo "<script>alert('$username Already Exist');location='VengiDashBoardList.php';</script>";
    }
    else{
        $user_check = mysqli_query($connect, $user_checksql);
        if (mysqli_num_rows($user_check) > 0){
            $sql = "insert into dashboard_user (DB_ID, username) Values ('$id', '$username')";
            mysqli_query($connect,$sql);
            echo "<script>alert('$username Succesfully Added');location='VengiDashBoardList.php';</script>";
        }else{
            echo "<script>alert('$username not in the system');location='VengiDashBoardList.php';</script>";
        }
        
    }
}



elseif (isset($_POST['mod'])) {
    $dashid=$_POST['mod'];
    echo "<form action='' method='post' id='signup' >
        <h1>Dashboard Modify</h1>
        <input type='text' name='dashname'  placeholder=' Enter New Dashboard Name' >
         
        <button type='submit' name='mod_submit' value='$dashid' >Submit</button>   
        <button type='reset' >Reset</button> 
        <button type='submit' name='cancelbtn2' >Cancel</button> 
    </form>";

}elseif(isset($_POST['mod_submit'])){
    $id = $_POST['mod_submit'];
    $dash = $_POST['dashname'];
    if (empty($dash)){
        echo '<script type="text/javascript">alert("Oops! You forgot to fill the fields")</script>';
    }else{
        $sql = "update dashboard set db_name = '$dash' where DB_ID = '$id'";
        mysqli_query($connect, $sql);
        echo "<script>alert('Dashboard $id Successfully Updated to $dash');location='VengiDashBoardList.php';</script>";
    }
}

elseif (isset($_POST['del'])) {
    $dashid=$_POST['del'];
    $sql = "update dashboard_user set active_flg = 'no' where DB_ID = '$dashid'";
    mysqli_query($connect, $sql);
    echo "<script>alert('$dashid Successfully Deleted');location='VengiDashBoardList.php';</script>";
}


//----------Cancel Buttons----------
if(isset($_POST['cancelbtn'])){
    header("Location: VengiDashBoardList.php");
    exit;
}
if(isset($_POST['cancelbtn2'])){
    header("Location: VengiDashBoardList.php");
    exit;
}

?>

<script  type="text/javascript">
function myemailnotFunction() {
  alert("Hello! Registration Denied! Please try again.");
}
</script>
    </div>
</div>

<!-----Footer------>
<div>
    <?php include 'VengiFooter.html' ?>
</div>

</body>
</html>

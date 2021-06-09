<?php
session_start();
ob_start();
include 'VengiConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Task Form</title>
    <meta charset="UTF-8" />
<style>

    body{
        background-color:#4043ed;
    }

    #signup {
        width: 450px;
        height: auto;
        margin: 100px auto 50px auto;
        padding: 20px;
        position: relative;
        background: #36393F;
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
    border-radius: 2px;
    background: #303339;
    border: 1px solid #060607;
    color: #8E9297;
 }

    #signup input:focus{
        outline: 0;
        border-color: #2653f5;
    }
    #signup select:focus{
        outline: 0;
        border-color: #2653f5;
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

    #signup input[type="date"]{
        color: #8E9297;
    }
    h3{
        color: #8E9297;
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
    <script  type="text/javascript">
    function myemailFunction() {
      alert("Hello! Dashboard  Name/ID already exist! Please try entering another Name/ID.");
    }
    </script>

    <script  type="text/javascript">
    function myemailnotFunction() {
      alert("Hello! Registration Denied! Please try again.");
    }
    </script>

<body>
<!-------------------Nav Menu---------------------->
<?php include 'VengiNav.html' ?>
<!--------||----------Nav Menu----------||---------->

<div class="main-container">
    <div class="sub-main_container">

    <form action="" method="post" id="signup" >
        <h1>Enter your task information</h1>
        <input type="text" name="tid"  placeholder="Task ID">
        <input type="text" name="tname" placeholder="Task Name">
        <select id="dashboards" name="pid" >
            <option style="color:#bbb;"  value="Choose Project">Choose Project</option>
            <!-- --------Accessing Projects-------- -->
            <?php
            $sql = "SELECT * FROM project;"; //insert project table here between 'From' and ';'
            $query = mysqli_query($connect, $sql);
            $querycheck = mysqli_num_rows($query);
            if ($querycheck) {
                while ($col=mysqli_fetch_assoc($query)) {
                    $opt=$col['P_id'];
                    echo "<option value='$opt'>$opt</option>";
                }
            }
            ?>
        </select>

        <select id="setstatus"  name="status" >
            <option style="color:#bbb;" value="Set status">Set Status</option>
            <option value="New">New</option>
            <option value="Inprogress">Inprogress</option>
            <option value="Onhold">Onhold</option>
            <option value="Completed">Completed</option>
            <option value="Deployed">Deployed</option>
        </select>
        <h3>Enter Start Date:</h3>
        <input type="date" name="startdt" placeholder="Start Date" >
        <h3>Enter End Date:</h3>
        <input type="date" name="enddt" placeholder="End Date" >
        <!-- <input type="text" namme="dcdate"     placeholder="Dashboard Created Date" required=""> -->
        <button type="submit" name="submit" >Create Task</button>
<button type="submit" name="csubmit" >Cancel</button>
    </form>

<?php
//--------database connection-----------
include 'VengiConnect.php';

//--------collecting form data---------
if (isset($_POST['submit'])) {
    $taskid=$_POST['tid'];
    $taskname=$_POST['tname'];
    $projectid=$_POST['pid'];
    $status=$_POST['status'];
    $startdt=$_POST['startdt'];
    $enddt=$_POST['enddt'];


    $query= mysqli_query($connect, "SELECT * FROM `task` WHERE Task_id='$taskid' AND Task_Name= '$taskname'");
    date_default_timezone_set("Jamaica");
    $_SESSION['logtime'] = date("d-M-Y h:i:sa");
    $ses_time = $_SESSION['logtime'];
    if(mysqli_num_rows($query) > 0) {
        echo '<script type="text/javascript">myemailFunction();</script>';
   }else{
    $username= $_SESSION['username'];
       $sql = "INSERT INTO `task` (`Task_id`,`Task_Name`,`Project_Id`,`Status`,`Start_dt`,`End_dt`,`Created_dt`,`Created_by`)
   VALUES ('$taskid', '$taskname', '$projectid', '$status', '$startdt', '$enddt', '$ses_time','$username');";
              $task_user = "insert into task_user (Task_id, Username) Values ('$taskid','$username')";
      mysqli_query($connect, $sql);
      mysqli_query($connect, $task_user);
       echo '<script type="text/javascript">myFunction();</script>';
       header("Location: VengiTaskCreatedSuccessful.php"); //put success page here
       exit;
   }
}

if (isset($_POST['csubmit'])) {
    header("Location: index.php"); //put success page here
    exit;
}
?>
    </div>
</div>

<!-------Footer--------->
<div>
<?php include 'VengiFooter.html' ?>
</div>

</body>
</html>

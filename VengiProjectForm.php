
<?php
session_start();
ob_start();

 include 'VengiConnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Project</title>

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

#signup button:active{
    position: relative;
    top: 3px;
    text-shadow: none;
    box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
}

#signup input[type="date"]{
    color: #8E9297;
}

h3{
    color: #8E9297;
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
  alert("Hello! Project created successfully! Welcome");
}
</script>

<script  type="text/javascript">
function myemailFunction() {
  alert("Hello! Project  Name/ID already exist! Please try entering another Name/ID.");
}
</script>

<script  type="text/javascript">
function myemailnotFunction() {
  alert("Hello! Registration Denied! Please try again.");
}
</script>

<body>
<div class="main-container">
    <div class="sub-main_container">

<!------------------------------Nav Bar----------------------------------->
<?php include 'VengiNav.html' ?>
<!-----------||-----------------Nav Bar---------------||------------------>
<form id="signup" action="" method="POST" >
        <h1>Enter your project information</h1>
        <input type="text" name="pid" placeholder="Project ID" >
        <input type="text" name="pname" placeholder="Project name" >
        <select id="dashboards" name="dbid" >
            <option style="color:#bbb;"  value="Choose Dashboard">Choose Dashboard</option>
            <!-- --------Accessing Dashboards-------- -->
            <?php
            $sql = "SELECT * FROM dashboard;"; //insert project table here between 'From' and ';'
            $query = mysqli_query($connect, $sql);
            $querycheck = mysqli_num_rows($query);
            if ($querycheck) {
                while ($col=mysqli_fetch_assoc($query)) {
                    $opt=$col['DB_ID'];
                    echo "<option value='$opt'>$opt</option>";
                }
            }
            ?>

            <!-- <option value="DB01">DB01</option>
            <option value="DB02">DB02</option>
            <option value="DB03">DB03</option> -->
        </select>

        <h3>Enter Start Date:</h3><input type="date" name="datein" id="datein" placeholder="date in" >
        <h3>Enter End Date:</h3><input type="date" name="dateout" id="dateout" placeholder="date out" >

        <select id="setstatus"  name="status" >
            <option style="color:#bbb;" value="Set status">Set Status</option>
            <option value="New">New</option>
            <option value="Inprogress">Inprogress</option>
            <option value="Onhold">Onhold</option>
            <option value="Completed">Completed</option>
            <option value="Deployed">Deployed</option>
        </select>
        <button type="submit" name="submit" id="create-btn" >Create Project</button>
        <button type="submit" name="csubmit"  id="cancel-btn" >Cancel</button>
    </form>
    </div>
</div>

<!----------Footer--------->
<div>
    <?php  include 'VengiFooter.html' ?>
</div>


<?php
//-------database connection ------
include 'VengiConnect.php';

//-------collecting form data----------
if (isset($_POST['submit'])) {
    $projectid=$_POST['pid'];
    $projectname=$_POST['pname'];
    $dashid=$_POST['dbid'];
    $start=$_POST['datein'];
    $end=$_POST['dateout'];
    $projectstaus=$_POST['status'];



    $query= mysqli_query($connect, "SELECT * FROM `project` WHERE P_id='$projectid' AND P_Name= '$projectname'");
    date_default_timezone_set("Jamaica");
    $_SESSION['logtime'] = date("d-M-Y h:i:sa");
    $ses_time = $_SESSION['logtime'];

    if(mysqli_num_rows($query) > 0) {
        echo '<script type="text/javascript">myemailFunction();</script>';
   }else{
// -----------inserting form data into database----------------
       $username= $_SESSION['username'];
       $sql = "INSERT INTO project (P_id, P_Name, DB_ID, P_start_dt, P_end_id, P_status, Created_dt, Created_by)
       Values ('$projectid', '$projectname', '$dashid', '$start' , '$end', '-$projectstaus', '$ses_time', '$username'); ";
       $project_user = "insert into project_user (P_id, Username) Values ('$projectid','$username')";
      mysqli_query($connect, $sql);
      mysqli_query($connect, $project_user);
       echo '<script type="text/javascript">myFunction();</script>';
       header("Location: VengiProjectSuccess.php"); //put success page here
       exit;
   }
}

//---------form cancel btn--------
if (isset($_POST['csubmit'])) {
    header("Location:index.php"); //put success page here
    exit;
}

?>
</body>
</html>

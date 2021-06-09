
<?php
// ob_start();
?>
<!DOCTYPE html>
<html>

<style>
    #signup {
    width: 450px;
    height: auto;
    margin: 100px auto 50px auto;
    padding: 20px;
    position: relative;
    background: #fff url(data:image/png;base64,iVBORw0K[...]CYII=);
    border: 1px solid #ccc;
    border-radius: 3px;
}

#signup::before,
#signup::after {
    content: "";
    position: absolute;
    bottom: -3px;
    left: 2px;
    right: 2px;
    top: 0;
    z-index: -1;
    background: #fff;
    border: 1px solid #ccc;
}

#signup::after {
    left: 4px;
    right: 4px;
    bottom: -5px;
    z-index: -2;
    box-shadow: 0 8px 8px -5px rgba(0,0,0,.3);
}
#signup h1 {
    position: relative;
    font: italic 1em/3.5em 'trebuchet MS',Arial, Helvetica;
    color: #999;
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
    border: 1px solid #ccc;
    border-radius: 3px;
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
        border-color: #aaa;
    box-shadow: 0 2px 1px rgba(0, 0, 0, .3) inset;
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
    border: 1px solid #2493FF;
    overflow: visible;
    display: inline-block;
    color: #fff;
    font: bold 1.4em arial, helvetica;
    text-shadow: 0 -1px 0 rgba(0,0,0,.4);
    background-color: #2493ff;
    background-image: linear-gradient(top, rgba(255,255,255,.5), rgba(255,255,255,0));
    transition: background-color .2s ease-out;
    border-radius: 15px;
    box-shadow: 0 2px 1px rgba(0, 0, 0, .3),
                0 1px 0 rgba(255, 255, 255, .5) inset;
}

#signup button:hover{
    background-color: #7cbfff;
        border-color: #7cbfff;
}

#signup button:active{
    position: relative;
    top: 3px;
    text-shadow: none;
    box-shadow: 0 1px 0 rgba(255, 255, 255, .3) inset;
}

</style>
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
</style>

</style>
<body>
    <form action="" method="post" id="signup" style="background-color: rgb(240, 230, 230);"  >
        <h1>Enter your dashboard information</h1>
        <input type="text" name="dbid"  placeholder="DB_ID" >
        <input type="text" name="username" placeholder="Username" >
      <select id="setstatus"  name="status" placeholder="Set status">
            <option style="color:#bbb;" value="Set status">UserStatus</option>
            <option value="New">Active</option>
            <option value="Inprogress">Inactive</option>
        </select>

        <button type="submit" name="submit" >Share</button>
<button type="submit" name="csubmit" style="background-color: green;">Cancel</button>
    </form>
</body>
</html>

<?php



include 'VengiConnect.php';


if (isset($_POST['submit'])) {
    $dashid=$_POST['dbid'];
    $username=$_POST['username'];
    $Activeflg=$_POST['status'];



    $query= mysqli_query($connect, "SELECT * FROM `dashboard_user` WHERE DB_ID='$dashid' AND Username= '$username'");

    if(mysqli_num_rows($query) > 0) {
        echo '<script type="text/javascript">myemailFunction();</script>';
   }else{
       $sql = "INSERT INTO `dashboard_user` (`DB_ID`,`Username`,`Active_flg`)
   VALUES ('$dashid','$username', '$Activeflg');";
       mysqli_query($connect, $sql);
      echo '<script type="text/javascript">myFunction();</script>';
    //    header("Location: Vengidashboardsuccess.php"); //put success page here
    //    exit;
   }
}



if (isset($_POST['csubmit'])) {

    header("Location:index.php"); //put success page here
    exit;
}

?>

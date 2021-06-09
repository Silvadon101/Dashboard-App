<?php

// Code to stop userfrom going to welcome page without logging in after log out
session_start();
session_regenerate_id();

ob_start();
if (!isset($_SESSION['username'])){
    header("Location: VengiForm.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="welcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Welcome <?php echo $_SESSION['username']; ?></title>

<!--<style>-->
<!--.card_flex > .card1{-->
<!--    background: #50db3f;-->
<!--    color: #3ef726da;-->
<!---->
<!--}-->
<!--.dotted1 {-->
<!--    border: 4px dotted rgb(132 21 178);-->
<!--    padding: 15px 15px;-->
<!--}-->
<!---->
<!---->
<!--.dotted1 a {-->
<!--    text-decoration: none;-->
<!--    color: #852ca9;-->
<!--}-->
<!---->
<!--btn1 {-->
<!--    padding: 16px 16px;-->
<!--    background: #9d48c8;-->
<!--    color: #d1e9f1;-->
<!--}-->
<!---->
<!--.btn1 {-->
<!--    padding: 16px 16px;-->
<!--    background: #7e189f;-->
<!--    color: #d1e9f1;-->
<!---->
<!--}-->
<!---->
<!--.card_flex > .card2 {-->
<!--    background: #171120;-->
<!--}-->
<!---->
<!--.card_flex > .card3 {-->
<!--    background: #e551d3;-->
<!--}-->
<!---->
<!--.dotted3 {-->
<!--    border: 4px dotted #3107b4;-->
<!--    padding: 15px 15px;-->
<!--}-->
<!---->
<!--.dotted3 a {-->
<!--    text-decoration: none;-->
<!--    color: #3107b4;-->
<!--}-->
<!---->
<!---->
<!--element.style {-->
<!--}-->
<!--.btn3 {-->
<!--    padding: 16px 16px;-->
<!--    background: #3107b4;-->
<!--    color: #ddffec;-->
<!--}-->
<!---->
<!--.card_container {-->
<!--    background: #121576;-->
<!--}-->
<!---->
<!--.main_container {-->
<!--    margin-left: 250px;-->
<!--    padding: 20px 35px;-->
<!--    background-color: rebeccapurple;-->
<!--}-->
<!---->
<!--#footer {-->
<!--    display: flex;-->
<!--    justify-content: center;-->
<!--    align-items: center;-->
<!--    height: 8vh;-->
<!--    /* width: 100%; */-->
<!--    background: #7e189f;-->
<!--    font-size: 18px;-->
<!--    margin-left: 250px;-->
<!--    /* margin-top: 25vh; */-->
<!--}-->
<!--    </style>-->

</head>

<body>

<!------------------------Nav Menu----------------------------->
        <header>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                Members: Alafia, Romayne, Shanelle, Travis
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>

        <div class="nav-links">
            <a href="index.php" >Home</a>
            <a href="VegiLogout.php">Logout</a>

        </div>
    </div>
        </header>
<!----------||------------Nav Menu-------------||-------------->
<!--    <center>-->
<!--        <br>-->
<!--        <br>-->
<!--        <img src="./w3.jpg" height="350px" width="600px">-->
<!--    </center>-->

<main>
    <!-----------------Side Bar---------------------->
            <div class="sidebar">
                <center>
                    <img src="./user-icon copy.jpg" alt="" class="profile_img"  />
                    <h4><?php echo $_SESSION['username']; ?></h4> <!-- place session['name'] here for login user between the h4 tags-->
                </center>
                    <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
                    <!-- <a href="#"><i class="fas fa-layer-group"></i><span>Components</span></a> -->
                    <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
<!--                    <a href="#"><i class="fas fa-wrench"></i><span>Settings</span></a>-->
            </div>
    <!-------||--------Side Bar----------||---------->
<!-- ---------------------Main Content-------------------   -->
    <div class="main_container">
        <div class="sub-main_container">

        <div class="main_greeting">
            <h1>Hi <?php echo $_SESSION['username']; ?>!</h1>   <!--place session['name'] here between 'Hi' and '!' -->

            <p>Welcome to your dashboard</p>
        </div>

        <!-- ----------- Dashboard Cards----------->
        <div class="card_container">
            <div class="card_sub">
                <div class="card_flex">
                    <div class="card1">
                        <div class="dotted1">
                        <a href="VengiDashBoardList.php"><h1>Dashboards</h1></a>
                        <a href="VengiDashboardForm.php" ><button class="btn1"><i class="fas fa-plus" style="margin-right: 10px;font-size:20px"></i>New Dashboard</button></a>
                        </div>
                    </div>
                    <div class="card2">
                        <div class="dotted2">
                        <a href="VengiProjectList.php"><h1>Projects</h1></a>
                        <a href="VengiProjectForm.php"><button class="btn2"><i class="fas fa-plus" style="margin-right: 10px;font-size:20px"></i>New Project</button></a>
                        </div>
                    </div>
                    <div class="card3">
                        <div class="dotted3">
                        <a href="VengiTaskList.php"><h1>Tasks</h1></a>
                        <a href="VengiTaskForm.php"><button class="btn3"><i class="fas fa-plus" style="margin-right: 10px;font-size:20px"></i>New Task</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

<!-- ---------||----------Main Content-------||----------   -->
</main>


</body>
<footer id="footer">
    <h6 style="color:#fff">&copy;Romayne, Alafia, Shanelle and Travis 2021. All Rights Reserved.</h6>
</footer>

</html>

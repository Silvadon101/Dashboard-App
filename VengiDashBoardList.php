<?php
// include file you that accesses the database here
session_start();
ob_start();
include 'VengiConnect.php';
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
        table.Project {
            font-family: Tahoma;
            background-color: #fff8ff;
            width: 100%;
            text-align: center;
        }


        table.Project th {
            border: 0;
            padding: 15px 16px;
        }

        table.Project td {
            border: 2.5px dotted #22ba4b;
            padding: 15px 16px;
        }


        table.Project thead {
            background: #fff8ff;
        }

        table.Project thead th {
            font-size: 25px;
            font-weight: bold;
            color: #f65aee;
            text-align: center;
            /*border-radius: 6px;*/
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .list-container {
            width: 100%;
            background: #fff8ff;
            padding: 12px 12px;
            border-radius: 8px;
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
    margin: 0;
    font: 400 13.3333px Arial;
    padding: 1px 6px;
    border-width: 2px;
    border-style: outset;
    border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
    border-image: initial;
}

.bu{
    padding: 12px 12px;
    background: #23272a;
    color: #c22cec;
    border-radius: 150px;
    border: none;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: .3s;
    transition-property: box-shadow,background-color;
}

.bu:hover{
    box-shadow: 2px 3px 18px 2px rgba(0, 0, 0, 0.25);
    background-color: #4e4e4e;
}

body{
    background-color:#4043ed;
}

.list-container {
    background:#292841;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.63), 0 -6px 20px rgba(0, 0, 0, 0.63);
}

table.Project {
    background-color: #2ae085;
    padding: 12px 12px;
    border-radius: 6px;
}

table.Project thead {
    background: #4bf1a2;
}
table.Project thead th {
    color: #15AD75;

}

table.Project td {
    border: 2.5px dotted #15AD75;
    padding: 15px 16px;
    font-size: 22px;
    color: #ad18d3;
}

/*.bu {*/
/*    background-color: #b063d7;*/
/*    font-size: 18px;*/
/*}*/

#header-title {
    text-align: center;
    color: #10f121;
}

h2{
    font-size: 45px;
}

a{
    text-decoration: none;
    color: #953cb7;
}

a:hover{
    text-decoration: underline;
}
        /*---------footer bottom stick code---------*/
        .main-container{
            min-height: 100%;
        }

        .sub-main_container{
            overflow:auto;
            padding-bottom: 50px;
        }

    </style>
</head>

<body>
<!--------------------------Nav Menu---------------------------->
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
<!----------||--------------Nav Menu----------||---------------->

    <div class="main-container">
        <div class="sub-main_container">
        <!-- -----------------------Dashboard List-------------------- -->
            <div id="header-title">
                <h2>Dashboards</h2>
            </div>
            <div class="list-container">
                <table class="Project">
                    <thead>
                        <tr>
                            <th>Dashbord_ID</th>
                            <th>Dashboard_Name</th>
                            <th>Created_by</th>
                            <th>Created_date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $ulog = $_SESSION['username'];
                    $sql = "SELECT distinct dashboard.*, dashboard_user.active_flg FROM dashboard join dashboard_user on dashboard.DB_ID=dashboard_user.DB_ID WHERE dashboard_user.Username = '$ulog' and dashboard_user.active_flg = 'yes';"; //insert project table here between 'From' and ';'
                    $query = mysqli_query($connect, $sql);
                    $querycheck = mysqli_num_rows($query);
                    if ($querycheck) {
                        echo "<form action='VengiDBActionForm.php' method='post'>";
                        while ($col = mysqli_fetch_assoc($query)) {
                            $id = $col['DB_ID'];
                            echo "<tbody>";
                            echo  "<tr>";
                            echo "<td> <a href= 'VengiLink.php?id=$id'>$id</a></td>";
                            echo "<td> " . $col['DB_NAME'] . "</td> ";
                            echo "<td> " . $col['Created_by'] . "</td> ";
                            echo "<td> " . $col['Created_dt'] . "</td> ";
                            if ($ulog == $col['Created_by']) {
                                echo "<td><button class='bu' value='$id' name='add'>Add User</button> <button name='mod' value='$id' class='bu'>Modifty</button> <button name='del' value='$id' class='bu'>Delete</button></td>" ;
                            }else{
                                echo "<td>NOT VERIFIED USER</td";
                                // echo "<td><button class='bu' value='$id' name='add' disabled>Add User</button> <button name='mod' value='$id' class='bu' disabled>Modifty</button> <button name='del' value='$id' class='bu' disabled>Delete</button></td>" ;
                            }
                            echo "</tr>";
                            echo "</tbody>";
                        }echo "</form>";
                    }
                    ?>

                </table>
            </div>
 <!-- ---------||------------Dashboard List-------||----------- -->

        <?php include 'VengiDBbtn.php' ?>
        </div>
    </div>
<!------------Footer------------>
<?php include 'VengiFooter.html' ?>
</body>

</html>

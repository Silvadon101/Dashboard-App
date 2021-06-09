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
    <title>Projects List</title>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body{
            background-color:#4043ed;
        }

        table.Project {
            background-color: #FFE75C;
            width: inherit;
            text-align: center;
            padding: 12px 12px;
            border-radius: 6px;
        }


        table.Project th {
            padding: 15px 16px;
        }

        table.Project td {
            border: 2.5px dotted #FFC619;
            padding: 15px 16px;
            font-size: 17px;
            color: #606060;
            border-radius: 6px;
        }


        table.Project thead {
            background: #ffeba2;
        }

        table.Project thead th {
            font-size: 19px;
            font-weight: bold;
            color: #ffb219;
            text-align: center;
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
            background:#292841;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.63), 0 -6px 20px rgba(0, 0, 0, 0.63);
            padding: 12px 12px;
            border-radius: 8px;
            overflow: auto;
        }

        .bu{
            padding: 12px 0;
            padding-right: 20px;
            padding-left: 20px;
            margin: 8px 8px;
            background: #23272a;
            color: #f66880;
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

        #header-title{
            text-align:center;
            color: #FF8C19;
        }

        h2{
            font-size: 45px;
            margin-bottom: 35px;
        }

        .DB_btn{
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<?php include 'VengiNav.html' ?>

<br><br><br>
    <div class="main-container">
        <div class="sub-main_container">
        <div id="header-title">
                <h2>Projects</h2>
            </div>
            <div class="list-container">
                <table class="Project">
                    <thead>
                        <tr>
                            <th>Dashbord_ID</th>
                            <th>Project_ID</th>
                            <th>Project_Name</th>
                            <th>Status</th>
                            <th>Start_Date</th>
                            <th>End_Date</th>
                            <th>Created_date</th>
                            <th>Created_By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $ulog = $_SESSION['username'];
                    $sql = "SELECT distinct project.*, project_user.active_flg FROM project join project_user on project.P_id=project_user.P_id WHERE project_user.Username = '$ulog' and project_user.active_flg = 'yes';";  //insert project table here between 'From' and ';'
                    $query = mysqli_query($connect, $sql);
                    $querycheck = mysqli_num_rows($query);
                    if ($querycheck) {
                        echo "<form action='VengiProActionForm.php' method='post'>";
                        while ($col = mysqli_fetch_assoc($query)) {
                            $id = $col['P_id'];
                            echo "<tbody>";
                            echo  "<tr>";
                            echo "<td> " . $col['DB_ID']  . "</td>";
                            echo "<td> " . $col['P_id'] . "</td>";
                            echo "<td> " . $col['P_Name'] . "</td> ";
                            echo "<td> " . $col['P_status'] . "</td> ";
                            echo "<td> " . $col['P_start_dt'] . "</td> ";
                            echo "<td> " . $col['P_end_id']  . "</td> ";
                            echo "<td> " . $col['Created_dt'] . "</td> ";
                            echo "<td> " . $col['Created_by'] . "</td> ";
                            if ($ulog == $col['Created_by']) {
                                echo "<td><button class='bu' value='$id' name='add'>Add User</button> <button name='mod' value='$id' class='bu'>Modifty</button> <button name='del' value='$id' class='bu'>Delete</button></td>" ;
                            }else{
                                echo "<td>ACTION RESTRICTED</td>";
                                // echo "<td><button class='bu' value='$id' name='add' disabled>Add User</button> <button name='mod' value='$id' class='bu' disabled>Modifty</button> <button name='del' value='$id' class='bu' disabled>Delete</button></td>" ;
                            }
                            echo "</tr>";
                            echo "</tbody>";
                        }
                        echo "</form>";
                    }
                    ?>
                    
                </table>
            </div>
<div class="DB_btn">
    <?php include 'VengiDBbtn.php' ?>
</div>
        </div>
    </div>
<!--  ----------Footer------------- -->
    <?php include 'VengiFooter.html'  ?>
</body>

</html>
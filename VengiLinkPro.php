<?php
session_start();

if (isset($_GET['id'])) {
    $_SESSION['P_id'] = $_GET['id'];
}

include 'VengiConnect.php';
?>


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
            border: 3px dotted #f65aee;
            padding: 15px 16px;
        }

        table.Project td {
            border: 2.5px dotted #f65aee;
            padding: 15px 16px;
            font-size: 17px;
            color: #888888;
        }


        table.Project thead {
            background: #fff8ff;
        }

        table.Project thead th {
            font-size: 19px;
            font-weight: bold;
            color: #f65aee;
            text-align: center;
            border-radius: 6px;
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
        #header-title{
            text-align:center;
            color: dimgrey;
        }

          box-sizing: border-box;
    color: red;
}
user agent stylesheet
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
    </style>
</head>

<body>
<header>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                TaskPro
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


        <br><br><br>
    <div class="main-container">
        <div>
            <div id="header-title">
                <h2>Task Under Selected Project</h2>
            </div>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project <?php echo $_SESSION['P_id'] ?></title>
    <style>
        table.Project {
            font-family: Tahoma;
            background-color: #fff8ff;
            width: 100%;
            text-align: center;
        }


        table.Project th {
            border: 3px dotted #f65aee;
            padding: 15px 16px;
        }

        table.Project td {
            border: 2.5px dotted #f65aee;
            padding: 15px 16px;
            font-size: 17px;
            color: #888888;
            border-radius: 6px;
        }


        table.Project thead {
            background: #fff8ff;
        }

        table.Project thead th {
            font-size: 19px;
            font-weight: bold;
            color: #f65aee;
            text-align: center;
            border-radius: 6px;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .list-container {
            width: 100%;
            background: #fddcf9;
            padding: 12px 12px;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div>
            <div class="list-container">
                <table class="Project">
                    <thead>
                        <tr>
                            <th>Project_Id</th>
                            <th>Task_id</th>
                            <th>Task_Name</th>
                            <th>Status</th>
                            <th>Start_Date</th>
                            <th>End_Date</th>
                            <th>Created_date</th>
                            <th>Created_by</th>
                        </tr>
                    </thead>
                    <?php
                    // $connect = new mysqli('localhost','root','','') or die('Unable To Connect');
                    $userdb = $_SESSION['P_id'];
                    $sql = "SELECT * FROM task WHERE Project_Id = '$userdb';"; //insert project table here between 'From' and ';'
                    $query = mysqli_query($connect, $sql);
                    $querycheck = mysqli_num_rows($query);
                    if ($querycheck) {
                        while ($col = mysqli_fetch_assoc($query)) {
                            echo "<tbody>";
                            echo  "<tr>";
                            echo "<td> " . $col['Project_Id']  . "</td>";
                            echo "<td> " . $col['Task_id']  . "</td>";
                            echo "<td> " . $col['Task_Name'] . "</td> ";
                            echo "<td> " . $col['Status'] . "</td> ";
                            echo "<td> " . $col['Start_dt'] . "</td> ";
                            echo "<td> " . $col['End_dt']  . "</td> ";
                            echo "<td> " . $col['Created_dt'] . "</td> ";
                            echo "<td> " . $col['Created_by'] . "</td> ";
                            echo "</tr>";
                            echo "</tbody>";
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>

</body>

</html>

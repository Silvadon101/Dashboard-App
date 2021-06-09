<?php
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
    
    <title>Tasks List</title>
    <style>
        body{
            background : #4043ED;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        table.Project {
            background-color: #FF78B9;
            padding: 12px 12px;
            border-radius: 6px;
        }


        table.Project th {
            border: none;
            padding: 15px 16px;
        }

        table.Project td {
            border: 2.5px dotted #F551A0;
            padding: 15px 16px;
            font-size: 18px;
            color: #406bed;
        }


        table.Project thead {
            background: #ffb8df;
        }

        table.Project thead th {
            font-size: 22px;
            font-weight: bold;
            color: #F551A0;
            text-align: center;
            /*border-radius: 6px;*/
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .list-container {
            background:#292841;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.63), 0 -6px 20px rgba(0, 0, 0, 0.63);
            width: 100%;
            padding: 12px 12px;
            border-radius: 8px;
        }

        .bu{
            padding: 12px 12px;
            background: #23272a;
            color: #567ffc;
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
            color: #EB459F;
            margin-bottom: 35px;
        }
        h2{
            font-size: 45px;
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

<body>

<!------------------------Nav Menu------------------------->
<?php include 'VengiNav.html' ?>
<!----------||------------Nav Menu----------||------------->
    <div class="main-container">
        <div class="sub-main_container">

<!--------------------------Task List---------------------->
            <div id="header-title">
                <h2>Tasks</h2>
            </div>
            <div class="list-container">
                <table class="Project">
                    <thead>
                        <tr>
                            <th>Task_Id</th>
                            <th>Task_Name</th>
                            <th>Project_Id</th>
                            <th>Status</th>
                            <th>Start_Dt</th>
                            <th>End_Dt</th>
                            <th>Created_Dt</th>
                            <th>Created_By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
                    $ulog = $_SESSION['username'];
                    // $sql = "SELECT * FROM task WHERE Created_by = '$ulog';"; Romaine//insert project table here between 'From' and ';'
                    $sql = "SELECT distinct task.*, task_user.active_flg FROM task join task_user on task.Task_id=task_user.Task_id WHERE task_user.Username = '$ulog' and task_user.active_flg = 'yes';"; 
                    $query = mysqli_query($connect, $sql);
                    $querycheck = mysqli_num_rows($query);
                    if ($querycheck) {
                        echo "<form action='VengiTaskActionForm.php' method='POST'>";
                        while ($col = mysqli_fetch_assoc($query)) {
                            $id = $col['Task_id'];
                            echo "<tbody>";
                            echo  "<tr>";
                            echo "<td> " . $col['Task_id'] . "</td>";
                            echo "<td> " . $col['Task_Name'] . "</td> ";
                            echo "<td> " . $col['Project_Id'] . "</td> ";
                            echo "<td> " . $col['Status'] . "</td> ";
                            echo "<td> " . $col['Start_dt'] . "</td> ";
                            echo "<td> " . $col['End_dt'] . "</td> ";
                            echo "<td> " . $col['Created_dt'] . "</td> ";
                            echo "<td> " . $col['Created_by'] . "</td> ";
                            echo "<td><button name='mod' value='$id' class='bu'>Modifty</button></td>" ;
                            echo "</tr>";
                            echo "</tbody>";
                        }
                        echo "</form>";
                    }
                    ?>
                </table>
            </div>
<!----------||--------------Task List---------||----------->
            <?php  include 'VengiDBbtn.php' ?>
        </div>
    </div>

<!---------Footer--------->
<?php  include 'VengiFooter.html' ?>
</body>

</html>
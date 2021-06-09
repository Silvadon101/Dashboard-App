<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Project Success</title>

    <style>
        *{
            padding: 0;
            margin: 0;
        }

        body{
            background-color:#4043ed;
            font-family: 'Poppins';
        }

        .container{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #inside{
            width: 50%;
            height: 30vh;
            background: #36393F;
            margin-top: 12rem;
            border-radius: 6px;
            padding: 15px 15px;
            box-shadow:5px 5px 13px rgba(24, 24, 24, 0.36), -5px -5px 13px rgba(45, 45, 45, 0.35);
        }

        h1{
            text-align: center;
            padding-top: 50px;
            font-size: 35px;
            color: #f6865a;
        }

        #btn-style{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #btn{
            padding-bottom: 12px;
            padding-top: 12px;
            padding-left: 25px;
            padding-right: 25px;
            border: none;
            background-color: #ffffff;
            color: #000000;
            font-weight: 500;
            font-size: 18px;
            cursor: pointer;
            border-radius: 150px;
            margin: 6px 6px;
            transition: .5s;
            transition-property: color, box-shadow;
        }

        #btn:hover{
            color: #4043ED;
            box-shadow: 2px 3px 18px 2px rgba(0, 0, 0, 0.35);
        }

        .btn-arrow{
            margin-right: 10px;
        }

    </style>
</head>
<body>
    <?php
    if(isset($_POST['dashboard'])){
        header("Location: index.php"); // insert dashboard page here!
        exit;
    }
    ?>
    <div class="container">
        <div id="inside">
            <h1>Project Succesfully Created</h1>
            <div id="btn-style">
                <form action="" method="POST" >
                    <button type="submit" name="dashboard" id="btn"><i class="fas fa-arrow-left btn-arrow"></i>Back to Dashboard</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

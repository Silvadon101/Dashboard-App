<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<style>
        #btn-style{
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 55px;
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
            box-shadow: 2px 3px 18px 2px rgba(0, 0, 0, 0.32);
        }

        .btn-arrow{
            margin-right: 10px;
        }

</style>

<div id="btn-style">
    <form action="" method="POST">
        <button type="submit" name="dashboard" id="btn"><i class="fas fa-arrow-left btn-arrow" ></i>Back to Dashboard</button>
    </form>
</div>

<?php
    if(isset($_POST['dashboard'])){
        header("Location: index.php"); // insert dashboard page here!
        exit;
    }
    ?>

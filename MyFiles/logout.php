<?php
    session_start();
    if(isset($_POST['logout'])) session_destroy();
?>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        #logout{
            background: #0066A2;
            color: white;
            border-style: unset;
            border-color: #0066A2;
            height: 80px;
            width: 120px;
            font: bold 15px arial,sans-serif;
            text-shadow: none;
        }
        #logout:hover{
            background: #0a19a7;
            border-radius: 15px;
        }
        #logBox:hover{
            background-color: rgba(0, 0, 0, 0.417);
        }
        #logBox{
            margin-top: 15%;
            height: 6cm;
            width: 10cm;
            border-radius: 15px;
        }
    </style>
</head>
<body style='background-color: rgba(255, 255, 255, 0.58);'>
    <form action="logout.php" method="post">
        <center>
        <div id='logBox'>
            <center>
                <br><br>
                <h1>Are you sure you want to <b>logout</b> ?</h1><br>
                <a style = "text-decoration: none; border-radius: 15px; padding: 7px; decoration: none;"href="login.php" target='_parent' name="logout" id='logout'>Logout</a>
            </center>
        </div>
        </center>
    </form>
</body>
</html>
<?php
    session_start();
    if(!isset($_SESSION['type'])) header('location: login.php');
?>
<html lang="en">
<head>
    <title>Index Page</title>
    <style>
        body{
        <?php
          if($_SESSION['type']=='admin') echo "background-image: url(adminlogin1.jpg);";
          else echo "background-image: url(gmulogin.jpg);";  
        ?>
          /* background-image: url(gmulogin.jpg); */
          background-position: center;
          background-size: 100% 100%;
        }
    </style>
</head>
<body style="height: 96%;">
    <iframe src="menu.php" frameborder="0px" height = "100%" width="25%"></iframe>
    <iframe src="show.php" frameborder="0px" height = "100%" width="74.6%" name = "show"></iframe>
</body> 
</html> 
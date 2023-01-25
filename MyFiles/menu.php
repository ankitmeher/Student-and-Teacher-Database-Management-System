<?php 
        session_start();
        $conn = mysqli_connect("localhost","root","","collegemanagement");

        $uid = $_SESSION['uid'];
?>
<html>
<head>
    <title>Document</title>
    <style>
        body{
            background-image: linear-gradient(rgba(70, 142, 190, 0.558),rgba(255, 255, 255, 0.558));
        }
        a:link {
            color: black;
            text-decoration: none;
            background-color: trasparent;
        }
        a:visited {
            color: black;
            text-decoration: none;
            background-color: trasparent;
        }
        .link{
            font-size: 17px;
            margin-left: 50px;
        }

        li{
            list-style-type: none;
        }

        .dropDownContent{
            display: none;
            
        }

        .showContent:hover .dropDownContent{
            display: block;
        }
    </style>
</head>
<body>
    <center>
        <img style="height:130px; width: 130px;" src="GMU.jpg" alt="Not Found">
        <h1 style="font-size: 0.8cm; width: 100%"><a href="show.php" target="show">Menu</a></h1>
    </center>
    <div>
        <hr>
        <a class='link' href="dashboard.php" target="show">Dashboard</a><br><hr>
        <?php if($_SESSION['type']=='admin' || $_SESSION['type']=='teacher') 
        echo "<a class='link' href='adduser.php' target='show'>Add User</a><br><hr>" ?>
        
        <div class='showContent'>
        <?php if($_SESSION['type']=='admin' || $_SESSION['type']=='teacher') 
        echo "<a class='link' href='teacher.php' target = 'show'>Teacher</a><br><hr>" ?>
            <ul class="dropDownContent" >
                <li><a style="font-size: 15px" class = 'link' href="addTeacher.php" target='show'>Add Teacher</a></li>
                <hr>
                
                <?php if($_SESSION['type']=='admin') 
        //echo "<li><a style='font-size: 15px' class = 'link' href='manageTeacher.php' target='show'>Manage Teacher</a></li><hr>" ?>
                    <?php
                        if(isset($_SESSION['uid'])){
                            
                            $query1 = "SELECT * FROM teacherinfo WHERE uid='".$uid."'";
                            $result1 = mysqli_query($conn,$query1);
                        
                            if(mysqli_num_rows($result1)!=0) echo"<li><a style=\"font-size: 15px\" class = 'link' href=\"editTeacher.php\" target='show'>Update Your Profile</a></li>";

                        }
                    ?>
            </ul>
        </div>
        
        <div class='showContent'>
            <a class='link' href="student.php" target = "show">Student</a><br><hr>
            <ul class='dropDownContent' >
            <li><a style='font-size: 15px' class = 'link' href='addStudent.php' target='show'>Add Student</a></li><hr>
                    <?php
                        if(isset($_SESSION['uid'])){
                            
                            $query = "SELECT * FROM personalinfo WHERE uroll='".$uid."'";
                            $result = mysqli_query($conn,$query);
                        
                            if(mysqli_num_rows($result)!=0) echo"<li><a style=\"font-size: 15px\" class = 'link' href=\"editStudent.php\" target='show'>Update Your Profile</a></li>";

                        }
                    ?>
            </ul>
        </div>
        <a class='link' href="noticesection.php" target = "show">Notice Section</a><br><hr>
        <a class='link' href="logout.php" target = "show">Logout</a><br><hr>
    </div>
</body>
</html>
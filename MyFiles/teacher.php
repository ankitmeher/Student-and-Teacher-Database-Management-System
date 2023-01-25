<head>
    <style>
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
    </style>
</head>
<body style='background-color: rgba(255, 255, 255, 0.58);'>
<form action='' method='post'>
    <center>
        <table style='margin-top: 10%;'>
            <tr>
                <td>Enter University ID:</td>
            </tr>
            <tr>
                <td><input type='text' name='id'></td>
                <td><input type='submit' name='search' value='Search'></td> 
            </tr>
        </table>
        <br>
    </center>
</form>
<form action="seeallteachers.php" method="post">
    <center><input type="submit" name='seeallteachers' value='See All Teachers'></center>
</form>
</body>
<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","collegemanagement");
    if(isset($_POST['search'])){
        $id=strtoupper($_POST['id']);
        
        $query = "SELECT * from teacherinfo where uid='".$id."';";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==0){
            echo "<center>ID not Found!!</center>";
        }
        else {
            echo "<table border='1|0' width='100%'> 
            <tr>
                <th>University ID:</th>
                <th>View ID:</th>";
                if($_SESSION['type']=='admin') echo"<th>Edit the ID:</th> <th>Delete the ID:</th>";
            echo "</tr>
            <tr style='text-align:center;'>
                <td>".$id."</td>
                <td><a href='viewTeacher.php?id=".$id."'>View Here</a></td>";
                if($_SESSION['type']=='admin') echo "<td><a href='editTeacher.php?id=".$id."'>Edit here</a></td>
                <td><a href='deleteTeacher.php?id=".$id."' onclick=\"return confirm('Are you Sure you want to delete?');\">Delete here</a></td>";
            echo "</tr>
        </table>";
        }
    }
?>
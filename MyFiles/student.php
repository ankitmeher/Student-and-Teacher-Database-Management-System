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
<?php
    session_start();
    //echo $_SESSION['type'];
    if($_SESSION['type']=='student'){
        echo "<center>
                <h1 style='margin-top:15%;'>As you are a student can login and edit your form only!!</h1>
            </center>";
    }
    else{
        echo "<form action='' method='post'>
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
                </center>
                </form>
                <form action=\"seeallstudents.php\" method=\"post\">
    <br>
    <center><input type=\"submit\" name='seeallstudents' value='See All Students'></center>
</form>";
    }
?>
<?php
    $conn = mysqli_connect("localhost","root","","collegemanagement");
    if(isset($_POST['search'])){
        $id=strtoupper($_POST['id']);
        
        $query = "SELECT * from personalinfo where uroll='".$id."';";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==0){
            echo "<center>ID not Found!!</center>";
        }
        else {
            echo "<table border='1px' width='100%'> 
            <tr>
                <th>University ID:</th>
                <th>View ID:</th>
                <th>Edit the ID:</th>";
                if($_SESSION['type']=='admin')  echo "<th>Delete the ID:</th>";
            echo "</tr>
            <tr style='text-align:center;'>
                <td>".$id."</td>
                <td><a href='viewStudent.php?id=".$id."'>View Here</a></td>
                <td><a href='editStudent.php?id=".$id."'>Edit here</a></td>";
                if($_SESSION['type']=='admin') print("<td><a href='deleteStudent.php?id=".$id."' onclick="."\"return confirm('Are you Sure you want to delete?')\""." >Delete here</a></td>");
            echo "</tr>
        </table>";
        }
    }
?>
</body>
<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","collegemanagement");
    if(isset($_POST['seeallstudents'])){
        $query = "SELECT * FROM personalinfo ORDER BY uroll ASC;";
        $res = mysqli_query($conn,$query);
        if(mysqli_num_rows($res)==0) echo "NO RECORD HAS BEEN INSERTED!!";
        else{
?>
<html lang="en">
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
        td{
            text-align:center;
        }
        /* #notice{
            width:40%;
        } */
        table,th,td{
            border-collapse: collapse;
            border:1px solid rgba(70, 142, 190, 1);
        }
    </style>
</head>
<body style='background-color: rgba(255, 255, 255, 0.58);'>
    <center><h2><u>Students' Record</u></h2></center><br><br>
        <center>
            <form action="exportstudents.php" method="post">
                <input type="submit" value='Export records in Excel' name='export_students'>
            </form>
        <table width='60%'>
            <tr>
                <th style='width:20%'>University ID</th>
                <th style='width:20%'>Name</th>
                <th style='width:20%'>View ID</th>
                <?php if($_SESSION['type']!='student') echo "<th style='width:20%'>Edit ID</th>";
                if($_SESSION['type']=='admin')echo "<th style='width:20%'>Delete ID</th>";
                ?>
            </tr>
        </table>
        </center>
        <?php
            $rows = array();
            while($row = mysqli_fetch_assoc($res)) $rows[] = $row;
            foreach($rows as $row){
                echo "<center>";
                echo "<br><table width='60%'>";
                    echo "<tr>";
                        echo "<td  style='width:20%'>".$row['uroll']."</td>";
                        echo "<td  style='width:20%'>".$row['fn']." ".$row['mn']." ".$row['ln']."</td>";
                        echo "<td  style='width:20%'><a href='viewStudent.php?id=".$row['uroll']."'>View Here</a></td>";
                        if($_SESSION['type']!='student')
                        echo "<td  style='width:20%''><a href='editStudent.php?id=".$row['uroll']."'>Edit Here</a></td>";
                        if($_SESSION['type']=='admin')
                        echo "<td  style='width:20%'><a href='deleteStudent.php?id=".$row['uroll']."' onclick=\"return confirm('Are you Sure you want to delete?');\">Delete Here</a></td>";
                        
                    echo "</tr>";
                echo "</table></center><br>";
            }
        }
    }
        ?>
</body>
</html>
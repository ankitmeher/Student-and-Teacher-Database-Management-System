<?php
        session_start();
        //$uid=$_SESSION['uid'];
        $conn = mysqli_connect("localhost","root","","collegemanagement");

        if($_SESSION['type']=='student'){
            $query = "SELECT * FROM notice where receiver='student' OR receiver = 'both' ORDER BY id DESC;";
            $res = mysqli_query($conn,$query);
        }
        elseif($_SESSION['type']=='teacher'){
            $query = "SELECT * FROM notice where receiver='teacher' OR receiver = 'both' OR receiver = 'student' ORDER BY id DESC;";
            $res = mysqli_query($conn,$query);
        }
        else{
            $query = "SELECT * FROM notice ORDER BY id DESC;";
            $res = mysqli_query($conn,$query);
        }
?>

<html>
<head>
    <style>
        td{
            text-align:center;
        }
        #notice{
            width:40%;
        }
        table,th,td{
            border-collapse: collapse;
            border:1px solid rgba(70, 142, 190, 1);
        }
    </style>
</head>
<body style='background-color: rgba(255, 255, 255, 0.58);'>
    <center><h2>NOTICE BOARD</h2></center><br><br>
    <table width='100%'>
        <tr>
            <th style='width:15%'>Subject</th>
            <th style='width:40%'>Notice</th>
            <th style='width:15%'>Send by:</th>
            <th style='width:30%'>Time</th>
        </tr>
    </table>
        <?php
            $rows = array();
            while($row = mysqli_fetch_assoc($res)) $rows[] = $row;
            foreach($rows as $row){
                echo "<br><table width='100%'>";
                    echo "<tr>";
                        echo "<td  style='width:15%'>".$row['subject']."</td>";
                        echo "<td  style='width:40%'>".$row['notice']."</td>";
                        echo "<td  style='width:15%'>".$row['sender']."</td>";
                        echo "<td  style='width:30%'>".$row['datetime']."</td>";
                    echo "</tr>";
                echo "</table><br>";
            }
        ?>
</body>
</html>
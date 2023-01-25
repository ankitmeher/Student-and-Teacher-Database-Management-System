<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","collegemanagement");

    if(isset($_POST['export_teachers'])){
        $query = "SELECT * FROM teacherinfo ORDER BY uid ASC;";
        $res = mysqli_query($conn,$query);
        if(mysqli_num_rows($res)==0) echo "No records are there!!";
        else{
            $output="";
            $output .="<table>
                            <tr>
                                <th>University ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>DOB</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Aadhar</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Qualification</th>
                                <th>Experience</th>
                                <th>Profile</th>
                            </tr>";
            $rows = array();
            while($row = mysqli_fetch_assoc($res)) $rows[] = $row;
            foreach($rows as $row){
                $output .="
                        <tr>
                            <td>".$row['uid']."</td>
                            <td>".$row['fn']."</td>
                            <td>".$row['mn']."</td>
                            <td>".$row['ln']."</td>
                            <td>".$row['dob']."</td>
                            <td>".$row['age']."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['aadhar']."</td>
                            <td>".$row['phnum']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['ql']."</td>
                            <td>".$row['exp']."</td>
                            <td>".$row['profile']."</td>
                        </tr>
                    ";
            }
            $output .="</table>";
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Teachers.xls");
            echo $output;
        }
    }
    else echo "hello";
?>
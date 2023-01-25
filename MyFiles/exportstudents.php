<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","collegemanagement");

    if(isset($_POST['export_students'])){
        $query = "SELECT * FROM personalinfo ORDER BY uroll ASC;";
        $res = mysqli_query($conn,$query);
        if(mysqli_num_rows($res)==0) echo "No Records are there!!";
        else{
            $output="";
            $output .="<table>
                            <tr>
                                <th>University ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Father's Name</th>
                                <th>Mother's Name</th>
                                <th>Age</th>
                                <th>Aadhar</th>
                                <th>Religion</th>
                                <th>Nationality</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Semester 1</th>
                                <th>Semester 2</th>
                                <th>Semester 3</th>
                                <th>Semester 4</th>
                                <th>Semester 5</th>
                                <th>Semester 6</th>
                            </tr>";
            $rows = array();
            while($row = mysqli_fetch_assoc($res)) $rows[] = $row;
            foreach($rows as $row){
                $uroll = $row['uroll'];
                $query = "SELECT * FROM personalinfo WHERE uroll='".$uroll."';";
                $res = mysqli_query($conn,$query);
        
                // $query = "SELECT * FROM contactinfo WHERE uroll = '".$uroll."' ORDER BY uroll ASC;";
                // $res = mysqli_query($conn,$query);
                $output .="
                        <tr>
                            <td>".$row['uroll']."</td>
                            <td>".$row['fn']."</td>
                            <td>".$row['mn']."</td>
                            <td>".$row['ln']."</td>
                            <td>".$row['dob']."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['fathername']."</td>
                            <td>".$row['mothername']."</td>
                            <td>".$row['age']."</td>
                            <td>".$row['aadhar']."</td>
                            <td>".$row['cast']."</td>
                            <td>".$row['nationality']."</td>
                            ";
            
                $query = "SELECT * FROM contactinfo WHERE uroll='".$uroll."';";
                $res = mysqli_query($conn,$query);

                $rows = array();
                while($row = mysqli_fetch_assoc($res)) $rows[] = $row;
                foreach($rows as $row){
                    $output .="<td>".$row['pn']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['address']."</td>
                                ";
                }
                $query = "SELECT * FROM academicinfo WHERE uroll='".$uroll."';";
                $res = mysqli_query($conn,$query);

                $rows = array();
                while($row = mysqli_fetch_assoc($res)) $rows[] = $row;
                foreach($rows as $row){
                    $output .="<td>".$row['sm1']."</td>
                                <td>".$row['sm2']."</td>
                                <td>".$row['sm3']."</td>
                                <td>".$row['sm4']."</td>
                                <td>".$row['sm5']."</td>
                                <td>".$row['sm6']."</td>
                            </tr>
                        ";
                }
            }
            $output .="</table>";
            header("Content-Type: application/xls");
            header("Content-Disposition: attachment; filename=Students.xls");
            echo $output;
        }
    }
?>
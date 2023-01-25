<?php
    session_start();
    if( isset($_SESSION['uid']) ){ 
        $uid = $_SESSION['uid'] ;
        if(isset($_GET['id'])) $uid = $_GET['id'];
        $conn = mysqli_connect("localhost","root","","collegemanagement");
        if( $conn ){
            $qr = "select * from personalinfo where uroll = '$uid' ;";
            $res = mysqli_query($conn,$qr);
            if( $res ){
                $row = mysqli_fetch_assoc($res);
                $selected = $row['cast'];
                echo'
                <head>
                <style>
                .btn{
                    background: #0066A2;
                    color: white;
                    border-style: unset;
                    border-color: #0066A2;
                    border-radius: 15px;
                    width: 100px;
                    font: bold 15px arial,sans-serif;
                    text-shadow: none;
                }
                .btn:hover{
                    background: #0a19a7;
                    border-radius: 15px;
                }
                div{
                    margin-left:10%;
                    margin-right:10%;
                } 
                body{
                   background-color: rgba(255, 255, 255, 0.58);
                   font-family: \'Franklin Gothic Medium\', \'Arial Narrow\', Arial, sans-serif;
               }
                </style>
              </head>
             <body>
             <CENTER><B><h3><u>Update Student</u></h3></B></CENTER>
                 <div>
                <form action="connectStudent.php?id='.$uid.'" method="post">
                <fieldset style="border-color: rgba(70, 142, 190, 1);">
                    <br>
                <fieldset style="border-color: white;">
                <center>
                <img src="upload-images/student/'.$uid.'.jpg" alt="Image Not Found" style="clip-path:circle();" height="150px" width="150px">
                </center>
                <br>
                <legend><strong><u>Personal Info</u></strong></legend>
                <table>
                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" size="20" name="fn" required value="'.$row['fn'].'"></td>

                        <td style="text-indent: 1cm;">Middle Name:</td>
                        <td><input type="text" size="20" name="mn" value="'.$row['mn'].'"></td>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" size="20" name="ln" required value="'.$row['ln'].'"></td>
                    </tr>
                    <tr>
                        <td>Date Of Birth:</td>
                        <td><input type="date" size="20" name="dob" required value="'.$row['dob'].'"></td>
                    <tr>
                </table>
                <br>';?>

                <table>
                    <tr>
                        <td>Gender:</td>
                        <td><input style="margin-left: 1cm;" type="radio" name="g" <?=$row['gender'] == "M" ? "checked" : ""?> value="M">Male</input></td>
                        <td><input style="margin-left: 1cm;" type="radio" name="g" <?=$row['gender'] == "F" ? "checked" : ""?>  value="F">Female</input></td>
                        <td><input style="margin-left: 1cm;" type="radio" name="g" <?=$row['gender'] == "O" ? "checked" : ""?>  value="O">Others</input></td>
                    </tr>
                </table>
                <?php
                echo '<br>
                
                    <table>
                        <tr>
                            <td>University Roll Number: </td>
                            <td style="color: red;">'." ".$row['uroll'].'</td>
                    </tr>
                    </table>
                    <br>
                    <br>
                <table>
                    <tr>
                        <td>Father\'s Name:</td>
                        <td><input type="text" name="fathername" size="20" required  value="'.$row['fathername'].'"></td>
                    </tr>
                    <tr>
                        <td style="width: 4cm;">Mother\'s Name:</td>
                        <td><input type="text" name="mothername" size="20" required  value="'.$row['mothername'].'"></td>

                        <td style="text-indent: 3cm;">Age:</td>
                        <td><input type="number" name="age" min="10" max="60" required  value="'.$row['age'].'"></td>
                    </tr>
                    <tr>
                        <td>Aadhar Number:</td>
                        <td><input type="number" name="aadhar" size="20" required  value="'.$row['aadhar'].'"></td>
                    </tr>
                </table>
                    <br><br>
                <table>
                    <tr><br>
                        <td>Religion:</td>
                        <td>';
                        ?>
                        <?php
                        $options=array('HINDU','MUSLIM','CHRISTIAN','OTHERS');

                        echo "<select name='cast' type='dropdown'  required>";
                        foreach($options as $option){
                            if($selected==$option) echo "<option selected='selected' value='$option'>$option</option>";
                            else echo"<option value='$option'>$option</option>";
                        }

                            echo"</select>";
                    ?>
                    <?php
                        echo'</td>
                    </tr>
                </table>
                <br><br>';
                ?>
                 <label for="">Nationality</label>
                 <input style="margin-left: 1cm;" type="RADIO" name="nationality" <?=$row['nationality'] == "INDIAN" ? "checked" : ""?>  value="INDIAN">Indian
                 <input style="margin-left: 1cm;" type="RADIO" name="nationality" <?=$row['nationality'] == "OTHERS" ? "checked" : ""?>  value="OTHERS">Others
            </fieldset>
                <?php
                
            }
        }
    }else header("location:login.php");
?>
<?php
    $query="SELECT * FROM contactinfo  WHERE uroll='".$uid."'";
    $query_run=mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        foreach($query_run as $row)
        {
            //echo $row['user'];
            //echo "<img src='upload-image/student/'".$_SESSION['uid']."'.jpg' style='width:250px; clip-path:circle(); background-position: center;' NAME='IMAGE' height='150px'>";
            ?>
                        <BR><br>
            <hr size="10" color="white">
            <fieldset style='border-color: white;'>
                <legend><strong><U>Contact Info</U></strong></legend>
                <br><br>
                <table>
                    <tr>
                        <td>Phone Number:</td>
                        <td><input type="tel" name="pn" size="20" required  value="<?= $row['pn'];?>"></td>
                    </tr>
                    <tr>
                        <td>Email ID:</td>
                        <td><input type="EMAIL" name="email" size="20" required  value="<?= $row['email'];?>"></td>
                    </tr>
                </table>
                <br>
                Address:<BR>
                <textarea ROWS="5" COLS="80" name="address" required><?php echo $row['address'] ?></textarea>
                <BR>
            </fieldset>
            <?php
        }
            
    }
    else echo "No Record Found";

?>

<?php
    $query="SELECT * FROM academicinfo  WHERE uroll='".$uid."'";
    $query_run=mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run)>0)
    {
        foreach($query_run as $row)
        {
            ?>
            <br>
            <hr size="10" color="white">
            <fieldset style='border-color: white;'>
                 <legend><strong><U>Academic Info</U></strong></legend>
                    <?php if($_SESSION['type']=='admin' || $_SESSION['type']=='teacher') 
                    echo "<b><h4><u>Semesters' Marks</u></h4></b>
                    <table>
                        <tr>
                            <td>Semester 1:</td>
                            <td><input type='number' step='0.01'  name='sm1' size='4' value='".$row['sm1']."'></td>
                            <td style='text-indent: 2cm;'>Semester 2:<td>
                            <td><input type='number' step='0.01' name='sm2' size='4' value='".$row['sm2']."'></td>
                        </tr>
                        <tr>
                            <td>Semester 3:</td>
                            <td><input type='number' step='0.01' name='sm3' size='4' value='".$row['sm3']."'></td>

                            <td style='text-indent: 2cm;'>Semester 4:<td>
                            <td><input type='number' step='0.01' name='sm4' size='4' value='".$row['sm4']."'></td>
                        </tr>
                        <tr>
                            <td>Semester 5:</td>
                            <td><input type='number' step='0.01' name='sm5' size='4' value='".$row['sm5']."'></td>
                            <td style='text-indent: 2cm;'>Semester 6:<td>
                            <td><input type='number' step='0.01' name='sm6' size='4' value='".$row['sm6']."'></td>
                        </tr>
                    </table>";
                    if( $_SESSION['type']=='student') {
                        echo "<h4 align='center'>Mark Details</h4>";
                        echo "<center>
                        <table border='1px'>
                            <tr>
                                <th>Semesters</th>
                                <th>Marks</th>
                            </tr>
                            <tr>
                                <td>Semester 1</td>
                                <td>".$row['sm1']."</td>
                            </tr>
                            <tr>
                                <td>Semester 2</td>
                                <td>".$row['sm2']."</td>
                            </tr>
                            <tr>
                                <td>Semester 3</td>
                                <td>".$row['sm3']."</td>
                            </tr>
                            <tr>
                                <td>Semester 4</td>
                                <td>".$row['sm4']."</td>
                            </tr>
                            <tr>
                                <td>Semester 5</td>
                                <td>".$row['sm5']."</td>
                            </tr>
                            <tr>
                                <td>Semester 6</td>
                                <td>".$row['sm6']."</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>".($row['sm1']+$row['sm2']+$row['sm3']+$row['sm4']+$row['sm5']+$row['sm6'])."</td>
                            </tr>
                            <tr>
                                <td>Percentage</td>
                                <td>".number_format((($row['sm1']+$row['sm2']+$row['sm3']+$row['sm4']+$row['sm5']+$row['sm6'])/6),2)."</td>
                            </tr>
                        </table></center>";
                ?>
                <?php
                }
                ?>
                    <br>
                    <table>
                        <tr>
                            <td>10<SUP>th</SUP> Marks:</td>
                            <td><input type="number" name="mark10" step='0.01' size="5"  required value="<?= $row['mark10'];?>"></td>
                
                            <td style="margin-left: 2cm;">12<SUP>th</SUP> Marks:</td>
                            <td><input type="number" name="mark12" step='0.01' size="5"  required value="<?= $row['mark12'];?>"></td>
                        </tr>
                        <tr>
                            <td>10<sup>th</sup> School Name:</td>
                            <td><input type="TEXT" name="schoolname" size="30"  required value="<?= $row['schoolname'];?>"></td>
                        </tr>
                    </table>
                <BR><BR>
                School Address:<BR>
                    <TEXTAREA ROWS="5" COLS="80" name="schooladdress"  required><?php echo $row['schooladdress'] ?></TEXTAREA>  
            </fieldset>
            <br>
            </fieldset>
            <br>
            <center>
                <input type="submit" class='btn' name='update' value='Update'>&nbsp; &nbsp;
                <input type="reset" class='btn' value="Reset">
            </center>
            </form></div>
            </body>
<?php 
}
    }
else echo "No Record Found";

?>
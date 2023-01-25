<?php 
    session_start(); //echo $_SESSION['uid'];

    $uid = $_SESSION['uid'];
    if(isset($_GET['id'])) $uid = $_GET['id'];

    $conn = mysqli_connect("localhost","root","","collegemanagement");

    if(isset($_SESSION['uid'])){
        $query="SELECT * FROM teacherinfo  WHERE uid='".$uid."'";
        $query_run=mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run)>0)
        {
            foreach($query_run as $row)
            {
                $selected=$row['gender'];
                ?>
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
           font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
       }
    </style>
 </head>
 <body>
    <div>
                <form action="connectTeacher.php?id=<?php echo $uid;?>" method="post">
                <CENTER><B><h3><u>Update Teacher</u></h3></B></CENTER>
            <BR>
            <fieldset style='border-color: rgba(70, 142, 190, 1);'>
            <br>
            <FIELDSET style='border-color: white;'>
                <LEGEND><B><u>Teachers' Form</u></B></LEGEND>
                <center><?php
                echo "<img src='upload-images/teacher/".$uid.".jpg' alt='Image Not Found' style='clip-path:circle();' height='150px' width='150px'>";
                ?>
                </center>
                <br>
                    <TABLE>
                        <tr>   
                            <TD>First Name:</TD>
                            <TD><INPUT TYPE="TEXT" NAME="fn" SIZE="20" required value="<?= $row['fn'];?>"></TD>                                
                            <TD STYLE="TEXT-INDENT:1CM">Middle Name:</TD>
                            <TD><INPUT TYPE="TEXT" NAME="mn" SIZE="20"  value="<?= $row['mn'];?>"></TD> 
                        </tr>
                        <tr>
                            <TD>Last Name:</TD>
                            <TD><INPUT TYPE="TEXT" NAME="ln" SIZE="20" required value="<?= $row['ln'];?>"></TD>  
                        </tr>
                        <tr>
                            <table>
                                <tr>
                                    <TD>Date Of Birth:</TD>
                                    <TD STYLE="TEXT-INDENT:1CM"><INPUT TYPE="DATE"  required NAME="dob" SIZE="20" value="<?= $row['dob'];?>"></TD>

                                    <td STYLE="TEXT-INDENT:2CM">AGE:</td>
                                    <td><input type="number" min="20" max="65" name="age" size="3" required value="<?= $row['age'];?>"></td>

                                    <TD STYLE="TEXT-INDENT:1CM">Gender:</TD>
                                    <TD>
                                    <?php
                                        $options=array('M','F','O');

                                        echo "<select name='gender' type='dropdown'  required>";
                                        foreach($options as $option){
                                            if($selected==$option) echo "<option selected='selected' value='$option'>$option</option>";
                                            else echo"<option value='$option'>$option</option>";
                                        }

                                            echo"</select>";
                                    ?>
                                    </td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <td>Phone Number: </td>
                            <td><input type="text" name="pn"  required value="<?= $row['phnum'];?>"></td>
                        
                            <td STYLE="TEXT-INDENT:1CM">Email ID:</td>
                            <td><input type="email" name="email"  required value="<?= $row['email'];?>"></td>
                        </tr>
                        <tr>
                            <td>Aadhar Naumber:</td>
                            <td><input type="number" name="aadhar" size="20" required value="<?= $row['aadhar'];?>"></td>
                        </tr>

                        <tr>
                            <td>University ID:</td>
                            <td><p style='color: red;'><?php echo $row['uid']; ?></p></td>   
                        </tr>
                    </table>
                    <br><br>
                    <table>
                        <TR>
                            <!-- <TD>PHOTO:</TD>
                            <TD><INPUT TYPE="FILE" accept=".jpg" name="image" required></TD>
                            <p style="color: red;" >Note: Image should be in <b>jpg</b> format</p> -->
                        </TR>
                    </table> 
                    <br>
                    <TABLE>
                            Qualification:
                        <tr>
                            <td><textarea name="ql" id="" cols="50" rows="5"  required><?php echo $row['ql'] ?></textarea></td>
                        </tr>
                    </TABLE>  
                    <br>     
                    <br>       
                    <table>
                        <tr>
                            Profile:
                            <td><TEXTAREA name="profile" COLS="50" ROWS="5"><?php echo $row['profile'] ?></TEXTAREA></td>   
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            Experience:
                            <td><TEXTAREA name="exp" COLS="50" ROWS="5" required><?php echo $row['exp'] ?></TEXTAREA></td>   
                        </tr>
                    </table>
            </FIELDSET>
            <br>
            </fieldset>
                        <center>
                            <br>
                            <input type="submit" class='btn' name='update' value='Update'>&nbsp
                            <input type="reset"  class='btn' value="Reset">
                        </center>
                </form></div>
        </body>
            <?php
            }
            
        }
    }
    else echo "No Record Found";

?>
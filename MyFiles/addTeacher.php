<?php
    session_start();
    $uid = $_SESSION['uid'];
?>

<html>
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
    <form action="connectTeacher.php" method="POST" enctype="multipart/form-data">
            <CENTER><U><B><h3>Teachers' Registration</h3></B></U></CENTER>
            <BR>
            <fieldset style='border-color: rgba(70, 142, 190, 1);'>
                <br>
            <FIELDSET style='border-color: yellow;'>
                <LEGEND><B><u>Teachers' Form</u></B></LEGEND>
                    <TABLE>
                        <tr>   
                            <TD>First Name:</TD>
                            <TD><INPUT TYPE="TEXT" NAME="fn" SIZE="20" required></TD>                                
                            <TD STYLE="TEXT-INDENT:1CM">Middle Name:</TD>
                            <TD><INPUT TYPE="TEXT" NAME="mn" SIZE="20"></TD> 
                        </tr>
                        <tr>
                            <TD>Last Name:</TD>
                            <TD><INPUT TYPE="TEXT" NAME="ln" SIZE="20" required></TD>  
                        </tr>
                        <tr>
                            <table>
                                <tr>
                                    <TD>Date Of Birth:</TD>
                                    <TD STYLE="TEXT-INDENT:1CM"><INPUT TYPE="DATE"  required NAME="dob" SIZE="20"></TD>

                                    <td STYLE="TEXT-INDENT:2CM">Age:</td>
                                    <td><input type="number" min="20" max="65" name="age" size="3" required></td>

                                    <TD STYLE="TEXT-INDENT:1CM">Gender:</TD>
                                    <TD>
                                        <select name="gender" id="" type="dropdown" required>
                                            <option selected hidden value="">SELECT</option>                                        
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="O">Others</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <td>Phone Number: </td>
                            <td><input type="text" name="pn"  required></td>
                        
                            <td STYLE="TEXT-INDENT:1CM">Email ID:</td>
                            <td><input type="email" name="email"  required></td>
                        </tr>
                        <tr>
                            <td>Aadhar Number:</td>
                            <td><input type="number" name="aadhar" size="20" required></td>
                        </tr>

                        <tr>
                        <?php
                            if($_SESSION['type']!='admin') echo "<td>University ID:</td><td>".$uid."</td>";
                            else echo "<td>University ID:</td>
                            <td><input type=\"text\" name='uid' size='20'  required></td>";
                        ?>
                        </tr>
                    </table>
                    <br><br>
                    <table>
                        <TR>
                            <TD>Profile Image:</TD>
                            <TD><INPUT TYPE="FILE" accept=".jpg" name="image" required></TD>
                            <p style="color: red;" >Note: Image should be in <b>jpg</b> format</p>
                        </TR>
                    </table> 
                    <br>
                    <TABLE>
                            Qualification:
                        <tr>
                            <td><textarea name="ql" id="" cols="50" rows="5"  required></textarea></td>
                        </tr>
                    </TABLE>  
                    <br>     
                    <br>       
                    <table>
                        <tr>
                            Profile:
                            <td><TEXTAREA name="profile" COLS="50" ROWS="5"></TEXTAREA></td>   
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            Experience:
                            <td><TEXTAREA name="exp" COLS="50" ROWS="5" required></TEXTAREA></td>   
                        </tr>
                    </table>
            </FIELDSET> <br>
            </fieldset>
            <br>     
            <CENTER>
                <input type="Submit" class='btn' name="Register" value="Register">&nbsp;&nbsp;
                <input type="Reset" class='btn' name="Reset" value="Reset">
            </CENTER>                
        </form>
    </div>
</html>
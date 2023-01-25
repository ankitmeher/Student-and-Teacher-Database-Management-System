<?php
    session_start();
    $uid = $_SESSION['uid'];
?>
<html>
 <head>
   <title>ADD STUDENT</title>
   <style>
        #btn{
            background: #0066A2;
            color: white;
            border-style: unset;
            border-color: #0066A2;
            border-radius: 15px;
            width: 100px;
            font: bold 15px arial,sans-serif;
            text-shadow: none;
        }
        #btn:hover{
            background: #0a19a7;
            border-radius: 15px;
        }
       body{
           background-color: rgba(255, 255, 255, 0.58);
           font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
       }
       div{
           margin-left: 10%;
           margin-right: 10%;
       }
   </style>
 </head>
<body>
    <div>
    <form action="connectStudent.php" method="POST" enctype="multipart/form-data">
            <center>
                <strong><U><h3>Student Registration</h3></U></strong>
            </center>
            <fieldset style="border-color: rgba(70, 142, 190, 1);">
                <!-- <legend><b>STUDENT'S FORM</b></legend> -->
                <br>
                <fieldset style="border-color: yellow;">
                <legend><strong><u>Personal Info</u></strong></legend>
                <table>
                    <tr>
                        <td>First Name:</td>
                        <td><input type="text" size="20" name="fn" required/></td>

                        <td style="text-indent: 1cm;">Middle Name:</td>
                        <td><input type="text" size="20" name="mn"/></td>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" size="20" name="ln" required/></td>
                    </tr>
                    <tr>
                        <td>Date Of Birth:</td>
                        <td><input type="date" size="20" name="dob" required></td>
                    <tr>
                </table>
                <br>
                <table>
                    <tr>
                        <td>Gender:</td>
                        <td><input style="margin-left: 1cm;" type="radio" name="g" value="M" required>Male</input></td>
                        <td><input style="margin-left: 1cm;" type="radio" name="g" value="F">Female</input></td>
                        <td><input style="margin-left: 1cm;" type="radio" name="g" value="O">Others</input></td>
                    </tr>
                </table>
                <br>
                
                    <table>
                        <tr>
                        <?php
                            if($_SESSION['type']=='student') echo "<td>University ID:</td><td>".$uid."</td>";
                            else echo "<td>University ID:</td>
                            <td><input type=\"text\" name='uroll' size='20'  required></td>";
                        ?>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <td>Profile Image:</td>
                            <td><input type='file' accept='.jpg' name='image' required></td>
                        </tr>
                        <p style="color: red;" >Note: Image should be in <b>.jpg</b> format</p>
                    </table>
                    <br>
                <table>
                    <tr>
                        <td>Father's Name:</td>
                        <td><input type="text" name="fathername" size="20" required></td>
                    </tr>
                    <tr>
                        <td style="width: 4cm;">Mother's Name:</td>
                        <td><input type="text" name="mothername" size="20" required></td>

                        <td style="text-indent: 3cm;">Age:</td>
                        <td><input type="number" name="age" min='10' max='60' required></td>
                    </tr>
                    <tr>
                        <td>Aadhar Number:</td>
                        <td><input type="number" name="aadhar" size="20" required></td>
                    </tr>
                </table>
                    <br><br>
                <table>
                    <tr><br>
                        <td>Religion:</td>
                        <td>
                            <select name="cast" type="dropdown"  required>
                                <option selected hidden value="">SELECT</option>
                                <option value="HINDU">HINDU</option>
                                <option value="MUSLIM">MUSLIM</option>
                                <option value="CHRISTIAN">CHRISTRIAN</option>
                                <option value="OTHERS">OTHERS</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <br><br>
                Nationality:<input style="margin-left: 1cm;" type="RADIO" name="nationality" value="INDIAN">Indian<input style="margin-left: 1cm;" type="RADIO" name="nationality" value="OTHERS">Others
            </fieldset>
            <BR><br>
            <hr size="10" color="white">
            <fieldset style="border-color: yellow;">
                <legend><strong><U>Contact Info</U></strong></legend>
                <br><br>
                <table>
                    <tr>
                        <td>Phone Number:</td>
                        <td><input type="text" name="pn" size="20" required></td>
                    </tr>
                    <tr>
                        <td>Email ID:</td>
                        <td><input type="EMAIL" name="email" size="20" required></td>
                    </tr>
                </table>
                <br>
                Address:<BR>
                <textarea ROWS="5" COLS="80" name="address" required></textarea>
                <BR>
            </fieldset>
            <br>
            <hr size="10" color="white">
            <fieldset style="border-color: yellow;">
                 <legend><strong><U>Academic Info</U></strong></legend>
                    <?php if($_SESSION['type']=='admin' || $_SESSION['type']=='teacher') 
                    echo "<b><h4><u>Semesters' Marks</u></h4></b>
                    <table>
                        <tr>
                            <td>Semester 1:</td>
                            <td><input type='number' step='0.01'  name='sm1'></td>
                            <td style='text-indent: 2cm;'>Semester 2:<td>
                            <td><input type='number' step='0.01' name='sm2' size='4'></td>
                        </tr>
                        <tr>
                            <td>Semester 3:</td>
                            <td><input type='number' step='0.01' name='sm3' size='4'></td>

                            <td style='text-indent: 2cm;'>Semester 4:<td>
                            <td><input type='number' step='0.01' name='sm4' size='4'></td>
                        </tr>
                        <tr>
                            <td>Semester 5:</td>
                            <td><input type='number' step='0.01' name='sm5' size='4'></td>
                            <td style='text-indent: 2cm;'>Semester 6:<td>
                            <td><input type='number' step='0.01' name='sm6' size='4'></td>
                        </tr>
                    </table>"; ?>
                    <br>
                    <table>
                        <tr>
                            <td>10<SUP>th</SUP> Marks:</td>
                            <td><input type="TEXT" name="mark10" size="10"  required></td>
                
                            <td style="margin-left: 2cm;">12<SUP>th</SUP> Marks:</td>
                            <td><input type="TEXT" name="mark12" size="10"  required></td>
                        </tr>
                        <tr>
                            <td>10<sup>th</sup> School Name:</td>
                            <td><input type="TEXT" name="schoolname" size="30"  required></td>
                        </tr>
                    </table>
                <BR><BR>
                School Address:<BR>
                    <TEXTAREA ROWS="5" COLS="80" name="schooladdress"  required></TEXTAREA>  
            </fieldset>
            <br>
            </fieldset>
            <BR>
            <CENTER>
                <input type="submit" id='btn' value="Register" name="Register">&nbsp;&nbsp;
                <input type="reset" id='btn' value="Reset" name="Reset">
            </CENTER>
        </form>
    </div>
</body>
</html>
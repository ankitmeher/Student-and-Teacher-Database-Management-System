<?php
        session_start();
        $conn = mysqli_connect("localhost","root","","collegemanagement");
        $uid = $_GET['id'];
        //echo $uid;
        $query = "SELECT * from personalinfo WHERE uroll='".$uid."';";
        $res = mysqli_query($conn,$query);
        if( $res ){
                $row = mysqli_fetch_assoc($res);
        }

?>
<html>
 <head>
   <title>ADD STUDENT</title>
   <style>
       body{
           background-color: rgba(255, 255, 255, 0.58);
       }
       div{
           margin-left: 10%;
           margin-right: 10%;
       }
   </style>
 </head>
<body>
 <div>
    <form>
                    <center>
                    <?php echo "<img src='upload-images/student/".$uid.".jpg' alt='Image Not Found' style='clip-path:circle();' height='150px' width='150px'>";?>
                    <p><?php echo $row['fn']; ?> <?php echo $row['mn']; ?> <?php echo $row['ln']; ?></p>
                    </center>
                 <center>
                   <p>Date of Birth:<?php echo $row['dob']; ?></p>
                   <p>GENDER:<?php echo $row['gender']; ?></p>  
                    <p>UNIVERSITY ROLLNUMBER:<?php echo $row['uroll']; ?></p>
                    <p>FATHER'S NAME:<?php echo $row['fathername']; ?></p>
                    <p>MOTHER'S NAME:<?php echo $row['mothername']; ?>I</p>
                    <p>AGE:<?php echo $row['age']; ?></p>
                    <p>AADHAR NUMBER:<?php echo $row['aadhar']; ?></p>
                 </center>
        <center>
                <p>RELIGION:<?php echo $row['cast']; ?></p>
                   <p>NATIONALITY:<?php echo $row['nationality']; ?></p> 
<?php
        $query = "SELECT * from contactinfo WHERE uroll='".$uid."';";
        $res = mysqli_query($conn,$query);
        if( $res ){
                $row = mysqli_fetch_assoc($res);
        }

?>
                   
                   <p>EMAIL ID:<?php echo $row['email']; ?></p>
                   <p>ADDRESS:<?php echo $row['address']; ?></p>

                   <?php
        $query = "SELECT * from academicinfo WHERE uroll='".$uid."';";
        $res = mysqli_query($conn,$query);
        if( $res ){
                $row = mysqli_fetch_assoc($res);
        }

?>
                     <P>SEMESTER'S MARKS</P>
                        <p>Semester 1:<?php echo $row['sm1']; ?></p>
                        <p>Semester 2:<?php echo $row['sm2']; ?></p>
                        <p>Semester 3:<?php echo $row['sm3']; ?></p>
                        <p>Semester 4:<?php echo $row['sm4']; ?></p>
                        <p>Semester 5:<?php echo $row['sm5']; ?></p>
                        <p>Semester 6:<?php echo $row['sm6']; ?></p>
        </center> 
        <center>                 
            <p>10<SUP>th</SUP> MARKS:<?php echo $row['mark10']; ?></p>
            <p>12<SUP>th</SUP> MARKS:<?php echo $row['mark12']; ?></p>
            <p>10<sup>th</sup> SCHOOL NAME:<?php echo $row['schoolname']; ?></p>
            <p>SCHOOL ADDRESS: <?php echo $row['schooladdress']; ?></p>
        </center>
    </form>
 </div>
</body>
</html>
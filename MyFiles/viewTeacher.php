<?php
        session_start();
        $conn = mysqli_connect("localhost","root","","collegemanagement");
        $uid = $_GET['id'];
        $query = "SELECT * from teacherinfo WHERE uid='".$uid."';";
        $res = mysqli_query($conn,$query);
        if( $res ){
                $row = mysqli_fetch_assoc($res);
        }

?>

<html>
<head>
    <style>
        div{
            margin-left:10%;
            margin-right:10%;
        }
        body{
           background-color: rgba(255, 255, 255, 0.58);
       }
    </style>
</head>
<body>
    <div>
    <form>
          <center>
          <?php echo "<img src='upload-images/teacher/".$uid.".jpg' alt='Image Not Found' style='clip-path:circle();' height='150px' width='150px'>";?>
          </center>
          <center>
                <p><?php echo $row['fn']; ?> <?php echo $row['mn']; ?> <?php echo $row['ln']; ?></p>
                <p>Date Of Birth: <?php echo $row['dob']; ?> <br> Gender:<?php echo $row['gender']; ?></p>
                <p>PHONE NUMBER:  <?php echo $row['phnum']; ?> <br>  EMAIL ID:  <?php echo $row['email']; ?></p>
                <p>AGE: <?php echo $row['age']; ?> <br>  AADHARCARD NUMBER:  <?php echo $row['aadhar']; ?></p>
                <p>QUALIFICATION: <br><?php echo $row['ql']; ?></p>
                <p>UID: <?php echo $row['uid']; ?></p>
                <p>PROFILE: <br><?php echo $row['profile']; ?></p>
                <p>EXPERIENCE: <br><?php echo $row['exp']; ?></p>
          </center>
   </form>
    </div>
</body>
</html>
<?php
    session_start();
    $uid = $_GET['id'];
    //echo $uid;

    if(isset($_GET['id'])){
        $conn = mysqli_connect("localhost","root","","collegemanagement");

        $query = "DELETE FROM personalinfo WHERE uroll='".$uid."'";
        $result = mysqli_query($conn,$query);

        $query = "DELETE FROM contactinfo WHERE uroll='".$uid."'";
        $result = mysqli_query($conn,$query);

        $query = "DELETE FROM academicinfo WHERE uroll='".$uid."'";
        $result = mysqli_query($conn,$query);

        
        if(unlink('upload-images/student/'.$uid.'.jpg')){
            echo "Photo deleted!!";
        }
        else echo "Photo cannot be deleted!!";

        if($result){
            echo"<script>alert('".$uid."' Successfully Deleted!!)</script>";
        }
        else echo"<script>alert('Unable to Delete".$uid."')</script>";
        echo "<html>
                    <style>
                        h1{
                            margin-top: 20%;
                        }
                    </style>
                <body style='background-color: rgba(255, 255, 255, 0.58);'>
                    <center>
                        <h1>".$uid." Successfully Deleted!!</h1>
                    </center>
                </body>
            </html>";

    }
?>
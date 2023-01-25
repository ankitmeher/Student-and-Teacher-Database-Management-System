<body style='background-color: rgba(255, 255, 255, 0.58);'>
<?php

    session_start();
    $conn = mysqli_connect("localhost","root","","collegemanagement");

    if(isset($_GET['id'])) $uid = strtoupper($_GET['id']);
    elseif($_SESSION['type']=='admin') $uid = strtoupper($_POST['uid']);
    else $uid = $_SESSION['uid'];

    //echo $uid;

    $query = "SELECT * FROM teacherinfo WHERE uid='".$uid."'";
    $result = mysqli_query($conn,$query);

    if(isset($_POST['update'])){
        $fn = $_POST['fn'];
        $mn=$_POST['mn'];
        $ln=$_POST['ln'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $phnum=$_POST['pn'];
        $email=$_POST['email'];
        $aadhar=$_POST['aadhar'];
        $age=$_POST['age'];
        $qual=$_POST['ql'];
        $exp=$_POST['exp'];
        $profile=$_POST['profile'];

        $query = "UPDATE teacherinfo SET fn='".$fn."',mn='".$mn."',ln='".$ln."',gender='".$gender."',dob='".$dob."',phnum='".$phnum."',email='".$email."',aadhar='".$aadhar."',age='".$age."',ql='".$qual."',uid='".$uid."',exp='".$exp."',profile='".$profile."' WHERE uid='".$uid."'; ";
        $result = mysqli_query($conn,$query);

        if($result){
            echo"<script>alert('You have successfully registered Teacher Info')</script>";
            echo "<html>
                <style>
                    h1{
                        margin-top: 20%;
                    }
                </style>
                    <body>
                        <center>
                            <h1>Thanks for Registering!!</h1>
                        </center>
                    </body>
                </html>";
        }else{
            echo"<script>alert('Failed to register Teacher Info')</script>";
        }
    }

    elseif((isset($_POST['Register']) && mysqli_num_rows($result)!==0)){
        echo "<html>
            <style>
                h1{
                    margin-top: 20%;
                }
            </style>
                <body>
                    <center>
                        <h1>Already Registered!!</h1>
                        <p style='color: red;'>Note: If not kindly check the UID you Provided!</p>
                    </center>
                </body>
            </html>";
        //else echo "Not registered!!";
    }

    else{

        $file_name=$_FILES['image']['name'];
        //$uid=strtoupper($_POST['uid']);

        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];

        $extension = pathinfo($file_name,PATHINFO_EXTENSION);
        $rename = $uid.".".$extension;

        if(move_uploaded_file($file_tmp,"upload-images/teacher/".$rename)) echo "<script>alert('Image Uploaded and Renamed by Roll Number!!')</script>";
        else echo "<script>alert('Image Uploaded but not renamed!!')</script>";

        $fn = $_POST['fn'];
        $mn=$_POST['mn'];
        $ln=$_POST['ln'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $phnum=$_POST['pn'];
        $email=$_POST['email'];
        $aadhar=$_POST['aadhar'];
        $age=$_POST['age'];
        $qual=$_POST['ql'];
        $exp=$_POST['exp'];
        $profile=$_POST['profile'];

        $query = "INSERT INTO teacherinfo(fn,mn,ln,gender,dob,phnum,email,aadhar,age,ql,uid,exp,profile) VALUES ('$fn','$mn','$ln','$gender','$dob','$phnum','$email','$aadhar','$age','$qual','$uid','$exp','$profile')";
        $result = mysqli_query($conn,$query);

        if($result){
            echo"<script>alert('You have successfully registered Teacher Info')</script>";
            echo "<html>
                        <style>
                            h1{
                                margin-top: 20%;
                            }
                        </style>
                    <body style='background-color: rgba(255, 255, 255, 0.58);'>
                        <center>
                            <h1>Thanks for Registering!!</h1>
                        </center>
                    </body>
                </html>";
        }else{
            echo"<script>alert('Failed to register Teacher Info')</script>";
        }
    }
?>
</body>
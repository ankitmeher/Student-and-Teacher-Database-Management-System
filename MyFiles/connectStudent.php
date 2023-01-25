<?php

    session_start();
    $conn = mysqli_connect("localhost","root","","collegemanagement");

    if(isset($_GET['id'])) $roll = strtoupper($_GET['id']);
    elseif($_SESSION['type']=='admin'||$_SESSION['type']=='teacher') $roll = strtoupper($_POST['uroll']);
    else $roll = $_SESSION['uid'];

    $query = "SELECT * FROM personalinfo WHERE uroll='".$roll."'";
    $result = mysqli_query($conn,$query);

    if(isset($_POST['update'])){
        $fn=$_POST['fn'];
        $mn=$_POST['mn'];
        $ln = $_POST['ln'];
        $dob = $_POST['dob'];
        $gender = $_POST['g'];
        $fathername = $_POST['fathername'];
        $mothername = $_POST['mothername'];
        $age = $_POST['age'];
        $aadhar = $_POST['aadhar'];
        $cast = $_POST['cast'];
        $nationality = $_POST['nationality'];
        // print_r($_POST); 
        // echo $_GET['id'];

        $query = "UPDATE personalinfo SET fn='".$fn."',mn='".$mn."',ln='".$ln."',dob='".$dob."',uroll='".$roll."',gender='".$gender."',fathername='".$fathername."',mothername='".$mothername."',age='".$age."',aadhar='".$aadhar."',cast='".$cast."',nationality='".$nationality."' WHERE uroll='".$roll."'; ";
        $result = mysqli_query($conn,$query);
        //print_r($_SESSION);
        if($result){
            echo"<script>alert('You have successfully UPDATED Personal Info')</script>";
        }else{
            echo"<script>alert('Failed to register Personal Info')</script>";
        }

        $pn=$_POST['pn'];
        $email=$_POST['email'];   
        $address = $_POST['address'];
        
        $query = "UPDATE contactinfo SET uroll='".$roll."',pn='".$pn."',email='".$email."',address='".$address."' WHERE uroll='".$roll."'; ";
        $result = mysqli_query($conn,$query);

        if($result){
            echo"<script>alert('You have successfully Updated Contact Info')</script>";
        }else{
            echo"<script>alert('Failed to Update Contact Info')</script>";
        }

        $mark10=$_POST['mark10'];
        $mark12=$_POST['mark12'];
        $schoolname=$_POST['schoolname'];
        $schooladdress=$_POST['schooladdress'];

        if($_SESSION['type']!='student'){
            $sm1=$_POST['sm1'];
            $sm2=$_POST['sm2'];
            $sm3=$_POST['sm3'];
            $sm4=$_POST['sm4'];
            $sm5=$_POST['sm5'];
            $sm6=$_POST['sm6'];
            
            $query = "UPDATE academicinfo SET uroll='".$roll."',sm1='".$sm1."',sm2='".$sm2."',sm3='".$sm3."',sm4='".$sm4."',sm5='".$sm5."',sm6='".$sm6."',mark10='".$mark10."',mark12='".$mark12."',schoolname='".$schoolname."',schooladdress='".$schooladdress."' WHERE uroll='".$roll."'; ";
            $result = mysqli_query($conn,$query);
        }else{
            $query = "UPDATE academicinfo SET uroll='".$roll."',mark10='".$mark10."',mark12='".$mark12."',schoolname='".$schoolname."',schooladdress='".$schooladdress."' WHERE uroll='".$roll."'; ";
            $result = mysqli_query($conn,$query);
        }


        if($result){
            echo"<script>alert('You have successfully Updated Academic Info')</script>";
        }else{
            echo"<script>alert('Failed to Update Academic Info')</script>";
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
                        <p style='color: red;'>Note: If not kindly check the University Roll you Provided!</p>
                    </center>
                </body>
            </html>";
        //else echo "Not registered!!";
    }

    else{

        $file_name=$_FILES['image']['name'];
        //$roll=strtoupper($_POST["uroll"]);

        $file_size=$_FILES['image']['size'];
        $file_tmp=$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];

        $extension = pathinfo($file_name,PATHINFO_EXTENSION);
        $rename = $roll.".".$extension;

        if(move_uploaded_file($file_tmp,"upload-images/student/".$rename)) echo "<script>alert('Image Uploaded and Renamed by Roll Number!!')</script>";
        else echo "<script>alert('Image Uploaded but not renamed!!')</script>";
        

        $fn=$_POST['fn'];
        $mn=$_POST['mn'];
        $ln = $_POST['ln'];
        $dob = $_POST['dob'];
        $gender = $_POST['g'];
        $fathername = $_POST['fathername'];
        $mothername = $_POST['mothername'];
        $age = $_POST['age'];
        $aadhar = $_POST['aadhar'];
        $cast = $_POST['cast'];
        $nationality = $_POST['nationality'];

        $query = "INSERT INTO personalinfo(fn,mn,ln,dob,uroll,gender,fathername,mothername,age,aadhar,cast,nationality) VALUES ('$fn','$mn','$ln','$dob','$roll','$gender','$fathername','$mothername','$age','$aadhar','$cast','$nationality')";
        $result = mysqli_query($conn,$query);

        if($result){
            echo"<script>alert('You have successfully registered Personal Info')</script>";
        }else{
            echo"<script>alert('Failed to register Personal Info')</script>";
        }

        $pn=$_POST['pn'];
        $email=$_POST['email'];   
        $address = $_POST['address'];
        
        $query = "INSERT INTO contactinfo(uroll,pn,email,address) VALUES ('$roll','$pn','$email','$address')";
        $result = mysqli_query($conn,$query);

        if($result){
            echo"<script>alert('You have successfully registered Contact Info')</script>";
        }else{
            echo"<script>alert('Failed to register Contact Info')</script>";
        }

        $mark10=$_POST['mark10'];
        $mark12=$_POST['mark12'];
        $schoolname=$_POST['schoolname'];
        $schooladdress=$_POST['schooladdress'];

        $query = "INSERT INTO academicinfo(uroll,mark10,mark12,schoolname,schooladdress) VALUES ('$roll','$mark10','$mark12','$schoolname','$schooladdress')";
        $result = mysqli_query($conn,$query);

        if($result){
            echo"<script>alert('You have successfully registered Academic Info')</script>";
        }else{
            echo"<script>alert('Failed to register Academic Info')</script>";
        }
    }
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
?>
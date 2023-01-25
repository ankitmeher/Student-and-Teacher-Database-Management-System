<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","collegemanagement");

    if(isset($_POST['add'])){


        $user=$_POST['uname']; 
        $type=$_POST['usertype'];
        $uid=strtoupper($_POST['uid']);
        $pass=$_POST['pass'];
        $cpass=$_POST['cpass'];
 
        $query = "SELECT * FROM loginform WHERE uid='".$uid."'";
        $result = mysqli_query($conn,$query);
    
        if((mysqli_num_rows($result)!==0)){
            echo "<html>
            <style>
                h1{
                    margin-top: 20%;
                }
                body{
                    background-color: rgba(255, 255, 255, 0.58);
                    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                }
            </style>
                <body>
                    <center>
                        <h1>Already Registered!!</h1>
                        <p style='color: red;'>Note: If not kindly check the University Roll you Provided!</p>
                    </center>
                </body>
            </html>";
        }
        else{
            if($cpass==$pass){
                $query="INSERT INTO loginform(user,usertype,pass,uid) VALUES ('$user','$type','$pass','$uid')";
                $result = mysqli_query($conn,$query);
        
                if($result){
                    echo"<script>alert('You have successfully registered the new user!!')</script>";
                }else{
                    echo"<script>alert('Failed to register New User')</script>";
                }
            }
            else echo"<script>alert('Password is not same')</script>";
        }

    }
?>
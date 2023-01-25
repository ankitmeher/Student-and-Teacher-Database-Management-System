<?php
    $host = 'localhost';
    $user = 'root';
    $password = "";
    $db = "collegemanagement";

    $conn = mysqli_connect($host,$user,$password,$db);

    if(isset($_POST['username'])){
        $type = $_POST['usertype'];
        //$uname = $_POST['username'];
        $password = $_POST['password'];
        $uid = strtoupper($_POST['username']);

        $sql = "select * from loginform where uid='".$uid."' AND usertype='".$type."' AND pass='".$password."' limit 1";
        
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            session_start();
            $_SESSION['uid'] = $uid;
            $_SESSION['type'] = $type;
            header('Location: index.php');
        }
        else{
            echo "<script>alert('You have entered Incorrect Credentials')</script>";
        }
    }

?>
<html>
<head>
    <title>Login Page</title>
    <style>
        #loginBox{
            border-radius: 15px;
            margin-top: 3%;
            margin-left: 35%;
            margin-right: 35%;
            background-color: rgba(0, 0, 0, 0.307);

        }
        #login{
            font-size: 1.5cm;
            text-shadow: 3px 1px grey;
        }
        #box{
            border-color: aqua;
            border-radius: 15px;
        }
        #submit {
            background: #0066A2;
            color: white;
            border-style: unset;
            border-color: #0066A2;
            height: 30px;
            width: 100px;
            font: bold 15px arial,sans-serif;
            text-shadow: none;
            border-radius: 15px;
        }
        #submit:hover{
            background: #0a19a7;
            color: white;
            border-style: unset;
            border-color: #0066A2;
            height: 30px;
            width: 100px;
            font: bold30px arial,sans-serif;
            text-shadow: none;
            border-radius: 15px;
        }
        body{
            background-image: url(gmulogin.jpg);
            background-position: center;
            background-size: 100% 100%;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <center>
           <div id = 'loginBox'>
            <fieldset id="box">
            <img style="height:180px; width:180px;" src="GMU.jpg" alt="Not Found">
                <h1 id = login>Login</h1>
                <select style="border-radius: 10px" name="usertype" required>
                <option selected hidden value="">Select User Type</option>
                    <option value="admin">Admin</option>
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select><br><br>
                <label for="username"><b style='color: white;'>Enter University ID</b></label><br>
                <input type="text" placeholder = "Enter ID" name="username" required><br><br>
                <label for="password"><b style='color: white;'>Password</b></label><br>
                <input type="password" placeholder = "Enter Password" name="password" required><br><br>
                <input id = "submit" name="submit" type="submit" value = "Login ">
            </fieldset>
           </div>
        </center>
    </form>
</body>
</html>
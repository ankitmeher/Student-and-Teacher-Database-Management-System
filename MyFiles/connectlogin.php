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
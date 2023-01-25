<?php
    session_start();
    $uid=$_SESSION['uid'];
    $conn = mysqli_connect("localhost","root","","collegemanagement");
    if(isset($_POST['post'])){
        $query = "SELECT * FROM loginform where uid='".$uid."'";
        $res = mysqli_query($conn,$query);
        if( $res ){
            $row = mysqli_fetch_assoc($res);
        }
        $notice = $_POST['notice'];
        $subject = $_POST['subject'];
        $sender = $row['user'];
        $receiver = $_POST['sendto'];
        date_default_timezone_set('Asia/Calcutta');
        $datetime = date("F d, Y h:i:s A",time());

        $query = "INSERT INTO notice(notice,subject,uid,sender,receiver,datetime) VALUES ('$notice','$subject','$uid','$sender','$receiver','$datetime') ";
        $res = mysqli_query($conn,$query);

        if($res){
            echo"<script>alert('Notice Posted Sucessfully!!');</script>";
        }else echo "<script>alert('Notice unable to post!!');</script>";
    }

?>

<html>
<head>
<style>
    div{
        margin-top:5%;
        margin-left:25%;
        text-align:center;
    }
    body{
           background-color: rgba(255, 255, 255, 0.58);
       }
</style>
</head>
<body>
       <center>
        <h2 style='margin-top:5%;'>Write your notice here</h2><br><br>
        </center>
    <div>
    <form action="writenotice.php" method="post">
    <table>
            <tr>
                <td><label for="">Subject of notice:</label></td>
                <td><input type="text" name='subject' required></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td><label for="">Send to:</label></td>
                <?php
                    if($_SESSION['type']=='admin')
                    echo "<td><input type='radio' name='sendto' value='both'>Both(Teachers & Students)</td>
                            <td><input type='radio' name='sendto' value='teacher'>Teachers</td>";
                ?>
                <td><input type="radio" name='sendto' value='student'required>Students</td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td><textarea name="notice" id="" cols="50" rows="8" requied></textarea></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><input type="submit" name='post' value='POST'></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>
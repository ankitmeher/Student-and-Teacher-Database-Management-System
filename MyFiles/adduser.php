<html>
<head>
    <style>
        .btn{
            background: #0066A2;
            color: white;
            border-style: unset;
            border-color: #0066A2;
            border-radius: 15px;
            width: 80px;
            font: bold 15px arial,sans-serif;
            text-shadow: none;
        }
        .btn:hover{
            background: #0a19a7;
            border-radius: 5px;
        }
        div{
            border-color: black;
            margin-top: 10%;
            border: 15px;
            border-radius: 5px;
        }
        body{
           background-color: rgba(255, 255, 255, 0.58);
           font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
       }
       fieldset{
           margin-top: 10%;
           margin-left: 20%;
           margin-right: 20%;
           border-color:  rgba(70, 142, 190, 1);
           /* border-radius: 10px; */
       }
    </style>
</head>
<body>
       <fieldset>
       <div>
    <h1 style="text-align:center ;">Add User</h1><br>
        <form action="connectadduser.php" method="POST">
            <center>
                <select style="border-radius: 10px" name="usertype" required>
                    <option selected hidden value="">Select User Type</option>
                    <?php session_start(); if($_SESSION['type']=='admin') 
                    echo "<option value='admin'>Admin</option>" ?>
                        
                    <option value="teacher">Teacher</option>
                    <option value="student">Student</option>
                </select><br><br>
                <table>
                    <tr>
                        <td><label for="">Enter the username:</label></td>
                        <td><input type="text" name="uname" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Enter University ID:</label></td>
                        <td><input type="text" name="uid" id="" required></td>
                    </tr>
                    <tr>
                        <td><label for="">Enter the password:</label></td>
                        <td><input type="text" name="pass" required></td>
                    </tr>

                    <tr>
                        <td><label for="">Confirm your password:</label></td>
                        <td><input type="password" name="cpass" required></td>
                    </tr>
                </table><br>
                    <input type="submit" class='btn' name="add" value="Add">&nbsp;
                    <input type="reset" class='btn' name="reset" value="Reset"> 
            </center>
        </form>
    </div>
       </fieldset>
</body>
</html>
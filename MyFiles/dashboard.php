<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","collegemanagement");

    $query = "SELECT * FROM teacherinfo";
    $result = mysqli_query($conn,$query);

    $num_teacher_rows = mysqli_num_rows($result);

    $query = "SELECT * FROM personalinfo";
    $result = mysqli_query($conn,$query);

    $num_student_rows = mysqli_num_rows($result);
    echo "<html>
    <head>
        <style>
            body{
                background-color: rgba(255, 255, 255, 0.58);
            }
            .dash{
                margin-top: 10%;
            }
            fieldset{
                margin-top: 10%;
                margin-left: 20%;
                margin-right: 20%;
                border-color:  rgba(70, 142, 190, 1);
            }
        </style>
    </head>
    <body>
        <fieldset>
        <center>
            <div class='dash'>
                <h1>Total number of Teachers Registered!!</h1>
                <h1>".$num_teacher_rows."</h1>
        
            </div>
            <div class='dash'>                       
                <h1>Total number of Students Registered!!</h1>
                <h1>".$num_student_rows."</h1>     
            </div>
        </center>
        </fieldset>
    </body>
    </html>";
?>
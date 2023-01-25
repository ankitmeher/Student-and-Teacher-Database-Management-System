<?php
    session_start();

?>
<html>
<head>
    <style>
        #notice{
            margin-top:10%;
            border:10px;
            border-color:black;
            text-align:center;
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
<body style='background-color: rgba(255, 255, 255, 0.58);'>
<fieldset>
<div id='notice'>
            <a href='notice.php'><img src='inbox.png' alt='' height='100px' width='100px'></a>
            <h3>Notice</h3><br><br>
                <?php 
                    if($_SESSION['type']!='student')
                    echo "<a href=\"writenotice.php\"><img src=\"writenotice.png\" alt=\"\" height='100px' width='100px'></a>
                    <h3>Write a Notice</h3>";
                 ?>

</div>
</fieldset>
</body>
</html>
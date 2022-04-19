<?php

    include_once 'connection.php';

    $name=$_POST['adname'];
    $pass=$_POST['adpass'];
    $mail=$_POST['mail'];
    $cmd="insert into admin(name,pass,email) values('$name','$pass','$mail')";
    $res=mysqli_query($connection,$cmd);
    if($res)
    {
        header('location:admin_upload_file.html');
    }
    else
    {
        echo "<h2>Invalid Login</h2>";
        echo "<a href='login.html'>Login Again</a>";
    }

?>
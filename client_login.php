<?php

    include_once 'connection.php';

    $mail=$_POST['email'];
    $pass=$_POST['pass'];

    session_start();

    $cmd="select * from clients where emailid='$mail' && password='$pass'";
    $res=mysqli_query($connection,$cmd);

    if(mysqli_num_rows($res)==1)
    {
        header('location:client_view_pdt.php');

        $_SESSION['login_status']='success';
    }
    else
    {
        echo "Login failed.
        <a href='client_login.html'>Try Again</a>";
    }

?>
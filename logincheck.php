<?php
session_start();
$user=$_POST['uname'];
$pass=$_POST['upass'];

if($user=="acme" && $pass="admin")
{
    $_SESSION['login_status']=true;
    header('location:home.php');
}
else
{
    $_SESSION['login_status']=false;
    echo "Login Failed";
}

?>
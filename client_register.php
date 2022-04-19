<?php

    include_once 'connection.php';

    $name=$_POST['Name'];
    $pass=$_POST['Password'];
    $email=$_POST['mailid'];
    $number=$_POST['mobile'];

    $cmd="insert into clients(name,emailid,contact,password) values('$name','$email','$number','$pass')";

    $res=mysqli_query($connection,$cmd);

    if($res)
    {
        echo "
        <h1>Registration Successful.</h1>
        <a href='client_login.html'>Login</a>";
    }
    else
    {
        echo "<a href='client_register.html'>Registration Failed.Please try again.</a>";
    }

?>
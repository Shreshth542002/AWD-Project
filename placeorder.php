<?php
    session_start();
    include_once 'connection.php';
    $_SESSION['id']=array();
    $ids=$_SESSION['id'];
    // $mail=$_SESSION['emailid'];
    // $query="select * from users where cmail='$mail'";
    $res=mysqli_query($connection,$query);
    $user_row=mysqli_fetch_assoc($res);
    $mobile=$user_row['contact'];
    $address=$user_row['address'];
    for($i=0;$i<count($ids);$i++)
    {
        $id=$ids[$i];
        $cmd="insert into users(pid,cmail,cmobile,caddress) values('$id','$mail','$mobile','$address')";
        $res=mysqli_query($connection,$cmd);
        if(!$res)
        {
            echo "Something went wrong";
            die;
        }
    }
    echo "Order Placed Successfully.<br>";
    echo "<a href='client_view_pdt.php'>Go to Products<a>";

?>

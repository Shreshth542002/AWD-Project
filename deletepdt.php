<?php

    include_once 'connection.php';

    $pid=$_GET['pid'];

    $cmd="delete from products where pid='$pid'";

    $res=mysqli_query($connection,$cmd);
    if($res)
    {
        header('location:view_product.php');
    }
    else
    {
        echo "Sorry failed to remove from cart <br>";
        echo "<a href='client_view_pdt.php'>Return to view products</a>";
    }

?>
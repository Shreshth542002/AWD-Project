<?php

    $pid=$_GET['pid'];
    session_start();

    if(isset($_SESSION['pids']))
    {
        if(array_search($pid,$_SESSION['pids'])!==false)
        {
            echo "<script> alert('Item already in cart');</script>";
        }
        else
        {
            array_push($_SESSION['pids'],$pid);
            header('location:client_view_pdt.php');
        }
        print_r($_SESSION['pids']);
    }
    else
    {
        $_SESSION['pids']=array($pid);
        header('location:client_view_pdt.php');
    }

?>

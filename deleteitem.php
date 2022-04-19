<?php

    $pid=$_GET['pid'];
    session_start();
    $pids=$_SESSION['pids'];
    $ind=array_search($pid,$pids);

    unset($pids[$ind]);

    $_SESSION['pids']=$pids;

    header('location:cart.php');

?>
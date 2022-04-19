<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
           font-family: 'Montserrat', sans-serif;
        }
        .parent
        {
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        body
        {
            background-image: url('https://media.istockphoto.com/photos/recycled-paper-texture-background-in-cyan-turquoise-teal-aqua-green-picture-id1139572287?b=1&k=20&m=1139572287&s=170667a&w=0&h=9mFKm45R-Mlw1M5YUjowo2gvei5705ANQ6KGCmJvOsc=') ;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .heading
        {
            color: black;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 40px;
        }
        .container
        {
            margin-top:40px;
            border:solid black;
            border-radius:10px;
        }
        .child
        {   
            justify-content:space-evenly;
            margin-top: 25px;
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
            border: solid blue 3px;
            border-radius: 5px;
        }
        .button
        {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: green;
            padding:4px;
            border: solid green 5px;
            border-radius: 5px;
            color:wheat;
            margin-left: 100px;
        }
        .logout
        {
            position: absolute;
            right:5px;
            top:5px;
        }
        .image
        {
            width:300px;
            height:200px;
        }
        .logout
        {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: red;
            padding:4px;
            border: solid red 5px;
            border-radius: 5px;
            color:wheat;
            margin-left: 100px;
        }
        .order
        {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: #ffdd00;
            padding:4px;
            border: solid #ffdd00 5px;
            border-radius: 5px;
            color:wheat;
            position: absolute;
            bottom:5px;
            right:5px;
        }
        .total
        {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: green;
            padding:4px;
            border: solid green 5px;
            border-radius: 5px;
            color:wheat;
            margin-left: 100px;
            position: absolute;
            bottom:5px;
            right:110px;
        }
        .s1
        {
            display:flex;
            justify-content:space-between;
        }
    </style>
</head>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<body>    
</body>
</html>

<?php

    include_once 'connection.php';

    session_start();

    $pids=$_SESSION['pids'];
    $pid_str=join(",",$pids);
    $cmd="select * from products where pid in ($pid_str)";
    $res=mysqli_query($connection,$cmd);


    echo "<a href='expire_session.php'>
    <button class='logout'> Logout </button>
    </a>";
    echo "<div class='parent'>";
    $sum=0;
    while($row=mysqli_fetch_assoc($res))
    {
        $pid=$row['pid'];
        $name=$row['name'];
        $details=$row['details'];
        $imgsrc=$row['img_loc'];
        $price=$row['price'];
        $sum+=$price;
        
        echo "<div class='container'> 
                <span class='s1'><h3>$name</h1>
                <h3><span>Rs.</span>$price</h3></span>
                <img src='$imgsrc' class='image'>
                <p>$details</p>
                <button class='button'><a href='deleteitem.php?pid=$pid'>Remove</a></button>
            </div>";
    }
    echo "
    <button class='order'> <a href='placeorder.php'>Place Order<a></button>
    <button id='sum'  class='total'> </button>
    </div>";

    echo "<script>

        document.getElementById('sum').innerHTML='Buy Total=$sum';

    </script>";
?>
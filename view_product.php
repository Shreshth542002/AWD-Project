<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        p
        {
            text-align: center;
        }
        .container
         {
            padding-top: 10px;
            padding-bottom: 10px;
            border: solid black 3px;
            border-radius: 5px;
            flex-wrap: wrap;
            margin: 10px 10px;
        }
        .parent
        {
            min-height: 100vh;
            background-image: linear-gradient(red, pink,white);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
        .main {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: row;
          flex-wrap: wrap;
        }
        .button
        {
            
            background-color: Blue;
            padding:4px;
            border: solid blue 5px;
            border-radius: 5px;
            color:wheat;
            margin-left: 125px;
        }
        .image
        {
            width:300px;
            height:200px;
        }
        .s1
        {
            display: flex;
            justify-content:space-between;
            flex:wrap;
        }
    </style>
</head>
<body>
    
</body>
</html>


<?php

    include_once 'connection.php';
    $cmd=mysqli_query($connection,'select * from products');

    if(mysqli_num_rows($cmd)==0)
    {
        echo "No items to display.";
    }

    echo "<div class='parent'>
    <div class='main'>";
    while($row=mysqli_fetch_assoc($cmd))
    {
        $pid=$row['pid'];
        $name=$row['name'];
        $details=$row['details'];
        $price=$row['price'];
        $imgsrc=$row['img_loc'];

        echo "
            <div class='container'>
                <div class='child'> 
                    <span class='s1'><h2>$name</h2>
                    <h3><span>Rs.</span>$price</h3></span>
                    <img src='$imgsrc' class='image'>
                    <p>$details</p>
                </div>
                <div>
                    <a href='deletepdt.php?pid=$pid'>
                    <button class='button'>Delete</button></a>
                </div>
            </div>";
    }
    echo "
    </div>
    </div>";
    

?>
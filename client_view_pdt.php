<?php

    session_start();
    if(isset($_SESSION['login_status']))
    {
        if($_SESSION['login_status']=='success')
        {

        }
        else
        {
            echo '<script type="text/javascript">'; 
            echo 'alert("ILLEGAL ENTRY");'; 
            echo 'window.location.href = "client_login.html";';
            echo '</script>';
            die;
        }
    }
    else
    {
            echo '<script type="text/javascript">'; 
            echo 'alert("ILLEGAL ENTRY");'; 
            echo 'window.location.href = "client_login.html";';
            echo '</script>';
            die;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        * {
           font-family: 'Montserrat', sans-serif;
        }
        .main {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: row;
          flex-wrap: wrap;
           position: absolute;
            top: 20%;
        }
        body
        {
            background-image:url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuIlFi_tVMRuaofI7Eo-CPL9ujbmRw15-o9A&usqp=CAU');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;            
        }
        .heading
        {
            color: black;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 40px;
        }
        .container
        {
            display: flex;
            justify-content: space-evenly;
            margin-right:5px;
            margin-bottom:5px;
            margin-top:5px;
            border: solid blue 5px;
            border-radius:10px;
        }        
        .parent
        {
            min-height: 100vh;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
        }
        }
        .child
        {   
            justify-content:space-around;
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
            border: solid red 3px; 
            border-radius: 5px;
        }
        .btn-cart
        {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: #0bd400;
            padding: 15px;
            border:  none;
            border-radius: 5px;
            color: wheat;
            margin-left: 100px;
            cursor: pointer;
            transition: all 0.3s ease;
            color: black;
            margin-bottom:1rem;
        }
        .btn-cart:hover {
          background-color: #078700;
        }
        .kuch {
            position: absolute;
            right: 0;
            top: 3%;
        }
        .kuch a {
            margin: 0px 20px;
            text-decoration: none;
            color: black;
            font-size: 20px;
            font-weight: 600;
        }
        .viewcart {
            padding: 10px 15px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            background-color: orange;
        }
        .image
        {
            width:300px;
            height:200px;
            object-fit:cover;
        }
        .s1
        {
            display:flex;
            justify-content:space-around;
        }
    </style>
</head>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<body>
    
</body>
</html>

<?php

    include_once 'connection.php';

    if(isset($_SESSION['pids']))
    {
        $cart_count=count($_SESSION['pids']);
    }
    else
    {
        $cart_count=0;
    }
    $cmd=mysqli_query($connection,'select * from products');

    

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
                <a href='addtocart.php?pid=$pid'>
                <button class='btn-cart'>Add to cart</button>
                </a>
            </div>
        </div>";
    }
    
    echo "
    </div>
    <div class='kuch'>
    <a href='expire_session.php' class='logout'>Logout</a>
    <a href='cart.php'>
    <button class='viewcart'>$cart_count</button>
    </a>
    </div>
    </div>";
    
?>
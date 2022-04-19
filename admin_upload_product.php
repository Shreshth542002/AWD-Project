<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .success
        {
            color:yellow;
        }
    </style>
</head>
</html>
<?php

    include_once 'connection.php';
    
    $name=$_POST['pname'];
    $detail=$_POST['details'];
    $price=$_POST['price'];

    $unique_file_name=date('h_i_s');

    move_uploaded_file($_FILES['imgdata']['tmp_name'],$unique_file_name);

    $cmd="insert into products(name,details,price,img_loc) values('$name','$detail',$price,'$unique_file_name')";
    $ans=mysqli_query($connection,$cmd);
    if($ans)
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Upload Success");'; 
        echo 'window.location.href = "view_product.php";';
        echo '</script>';
    }
    else
    {
        echo '<script type="text/javascript">'; 
        echo 'alert("Upload Failed");'; 
        echo 'window.location.href = "admin_upload_file.html";';
        echo '</script>';
    }
?>
<?php

require('config.php');

if(isset($_POST['submit']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);
    $cpwd = mysqli_real_escape_string($conn,$_POST['cpassword']);

    if($pwd!=$cpwd)
    {
        // pop up msg and redirecting to the html page
        echo "<script type='text/javascript'>alert('Enter the password correctly');
        window.location='register.html';
        </script>";
    }
    $sql_e = "SELECT * FROM user_table WHERE Email = '$email'";
    $res_e = mysqli_query($conn,$sql_e);
    $sql_p = "SELECT * FROM user_table WHERE Password = '".md5($pwd)."'";
    $res_p = mysqli_query($conn,$sql_p);
    
    if(mysqli_num_rows($res_e) > 0){
        echo "<script type='text/javascript'>alert('Email is already taken!');
            window.location='register.html';
            </script>";
    }
    else if(mysqli_num_rows($res_p) > 0){
        echo "<script type='text/javascript'>alert('Password is already taken!');
            window.location='register.html';
            </script>";
    }
    else{
        $pass = md5($pwd);//for encrypting
        $sql = "INSERT INTO user_table (Name , Email , Password) values ('$name','$email' , '$pass')";
        $res= mysqli_query($conn,$sql);

        if($res){
            echo "<script type='text/javascript'>alert('Registered Successfully!');
            window.location='login.html';
            </script>";
        }
    }
}

?>
<?php

require('config.php');

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pwd = mysqli_real_escape_string($conn,$_POST['password']);

    $sql_e = "SELECT * FROM user WHERE Email = '$email'";
    $res_e = mysqli_query($conn,$sql_e);
    $sql_p = "SELECT * FROM user WHERE Password = '".md5($pwd)."'";
    $res_p = mysqli_query($conn,$sql_p);

    if($res_e)
    {
        if($res_p)
        {
            echo "<script type='text/javascript'>alert('Loggedin Successfully!');
            window.location='home.html';
            </script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('Enter a valid password!');
            window.location='login.html';
            </script>";
        }
    }
    else
    {
        echo "<script type='text/javascript'>alert('Enter a valid email!');
        window.location='login.html';
        </script>"; 
    }
}

?>
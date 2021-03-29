<?php

require('config.php');

if(isset($_POST['cpwd']))
{
    $email = $_POST['email'];
    $opwd = md5($_POST['oldpwd']);
    $npwd = md5($_POST['newpwd']);
    $confirmpwd = md5($_POST['confirmpwd']);

    if($npwd!=$confirmpwd)
    {
        // pop up msg and redirecting to the html page
        echo "<script type='text/javascript'>alert('Enter the password correctly');
        window.location='changepwd.html';
        </script>";
    }

    $query = "SELECT Email,Password FROM user_table WHERE Email = '$email' AND Password = '$opwd'";
    $res = mysqli_query($conn,$query);

    $num = mysqli_fetch_array($res);

    if($num > 0)
    {
        $sql = "UPDATE user_table SET Password = '$npwd' WHERE Email = '$email'";
        $result = mysqli_query($conn,$sql);

        if($result)
        {
            echo "<script type='text/javascript'>alert('Password changed Successfully!');
            window.location='login.html';
            </script>";
        }
    }
}

?>
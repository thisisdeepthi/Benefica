<?php

require('config.php');

if(isset($_POST['login']))
{
   $email = $_POST['email'];
   $pwd = $_POST['password'];

   $pass = md5($pwd);
   
   $sql = "SELECT * FROM user WHERE Email ='".$email."' AND Password = '".$pass."'";

   $res = mysqli_query($conn,$sql);

   if(mysqli_num_rows($res) == 1)
   {
     echo "<script type='text/javascript'>alert('Loggedin successfully!');
     window.location='home.html';
     </script>";
   }
   else
   {
     echo "<script type='text/javascript'>alert('Enter the valid credentials!');
     window.location='login.html';
     </script>";
   }
}

?>
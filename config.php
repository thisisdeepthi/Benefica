<?php
//   $db = mysqli_connect("localhost:8111","root","","testdb");

//   if(!$db)
//   {
//       die("Connection failed: " . mysqli_connect_error());
//   }

$dbhost = 'localhost:8111';
$username = 'root';
$password = '';
$db='oss';

$conn=mysqli_connect($dbhost,$username,$password,$db);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
// else
//   echo "connected";
?>

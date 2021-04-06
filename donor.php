<?php

require('config.php');

if(isset($_POST['submit']))
{
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $dob = mysqli_real_escape_string($conn,$_POST['dob']);
    $gender = mysqli_real_escape_string($conn,$_POST['gender']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $state = mysqli_real_escape_string($conn,$_POST['state']);
    $pincode = mysqli_real_escape_string($conn,$_POST['pincode']);
    $phn = mysqli_real_escape_string($conn,$_POST['phn']);
    $weight = mysqli_real_escape_string($conn,$_POST['weight']);
    $bloodgrp = mysqli_real_escape_string($conn,$_POST['bloodgrp']);
    $disease = mysqli_real_escape_string($conn,$_POST['disease']);
    $organs = $_POST['organs'];
    $no = "no";

    function age($dob){
        if(!empty($dob)){
            $bdate = new DateTime($dob);
            $today = new DateTime('today');
            $age1 = $bdate->diff($today)->y;
            return $age1;
        }
    }

    $age = age($dob);
    // echo $age;
    // echo gettype($age);
    // echo ($age >= 18 || $age<=60);
    // echo $disease;echo $no;
    
    if(($age >= 18 || $age<=60) && ($disease == $no)){
            foreach($organs as $organ){
                $neworgan = $organ;
                $query = "INSERT INTO donor_table (`First Name`,`Last Name`,Email,Dob,Age,Gender,Address,City,State,Pincode,`Phone number`,Weight,`Blood Group`,Disease,Organs) VALUES ('$fname' , '$lname' , '$email' , '$dob' , '$age' ,'$gender' , '$address' , '$city' , '$state' , '$pincode' , '$phn' , '$weight' , '$bloodgrp' , '$disease' , '$neworgan') ";
                $res= mysqli_query($conn,$query);

                if($res){
                   echo "<script type='text/javascript'>alert('You are a donor now!');
                   window.location='home.html';
                   </script>";
                }
            }
        
    }
    else
    {
        echo "<script type='text/javascript'>alert('Age should be between 18 and 60 and also you should not suffer from any disease!');
        window.location='donor.html';
        </script>";
    }
}

?>
<html>
<head>
<title>Searched records</title>
<style type="text/css">
table{
    border-collapse:collapse;
    text-align:center;
    width:60%;
    height:20%;
    /* margin:2px auto; */
    margin-left:auto;
    margin-right:auto;
    font-size:16px;
}
tr{
    align:center;
}
th{
    border:1px solid #333;
    align:center;

}
td{
    border:1px solid #333;
    align:center;
}
</style>
</head>
<body>
<?php

require('config.php');

if(isset($_POST['submit']))
{
    $organ = mysqli_real_escape_string($conn,$_POST['organs']);
    $bloodgrp = mysqli_real_escape_string($conn,$_POST['bloodgrp']);

    //$query = "SELECT `First Name`,Email,City,`Phone number` FROM donor_table where Blood group = '".$bloodgrp."' AND Organs = '".$organ."'";
    $stmt = "SELECT * FROM donor_table WHERE `Blood group` = '".$bloodgrp."' AND Organs = '".$organ."'";
    $result = mysqli_query($conn,$stmt);
    //echo mysqli_num_rows($result);

    // if (mysqli_num_rows($result) > 0) {
    //     // output data of each row
    //     while($row = mysqli_fetch_assoc($result)) {
    //     echo "Name: " . $row["First Name"]. " - Email: " . $row["Email"].  "<br>";
    //     }
    //    } else {
    //     echo "0 results";
    //    }

    if (mysqli_num_rows($result) > 0)
    {
        echo "<table>";
           echo "<tr>";
             echo "<th>First Name</th>";
             echo "<th>Email Id</th>";
             echo "<th>City</th>";
             echo "<th>Phone number</th>";
           echo "</tr>";
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
               echo "<td>" . $row['First Name'] . "</td>";
               echo "<td>" . $row['Email'] . "</td>";
               echo "<td>" . $row['City'] . "</td>";
               echo "<td>" . $row['Phone number'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "No records";
    }
}

?>
</body>
</html>
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
        echo "<table border = '2' align = 'center' width = '60%' height = '20%' margin = '0px auto'>";
           echo "<tr align = 'center'>";
             echo "<th align = 'center'>First Name</th>";
             echo "<th align = 'center'>Email Id</th>";
             echo "<th align = 'center'>City</th>";
             echo "<th align = 'center'>Phone number</th>";
           echo "</tr>";
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";
               echo "<td align = 'center'>" . $row['First Name'] . "</td>";
               echo "<td align = 'center'>" . $row['Email'] . "</td>";
               echo "<td align = 'center'>" . $row['City'] . "</td>";
               echo "<td align = 'center'>" . $row['Phone number'] . "</td>";
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
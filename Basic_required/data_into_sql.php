<?php
//dataconnection in database.php

include "database.php";

//take data from form 

include "datafrom_form.php";

 // Insert data into user table
 $sql = "INSERT INTO user (name, age, gender) VALUES ('$name', '$age', '$gen')";

 // Execute the query
 $r = mysqli_query($conn, $sql);

 if ($r) {
     echo "Data inserted. Query executed successfully.";
 } else {
     echo "Something went wrong. Error: " . mysqli_error($conn);
 }


?>
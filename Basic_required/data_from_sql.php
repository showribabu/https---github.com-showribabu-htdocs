<?php

//before this your database connection esatblished...
//$conn

$sql2='select * from user';

$dd=mysqli_query($conn, $sql2);
//print(gettype($dd));
//$dd->object...
$c=1;

// foreach($dd as $row)
// {
//     printf(gettype($row));
//     printf("column %d : name - %s and age - %d and gender-%s",$c,$row['name'],$row['age'],$row['gender']);
//     $c++;
    
// }

/*we can use this or above*/

if(mysqli_num_rows($dd)>0)
{
    while($row=mysqli_fetch_assoc($dd))
    {
        echo '<br>';
        printf("column %d : name - %s and age - %d and gender-%s",$c,$row['name'],$row['age'],$row['gender']);
        $c++;

    }
}

?>

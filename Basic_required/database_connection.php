
<?php

/*Database connecion...by use:   mysqli_connect();*/

//requirements..

$host='localhost';
$user='root';
$password='Ksb6419*';
$database='mas';
$conn=mysqli_connect($host,$user,$password,$database);

if($conn)
echo "connection established.<br>";
else
die('Error:'.mysqli_connect_error());


?>
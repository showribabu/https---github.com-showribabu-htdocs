
<?php

/*Database connecion...by use:   mysqli_connect();*/

//requirements..


$db_host        = '10.14.98.204:3306';
// $db_host='localhost';
$db_user        = 'root';
$db_pass        = 'password';
$db_database    = 'mas'; 
//$db_port        = '3306';

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database);

// $sql='alter table files add ftype varchar(50);';
// $r=mysqli_query($conn,$sql);

// if(($r))
// {
//     echo"success";
// }

if($conn)
{
    echo "connection established.<br>";
 
}
else
{
    echo "connection not established.<br>";
    // die('Error:'.mysqli_connect_error());


}

// $sql='create table status(request_id varchar(50),status varchar(10),FOREIGN KEY(request_id) REFERENCES requests(request_id))';
// $r=mysqli_query($conn,$sql);
// if(!$r)
// {
//     echo"Problem to create";
// }
// else
// {
//     echo "successfully Done";
// }

?>
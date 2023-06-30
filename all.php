
<?php

/*Database connecion...by use:   mysqli_connect();*/

//requirements..


$host='localhost';
$user='root';
$password='';
$database='mas';
$conn=mysqli_connect($host,$user,$password,$database);

if($conn)
echo "connection established.<br>";
else
die('Error:'.mysqli_connect_error());



/*take values from user input and display it..*/

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_POST['name'];
    $age=$_POST['age'];
    printf('<br>The valaues are:%s and %d<br>',$name,$age);

    // if(isset($_POST['gender']))
    // {
    // $gen=$_POST['gender'];
    // echo $gen;
    // }
    // else{
    //     print('Gender is not selecterd');
    // }

    $gen=$_POST['gender'];
    echo '<br>'.$gen;

}



//data into the database table...

//if user not registered before then only into database table
$sql2='select * from user';
$dd=mysqli_query($conn, $sql2);
//OBJECT
$f=0;
foreach($dd as $i)
{
    if($i['name']==$name){
        $message='User already registered.';
        $f=1;
        break;
    }
}
if($f!=1)
    {

         // Insert data into user table
         $sql = "INSERT INTO user(name,age,gender) VALUES ('$name', '$age', '$gen')";

         // Execute the query
         $r = mysqli_query($conn, $sql);
 
         if ($r){
             echo "<br>Data inserted. Query executed successfully.<br>";
             $message = "Successfully registered!";
         } 
         else{
             echo "<br>Something went wrong. Error: " . mysqli_error($conn);
         }
 

    }

 

 /*inserted data from the table to display... user... from database */

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

/* another one..*/

if(mysqli_num_rows($dd)>0)
{
    while($row=mysqli_fetch_assoc($dd))
    {
        echo '<br>';
        printf("column %d : name - %s and age - %d and gender-%s",$c,$row['name'],$row['age'],$row['gender']);
        $c++;

    }
}

include "all.html";

?>


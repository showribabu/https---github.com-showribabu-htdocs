<?php 
$host='localhost';
$user='root';
$pass='';
$db='mongodb';
$secretKey = '12345678';
$baseUrl = 'http://localhost/MongoDB/';


$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn)
{
    echo die('Error:'.mysqli_connect_error());
    die();
}
?>
<?php

/*take values from user input*/

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

?>
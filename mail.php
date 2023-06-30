<?php
$to='rajubai6419@gmail.com';
$sub='Ragrding php';
$body='hello how are you? this is from php';
$head='From:kantashowribabu@gmail.com';

//send..
if(mail($to,$sub,$body,$head))
{
    echo"successfully done";

}
else{
    echo "failed to send";
}

//https://www.youtube.com/watch?v=onl9zcZE6Q8&t=23s
//watch youtube video for more explanation about warning.




/*


<?php
//requirements..

// $db_host        = '10.14.98.204';
$db_host        ='localhost';
$db_user        = 'root';
// $db_pass        = 'password';
$db_pass        = '';

$db_database    = 'mas'; 
// $db_port        = '3306';

// $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database,$db_port);
$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_database);
if(!$conn)
die('Error:'.mysqli_connect_error());

//upload a file...
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   $targetdir='C:/Users/kanta/OneDrive/Desktop/FILES';
   if(isset($_FILES['file']))
   {
    $file_name=$_FILES['file']['name'];
    $file_id=generateGroupID();
    // echo $file_id;
    $ftype=$_FILES['file']['type'];
    $file_location=$_FILES['file']['tmp_name'] ;
    $tarf=$targetdir.basename($file_name);
    if(move_uploaded_file($file_location,$tarf))
    {
        echo "<script>alert('Successfully uploaded');</script>";
        $sql2='select * from files';
        $dd=mysqli_query($conn, $sql2);
        $f=0;
        foreach($dd as $i)
        {
            if($i['file_id']==$file_id)
            {
            $message='File id already in use !!! create new one!!!';
            $f=1;
            break;
            }
        }
        if($f!=1)
        {

                $sql = "INSERT INTO files (file_id,file_name,ftype,file_location) VALUES ('$file_id','$file_name','$ftype','$file_location')";


                // Execute the query
                $r = mysqli_query($conn, $sql);

                 if ($r){
                    echo "<script>alert('Successfully inserted --->!!')</script>";
                    include"showfiles.php";
                 } 
                 else{
                     echo"<script>alert('Something went wrong. Error: ')</script>";
                     include"upload.php";
                 }
                // echo"HEllo";
             
        }
        else{
            echo "<script>alert('Request id already used!!!...Use Another one!!!')</script>";
            include"upload.php";

        }

    }
    else{
        echo "<script>alert('Failed to upload');</script>";
    }
   }
}


function generateGroupID() {

    $rands='';
    $file_name=$_FILES['file']['name'];
    for($i=0;$i<3;$i++)
    {
        $index=rand(0,strlen($file_name)-1);
        $rands.=$file_name[$index]; 
    }
    $rands.=rand(100,999);
    return $rands;
    
    }

?>


*/
?>
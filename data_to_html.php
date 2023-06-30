<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="data">

        <table border="4px" cellpadding="15px" align="center" cellspacing="4px" style="height:500px; width:600px;" >
            <tr><th>File ID</th><th>File Name</th><th>Filetype</th></tr>
            <?php
            
            $arr=array("1"=>[1,2,3],"2"=>[4,5,6]);
            foreach($arr as $i)
            {
               
                    echo "<tr><td>$i[0]</td><td>wel.txt$i[1]</td><td>$i[2]</td></tr>";
            }

            ?>

        </table>
        <?php 
        echo "Hello world" ;
        ?>

    </div>
</body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</html>
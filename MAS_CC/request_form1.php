<?php
include 'conn.php';
include 'userpageformat.php';
//session_start();
$mid = $_SESSION['mid'];
if (isset($_POST['submit'])) {
    
        function generateRequestID() {

            $char='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $ucase='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $lcase='abcdefghijklmnopqrstuvwxyz';
            $rands='';
            $index=rand(0,strlen($char)-1);
            $rands.=$char[$index];
            $index=rand(0,strlen($ucase)-1);
            $rands.=$ucase[$index];
            $rands.=rand(100,999);
            $index=rand(0,strlen($lcase)-1);
            $rands.=$lcase[$index];
            
            return $rands;
            
            }
            $sql12='select user_id from admin';
            $rr=mysqli_query($con,$sql12);
            if($rr)
            {
                $request_to=mysqli_fetch_row($rr)[0];
                
            }
            $request_from=$mid;
            $request_id =generateRequestID();
            $message = $_POST['message'];
            $group_type=$_POST['dropdown'];

            $query = "INSERT INTO requests (request_from,request_to,request_id,message,r_status,group_type,group_number) VALUES ('$request_from','$request_to','$request_id','$message','p','$group_type',NULL)";

            $res = mysqli_query($con, $query);
            if ($res) {
                "<script>alert('Your request has been sent successfully');</script>";
            } else {
                echo "Problem occured!";
            }
        }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAS</title>
    <style>
    
    .container div {
        display: flex;
        flex-direction: column;
        margin-top: 10px;

    }
    h2{
            margin-top:0px;
            text-align: center;
            background-color: rgb(103 98 185/48%);
            padding:4px;
        }

    .details {
        color: black;
        margin-left: 1px;
        cursor: pointer;
    }

    
    .textbox {
        width: 100%;
        height: 80px;
        margin-top: 5px;
        margin-bottom: 10px;
    }

    .submit-btn {
        padding: 10px 20px;
        background-color: #100a89;
        color: #fff;
        border: none;
        border-radius: 5px;
        margin-top: 30px;
        margin-left: 325px;
        cursor: pointer;
    }
    </style>
</head>
<body>
    <div class="container">
    <h2>Become Manager</h2>
    <form method="post" enctype="multipart/form-data" onsubmit="return checkSpecialCharacters()">

<label for="dropdown">Group Type:</label>
<select id="dropdown" name="dropdown">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
</select>

<div>
<label class="details">Message:</label>
<textarea class="textbox" name="message" cols="51" rows="5" required
    placeholder="Enter up to 100 characters without special characters.."
    oninput="checkSpecialCharacters()" maxlength="200" minlength="5"></textarea>
</div>
<input class="submit-btn" type="submit" name="submit" value="Submit" >
<!-- <input class="submit-btn" type="submit" name="submit" value="Submit" onclick="displayAlert()"> -->

<p id="messageWarning" style="color: red; text-align: center; display: none;">Please enter up to 100 characters and  without special characters.</p>
</form>
</div>

<script>
function checkSpecialCharacters() {
var messageInput = document.getElementsByName("message")[0];
var message = messageInput.value;
var specialCharacters = /[^A-Za-z0-9,. ]/;
if (specialCharacters.test(message)) {
document.getElementById("messageWarning").style.display = "block";
return false;
} else {
document.getElementById("messageWarning").style.display = "none";
return true;
}
    }

    function displayAlert() {
    alert("Your request has been sent successfully");
}
    
    
    </script>
    <footer>
        <p>MULTIPARTY AUTHENTICATION SYSTEM</p>
    </footer>
</body>
</html>
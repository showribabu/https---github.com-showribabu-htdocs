<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
        <link rel="stylesheet" href="forgot.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

    </head>

    <body>
        <div class="container">
            <h2>Forgot Password</h2>
            <form id="form1" method="post">

                <div class="form-group ">
                    <i class="fa fa-user lock"></i>
                    <input class="inpt" type="password" name="userid" placeholder="UserID" id="userid" required>
                     <i class="fa fa-eye" id="togglepassworduserid" style="position:absolute; right:630px ; margin-top:5px; font-size:20px";></i>
                </div>

                <button class="btn btn-primary" type="submit" id="next" name="next">Next</button>
            </form>

            <form method="post" onsubmit="return form_validation()" hidden id="form2" >
                <div class="form-group ">
                    
                <div class="form-group ">
                   
                    <input class="inpt" type="text" name="useridq" id="useridq"  hidden style="postion:absolute";>
                </div>
                    <div>
                        <i class="fa fa-user lock"></i>
                        <input class="inpt" type="text" id="question1" readonly>
                    </div>
                    <div class="input_field">
                        <i class="fa fa-user lock"></i>
                        <input class="inpt" type="text" placeholder="Answer1" name="answer1" id="answer1">
                    </div>
                </div>


                <div class="form-group">
                    <div class="input_field">
                        <i class="fa fa-user lock"></i>
                        <input class="inpt" type="text" id="question2" readonly>
                    </div>
                    <div class="input_field">
                        <i class="fa fa-lock lock"></i>
                        <input class="inpt" type="text" placeholder="Answer2" name="answer2" id="answer2">
                    </div>
                </div>


                <div class="form-group">
                    <div class="input_field">
                        <i class="fa fa-user lock"></i>
                        <input class="inpt" type="text" id="question3" readonly>
                    </div>
                    <div class="input_field">
                        <i class="fa fa-lock lock"></i>
                        <input class="inpt" type="text" placeholder="Answer3" name="answer3" id="answer3">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input_field">
                        <i class="fa fa-user lock"></i>
                        <input class="inpt" type="password" id="newpassword" placeholder="New Password" name="newpassword" required>
                        <i class="fa fa-eye" id="togglepasswordnewpassword" style="position:absolute; right:630px ; margin-top:5px; font-size:20px";></i>
                    </div>
                    <p id="para_password"></p>
                </div>

                <div class="form-group">
                    <div class="input_field">
                        <i class="fa fa-user lock"></i>
                        <input class="inpt" type="password" id="cpassword" placeholder="Confirm Password" name="cpassword" required>
                        <i class="fa fa-eye" id="togglepasswordcpassword" style="position:absolute; right:630px ; margin-top:5px; font-size:20px";></i>
                    </div>
                    <p id="para_cpassword"></p>
                </div>


                <button class="btn btn-primary" type="submit" id="update_password" name="update_password">Update
                    Password</button>
            </form>
        </div>



<script>
var password1 = document.getElementById("newpassword");
password1.addEventListener('input', func_password);
var password_regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+\-=[\]{};':\"\\|,.<>/?]).{8,}$/
function func_password() {
    const check = password1.value;
    var validationMessage = document.getElementById("para_password");
    if (password_regex.test(check)) {
        validationMessage.textContent = 'Password meets the requirements.';
        validationMessage.style.color = 'green';
        document.getElementById("form2").action = "/forgot.php";
    }
    else {
        validationMessage.textContent = 'Password must contain at least one uppercase varter, one lowercase varter, one numeric digit, one special character, and be at least 8 characters long.';
        validationMessage.style.color = 'red';
        document.getElementById("form2").action = "/forgot.php";
    }
}


var cpassword = document.getElementById("cpassword");
cpassword.addEventListener('input', func_cpassword);
function func_cpassword() {
    var validationMessage = document.getElementById("para_cpassword");
    if (password1.value === cpassword.value) {
        validationMessage.textContent = 'Confirm-Password meets the requirements.';
        validationMessage.style.color = 'green';
        document.getElementById("form2").action = "./forgot.php";

    }
    else {
        validationMessage.textContent = 'Password and confirm-password do not match';
        validationMessage.style.color = 'red'; 
        document.getElementById("form2").action = "./forgot.php";
    }
}





function form_validation() {
  
    if (!password_regex.test(password1.value)) {
        return false;
    }
    if (cpassword.value != password.value) {
        return false;
    }


    return true;
}



var userid = document.getElementById('userid');
var togglepassworduserid = document.getElementById('togglepassworduserid');

togglepassworduserid.addEventListener('click', function() {
  if (userid.type === 'password') {
    userid.type = 'text';
    togglepassworduserid.classList.remove('fa-eye');
    togglepassworduserid.classList.add('fa-eye-slash');
  } else {
    userid.type = 'password';
    togglepassworduserid.classList.remove('fa-eye-slash');
    togglepassworduserid.classList.add('fa-eye');
  }
});

var newpassword = document.getElementById('newpassword');
var togglepasswordnewpassword = document.getElementById('togglepasswordnewpassword');

togglepasswordnewpassword.addEventListener('click', function() {
  if (newpassword.type === 'password') {
    newpassword.type = 'text';
    togglepasswordnewpassword.classList.remove('fa-eye');
    togglepasswordnewpassword.classList.add('fa-eye-slash');
  } else {
    password.type = 'password';
    togglepasswordnewpassword.classList.remove('fa-eye-slash');
    togglepasswordnewpassword.classList.add('fa-eye');
  }
});

var cpassword = document.getElementById('cpassword');
var togglepasswordcpassword = document.getElementById('togglepasswordcpassword');

togglepasswordcpassword.addEventListener('click', function() {
  if (cpassword.type === 'password') {
    cpassword.type = 'text';
    togglepasswordcpassword.classList.remove('fa-eye');
    togglepasswordcpassword.classList.add('fa-eye-slash');
  } else {
    cpassword.type = 'password';
    togglepasswordcpassword.classList.remove('fa-eye-slash');
    togglepasswordcpassword.classList.add('fa-eye');
  }
});

</script>



    </body>

</html>


<?php
include "connector.php";

if (isset($_POST['next'])) {
    $userid = $_POST['userid'];
    $insertquery = "SELECT * FROM user WHERE userid='$userid'";
    $res = mysqli_query($con, $insertquery);
    $run = mysqli_fetch_array($res);
    if (count((array) $run) > 0) {
     
        $rquestion1 = $run['question1'];
        // $ranswer1 = $run['answer1'];
        $rquestion2 = $run['question2'];
        // $ranswer2 = $run['answer2'];
        $rquestion3 = $run['question3'];
        // $ranswer3 = $run['answer3'];
        ?>
        <script>
            var userid = "<?php echo $userid; ?>";
            var question1 = "<?php echo $rquestion1; ?>";
            var question2 = "<?php echo $rquestion2; ?>";
            var question3 = "<?php echo $rquestion3; ?>";

            document.getElementById("userid").value = userid;
            document.getElementById("useridq").value = userid;
            document.getElementById("question1").value = question1;
            document.getElementById("question2").value = question2;
            document.getElementById("question3").value = question3;
            
            var form2 = document.getElementById("form2");
            form2.removeAttribute("hidden");
            var form1 = document.getElementById("form1");
            form1.hidden=true;
            
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("User does not exist");
        </script>
        <?php
    }
}

if (isset($_POST['update_password']))
{
    $userid = $_POST['useridq'];
    $insertquery1 = "SELECT * FROM user WHERE userid='$userid'";
    $res1 = mysqli_query($con, $insertquery1);
    $run1 = mysqli_fetch_array($res1);
    $ranswer1 = $run1['answer1'];
    $ranswer2 = $run1['answer2'];
    $ranswer3 = $run1['answer3'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $newpassword = $_POST['newpassword'];
    if ($answer1==$ranswer1 and $answer2==$ranswer2 and $answer3==$ranswer3 ) 
    {
        $hash_newpassword = hash_hmac('sha256', $newpassword, $userid);
        $updateQuery = "UPDATE user SET password = '$hash_newpassword' WHERE userid = '$userid'";
        $res = mysqli_query($con, $updateQuery);
        if ($res)
        {
            ?>
            <script>
                alert("Password updated successfully");
            </script>
            <?php
        }
    }
    else 
    {
        ?>
        <script>
            alert("Answers were wrong.");
        </script>
        <?php
    }
}
?>
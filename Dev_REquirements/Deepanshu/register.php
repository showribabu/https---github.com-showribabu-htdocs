<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registeration Window</title>
        <link rel="stylesheet" href="register.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>

        <?php
        
        
        $a = [
            "What is your favorite color?",
            "What was the name of your first school?",
            "What is your favorite food?",
            "What is your father's middle name?",
            "What is your favorite music band/artist?",
            "What is your favorite fictional character?",
            "What is your favorite hobby?",
            "What is the name of your childhood best friend?",
            "What is your favorite season of the year?",
            "What is your favorite TV show?",
            "What was the make and model of your first car?"
        ];

        $randomNumbers = array();
        while (count($randomNumbers) < 3) {
            $randomNumber = mt_rand(0, 10);
            if (!in_array($randomNumber, $randomNumbers)) {
                $randomNumbers[] = $randomNumber;
            }
        }
        $question1 = $a[$randomNumbers[0]];
        $question2 = $a[$randomNumbers[1]];
        $question3 = $a[$randomNumbers[2]];
        ?>


        <div class="container">
            <h1>Registration Form</h1>
            <div class="form-container">
                <form action="" method="post" id="myForm" onsubmit="return form_validation()">



                    <div class="input-name">
                        <i class="fa fa-user lock"></i>
                        <input type="text" placeholder="First Name" class="name" name="fname" required>
                        <span>
                            <i class="fa fa-user lock"></i>
                            <input type="text" placeholder="Mid Name(Optional)" class="name" name="midname">
                        </span>
                        <span>
                            <i class="fa fa-user lock"></i>
                            <input type="text" placeholder="Last Name(Optional)" class="name" name="lname">
                        </span>
                    </div>


                    <div class="input-name">
                        <i class="fa fa-user lock"></i>
                        <input type="date" placeholder="DOB" class="text-name" name="dob" id="dob" title="Date Of Birth"
                            required>
                        <!-- <p id = "para_email" ></p> -->
                    </div>


                    <div class="input-name">
                        <i class="fa fa-envelope lock"></i>
                        <input type="text" placeholder="E-mail" class="text-name" name="email" id="email"
                            title="E-mail must be in the form name@domainname" required>
                        <p id="para_email"></p>
                    </div>

                    <div class="input-name">
                        <i class="fa fa-envelope lock"></i>
                        <input type="text" placeholder="Alternate E-mail(Optional)" class="text-name" name="emailalt"
                            id="emailalt" title="E-mail must be in the form name@domainname">
                        <p id="para_emailalt"></p>
                    </div>





                    <div class="input-name">
                        <i class="fa fa-address-book lock"></i>
                        <input type="tel" placeholder="Contact" class="text-name" name="contact" id="contact" required
                            title="Contains only digits from 0 to 9 and has a length of exactly 10 digits and can not start with 0">
                        <p id="para_contact"></p>
                    </div>






                    <div class="input-name">
                        <i class="fa fa-user lock"></i>
                        <input type="password" placeholder="User ID" class="text-name" name="userid" id="userid" required
                            title="Has a minimum length of 8 characters & Can only contain alphabets, numbers, underscores & must conatain an alphabet , number, underscores. Also it must start with an alphabet">
                        <i class="fa fa-eye" id="togglepassworduserid" style="position:absolute; right:520px; font-size:20px; margin-top:5px;"></i>
                        <p id="para_userid"></p>
                    </div>





                    <div class="input-name">
                        <i class="fa fa-user lock"></i>
                        <input type="text" id="question1" class="text-name" name="question1"
                            value="<?php echo $question1; ?>" readonly>
                        <input type="text" name="answer1" class="text-name" placeholder="Answer 1" required>

                        <br>
                        <i class="fa fa-user lock"></i>
                        <input type="text" id="question2" class="text-name" name="question2"
                            value="<?php echo $question2; ?>" readonly>
                        <input type="text" name="answer2" class="text-name" placeholder="Answer 2" required>

                        <br>
                        <i class="fa fa-user lock"></i>
                        <input type="text" id="question3" class="text-name" name="question3"
                            value="<?php echo $question3; ?>" readonly>
                        <input type="text" name="answer3" class="text-name" placeholder="Answer 3" required>
                    </div>





                    <div class="input-name">
                        <i class="fa fa-lock lock "></i>
                        <input type="password" placeholder="Password" class="text-name" id="password" name="password"
                            required
                            title="Password must contain at least one uppercase letter, one lowercase letter, one numeric digit, one special character, and be at least 8 characters long.">
                         <i class="fa fa-eye" id="togglepasswordpassword" style="position:absolute; right:520px; font-size:20px; margin-top:5px;"></i>
                        <p id="para_password"></p>
                    </div>




                    <div class="input-name">
                        <i class="fa fa-lock lock"></i>
                        <input type="password" placeholder="Confirm Password" class="text-name" name="cpassword"
                            id="cpassword" required
                            title="Password must contain at least one uppercase letter, one lowercase letter, one numeric digit, one special character, and be at least 8 characters long.">
                         <i class="fa fa-eye" id="togglepasswordcpassword" style="position:absolute; right:520px; font-size:20px; margin-top:5px;"></i>
                        <p id="para_cpassword"></p>
                    </div>





                    <div class="input-name">
                        <button name="submit" class="last_btn">SUBMIT</button>
                    </div>
                    <p id="last_para"></p>


                </form>
            </div>
        </div>

        <script src="register.js"></script>
    </body>

</html>

<?php

include 'connector.php';

if (isset($_POST['submit'])) {

    // $random_number = rand(999,9999);
    $fname = $_POST['fname'];
    $midname = $_POST['midname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $emailalt = $_POST['emailalt'];
    $contact = $_POST['contact'];
    $userid = $_POST['userid'];
    $answer1 = $_POST['answer1'];
    $answer2 = $_POST['answer2'];
    $answer3 = $_POST['answer3'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $hashedpassword = hash_hmac( 'sha256' , $password , $userid );




    $sql2 = "select * from user where userid='$userid'";
    $dd = mysqli_query($con, $sql2);
    $run = mysqli_fetch_array($dd);
    if (count((array)$run) > 0) {
        ?>
        <script>
            alert("Try Different UserID");
        </script>
        <?php
    } else {


        $insertquery = "INSERT into user(fname,midname,lname,dob,email,emailalt,contact,userid,question1,answer1,question2,answer2,question3,answer3,password) values('$fname','$midname','$lname','$dob','$email','$emailalt','$contact','$userid','$question1','$answer1','$question2','$answer2','$question3','$answer3','$hashedpassword')";

        $res = mysqli_query($con, $insertquery);

        if ($res) {
            ?>
            <script>
                alert("connection done");
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("connection not done");
            </script>
            <?php
        }
        ?>
        <script>
            // Redirect to another PHP page
            window.location.href = "index.php";

        </script>
        <?php
    }

}
?>
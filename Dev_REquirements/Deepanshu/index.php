<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LOG IN</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <script crossorigin="anonymous"></script>
  </head>

  <body>

    <?php
    /*  
    include "connector.php";
     $insertquery = "select * from user where userid='$userid'";

  $res = mysqli_query($con, $insertquery);

  
  $pass = mysqli_fetch_array($res);

  $randomNumber = mt_rand(0, 2);
  if($randomNumber==0)
  {
  $showques = $pass['question1']  ;
  }

  $randomNumber = mt_rand(0, 2);
  if($randomNumber==1)
  {
  $showques = $pass['question2']  ;
  }

  $randomNumber = mt_rand(0, 2);
  if($randomNumber==2)
  {
  $showques = $pass['question3']  ;
  }
  */
    ?>

    <!-- =================================================================================================== -->

    <div class="container">
      <div class="form_box">
        <h1 id="title">LOG IN</h1>
        <form action="" method="post">
          <div class="input_group">

            <div class="input_field">
              <i class="fa fa-user lock"></i>
              <input type="password" placeholder="User ID" name="userid" required id="userid">
              <i class="fa fa-eye" id="togglepassworduserid" style="position:absolute; right:60px"></i>
            </div>

            <div class="input_field">
              <i class="fa fa-lock lock"></i>
              <input type="password" placeholder="Password" name="password" required id="password">
              <i class="fa fa-eye" id="togglepasswordpassword" style="position:absolute; right:60px"></i>
            </div>

            <div id="q_a" hidden>
              <div class="input_field">
                <i class="fa fa-lock lock"></i>
                <input type="text" id="qt" placeholder="question1" readonly>
              </div>

              <div class="input_field">
                <i class="fa fa-lock lock"></i>
                <input type="text" placeholder="Answer" name="userans" id="userans">
              </div>
            </div>

          </div>


          <div style="position:relative; top:80px; color:darkblue; font-weight:bold;">
            <p>Click on NEXT button after filling userid and password.</p>
          </div>
          <div class="input_field " id="link1">
            Forgot Password?
            <a href="forgot.php">Click Here!</a>
          </div>

          <div class="btn_field" style="position:relative; top:20px;">
            <button type="button" id="signup" name="signup">Sign up</button>
            <button type="submit" id="next" name="next">NEXT</button>
            <button type="submit" id="login" name="login">LOG IN</button>
          </div>

        </form>
      </div>
    </div>

    <script>let btn = document.getElementById("signup");
      btn.addEventListener('click', function () {
        window.open("register.php");
      })
    </script>




    <?php
    include 'connector.php';

    if (isset($_POST['next'])) 
    {
      $userid = $_POST['userid'];
      $password = $_POST['password'];
      $insertquery = "select * from user where userid='$userid'";
      $res = mysqli_query($con, $insertquery);
      $run = mysqli_fetch_array($res);
      $hashedpassword = hash_hmac('sha256', $password, $userid);
      
      if (count((array) $run) > 0) {
        // ========================================================================================================
    

        if ($hashedpassword == $run['password']) 
        {

          $showques = "";
          $randomNumber = mt_rand(0, 2);
          if ($randomNumber == 0) 
          {
            $showques = $run['question1'];
            $showans = $run['answer1'];
          }

          if ($randomNumber == 1) 
          {
            $showques = $run['question2'];
            $showans = $run['answer2'];
          }

          if ($randomNumber == 2)
          {
            $showques = $run['question3'];
            $showans = $run['answer3'];
          }
          ?>

          <script>

            let q_a = document.getElementById("q_a");
            q_a.removeAttribute('hidden');
            let qt = document.getElementById("qt");
            qt.value = "<?php echo $showques; ?>";
            var userid = document.getElementById("userid");
            userid.value = "<?php echo $userid; ?>";
            var password = document.getElementById("password");
            password.value = "<?php echo $password; ?>";
                                          // return false;

          </script>



          
          <script>
            let login = document.getElementById("login");
            login.addEventListener('click', func);
            function func() 
            {
              var userans = document.getElementById("userans").value;
              var userid = document.getElementById("userid").value;
              if (userans == "<?php echo $showans; ?>" && userid=="deepanshu_67") 
              {
                alert("Welcome to admin page");
              }
              else if (userans == "<?php echo $showans; ?>" ) 
              {
                alert("user page")
              }
              else 
              {
                alert("ops wrong ans");
              }
            }
          </script>
          <?php
        }
        else 
        {
          ?>
          <script>alert("wrong authentication")</script>
          <?php
        }

        // ==================================================================================================================
      } else {
        ?>
        <script>alert("user not exist")</script>
      <?php
      }
    } ?>

<script>
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
var password = document.getElementById('password');
var togglepasswordpassword = document.getElementById('togglepasswordpassword');

togglepasswordpassword.addEventListener('click', function() {
  if (password.type === 'password') {
    password.type = 'text';
    togglepasswordpassword.classList.remove('fa-eye');
    togglepasswordpassword.classList.add('fa-eye-slash');
  } else {
    password.type = 'password';
    togglepasswordpassword.classList.remove('fa-eye-slash');
    togglepasswordpassword.classList.add('fa-eye');
  }
});

</script>

  </body>

</html>
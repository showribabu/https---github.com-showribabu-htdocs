<?php
require_once('../config/config.php');
require_once('../vendor/autoload.php');
require_once('../includes/auth.php');

use \Firebase\JWT\JWT;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle login form submission
    $userId = 123; // Get the user ID from the database

    // Check if the "username" key exists in $_POST array
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        // Handle missing username
        echo "<script>alert('Username is required');</script>";
        exit;
    }

    // Check if the "password" key exists in $_POST array
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        // Handle missing password
        echo "<script>alert('Password is required');</script>";
        exit;
    }

    $sql1 = 'insert into user values("' . $userId . '","' . $username . '","' . $password . '")';
    $r = mysqli_query($conn, $sql1);
    if ($r) {
        echo "<script>alert('inserted');</script>";
    } else {
        echo "<script>alert('Not inserted');</script>";
    }

    $sql2 = 'SELECT * FROM user';
    $r2 = mysqli_query($conn, $sql2);
    if ($r2) {
        $authenticated = false;
        foreach ($r2 as $i) {
            if (isset($i['username']) && $i['username'] == $username) {
                $authenticated = true;
                echo 'fetched data: '.$i['username'];
                break;
            }
        }
    } else {
        $authenticated = false;
        echo 'Hii';
    }
    

    // Validate credentials against the database
    if ($authenticated) {
        // Generate JWT and redirect to success page
        $jwt = generateJWT( $username,$password);
        // setcookie('jwt', $jwt, time() + (60 * 60), '/');
        setcookie('jwt', $jwt, time() + (60), '/');

        header('Location: success.php');
        exit;
    } else {
        // Handle login error
        echo "<script>alert('Invalid User');</script>";
    }
}
?>

<!-- HTML login form -->
<form method="POST" action="login.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>

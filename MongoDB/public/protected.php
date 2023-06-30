<?php
// require_once('../includes/auth.php');

// $jwt = $_COOKIE['jwt'] ?? null;
// $user = validateJWT($jwt);

// if ($user) {
//     echo 'Welcome, ' . $user['username'];
// } else {

//     header('Location: login.php');
//     exit;
// }
?>
<!-- HTML content for the protected page -->
<!-- <h1>Protected Page</h1>
<p>Welcome, <?php // echo $user['username']; ?></p> -->




<?php
require_once('../includes/auth.php');

$jwt = $_COOKIE['jwt'] ?? null;
handleSession();

$user = validateJWT($jwt);

?>

<!-- HTML content for the protected page -->
<h1>Protected Page</h1>
<p>Welcome, <?php echo $user['username']; ?></p>

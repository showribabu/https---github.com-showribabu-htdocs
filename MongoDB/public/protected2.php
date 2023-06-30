<?php
// require_once('../includes/auth.php');

// $jwt = $_COOKIE['jwt'] ?? null;
// $user = validateJWT($jwt);

// if (!$user) {
//     header('Location: login.php');
//     exit;
// }
?>
<!-- HTML content for the protected page -->
<!-- <h1>Protected Page2</h1>
<p>Welcome, <?php //echo $user['username']; ?></p> -->


<?php
require_once('../includes/auth.php');

$jwt = $_COOKIE['jwt'] ?? null;
handleSession();

$user = validateJWT($jwt);

?>

<!-- HTML content for the protected page 2 -->
<h1>Protected Page 2</h1>
<p>Welcome, <?php echo $user['username']; ?></p>

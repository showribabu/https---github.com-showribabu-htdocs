<?php
/*require_once('../includes/auth.php');

$jwt = $_COOKIE['jwt'] ?? null;
$user = validateJWT($jwt);

if ($user) {
    echo 'Welcome, ' . $user['username'];
} else {
    header('Location: login.php');
    exit;
}*/
?>

<!-- HTML content for the success page -->
<!-- <h1>Welcome, <?php //echo $user['username']; ?></h1>
<p>Access other protected pages:</p>
<ul>
    <li><a href="protected.php">Protected Page 1</a></li>
    <li><a href="protected2.php">Protected Page 2</a></li>
</ul> -->


<?php /////////////////////////////       ?>

<?php
require_once('../includes/auth.php');

$jwt = $_COOKIE['jwt'] ?? null;
handleSession();

$user = validateJWT($jwt);

?>

<!-- HTML content for the success page -->
<h1>Welcome, <?php echo $user['username']; ?></h1>
<p>Access other protected pages:</p>
<ul>
    <li><a href="protected.php">Protected Page 1</a></li>
    <li><a href="protected2.php">Protected Page 2</a></li>
</ul>


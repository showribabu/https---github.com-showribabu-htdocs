<?php
// include '../config/config.php';
// include '../vendor/autoload.php';

// use \Firebase\JWT\JWT;
// use \Firebase\JWT\Key;

// // Function to generate JWT
// function generateJWT($username,$password)
// {
//     global $secretKey;
//     $payload = [
//         'username'=>$username,
//         'password'=>$password,
//         'exp' => time() + (60 * 60) // Set token expiration time (e.g., 1 hour)
//     ];

//     $jwt = JWT::encode($payload, $secretKey, 'HS256');
//     echo json_encode($jwt);
//     echo "Hello";
//     return $jwt;
// }

// // Function to validate JWT and retrieve user information
// function validateJWT($jwt)
// {
//     global $secretKey;
//     try {

//         if ($jwt === null) {
//             throw new Exception('Token not provided');
//         }

//         $decoded = JWT::decode($jwt,new Key($secretKey,'HS256'));
//         return (array) $decoded;
//     } catch (Exception $e) {
//         // Handle token validation error
//         // Redirect user to login page or prompt reauthentication
//         return null;
//     }
// }
?>


<?php
require_once('../config/config.php');
require_once('../vendor/autoload.php');

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

// Function to generate JWT
function generateJWT($userId, $username)
{
    global $secretKey;
    $payload = [
        'user_id' => $userId,
        'username' => $username,
        'exp' => time() + (60 * 60) // Set token expiration time (e.g., 1 hour)
    ];

    $jwt = JWT::encode($payload, $secretKey, 'HS256');
    return $jwt;
}

// Function to validate JWT and retrieve user information
function validateJWT($jwt)
{
    global $secretKey;
    try {
        if ($jwt === null) {
            throw new Exception('Token not provided');
        }

        $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
        return (array) $decoded;
    } catch (Exception $e) {
        // Handle token validation error
        // Redirect user to login page or prompt reauthentication
        header('Location: login.php?error=' . urlencode($e->getMessage()));
        exit;
    }
}

// Check session expiration and handle sliding mechanism
function handleSession()
{
    global $jwt;
    $user = validateJWT($jwt);
    if ($user) {
        // Check if the session has expired
        if (time() > $user['exp']) {
            // Session has expired
            // Check if the user is active
            if (!isUserActive()) {
                // User is not active, redirect to login page
                header('Location: login.php?error=Session expired');
                exit;
            }
            // Extend the session by generating a new JWT
            $newJwt = generateJWT($user['user_id'], $user['username']);
            setcookie('jwt', $newJwt, time() + (60 * 60), '/');
        }
    } else {
        // User is not authenticated, redirect to login page
        header('Location: login.php');
        exit;
    }
}

// Function to check if the user is active
function isUserActive()
{
    // Implement your logic to check if the user is active
    // For example, you can check the user's last activity timestamp
    // and compare it with the current time to determine activity status
    // Return true if the user is active, false otherwise
    // return true;
    return false;
}
?>

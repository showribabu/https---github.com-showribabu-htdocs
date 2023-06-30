<?php

echo "Hello World!";
$a=random_int(0,99);
echo "<br>".$a;

/*
$h=password_hash('a',PASSWORD_BCRYPT);
echo $h;
echo"<br>".strlen($h);
*/

//hashing...
$h1=hash_hmac('sha512','showri','showri');
echo "<br><br>".$h1;
echo"<br>".gettype($h1);
echo"<br>".strlen($h1);


//convert to binary.. hex2bin()
$h1=hex2bin($h1);

// Require the GMP extension for primality testing
extension_loaded('gmp') or die('GMP extension not available');

function generateRandomPrime($minBits)
{
    do {
        // Generate a random number with the desired bit size
        $number = gmp_random_bits($minBits);

        // Set the most significant bit to ensure the minimum bit size
        gmp_setbit($number, $minBits - 1);

        // Test if the number is prime using Miller-Rabin primality test
        $isPrime = gmp_prob_prime($number, 50) > 0;
    } while (!$isPrime);

    return $number;
}


$q = generateRandomPrime(23);
$p = generateRandomPrime(23);
echo "<br><br>";

print($p);
echo "<br><br>";
print($q);
// $u = bindec($h1);
$u=gmp_import($h1);
$u=gmp_strval($u);
echo "<br>Decimal u:<br>".$u;
$secret = gmp_powm($q, $u, $p);

//$secret = gmp_powm($q, $u, $p); // Perform power and modulo operation using gmp_powm()

echo "Seret is:<br>";
echo "".$secret;


/*
$r=unpack('C23', $h1);
echo"<br>Binary:<br>";
print_r($r);
$r1=bin2hex($h1);
print($r1);*/


//q- 23 minimum...
//pow(q,hash value)


//apply " modulo p " to  it......







//ALL....

/*
// Require the GMP extension for primality testing
extension_loaded('gmp') or die('GMP extension not available');

// User input
$userID = "john123";
$password = "secretpassword";

// Calculate secret
$hash = hash_hmac('sha512', $userID, $password);
$binaryOutput = hex2bin($hash);

$q = generateRandomPrime(23);
$p = generateRandomPrime(23);

$u = bindec($binaryOutput);
$secret = bcpowmod($q, $u, $p);

echo "Secret: $secret\n";

// Function to generate a random prime number with a minimum bit size
function generateRandomPrime($minBits)
{
    do {
        // Generate a random number with the desired bit size
        $number = gmp_random_bits($minBits);

        // Set the most significant bit to ensure the minimum bit size
        gmp_setbit($number, $minBits - 1);

        // Test if the number is prime
        $isPrime = gmp_prob_prime($number) == 2;
    } while (!$isPrime);

    return $number;
}



*/ 

?>
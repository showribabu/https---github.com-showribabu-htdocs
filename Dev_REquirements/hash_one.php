<?php 

echo "Hello world";

/*Secret generation*/

//add userid + password and perform Hashing....

$userid='20JR1A05A5';
$password='123456';


//hashing....

$h=hash('sha512',$userid.$password);
echo '<br>'.strlen($h).'<br>';
print($h);

//e8ebdb5321afa7cc6e49360f14a831b8fe17d86ba4a1cd024fb4ebf389796fd08e6fc0a46d42c3eafad83331cc9cc03a2eafbe6e46a7e7b061bfeb84a2b8275d
//1aebbbe39536920c5e8f84bb49b0257eb58bfa36b92483b721b2c516b0028b3718a83fa05b3befcf24833c045acb768144bf893ca0f8416f7a7add3597cec655


//convert hash to binary....

$bin=hex2bin($h);
echo"<br>";
//here we can't see binary directly...
//we need to use bin2hex() or unpack()
// print($bin);
// $v=unpack('C*',$bin);
// print_r($v);

//prime numbers  ----> q,S,p (min 33 bits and prime..)

function rprime($blen)
{
    do 
    {
  
       // Generate a random number with the desired bit size
       $rnum = gmp_random_bits($blen);

       // Set the most significant bit to ensure the minimum bit size
       gmp_setbit($rnum, $blen - 1);

       // Test if the number is prime using Miller-Rabin primality test
       $prime = gmp_prob_prime($rnum, 50) > 0;
    }
    while(!$prime);
    $val=strval($rnum);
    return $val;
}

$blen=33;

$q=rprime($blen);
$p=rprime($blen);
$s=rprime($blen);
$kv=rprime($blen);
$ix=rprime($blen);

printf("%s  - %s  - %s  - %s -  %s",$q,$p,$s,$kv,$ix);


//now to perform the q power u.... 
//convert bin to decimal.

// $u=bindec($bin);

$u=gmp_import($bin);
//but here binary is large so..use GMP module 
$u=gmp_strval($u);


//now perform power and modulus...
echo "<br>Decimal: U:";
echo  $u;
$secret=bcpowmod($q,$u,$p);

$secret2=gmp_powm($q,$u,$p);

echo "<br>Secret1:".$secret;
echo "<br>Secret2:".$secret2;




//encrypt with another secret value...

//AES --->openssl_encrypt()

// Derive the IV from the secret using SHA-256


//here we are usisng sha-256 in openssl_encrypt() so iv value must be 128 bits only....
$iv = hash('sha256', $secret);

//now we can get substring of 1128 bits i.e 16 bytes..or use md5()....

$iv=substr($iv,0,16);


$encrypt=openssl_encrypt($secret,'AES-256-CBC','123452373',OPENSSL_RAW_DATA,$iv);

echo"<br>".base64_encode($encrypt)."\n";



//decryption...

$dec=openssl_decrypt($encrypt,'AES-256-CBC','123452373',OPENSSL_RAW_DATA,$iv);

print('the decrypted valaue is'.$dec);

?>
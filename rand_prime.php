<?php
// function rprime($blen)
// {
//     do 
//     {
  
//        // Generate a random number with the desired bit size
//        $rnum = gmp_random_bits($blen);

//        // Set the most significant bit to ensure the minimum bit size
//        gmp_setbit($rnum, $blen - 1);

//        // Test if the number is prime using Miller-Rabin primality test
//        $prime = gmp_prob_prime($rnum, 50) > 0;
//     }
//     while(!$prime);
//     $val=strval($rnum);
//     return $val;
// }

// $blen=33;
// $q=rprime($blen);
// $p=rprime($blen);
// $s=rprime($blen);


// function rprime($blen)
// {
//     do 
//     {
  
//        // Generate a random number with the desired bit size
//        $rnum = gmp_random_bits($blen);

//        // Set the most significant bit to ensure the minimum bit size
//        gmp_setbit($rnum, $blen - 1);

//        // Test if the number is prime using Miller-Rabin primality test
//        $prime = gmp_prob_prime($rnum, 50) > 0;
//     }
//     while(!$prime);
//     $val=strval($rnum);
//     return $val;
// }

// //groupkey and r 
// function rnd($len)
// {
//     // Generate a random number with the desired bit size
//     $rnum = gmp_random_bits($len);

//     // Set the most significant bit to ensure the minimum bit size
//     gmp_setbit($rnum, $len - 1);

//     $val=strval($rnum);
//     return $val;
// }
// global $p,$q,$s,$kv,$ix,$spk;
// $q=rprime(33);
// $p=rprime(166);
// $s=rprime(33);
// $kv=rprime(64);
// $ix=rprime(33);
// $spk=rprime(166);

// $len=166;

// $gpk=rnd(166);
// $r=rnd(64);

// printf("The Values are <br> q:$q <br> s: $s <br> p: $p<br>  kv: $kv <br> ix:$ix  <br> spk: $spk <br>");
// session_start();
// $_SESSION['p']=$p;
// $_SESSION['q']=$q;
// $_SESSION['kv']=$kv;
// $_SESSION['ix']=$ix;
// $_SESSION['spk']=$spk;
// $_SESSION['s']=$s;

// printf("gpk:$gpk <br> r: $r <br>");
session_start();

echo $_SESSION['q'];
echo $_SESSION['gmid'];

?>
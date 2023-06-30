<?php 

/*system parameteres and group parameters */

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

//groupkey and r 
function rnd($len)
{
    // Generate a random number with the desired bit size
    $rnum = gmp_random_bits($len);

    // Set the most significant bit to ensure the minimum bit size
    gmp_setbit($rnum, $len - 1);

    $val=strval($rnum);
    return $val;
}



global $p,$q,$s,$kv,$ix,$spk;
$q=rprime(33);
$p=rprime(166);
$s=rprime(33);
$kv=rprime(64);
$ix=rprime(33);
$spk=rprime(166);

$len=166;

$gpk=rnd(166);
$r=rnd(64);


// echo"<br><br>";
// printf("%s  -  %s",$gpk,$r);
// echo"<br>".gettype($gpk).'<br>';


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/* Secret calculation*/ 

function secret($userid,$password)
{


    global $p,$q;
    $data=$userid.$password;
    $hash=hash('sha512',$data);
    printf("<br>Hash value: %s",$hash);
    $binary=hex2bin($hash);
    //but here binary is large so..use GMP module 
    $u=gmp_strval(gmp_import($binary));
    $secret=gmp_strval(gmp_powm($q,$u,$p));
    return $secret;
}

$userid1='20JR1A05A5';
$password1='123456';
$secret1=secret($userid1,$password1);
/*
$data=$userid1.$password1;
$h1=hash('sha512',$data);
print($h1);
$bin1=hex2bin($h1);
$u1=gmp_strval(gmp_import($bin1));
//but here binary is large so..use GMP module 
$secret1=gmp_strval(gmp_powm($q,$u1,$p));
*/

$userid2='20JR1A05A6';
$password2='123456';
$secret2=secret($userid2,$password2);
/*
$data=$userid2.$password2;
$h2=hash('sha512',$data);
echo"<br>";
print($h2);
$bin2=hex2bin($h2);
$u2=gmp_import($bin2);
//but here binary is large so..use GMP module 
$u2=gmp_strval($u2);
$secret2=gmp_powm($q,$u2,$p);
$secret2=gmp_strval($secret2);
*/
echo"<br>";
printf("Secret 1: %s \n \n Secret2 : %s<br>",$secret1,$secret2);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/*encryptiion and decryption...*/

$iv=hash('sha256',$secret1);
$iv=substr($iv,0,16);

$enc=openssl_encrypt($secret2,'AES-256-CBC',$secret1,OPENSSL_RAW_DATA,$iv);

//$encrypt=openssl_encrypt($secret,'AES-256-CBC','123452373',OPENSSL_RAW_DATA,$iv);

printf("Encrypted:%s<br>",base64_encode($enc));

$dec=openssl_decrypt($enc,'AES-256-CBC',$secret1,OPENSSL_RAW_DATA,$iv);
printf("Decrypted:%s<br>",$dec);



/*
    $enc=openssl_encrypt($secret2, 'AES-256-CBC', $secret1, OPENSSL_RAW_DATA, $iv);
    $enc=base64_encode($enc);

    $dec=openssl_decrypt(base64_decode($row['enc']),'AES-256-CBC',$secret1,OPENSSL_RAW_DATA,$iv);

*/

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* Group initialization */

$hadmid=hash('sha512',gmp_strval(gmp_powm($q,$secret1,$p)) * gmp_strval(gmp_powm($q,$secret2,$p)) * $s);//hash(q pow sec1 mod p , q pow sec2 mod p , s)//from hash value we need to generate id...
echo"<br>adminid:".$hadmid;
$hgrpid=hash('sha512',gmp_strval(gmp_powm($q,$secret2,$p)) * $s);
echo"<br>grpidid:".$hgrpid;

//mv=q pow gm * q pow gpk... also NO!! Hash.......
$mv=gmp_strval(gmp_powm($q,$secret2,$p)) * gmp_strval(gmp_powm($q,$gpk,$p)) ;
echo"<br>mv:".$mv;


//generate id from Hash value...


function hash2gid($hash) {
    $id = substr(date('y'), -2); // last 2 digits from the current year
    $id .= 'GP'; // Next 2 characters ('GP')
    $id .= substr($hash, 0, 1); // Next character (one digit)
    $id .= chr(65); // Next character (capital letter)(A)
    $id .= substr($hash, 1, 2); // Next 2 characters (two digits)
    $id .= chr(68); // Next character (capital letter)
    $id .= substr($hash, 3, 1); // Next character (one digit)
    
    return $id;
} 

$admid=hash2gid($hadmid);
echo"<br>admid:".$admid;

$grpid=hash2gid($hgrpid);
echo"<br>grpid:".$grpid;

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/*member Registration*/


//new member data... Secret calculation....

$userid3='20JR1A05A7';
$password3='123456';

/*
$data=$userid3.$password3;
$h3=hash('sha512',$data);
echo"<br>";
print($h3);
$bin3=hex2bin($h3);
$u3=gmp_strval(gmp_import($bin3));
$secret3=gmp_strval(gmp_powm($q,$u3,$p));
printf("<br> Secret 3: %s",$secret3);
*/

$secret3=secret($userid3,$password3);
printf("<br> Secret 3: %s",$secret3);

//encryption and decryption...

$iv=substr(hash('sha256',$secret2,true),0,16);

$menc=openssl_encrypt($secret3,'AES-256-CBC',$secret2,OPENSSL_RAW_DATA,$iv);
$mdec=openssl_decrypt($menc,'AES-256-CBC',$secret2,OPENSSL_RAW_DATA,$iv);

printf("<br>Encrypt : %s <br> Decrypt: %s",base64_encode($menc),$mdec);

//member credentials calculated....
//fetch mv by calculating the groupid..


function hash2mid($hash) {
    $id = substr(date('y'), -2); // last 2 digits from the current year
    $id .= 'MB'; // Next 2 characters ('GP')
    $id .= substr($hash, 0, 1); // Next character (one digit)
    $id .= chr(rand(65, 90)); // Next character (capital letter)
    $id .= substr($hash, 1, 2); // Next 2 characters (two digits)
    $id .= chr(rand(65, 90)); // Next character (capital letter)
    $id .= substr($hash, 3, 1); // Next character (one digit)
    
    return $id;
}

$qpowu=gmp_strval(gmp_powm($q,$secret3,$p));
$hmid=hash('sha512',$qpowu*$mv);
$mid=hash2mid($hmid);
//echo"<br>Mid:".$mid;
//derive gpk....
//printf("<br>MV: %s <br> gpk: %s",$mv,gmp_strval(gmp_powm($q,$gpk,$p)));
$dgpk=$mv/gmp_strval(gmp_powm($q,$secret2,$p));
$pgpk=$qpowu*$dgpk;
//printf("<br>Derived gpk:%s",$dgpk);
$bindx=hash('sha512',$qpowu*$ix);
printf("<br>MEmber Id: %s<br> partial groupkey: %s <br> BioIndex: %s",$mid,$pgpk,$bindx);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

/* Authentication*/
$id='20JR1A05A7';
$pass='123456';
$sec=secret($id,$pass);
$bio=hash('sha512',gmp_strval(gmp_powm($q,$sec,$p))*$ix);

if($bio==$bindx)
{
    echo "<br>Login successfully";
}

else
{
    echo "1<br> Not matched";
}

//calculate groupkey Gk....gk=h(q pow gpk,q pow spk)
//q pow gpk =partial group key/q pow u
$ddgpk=$pgpk/gmp_strval(gmp_powm($q,$sec,$p));
printf("<br>pgpk1: %s <br> pgpk2: %s",$dgpk,$ddgpk);

if($ddgpk==$dgpk)
{
    echo "<br>Yes gpk derived..";

}
else{
    echo "<br>Not derived gpk";
}

$gk=hash('sha512',$ddgpk*gmp_strval(gmp_powm($q,$spk,$p)));

printf("<br>The Gk value for encryption and decption of data is..::: %s ",$gk);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>
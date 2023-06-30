<?php
function generateGroupID() {

$char='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$ucase='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$lcase='abcdefghijklmnopqrstuvwxyz';
$rands='';
$index=rand(0,strlen($char)-1);
$rands.=$char[$index];
$index=rand(0,strlen($ucase)-1);
$rands.=$ucase[$index];
$rands.=rand(100,999);
$index=rand(0,strlen($lcase)-1);
$rands.=$lcase[$index];

return $rands;

}

echo generateGroupID();

?>

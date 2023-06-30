<?php 
$f=0;
$qualification=[];
$dd=[['privilege'=>'a1','status'=>'b1','type'=>'c1'],['privilege'=>'a2','status'=>'b2','type'=>'c2'],['privilege'=>'a3','status'=>'b3','type'=>'c3']];
foreach ($dd as $i)
{
    $f +=1;           
    $qualification['privilege'.$f]=$i['privilege'];
    $status['status'.$f]=$i['status'];
    $type['type'.$f]=$i['type'];
}
print_r($qualification);
echo"<br>";
print_r($status);
echo"<br>";
print_r($type);

echo '<div class="form-group">';
echo '<label for="selectedPrivilege">Select Privilege:</label>';
echo '<select name="selectedPrivilege" id="selectedPrivilege">';
foreach ($qualification as $privilege) {
    echo '<option value="' . $privilege . '">' . $privilege . '</option>';
}
echo '</select>';
echo '<input type="submit" value="Login" id="lg">';
echo '</div>';
echo '</form>';

?>
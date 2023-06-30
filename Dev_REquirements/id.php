<?php 

/*
// System parameters
$privateMembers = 'private members';
$prime = 123456789; // Example prime number

// Generate Admin ID
$adminId = 'admin_' . hash('sha256', 'admin' . $privateMembers . $prime);

// Generate Group ID
$groupId = 'group_' . hash('sha256', 'group_manager' . $privateMembers . $prime);

// Generate Member Verifier ID
$memberVerifierId = 'mv_' . hash('sha256', 'group_manager' . 'group_key' . $privateMembers . $prime);

// Output the generated IDs
echo "Admin ID: " . $adminId . "<br>";
echo "Group ID: " . $groupId . "<br>";
echo "Member Verifier ID: " . $memberVerifierId . "<br>";*/

/*

function generateStructuredID() {
    $id = date('y') . 'GP';
    $id .= chr(rand(65, 90)); // Random uppercase letter
    $id .= rand(0, 9); // Random digit
    $id .= str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT); // Random two-digit number
    $id .= generateRandomCharacter(); // Random character or number or a combination
    return $id;
}

// Generate a random character or number
function generateRandomCharacter() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $length = strlen($characters);
    $randomChar = '';
    for ($i = 0; $i < 2; $i++) {
        $randomChar .= $characters[rand(0, $length - 1)];
    }
    return $randomChar;
}

// System parameters
$privateMembers = 'private members';
$prime = 123456789; // Example prime number

// Generate Admin ID
$adminId = 'admin_' . base_convert(hash('sha256', 'admin' . $privateMembers . $prime), 16, 36);

// Generate Group ID
$groupId = 'group_' . base_convert(hash('sha256', 'group_manager' . $privateMembers . $prime), 16, 36);

// Generate Member Verifier ID
$memberVerifierId = 'mv_' . base_convert(hash('sha256', 'group_manager' . 'group_key' . $privateMembers . $prime), 16, 36);

// Output the generated IDs
echo "Admin ID: " . generateStructuredID();
echo "Group ID: " . generateStructuredID();
echo "Member Verifier ID: " .generateStructuredID();;
*/


/*

// Generate a structured ID of 8 to 10 characters
function generateStructuredID() {
    $id = date('y') . 'GP';
    $id .= chr(rand(65, 90)); // Random uppercase letter
    $id .= rand(0, 9); // Random digit
    $id .= str_pad(rand(0, 99), 2, '0', STR_PAD_LEFT); // Random two-digit number
    $id .= generateRandomCharacter(); // Random character or number or a combination
    return $id;
}

// Generate a random character or number
function generateRandomCharacter() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $length = strlen($characters);
    $randomChar = '';
    for ($i = 0; $i < 2; $i++) {
        $randomChar .= $characters[rand(0, $length - 1)];
    }
    return $randomChar;
}

// Generate the IDs
$adminId = 'admin_' . generateStructuredID();
$groupId = 'group_' . generateStructuredID();
$memberVerifierId = 'mv_' . generateStructuredID();

// Output the generated IDs
echo "Admin ID: " . $adminId . "<br>";
echo "Group ID: " . $groupId . "<br>";
echo "Member Verifier ID: " . $memberVerifierId . "<br>";



*/





// System parameters
$privateMembers = 'private members';
$prime = 123456789; // Example prime number

// Generate a structured ID from a hash value
function generateStructuredIDFromHash($hash) {
    // $id = date('y') . 'GP';
    // $id .= substr($hash, 2, 1); // Next character (one digit)
    // $id .= substr($hash, 3, 1); // Next character (one char)
    // $id .= substr($hash, 4, 2); // Next 2 characters (digits or char/num combination)
    // return $id;


    // $id = substr(date('y'), -2); // First 2 digits from the current year
    // $id .= 'GP'; // Next 2 characters ('GP')
    // $id .= substr($hash, 0, 1); // Next character (one digit)
    // $id .= substr($hash, 1, 2); // Next 2 characters (one char and one digit)
    // $id .= substr($hash, 3, 3); // Next 2 characters (digits or char/num combination)
    // return $id;


    $id = substr(date('y'), -2); // last 2 digits from the current year
    $id .= 'GP'; // Next 2 characters ('GP')
    $id .= substr($hash, 0, 1); // Next character (one digit)
    $id .= chr(rand(65, 90)); // Next character (capital letter)
    $id .= substr($hash, 1, 2); // Next 2 characters (two digits)
    $id .= chr(rand(65, 90)); // Next character (capital letter)
    $id .= substr($hash, 3, 1); // Next character (one digit)
    return $id;
}

// Generate Admin ID
$adminHash = hash('sha256', 'admin' . $privateMembers . $prime);
$adminId = 'admin_' . generateStructuredIDFromHash($adminHash);

// Generate Group ID
$groupManager = 'group_manager'; // Replace with the actual value
$groupHash = hash('sha256', $groupManager . $privateMembers . $prime);
$groupId = 'group_' . generateStructuredIDFromHash($groupHash);

// Generate Member Verifier ID
$groupKey = 'group_key'; // Replace with the actual value
$mvHash = hash('sha256', $groupManager . $groupKey . $privateMembers . $prime);
$memberVerifierId = 'mv_' . generateStructuredIDFromHash($mvHash);

// Output the generated IDs
echo "Admin ID: " . $adminId . "<br>";
echo "Group ID: " . $groupId . "<br>";
echo "Member Verifier ID: " . $memberVerifierId . "<br>";

?>


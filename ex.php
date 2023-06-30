<!-- <script>
function addMember(authority) {
  // Set the hidden input value to the selected authority
  document.getElementById("authority").value = authority;
  
  // Submit the form
  document.getElementById("addMemberForm").submit();
}
</script>

<script>
alert("Select the member to add: Authority or Regular");

function handleAuthorityClick() {
  alert("Authority button clicked");
  addMember(1); // Authority
}

function handleRegularClick() {
  alert("Regular button clicked");
  addMember(0); // Regular
}
</script> -->

<!-- Display the buttons and form -->
<!-- <button onclick="handleAuthorityClick()">Authority</button>
<button onclick="handleRegularClick()">Regular</button>

<form id="addMemberForm" action="add_member.php" method="POST">
  <input type="hidden" id="authority" name="authority" value="">
</form> -->





<!-- <script>
function addMember(authority) {
  // Set the hidden input value to the selected authority
  document.getElementById("authority").value = authority;
  
  // Submit the form
  document.getElementById("addMemberForm").submit();
}
</script>

<script>
var memberType = prompt("Select the member type:\nEnter 'A' for Authority\nEnter 'R' for Regular");

if (memberType && (memberType.toUpperCase() === 'A' || memberType.toUpperCase() === 'R')) {
  if (memberType.toUpperCase() === 'A') {
    alert("Authority selected");
    addMember(1); // Authority
  } else {
    alert("Regular selected");
    addMember(0); // Regular
  }
} else {
  alert("Invalid member type selected");
}
</script>-->

<!-- Display the form -->
<!-- <form id="addMemberForm" action="ex.php" method="POST">
  <input type="hidden" id="authority" name="authority" value="">
</form> -->
<?php

// if ($_SERVER['REQUEST_METHOD'] === 'POST') 
// {
//   // Check if the 'authority' field is set in the POST data
//   if (isset($_POST['authority'])) {
//     $authority = $_POST['authority'];

//     // Check the value of 'authority' to determine the member type
//     if ($authority == 1) {
//       echo "Member added as an authority";
//     } elseif ($authority == 0) {

//       echo "Member added as a regular member";
//     } else {

//       echo "Invalid member type selected";
//     }
//   } else {

//     echo "Member type not specified";
//   }
// }
?>


<!-- Display the form -->
<form id="addMemberForm" action="ex2.php" method="POST">
  <input type="hidden" id="authority" name="authority" value="">
</form>

<script>
function addMember(authority) {
  // Set the hidden input value to the selected authority
  document.getElementById("authority").value = authority;
  
  // Submit the form
  document.getElementById("addMemberForm").submit();
}

var memberType = prompt("Select the member type:\nEnter 'A' for Authority\nEnter 'R' for Regular");

if (memberType && (memberType.toUpperCase() === 'A' || memberType.toUpperCase() === 'R')) {
  if (memberType.toUpperCase() === 'A') {
    alert("Authority selected");
    addMember(1); // Authority
  } else {
    alert("Regular selected");
    addMember(0); // Regular
  }
} else {
  alert("Invalid member type selected");
}
</script>

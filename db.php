<!-- to connect to database  -->

<?php
$servername = "localhost";
$username = "id17034562_kravinash";
$password = "MyDatabase1234@";
$db = "id17034562_banking";

// Create connection
$conn = mysqli_connect($servername,  $username, $password, $db );

// Check connection
if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>
<?php
$servername = "fdb26.awardspace.net";
$mysql_username = "3076214_data";
$mysql_password = "madhav@1234";

$mysql_db = "3076214_data";

// Create connection
$conn = mysqli_connect($servername, $mysql_username, $mysql_password,$mysql_db);

// Check connection
if (!$conn) {
    die("Connection failed: " .  mysqli_connect_error());
} 

?>
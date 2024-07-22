<?php

// data from the form
$server = "localhost";
$database = "tarot";
$user = "root";
$password = "";

// Create connection
$conn = mysqli_connect($server, $user, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "<h2>Connected successfully</h2>";
?>
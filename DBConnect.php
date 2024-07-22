<?php
$servername = "localhost"; 
$username = "lyspeers"; 
$password = "newpass"; 
$database = "tarot"; 

$conn;


function openDB() {
  global $servername, $username, $password, $database, $conn;


  $conn = new mysqli($servername, $username, $password, $database);
  if ($conn->connect_error)
    return $conn->connect_error;
  else
    return "Connected";

}

function closeDB() {
  global $conn;
}

function modifyDB($sql) {
  global $conn;
  $message = openDB();
  if ($message == "Connected") {
    if ($conn->query($sql) === TRUE)
      $message = "Update Successful";
    else
      $message = $conn->error;
    closeDB();
  }
  return $message . "<br>";
}


function queryDB($sql) {
  global $conn;
  $message = openDB();
  if ($message == "Connected") {
    $result = $conn->query($sql);
    if (gettype($result) == "object")
      $message = $result;
    else
      $message = $conn->error . "<br>Your SQL:" . $sql;
    closeDB();
  }
  return $message;
}

// API for login with prepared statement
function loginDB($sql, $user, $pwd) {
  global $conn;
  $message = openDB();
  if ($message == "Connected") {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $user, $pwd);
    $stmt->execute();
    $result = $stmt->get_result();
    if (gettype($result) == "object")
      $message = $result;
    else
      $message = $conn->error . "<br>Your SQL:" . $sql;
    closeDB();
  }
  return $message;
}

?>

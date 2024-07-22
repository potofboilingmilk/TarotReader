
<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="wrapper_main" style="margin-top:0%">
            <div class="wrapper_interior_a" style="background-color:#aaaaff; width:25%">
                <p>Home</p>
            </div>

            <div class="wrapper_interior_a" style="background-color:#aaaaff; width:25%">
                <p>User (DEFUNCT)</p>
            </div>
            
            <div class="wrapper_interior_a" style="background-color:#aaaaff; width:25%">
                <p>Admin (DEFUNCT)</p>
            </div>
            
            <div class="wrapper_interior_a" style="background-color:#aaaaff; width:25%">
                <a href="consultant.php">Consultant panel</a>
            </div>
            
            <div class="wrapper_interior_a" style="background-color:#aaaaff; width:25%">
                <p>Login</p>
            </div>
        </div>

<?php

$_SESSION["userpower"] = "0";


?>
    
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php require "DBConnect.php";
$user = "lucas";
$pwd = "poop";
$sql = "select UserID, UserName, UserPower from User where UserName = ? and UserPass = ?";
//$result = queryDB($sql);
$result = loginDB($sql, $user, $pwd);
if (gettype($result) == "object") {
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $UserID = $row['UserID'];
    $UserName = $row['UserName'];
    $UserPower = $row['UserPower'];
    session_start();
    $_SESSION['id'] = $UserID;
    $_SESSION['username'] = $UserName;
    $_SESSION['userPower'] = $UserPower;
    //exit;
  }else {
    echo "Login Failed";
  }
}?>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">Public</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user.php">Basic user</a>
      </li>
      <?php
        if (isset($UserPower)&& $UserPower == "1") {
            echo '<li class="nav-item">
        <a class="nav-link" href="consultant.php">Consultant</a>
      </li>';
        }else {
            echo '<li class="nav-item">
        <a class="nav-link disabled" href="consultant.php">Consultant</a>
      </li>';
        }
?>
      <?php
        if (isset($UserPower)&& $UserPower == '2') {
            echo '<li class="nav-item">
        <a class="nav-link" href="admin.php">Admin</a>
      </li>';
        }else {
            echo '<li class="nav-item">
        <a class="nav-link disabled" href="admin.php">Admin</a>
      </li>';
        }
?>
      
  </div>
</nav>
</body>
</html>


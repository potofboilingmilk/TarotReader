<?php
include 'db_Connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UserName = mysqli_real_escape_string($conn, $_POST['username']);
    $UserPass = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM user WHERE UserName = '$UserName'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($UserPass, $row['password'])) {
            // Password is correct, start session and redirect to welcome.php
            session_start();
            $_SESSION['UserName'] = $row['UserName'];
            $_SESSION['FullName'] = $row['FullName'];
            header("Location: welcome.php");
            exit(); // Ensure script stops here to avoid further execution
        } else {
            // Invalid password
            echo "Invalid username or password.";
        }
    } else {
        // User not found
        echo "Invalid username or password.";
    }
}

$conn->close();
?>

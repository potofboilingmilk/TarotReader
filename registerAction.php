<!-- register -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Confirmation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div>
        <!-- ... registration confirmation content ... -->
      <?php
include 'db_Connect.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == 'GET') {
    $UserName = mysqli_real_escape_string($conn, $_GET['UserName']);
    $UserPass = mysqli_real_escape_string($conn, $_GET['password']);
    $hashed_password = password_hash($UserPass, PASSWORD_DEFAULT);
    $FullName = mysqli_real_escape_string($conn, $_GET['FullName']);
    $Contact = mysqli_real_escape_string($conn, $_GET['Contact']);
    $UserMail = mysqli_real_escape_string($conn, $_GET['UserMail']);

    // Check if the name is already in use
    $check_query = "SELECT * FROM user WHERE UserName = '$UserName'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Name is already in use, display error message
        echo "Please choose another name. The provided name is already in use.";
    } else {
        // Name is unique, proceed with registration
        $insert_query = "INSERT INTO user (UserName, UserPass, FullName, Contact, UserMail) 
                         VALUES ('$UserName', '$hashed_password', '$FullName', '$Contact', '$UserMail')";

        if ($conn->query($insert_query) === TRUE) {
            echo "Registration successful!";
            // Redirect to the login page or any other page as needed
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;   
        }
    }
}

$conn->close();
?>

    </div>
</body>
</html>



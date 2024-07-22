<?php
include('db_Connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $search_term = $_GET['search_term'];

    $sql = "SELECT * FROM user WHERE 
            FullName LIKE '%$search_term%' OR 
            Contact LIKE '%$search_term%' OR 
            UserMail LIKE '%$search_term%'"; 
            
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Search Results:</h2>";
        while ($row = $result->fetch_assoc()) {
            echo "Name: " . $row['FullName'] . "<br>";
            echo "Contact: " . $row['Contact'] . "<br>";
            echo "Email: " . $row['UserMail'] . "<br>";
            // echo "Stay Signed In: " . ($row['stay_signed_in'] ? 'Yes' : 'No') . "<br>";
            // Add other fields as needed
            echo "<hr>";
        }
    } else {
        echo "No results found.";
    }
}

$conn->close();
?>

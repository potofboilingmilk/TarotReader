
<?php
//session_start();

    include 'header.php';
    
$servername = "localhost"; 
$username = "lyspeers"; 
$password = "newpass"; 
$database = "tarot"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UserID']) && isset($_POST['UserPower'])) {
    $userID = $_POST['UserId'];
    $userPower = $_POST['userPower'];

    $update_sql = "UPDATE user SET UserPower = '$userPower' WHERE UserID = '$userID'";
    if ($conn->query($update_sql) === TRUE) {
        echo "User access level updated successfully.";
    } else {
        echo "Error updating user access level: " . $conn->error;
    }
}    

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['UserID']) && isset($_POST['UserRestricted'])) {
    $userID = $_POST['UserId'];
    $userRestricted = $_POST['UserRestricted'];

    $update_sql = "UPDATE user SET UserRestricted = '$userRestricted' WHERE UserID = '$userID'";
    if ($conn->query($update_sql) === TRUE) {
        echo "User access level updated successfully.";
    } else {
        echo "Error updating user access level: " . $conn->error;
    }
}


if ($result->num_rows > 0) {
    echo '<form method="post">';
    echo '<select name="user">';
	while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["UserID"] . '">' . $row["UserMail"] . '</option>';
	}
    echo '</select>';
        
    echo '<select name="UserPower">';
    echo '<option value="1">Basic</option>';
    echo '<option value="2">Consultant</option>';
    echo '<option value="3">Admin</option>';
    echo '</select>';

    echo '<button type="submit" name="confirm">Update Access Level</button>';
    echo '</form>';


} else {
    echo "0 results";
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo '<form method="post">';
    echo '<select name="user">';
	while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["UserID"] . '">' . $row["UserMail"] . '</option>';
	}
    echo '</select>';
        
    echo '<select name="UserRestricted">';
    echo '<option value="0">Unrestricted</option>';
    echo '<option value="1">restricted</option>';
    echo '</select>';

    echo '<button type="submit" name="confirm">Restrict User</button>';
    echo '</form>';


} else {
    echo "0 results";
}

$conn->close();


/*
 * 
 * FAILED/WIP Javasctipt experiment for adding a coomfirm prompt to database updates
 * will revisit in next sprint
 * REMOVE PHP DELIMMITER WHEN TESTING
<script>
function confirmUpdate() {
    var user_id = document.getElementsByName('user')[0].value;
    var username = document.getElementsByName('user')[0].options[document.getElementsByName('user')[0].selectedIndex].text;
    var user_role = document.getElementsByName('user_role')[0].value;
    var confirmation = confirm("Are you sure you want " + username + " to have this access level?");
    if (confirmation) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", window.location.href, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status ===x 200) {
                alert(xhr.responseText);
            }
        };
        xhr.send("UserID=" + user_id + "UserPower=" + user_role);
    }
}
</script>
*/

?>


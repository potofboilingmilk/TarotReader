
<?php 
include 'header.php';




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarot Card Reading</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style>
        /* Additional styles for the login button */
        .login-btn {
            background-color: #3498db;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: auto;
            width: fit-content;
        }

        .login-btn:hover {
            background-color: #2980b9;
        }

        /* Header styles */
        #mainHeader {
            position: fixed;
            top: 0;
            left: 0;
            width: fit-content;
            background-color: #333;
            padding: 10px 20px;
            box-sizing: border-box;
            z-index: 100;
            transition: top 0.3s;
        }

        #mainHeader .logo {
            color: #fff;
            font-size: 24px;
        }

        /* Login form overlay styles */
        #loginFormOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
        }

        .login-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 300px;
            box-sizing: border-box;
            text-align: center;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        .login-form button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <header id="mainHeader">
        <div class="logo">Tarot Reading</div>
        <div class="login-btn" onclick="toggleLoginForm()">Log In</div>
    </header>

   
     <form action="registerAction.php" method="get">
        <header>
            <i class="fas fa-music icon"></i> Tarot Card Readings Registration
        </header>
        <label for="FullName">Name:</label>
        <input type="text" name="FullName" required>
         
        <label for="UserName">Username:</label>
        <input type="text" name="UserName" required>

        <label for="Contact">Contact Information:</label>
        <input type="text" name="Contact" required>

        <label for="UserMail">Email:</label>
        <input type="text" name="UserMail" required>

        <!--<label for="stay_signed_in">Stay Signed In:</label>
        <input type="checkbox" name="stay_signed_in">

        -->
        <label for="UserPass">Password:</label>
        <input type="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" required>

        <input type="submit" value="Register">
    </form>

    <div id="loginFormOverlay">
        <div class="login-form">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <input type="text" name="UserName" placeholder="Username" required>
                <input type="password" name="UserPass" placeholder="Password" required>
                <button type="submit">Log In</button>
            </form>
        </div>
    </div>

    <script>
        function toggleLoginForm() {
            var loginFormOverlay = document.getElementById("loginFormOverlay");
            loginFormOverlay.style.display = (loginFormOverlay.style.display === "none") ? "block" : "none";
        }

        // Close the login form when clicking outside of it
        $(document).mouseup(function (e) {
            var container = $(".login-form");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $("#loginFormOverlay").hide();
            }
        });
    </script>
</body>
</html>


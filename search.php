<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarot</title>
    <style>
        /* Add styles here */
    </style>
</head>
<body>
    <h2>User Search</h2>
    <form action="searchAction.php" method="get">
        <label for="search_term">Search:</label>
        <input type="text" name="search_term" required>
        <input type="submit" value="Search">
    </form>

    <hr>

    <?php include('index.php'); ?>
</body>
</html>

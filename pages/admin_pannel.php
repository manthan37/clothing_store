<?php
session_start();

if (!$_SESSION['isadmin']) {
    header("location:../authentication/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/style/style.css">

</head>

<body>
    <?php
    echo "<h1>Welcome " . $_SESSION['username'] . "</h1>";
    ?>
    <a href="../authentication/logout.php">Logout</a>

</body>

</html>
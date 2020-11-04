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
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <style>
        .onhover:hover {
            box-shadow: 3px 3px 7px #393b44;
        }
    </style>
</head>

<body>
    <div style="float: right; margin-right: 20px;  color: white;">
        <a href="../authentication/logout.php"><i class="fas fa-power-off" style="color: black;"></i>Logout</a>
    </div>

    <div>
        <div class="container onhover" style="transform: translate(-107%,-107%); width: 150px; text-align: center;">
            Monitor
            Orders</div>
        <div class="container onhover" style="transform: translate(7%,-107%); width: 150px; text-align: center;">Block
            Seller
        </div>
        <div class="container onhover" style="transform: translate(-107%,7%); width: 150px; text-align: center;">Block
            User
        </div>
        <div class="container onhover" style="transform: translate(7%,7%); width: 150px; text-align: center;">Total Earnings
        </div>
    </div>

</body>

</html>
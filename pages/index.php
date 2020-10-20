<?php
include '../database/connection.php';

if (isset($_POST['submit'])) {

    $getadmin = ($db->query("SELECT * FROM `admin_details`"))->fetch_object();
    if ($_POST['username'] == $getadmin->username && $_POST['password'] == $getadmin->password) {
        header('location:admin_pannel.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Login</title>
</head>
<div class="container">
    <div class="header">Login</div>
    <form method="post">
        <table>
            <tr>
                <td>
                    <label for="username">Username</label></td>
                <td>
                    <input type="text" name="username" id="username" placeholder="Enter Username"></td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password</label></td>
                <td>
                    <input type="password" name="password" id="password"></td>
            </tr>
            <tr>

                <td colspan="2" style="text-align: center;"><button type="submit" name="submit" value="submit">Login</button></td>
            </tr>
        </table>
    </form>
</div>

<body>

</body>

</html>
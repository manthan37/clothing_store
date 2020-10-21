<?php
include '../database/connection.php';
session_start();
if (isset($_POST['submit'])) {

    $name = $_POST['username'];
    $password = $_POST['password'];
    $getadminrow = $db->query("SELECT * FROM `admin_details` WHERE `username`='$name' AND `password`='$password'");
    $getadmin = ($getadminrow)->fetch_object();

    if ($name == $getadmin->username && $password == $getadmin->password) {
        $_SESSION['isadmin'] = true;
        $_SESSION['username'] = $getadmin->username;
        print_r($_SESSION);
        header('location:../pages/admin_pannel.php');
    }
    $getuser = "SELECT * FROM `users` WHERE `name`='$name' AND `password`='$password'";
    $ismatch = $db->query($getuser);
    $userdata = $ismatch->fetch_object();

    if ($ismatch->num_rows == 1) {

        $_SESSION['islogin'] = true;
        $_SESSION['username'] = $name;
        $_SESSION['email'] = $userdata->email;

        header("location:../pages/explore.php");
    } else {
        echo "something went wrong";
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

<body>
    <?php include '../includes/header.php'; ?>
    <div class="container">
        <div class="header">Login</div>

        <form method="post" autocomplete="off">
            <table>

                <tr>
                    <td><label for="username" id="username_label">Username</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td> <label for="password" id="password_label">Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td>
                        <a href="forgot.php" class="clickhere left">Forgot password?</a>
                    </td>
                </tr>


                <tr>
                    <td><button id="submit" type="submit" name="submit" value="submit">Login</button></td>
                </tr>
                <tr>
                    <td class="center">Not Registered? <a href="registration.php" class="clickhere">Sign up</a></td>
                </tr>
            </table>
        </form>
    </div>


    <?php include '../includes/footer.php'; ?>
</body>

</html>
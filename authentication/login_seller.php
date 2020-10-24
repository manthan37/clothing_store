<?php
include '../database/connection.php';
session_start();
$message = '';
if (isset($_SESSION['islogin']) && isset($_SESSION['isseller'])) {
    header("location:product_upload.php");
}
if (isset($_SESSION['islogin'])) {
    header("location:../pages/explore.php");
}
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == 'admin' && $password == 'admin') {
        $_SESSION['isadmin'] = true;
        $_SESSION['username'] = $getadmin->username;
        //print_r($_SESSION);
        header('location:../pages/admin_pannel.php');
    }

    $getseller = "SELECT * FROM `sellers` WHERE `email`='$email' AND `password`='$password'";
    $ismatch = $db->query($getseller);
    $userdata = $ismatch->fetch_object();

    if ($ismatch->num_rows == 1) {

        $_SESSION['islogin'] = true;
        $_SESSION['username'] = $userdata->name;
        $_SESSION['email'] = $userdata->email;
        $_SESSION['isseller'] = true;

        header("location:product_upload.php");
    } else {
        $message =  "Not Registred!";
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
        <div class="header">Seller Login</div>

        <form method="post" autocomplete="off">
            <table>

                <tr>
                    <td><label for="email" id="email_label">Email</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="email" id="email"></td>
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
                    <td class="center" style="color: #f56942; font-size: larger;"><?php echo $message; ?></td>
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
<?php
include '../database/connection.php';
session_start();
$message = "";
if (isset($_SESSION['islogin'])) {
    header("location:../pages/explore.php");
}
if (isset($_POST['submit'])) {

    $name = $_POST['email'];
    $password = $_POST['password'];
    // $search = "SELECT * FROM `admin_details` WHERE `username`='$name' AND `password`='$password'";
    // $getadminrow = $db->query($search);

    // $getadmin = $getadminrow->fetch_object();

    if ($name == 'admin' && $password == 'admin') {
        $_SESSION['isadmin'] = true;
        $_SESSION['username'] = $getadmin->username;
        print_r($_SESSION);
        header('location:../pages/admin_pannel.php');
    }

    $getuser = "SELECT * FROM `users` WHERE `email`='$name' AND `password`='$password'";
    $ismatch = $db->query($getuser);
    $userdata = $ismatch->fetch_object();

    if ($ismatch->num_rows == 1) {

        $_SESSION['islogin'] = true;
        $_SESSION['username'] = $userdata->name;
        $_SESSION['email'] = $userdata->email;
        $_SESSION['cart'] = array(0);

        header("location:../pages/explore.php");
    } else {
        $message = "Not Registred!";
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
                    <td class="center" style="color: #f56942; font-size: larger;"><?php echo $message; ?></td>
                </tr>
                <tr>
                    <td><button id="submit" type="submit" name="submit" value="submit">Login</button></td>
                </tr>
                <tr>
                    <td class="center">Not Registered? <a href="registration.php" class="clickhere">Sign up</a></td>
                </tr>
                <tr>
                    <td class="center">As seller? <a href="login_seller.php" class="clickhere">Seller</a></td>
                </tr>
            </table>
        </form>
    </div>


    <?php include '../includes/footer.php'; ?>
</body>

</html>
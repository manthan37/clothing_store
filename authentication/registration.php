<?php
include '../database/connection.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    echo "got data";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Sign Up</title>
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <div class="container" style="transform: translate(-50%,-40%); padding: 30px 50px;">
        <div class="header">Sign Up</div>

        <form method="post">
            <input type="hidden" autocomplete="off">
            <table>

                <tr>
                    <td><label for="username" id="username_label">Username</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td><label for="email" id="email_label">Email</label></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" id="email"></td>
                </tr>

                <tr>
                    <td><label for="mobile" id="email_label">Mobile no.</label></td>
                </tr>
                <tr>
                    <td><input type="tel" name="mobile" id="mobile"></td>
                </tr>
                <tr>
                    <td><label for="address" id="address_label">Address</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="address" id="address"></td>
                </tr>
                <tr>
                    <td> <label for="password" id="password_label">Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td> <label for="confirmpassword" id="password_label">Confirm Password</label></td>
                </tr>
                <tr>
                    <td><input type="confirmpassword" name="confirmpassword" id="confirmpassword"></td>
                </tr>


                <tr>
                    <td><button id="submit" type="submit" name="submit" value="submit">Sign Up</button></td>
                </tr>
                <tr>
                    <td class="center">Already Registered? <a href="login.php" class="clickhere">Login</a></td>
                </tr>
            </table>
        </form>
    </div>


    <div class="footer"><?php include '../includes/footer.php'; ?></div>
</body>

</html>
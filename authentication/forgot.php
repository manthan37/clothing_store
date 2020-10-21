<?php
include '../database/connection.php';
include '../includes/header.php';
// if (isset($_POST['submit'])) {

//     $getadmin = ($db->query("SELECT * FROM `admin_details`"))->fetch_object();
//     if ($_POST['username'] == $getadmin->username && $_POST['password'] == $getadmin->password) {
//         header('location:admin_pannel.php');
//     }
// }
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
    <div class="container">
        <div class="header">Forgot</div>

        <form method="post" autocomplete="off">
            <table>

                <tr>
                    <td><label for="email" id="email_label">email</label></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" id="email"></td>
                </tr>
                <!-- <tr>
                    <td> <label for="password" id="password_label">Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr> -->
                <!-- <td>
                        <a href="forgot.php" class="clickhere left">Forgot password?</a>
                    </td>
                </tr> -->


                <tr>
                    <td><button id="submit" type="submit" name="submit" value="submit">Sent Password</button></td>
                </tr>
                <tr>
                    <td class="center"><a href="registration.php" class="clickhere">Sign up</a><span> | </span><a href="login.php" class="clickhere">Login</a></td>
                </tr>

            </table>
        </form>
    </div>


    <?php include '../includes/footer.php'; ?>
</body>

</html>
<?php
//include '../database/connection.php';

if (isset($_POST['submit'])) {

    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Forgot Password</title>

</head>

<body>
    <?php include '../includes/header.php'; ?>
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
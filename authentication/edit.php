<?php
include '../database/connection.php';
$message = '';
session_start();
if (!$_SESSION['islogin']) {
    header("location:login.php");
} else {
    $email = $_SESSION['email'];

    $record = $db->query("SELECT * FROM `users` WHERE `email` = '$email'");
    $row = $record->fetch_object();
}

if (isset($_POST['submit'])) {

    $name = $_POST['username'];

    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $update = "UPDATE `users` SET 
            `name` = '$name',
            `mobile` = '$mobile',
            `address` = '$address',
            `password` = '$password'
             WHERE `email` = '$email' ";

    if ($db->query($update)) {
        header("location:../pages/explore.php");
    } else {
        echo $update;
        $message = "something went wrong";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Edit Profile</title>
    <script>
        var pass_return = '';

        function validate() {
            if (document.getElementById('username').value == '') {
                alert('Please enter Your Name');
                return false;
            } else if (document.getElementById('email').value == '') {
                alert('Please enter Your Email');
                return false;
            } else if (document.getElementById('mobile').value == '') {
                alert('Please enter Mobile no.');
                return false;
            } else if (document.getElementById('address').value == '') {
                alert('Please enter your address');
                return false;
            } else if (document.getElementById('password').value == '' && document.getElementById('confirmpassword').value == '') {
                alert('Enter Password!');
                return false;
            }
            if (pass_return == false) {
                return false;
            } else {
                return true;
            }
        }
        var check = function() {
            if (document.getElementById('password').value != '' && document.getElementById('confirmpassword').value != '') {
                if (document.getElementById('password').value ==
                    document.getElementById('confirmpassword').value) {
                    document.getElementById('password').style.borderBottom = '2px solid green';
                    document.getElementById('confirmpassword').style.borderBottom = '2px solid green';
                    // document.getElementById('message').style.color = 'green';
                    pass_return = true;

                } else {
                    document.getElementById('password').style.borderBottom = '2px solid red';
                    document.getElementById('confirmpassword').style.borderBottom = '2px solid red';
                    // document.getElementById('message').style.color = 'red';
                    pass_return = false;
                }
            }
        }
    </script>
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <div class="container" style="transform: translate(-50%,-40%); padding: 30px 50px;">
        <div class="header">Sign Up</div>

        <form action="" method="post" name="registration" autocomplete="off" onsubmit="return(validate());">

            <table>

                <tr>
                    <td><label for="username" id="username_label">Username</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="username" id="username" value="<?php echo $row->name; ?>"></td>
                </tr>
                <!-- <tr>
                    <td><label for="email" id="email_label">Email</label></td>
                </tr>
                <tr>
                    <td><input type="text" autocomplete="off" name="email" id="email" value="<?php echo $row->email; ?>"></td>
                </tr> -->

                <tr>
                    <td><label for="mobile" id="email_label">Mobile no.</label></td>
                </tr>
                <tr>
                    <td><input type="tel" name="mobile" id="mobile" value="<?php echo $row->mobile; ?>"></td>
                </tr>
                <tr>
                    <td><label for="address" id="address_label">Address</label></td>
                </tr>
                <tr>
                    <td><input type="text" name="address" id="address" value="<?php echo $row->address; ?>"></td>
                </tr>
                <tr>
                    <td> <label for="password" id="password_label">Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" id="password" onkeyup='check();'></td>
                </tr>
                <tr>
                    <td> <label for="confirmpassword" id="password_label">Confirm Password</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="confirmpassword" id="confirmpassword" onkeyup='check();'></td>
                </tr>


                <tr>
                    <td><button id="submit" type="submit" name="submit" value="submit">Update</button></td>
                </tr>
                <tr>
                    <td>
                        <?php echo $message; ?>
                    </td>
                </tr>

            </table>
        </form>
    </div>


    <div class="footer"><?php include '../includes/footer.php'; ?></div>
</body>

</html>
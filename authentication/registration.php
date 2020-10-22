<?php
include '../database/connection.php';
$message = '';
session_start();

if (isset($_SESSION['islogin'])) {
    header("location:../pages/explore.php");
}
if (isset($_POST['submit'])) {

    $tempname = $_FILES['user_image']['tmp_name'];
    $filename = time() . $_FILES['user_image']['name'];
    $destination = '../assets/user_profiles/' . $filename;
    move_uploaded_file($tempname, $destination);

    $name = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $insert = "INSERT INTO `users`(`name`,`email`,`mobile`,`address`,`profile_image`,`password`) VALUES ('$name','$email','$mobile','$address','$filename','$password')";

    if ($db->query($insert)) {
        header("location:login.php");
    } else {
        $message = "something went wrong" . $insert;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Sign Up</title>
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

        <form method="post" name="registration" enctype="multipart/form-data" autocomplete="off" onsubmit="return(validate());">

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
                    <td><input type="text" autocomplete="off" name="email" id="email"></td>
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
                    <td><label for="user_image" id="user_image_label">Choose Profile Image</label></td>
                </tr>
                <tr>
                    <td><input type="file" id="user_image" name="user_image" accept="image/x-png,image/jpg,image/jpeg"></td>
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
                    <td><button id="submit" type="submit" name="submit" value="submit">Sign Up</button></td>
                </tr>
                <tr>
                    <td>
                        <?php echo $message; ?>
                    </td>
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
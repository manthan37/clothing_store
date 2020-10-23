<?php
include '../database/connection.php';
session_start();
if (isset($_SESSION['islogin']) && isset($_SESSION['isseller'])) {
    header("location:product_upload.php");
}
if (isset($_SESSION['islogin'])) {
    header("location:../pages/explore.php");
}
$message = '';

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $insert = "INSERT INTO `sellers`(`name`,`email`,`address`,`mobile`,`password`)  VALUES ('$name','$email','$address','$mobile','$password')";
    if ($db->query($insert)) {
        header('location:login_seller.php');
    } else {
        if ($db->error == "Duplicate entry '$email' for key 'email'") {
            $message =  "Email already exists.";
        } else if ($db->error == "Duplicate entry '$mobile' for key 'mobile'") {
            $message = "Mobile number already exists.";
        } else {
            $message =  "<p>Error: " . $insert . "<br>" . $db->error . "</p>";
        }
    }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Seller Sign Up</title>
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
            } else if (pass_return == false) {
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
<?php include '../includes/header.php'; ?>

<body>

    <div class="container" style="transform: translate(-50%,-40%);  padding: 30px 50px;">
        <div class="header">Sign Up</div>

        <form method="post" name="registration" autocomplete="off" onsubmit="return(validate());">

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
                    <td class="center">Already Registered? <a href="login_seller.php" class="clickhere">Login</a></td>
                </tr>
            </table>
        </form>
    </div>


    <div class="footer"><?php include '../includes/footer.php'; ?></div>
</body>

</html>
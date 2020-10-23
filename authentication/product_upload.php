<?php
include '../database/connection.php';
$message = '';
session_start();

print_r($_SESSION);
if (!isset($_SESSION['isseller'])) {
    header("location:../pages/explore.php");
}
if (isset($_POST['submit'])) {
    $filename = '';
    if ($_FILES['product_image']['name'] != '') {
        $tempname = $_FILES['product_image']['tmp_name'];
        $filename = time() . $_FILES['product_image']['name'];
        $destination = '../assets/product_photo/' . $filename;

        $totalBytes = 2000000;
        if (isset($_FILES)) {
            if ($_FILES["product_image"]["size"] <= $totalBytes) {
                move_uploaded_file($tempname, $destination);
                echo "File uploaded successfully!!!";
            } else {
                $message =  "File size must be less than 2MB!!!";
                move_uploaded_file($tempname, $destination);
            }
        }
    }

    $name = $_POST['product_name'];
    $seller = $_SESSION['username'];
    $gender = $_POST['gender'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $is_available = $_POST['is_available'];
    $review = $_POST['review'];
    $size = $_POST['size'];
    $image = $filename;
    $insert = "INSERT INTO `products`(`name`,`seller`,`gender`,`category`,`description`,`price`,`is_available`,`product_review`,`size`,`image`) VALUES ('$name','$seller','$gender','$category','$description','$price','$is_available','$review','$size','$image')";



    // if ($db->query($insert)) {
    //     echo "success";
    //     // header("location:login.php");
    // } else {
    //     if ($db->error == "Duplicate entry '$email' for key 'email'") {
    //         $message =  "Email already exists.";
    //     } else {
    //         $message =  "<p>Error: " . $insert . "<br>" . $db->error . "</p>";
    //     }
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Product Listing</title>
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
    </script>
</head>
<?php include '../includes/header.php'; ?>

<body>

    <div class="container" style="transform: translate(-50%,-40%);  padding: 30px 50px;">
        <div class="header">Upload your product</div>

        <form method="post" name="registration" enctype="multipart/form-data" autocomplete="off" onsubmit="return(validate());">
            <div style="display: flex;">
                <table>

                    <tr>
                        <td><label for="product_name" id="product_name_label">Product Name</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="product_name" id="product_name"></td>
                    </tr>
                    <tr>
                        <td><label for="gender" id="gender_label">Gender</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="gender" id="male" value="male" checked>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" id="female" value="female">
                            <label for="female">Female</label>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="category" id="category_label">category</label></td>
                    </tr>
                    <tr>
                        <td><select name="category" id="category">
                                <option value="">Select type</option>
                                <option value="top wear">Top wear</option>
                                <option value="bottom wear">Bottom wear</option>
                                <option value="watches">Watches</option>
                                <option value="sheos">Sheos</option>
                                <option value="perfumes">Perfumes</option>
                                <option value="other">Other</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><label for="description" id="description_label">Description</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="description" id="description"></td>
                    </tr>
                    <tr>
                        <td><label for="price" id="price_label">Price</label></td>
                    </tr>
                    <tr>
                        <td><input type="number" id="price" name="price" min="10"></td>
                    </tr>
                    <tr>
                        <td> <label for="is_available" id="is_available_label">Is available?</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="is_available" id="yes" value="yes" checked>
                            <label for="yes">Yes</label>
                            <input type="radio" name="is_available" id="no" value="no">
                            <label for="no">No</label></td>
                    </tr>
                    <tr>
                        <td> <label for="review" id="review_label">Product review</label></td>
                    </tr>
                    <tr>
                        <td><input type="number" min="0.0" max="5.0" step="any" name="review" id="review"></td>
                    </tr>
                    <tr>
                        <td><label for="size" id="size_label">Size</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="size" id="size"></td>
                    </tr>



                    <tr>
                        <td>
                            <?php echo $message; ?>
                        </td>
                    </tr>

                </table>
                <div style="align-self:center ; margin-left: 20px;">
                    <div style="text-align: center;">
                        <img src="../assets/product_photo/product.jpg" style="height: 100px; ">
                    </div>
                    <div style="text-align: center;">
                        <input type="file" id="product_image" name="product_image" accept="image/x-png,image/jpg,image/jpeg" style="max-width: 80px;">
                    </div>
                    <div><button id="submit" class="upload" type="submit" name="submit" value="submit" style="margin-top: 30px; height: 50px; font-family: poppins; background-color: #f1f3f8; border-radius: 10px;">Upload Product</button></div>
                </div>
            </div>
        </form>
    </div>


    <div class="footer"><?php include '../includes/footer.php'; ?></div>
</body>

</html>
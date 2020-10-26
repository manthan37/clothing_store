<?php
include '../database/connection.php';
session_start();

if (empty($_GET)) {
    header('location:../pages/explore.php');
}
if (!isset($_SESSION['islogin']) && !isset($_SESSION['isseller'])) {
    header('location:../pages/explore.php');
}
$id = $_GET['id'];

$row = $db->query("SELECT * FROM `products` WHERE `id`='$id'");
$product = $row->fetch_object();
$message = "";
$image = $product->image;


if (isset($_POST['submit'])) {

    $name = $_POST['product_name'];
    $gender = $_POST['gender'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $is_available = $_POST['is_available'];
    $product_review = $_POST['review'];
    $size = $_POST['size'];


    $update = "UPDATE `products` SET 
            `name` = '$name',
            `gender` = '$gender',
            `category` = '$category',
            `description` = '$description',
            `price` = '$price',
            `is_available` = '$is_available',
            `product_review` = '$product_review',
            `size` = '$size'
             WHERE `id` = '$id' ";

    if ($db->query($update)) {
        echo "success";
        header("location:product_list.php");
    } else {

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
    <title>Edit Product</title>

</head>

<body>
    <?php include '../includes/header.php'; ?>
    <div class="container" style="transform: translate(-50%,-40%); padding: 30px 50px;">
        <div class="header">Update your product</div>

        <form method="post" enctype="multipart/form-data" autocomplete="off">
            <div style="display: flex;">
                <table>
                    <tr>
                        <td><label for="product_name" id="product_name_label">Product Name</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="product_name" id="product_name" value="<?php echo $product->name; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="gender" id="gender_label">Gender</label></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="gender" id="male" value="male" <?php if ($product->gender == 'male') {
                                                                                            echo "checked";
                                                                                        } ?>>
                            <label for="male">Male</label>
                            <input type="radio" name="gender" id="female" value="female" <?php if ($product->gender == 'female') {
                                                                                                echo "checked";
                                                                                            } ?>>
                            <label for="female">Female</label>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="category" id="category_label">category</label></td>
                    </tr>
                    <tr>
                        <td><select name="category" id="category">
                                <option value="">Select type</option>
                                <option value="top wear" <?php if ($product->category == 'top wear') {
                                                                echo "selected";
                                                            } ?>>Top wear</option>
                                <option value="bottom wear" <?php if ($product->category == 'bottom wear') {
                                                                echo "selected";
                                                            } ?>>Bottom wear</option>
                                <option value="watches" <?php if ($product->category == 'watches') {
                                                            echo "selected";
                                                        } ?>>Watches</option>
                                <option value="sheos" <?php if ($product->category == 'shoes') {
                                                            echo "selected";
                                                        } ?>>Sheos</option>
                                <option value="perfumes" <?php if ($product->category == 'perfumes') {
                                                                echo "selected";
                                                            } ?>>Perfumes</option>
                                <option value="other" <?php if ($product->category == 'other') {
                                                            echo "selected";
                                                        } ?>>Other</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><label for="description" id="description_label">Description</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="description" id="description" value="<?php echo $product->description; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="price" id="price_label">Price</label></td>
                    </tr>
                    <tr>
                        <td><input type="number" id="price" name="price" min="10" value="<?php echo $product->price; ?>"></td>
                    </tr>
                    <tr>
                        <td> <label for="is_available" id="is_available_label">Is available?</label></td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="is_available" id="yes" value="yes" <?php if ($product->is_available == 'yes') {
                                                                                                echo "checked";
                                                                                            } ?>>
                            <label for="yes">Yes</label>
                            <input type="radio" name="is_available" id="no" value="no" <?php if ($product->is_available == 'no') {
                                                                                            echo "checked";
                                                                                        } ?>>
                            <label for="no">No</label></td>
                    </tr>
                    <tr>
                        <td> <label for="review" id="review_label">Product review</label></td>
                    </tr>
                    <tr>
                        <td><input type="number" min="0.0" max="5.0" step="any" name="review" id="review" value="<?php echo $product->product_review; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="size" id="size_label">Size</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="size" id="size" value="<?php echo $product->size; ?>"></td>
                    </tr>




                </table>

                <div style="align-self:center ; margin-left: 20px;">
                    <div>
                        <img src="../assets/product_photo/<?php
                                                            if (strlen($image) == 10) {
                                                                echo "product.jpg";
                                                            } else {
                                                                echo $image;
                                                            }
                                                            ?>" style="height: 100px; border-radius: 50%; ">
                    </div>
                    <div style="text-align: center;">
                        <input type="file" id="user_image" name="user_image" accept="image/x-png,image/jpg,image/jpeg" style="max-width: 90px;">
                    </div>
                    <div><button id="submit" class="upload" type="submit" name="submit" value="submit" style="margin-top: 30px; height: 50px; font-family: poppins; background-color: #f1f3f8; border-radius: 10px;">Upload Product</button></div>
                </div>
            </div>
        </form>
    </div>


    <div class="footer"><?php include '../includes/footer.php'; ?></div>
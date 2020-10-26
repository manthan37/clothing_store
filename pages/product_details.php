<?php
include '../database/connection.php';
session_start();
$id = $_GET['id'];
$result = $db->query("SELECT * FROM `products` WHERE `id`='$id'");
$product = $result->fetch_object();
if (isset($_POST['buy'])) {
    if (!isset($_SESSION['islogin'])) {
        header("location:../authentication/login.php");
    } else {
        $product_id = $product->id;
        $seller_name = $product->seller;
        $customer_name = $_SESSION['username'];
        $customer_email = $_SESSION['email'];
        $total = $product->price;
        $order = "INSERT INTO `orders` (`product_id`,`seller_name`,`customer_email`,`customer_name`,`total`,`status`) VALUES ('$product_id','$seller_name','$customer_email','$customer_name','$total','ordered')";
        if ($db->query($order)) {

            header("location:explore.php");
        } else {
            echo $db->error;
            echo $order;
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
    <title>Product Detail</title>
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <div>
        <a href="explore.php" class="btn_add_to_cart">back to explore</a> </div>
    <div class="container" style="top:50%">
        <form action="" method="post" onsubmit="return confirm('are you sure?')">
            <img src="../assets/product_photo/<?php echo $product->image; ?>" height="255px" alt="">

            <div class="product_detail">
                <span class="product_name"><?php echo $product->name . " for " . $product->gender; ?></span><br />
                <span class="product_description"><?php echo $product->description; ?></span><br />
                <span class="product_price"><?php echo "₹" . $product->price; ?></span><br />
                <span class="product_is_available" style="<?php if ($product->is_available == 'yes') {
                                                                echo "color:green;";
                                                            } else {
                                                                echo "color:red";
                                                            }  ?>"><?php if ($product->is_available == 'yes') {
                                                                        echo "in stock";
                                                                    } else {
                                                                        echo "out of stock";
                                                                    }  ?></span><br />
                <span class="product_seller"><?php echo "sold by " . $product->seller; ?></span><br />
                <span class="product_review" style="<?php if ($product->product_review < 3.5) {
                                                        echo "background-color: #e65454;";
                                                    } ?>"><?php echo $product->product_review . " / 5 ☆"; ?></span><br>
                <span class="product_size"><?php echo "size: " . $product->size; ?></span><br />
                <div class="buttons">
                    <?php if (isset($_SESSION['islogin']) && !isset($_SESSION['isseller']) && $product->is_available == 'yes') {
                        echo '<a href="../authentication/addtocart.php" class="btn_add_to_cart" style="color: whitesmoke;">Add to cart</a>';
                    } ?>
                    <?php if (isset($_SESSION['islogin']) && !isset($_SESSION['isseller']) && $product->is_available == 'yes') {
                        echo '<button name="buy" value="buy" class="btn_add_to_cart" style="color: whitesmoke; border: none; font-size: 16px;">Buy</button>';
                    } ?>

                </div>
            </div>
        </form>
    </div>
</body>

</html>
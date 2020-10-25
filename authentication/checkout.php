<?php
session_start();
if (!isset($_SESSION['islogin'])) {
    header("location:login.php");
} else if (isset($_SESSION['islogin']) && isset($_SESSION['isseller'])) {
    header("location:login.php");
} else if (!isset($_SESSION['cart'])) {
    header("location:../pages/explore.php");
}
print_r($_SESSION);
$ids = $_SESSION['cart'];
foreach ($ids as $key => $value) {
    $result = $db->query("SELECT * FROM `products` WHERE `id` = '$value'");
    $row = $result->fetch_object();

    $product_id = $row->id;
    $seller_name = $row->seller;
    $customer_name = $_SESSION['username'];
    $customer_email = $_SESSION['email'];
    $total = $row->price;
    $order = "INSERT INTO `orders` (`product_id`,`seller_name`,`customer_email`,`customer_name`,`total`,`status`) VALUES ('$product_id','$seller_name','$customer_email','$customer_name','$total','ordered')";
    if ($db->query($order)) {

        header("location:explore.php");
    } else {
        echo $db->error;
        echo $order;
    }
}
unset($_SESSION['cart']);

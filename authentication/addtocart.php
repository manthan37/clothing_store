<?php
session_start();
include "../database/connection.php";
$product = $_GET['cart_add'];
echo $product;
if (isset($_SESSION['islogin']) && !isset($_SESSION['isseller'])) {
    print_r($_SESSION);

    $_SESSION['cart'][] = $product;
    print_r($_SESSION);
    header("location:../pages/explore.php");
} else {
    header("location:../pages/explore.php");
}

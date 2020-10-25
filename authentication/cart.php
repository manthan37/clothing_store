<?php
session_start();
include '../database/connection.php';
if (!isset($_SESSION['islogin'])) {
    header("location:login.php");
} else if (isset($_SESSION['islogin']) && isset($_SESSION['isseller'])) {
    header("location:login.php");
}
$ids = $_SESSION['cart'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
    <?php include("../includes/header.php"); ?>
    <table class="tableborder" style="border-collapse: collapse; display: inline-table;">
        <tr class="tableborder">
            <th class="tableborder">No.</th>
            <th class="tableborder">Name</th>
            <th class="tableborder">Gender</th>
            <th class="tableborder">Category</th>
            <th class="tableborder">Description</th>
            <th class="tableborder">Price</th>
            <th class="tableborder">Is Available?</th>
            <th class="tableborder">Product review</th>
            <th class="tableborder">Size</th>
            <th class="tableborder">Image</th>
        </tr>
        <?php $counter = 1;

        foreach ($ids as $key => $value) {
            $result = $db->query("SELECT * FROM `products` WHERE `id` = '$value'");
            $row = $result->fetch_object();
        ?>
            <tr class="tableborder">
                <td class="tableborder"><?php echo $counter;
                                        $counter += 1; ?></td>
                <td class="tableborder"><?php echo $row->name ?></td>
                <td class="tableborder"><?php echo $row->gender ?></td>
                <td class="tableborder"><?php echo $row->category ?></td>
                <td class="tableborder"><?php echo $row->description ?></td>
                <td class="tableborder"><?php echo $row->price ?></td>
                <td class="tableborder"><?php echo $row->is_available ?></td>
                <td class="tableborder"><?php echo $row->product_review ?></td>
                <td class="tableborder"><?php echo $row->size ?></td>
                <td class="tableborder" style="text-align: center;"><img class="zoom" src="../assets/product_photo/<?php echo $row->image; ?>" alt="" height="80px"></td>
            </tr>
        <?php } ?>



    </table>
    <div style="background-color: #8d93ab; width: 130px; text-align: center; "><a href="checkout.php" style="color: black;" onclick="return confirm('Are you sure?');">Checkout</a></div>
</body>

</html>
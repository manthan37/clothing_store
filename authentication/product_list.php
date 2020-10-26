<?php
include '../database/connection.php';
$message = '';
session_start();

//print_r($_SESSION);
if (!isset($_SESSION['isseller'])) {
    header("location:../pages/explore.php");
}
$sellername = $_SESSION['username'];
$select = "SELECT * FROM `products` WHERE `seller`='$sellername'";
$result = $db->query($select);
if ($result->num_rows == 0) {
    echo "no product found";
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Your Products</title>

</head>
<?php include '../includes/header.php'; ?>

<body>

    <!-- <div class="container" style="transform: translate(-50%,-40%);  padding: 30px 50px;"> -->
    <div class="header">Your products</div>
    <div style="background-color: #8d93ab; width: 130px; text-align: center; "><a href="product_upload.php" style="color: black;">Add a product</a></div>
    <form method="post" name="registration" enctype="multipart/form-data" autocomplete="off" onsubmit="return(validate());">
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
                <th class="tableborder">Edit</th>
            </tr>
            <?php $counter = 1;
            while ($row = $result->fetch_object()) { ?>
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
                    <td><a href="product_edit.php?id=<?php echo $row->id; ?>">edit</a></td>
                </tr>
            <?php } ?>



        </table>
    </form>

    <!-- </div> -->


    <div class="footer"><?php include '../includes/footer.php'; ?></div>
</body>

</html>
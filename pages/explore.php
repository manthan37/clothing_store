<?php session_start();
include '../database/connection.php';
$result = $db->query("SELECT * FROM `products`");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>

<body>
    <?php include '../includes/header.php'; ?>
    <?php include 'mainbanner.php'; ?>


    <form action="">
        <div class="filter">
            <div class="inline_div">Shope by </div>
            <div class="inline_div">
                Gender
                <select name="gender">
                    <option value="all">All</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select></div>
            <div class="inline_div">
                Category
                <select name="category">
                    <option value="all">All</option>
                    <option value="topwear">Topwear</option>
                    <option value="bottomwear">Bottomwear</option>
                    <option value="watches">Watches</option>
                    <option value="shoes">Shoes</option>
                    <option value="perfumes">Perfumes</option>
                    <option value="other">Other</option>
                </select></div>

        </div>
    </form>






    <div class="products" style="margin: 20px; display: flex;   flex-wrap: wrap; justify-content: space-evenly;">
        <?php while ($product = $result->fetch_object()) { ?>
            <div class="product_container zoom1" style="width: 20vw; margin-bottom: 10px; ">
                <div><img src="../assets/product_photo/<?php echo $product->image; ?>" width="258px" height="255px" alt=""></div>
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
                        <a href="<?php if (!isset($_SESSION['islogin'])) {
                                        echo "../authentication/login.php";
                                    } ?>" class="btn_add_to_cart" style="color: whitesmoke;">Add to cart</a>
                        <a href="product_details.php?id=<?php echo $product->id; ?>" class="btn_view_detail" style="color: whitesmoke;">View full detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>
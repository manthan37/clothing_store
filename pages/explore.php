<?php session_start();
include '../database/connection.php';
$append1 = 1;
$append2 = 1;
$append3 = "";

if (isset($_POST['apply'])) {

    if ($_POST['gender'] != 'all') {
        $append1 = "`gender`='" . $_POST['gender'] . "'";
    } else {
        $append1 = 1;
    }
    if ($_POST['category'] != 'all') {
        $append2 = "`category`='" . $_POST['category'] . "'";
    } else {
        $append2 = 1;
    }
    if ($_POST['by'] == 'newest') {
        $append3 = "ORDER BY `id` DESC";
    } else if ($_POST['by'] == 'popular') {
        $append3 = "ORDER BY `product_review` DESC";
    } else if ($_POST['by'] == 'price_asc') {
        $append3 = "ORDER BY `price` ASC";
    } else if ($_POST['by'] == 'price_desc') {
        $append3 = "ORDER BY `price` DESC";
    }
}
$search = "SELECT * FROM `products` WHERE $append1 AND $append2 $append3";

$result = $db->query($search);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<?php include '../includes/header.php'; ?>

<body>

    <?php include 'mainbanner.php'; ?>


    <form action="" method="post">
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
                    <option value="top wear">Topwear</option>
                    <option value="bottom wear">Bottomwear</option>
                    <option value="watches">Watches</option>
                    <option value="shoes">Shoes</option>
                    <option value="perfumes">Perfumes</option>
                    <option value="other">Other</option>
                </select></div>
            <div class="inline_div">
                By
                <select name="by">
                    <option value="">None</option>
                    <option value="newest">Newest</option>
                    <option value="popular">Popular</option>
                    <option value="price_asc">Price: low to high</option>
                    <option value="price_desc">Price: high to low</option>

                </select></div>
            <div>
                <input type="submit" value="apply" name="apply" style="color: black;">
            </div>
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
                        <?php if (in_array($product->id, $_SESSION['cart'])) {
                            echo '<a href="../authentication/deletetocart.php?cart_delete=' . $product->id . '" class="btn_add_to_cart" style="color: whitesmoke; background-color:green;">Added</a>';
                        } else if (isset($_SESSION['islogin']) && !isset($_SESSION['isseller'])) {
                            echo '<a href="../authentication/addtocart.php?cart_add=' . $product->id . '" class="btn_add_to_cart" style="color: whitesmoke;">Add to cart</a>';
                        } ?>
                        <a href="product_details.php?id=<?php echo $product->id; ?>" class="btn_view_detail" style="color: whitesmoke;">View full detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</body>

</html>
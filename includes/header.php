<style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #393b44;
    }

    li {
        float: right;
    }



    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: #111;
    }

    .left {
        float: left;
    }

    .left:hover {
        background-color: rgb(57, 59, 79);
    }
</style>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <ul>
        <?php
        if (!isset($_SESSION['islogin'])) {
            echo "<li><a href='../authentication/login.php'>Login</a></li>";
        }
        if (isset($_SESSION['islogin']) & isset($_SESSION['isseller'])) {
            echo "<li><a href='../authentication/product_list.php'><i class='far fa-user-circle' style='font-size:18px'></i></a></li>";
        } elseif (isset($_SESSION['islogin'])) {
            echo "<li><a href='../authentication/edit.php'><i class='far fa-user-circle' style='font-size:18px'></i></a></li>";
        }
        if (isset($_SESSION['islogin']) & !isset($_SESSION['isseller'])) {
            echo "<li><a href='../authentication/cart.php'><i class='fas fa-shopping-cart' style='font-size:18px'></i></a></li>";
        }
        if (isset($_SESSION['islogin'])) {
            echo '<li><a href="../authentication/logout.php"><i class="fas fa-power-off"></i></a></li>';
        } ?>
        <li><a href="../pages/about.php">About</a></li>
        <li><a href="../pages/contact.php">Contact</a></li>
        <li><a href="../pages/explore.php">Explore</a></li>
        <?php if (isset($_SESSION['islogin'])) {
            echo "<li class='left'><a>Hello, " . $_SESSION['username'] . "</a></li>";
        } ?>
    </ul>
</body>
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
</style>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <ul>
        <?php

        if (isset($_SESSION['islogin'])) {
            echo "<li><a href='../authentication/edit.php'><i class='far fa-user-circle' style='font-size:18px'></i></a></li>";
        }

        if (isset($_SESSION['islogin'])) {
            echo '<li><a href="../authentication/logout.php"><i class="fas fa-power-off"></i></a></li>';
        } ?>
        <li><a href="../pages/about.php">About</a></li>
        <li><a href="../pages/contact.php">Contact</a></li>
        <li><a href="../pages/discount.php">Discounts</a></li>
        <li><a href="../pages/explore.php">Explore</a></li>

    </ul>
</body>
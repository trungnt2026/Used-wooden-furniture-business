<?php

session_start();

include "config.php";

$sql = "SELECT * FROM products";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐỒ GỖ 2HAND</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1>ĐỒ GỖ 2HAND</h1>

        <nav>
            <a href="#">Trang chủ</a>
            <a href="#">Sản phẩm</a>
            <a href="#cart">Giỏ hàng (<span id="cartCount">0</span>)</a>
            <a href="#">Liên hệ</a>

            <?php if (isset($_SESSION["user_id"])) { ?>

        <span>
            Xin chào,
            <?= $_SESSION["fullname"] ?>
        </span>

        <a href="users/logout.php">
            Đăng xuất
        </a>

    <?php } else { ?>

        <a href="users/login.php">
            Đăng nhập
        </a>

        <a href="users/register.php">
            Đăng ký
        </a>

    <?php } ?>
        </nav>
    </header>

    <section class="banner">
        <h2>Nội thất gỗ cũ giá tốt</h2>
        <p>Chất lượng - Tiết kiệm - Bền đẹp</p>
    </section>

    <section class="products">

        <div class="search-box">
            <input type="text" id="searchInput" placeholder="Tìm kiếm sản phẩm...">
            <button>Tìm kiếm</button>
        </div>

        <h2>Sản phẩm nổi bật</h2>

        <div class="product-list">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <div class="product"
                    data-name="<?= strtolower($row['name']) ?>">

                    <img src="./img/<?= $row['image'] ?>"
                        alt="<?= $row['name'] ?>">

                    <h3>
                        <?= $row['name'] ?>
                    </h3>

                    <p>
                        <?= number_format($row['price']) ?>đ
                    </p>

                    <button
                        onclick="addToCart(
                '<?= $row['name'] ?>',
                <?= $row['price'] ?>
            )">

                        Mua ngay

                    </button>

                </div>

            <?php } ?>

        </div>

    </section>

    <section class="cart-section" id="cart">
        <h2>Giỏ hàng</h2>

        <ul id="cartItems"></ul>

        <h3>Tổng tiền <span id="totalPrice">0</span>đ</h3>

        <select id="paymentMethod">
            <option value="cod">COD</option>
            <option value="visa/master">Visa/Master</option>
            <option value="momo">Momo</option>
        </select>

        <br><br>

        <button onclick="checkout()">
            Thanh toán
        </button>
    </section>

    <footer>
        <p>© 2026 ĐỒ GỖ 2HAND</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>
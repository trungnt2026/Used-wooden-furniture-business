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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>

<body>

    <div id="realtimeClock"
        style="position: fixed; top: 10px; left: 10px; padding: 8px; background: #33d41e; 
                color: white; border-radius: 8px; z-index: 9999; font-size: 18px; 
                font-weight: bold; font-family: sans-serif; pointer-events: none;">
    </div>
    <script>
        function updateClock() {
            const now = new Date();

            const options = {
                weekday: 'short',
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };
            document.getElementById('realtimeClock').innerText = now.toLocaleString('vi-VN', options);
        }

        updateClock();
        // Cập nhật mỗi giây
        setInterval(updateClock, 1000);
    </script>
    <header>
        <h1>ĐỒ GỖ 2HAND</h1>
        <nav>
            <a href="#">Trang chủ</a>
            <a href="#">Sản phẩm</a>
            <a href="cart.php" class="cart-link">
                <i class="bi bi-cart4"></i>
                Giỏ hàng (<span id="cartCount">0</span>)
            </a>
            <a href="contact.php">Liên hệ</a>

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

                <a href="admin/login.php">Quản trị viên</a>
            <?php } ?>
        </nav>
    </header>

    <section class="banner">
        <div class="banner-box">
            <h2>Nội thất gỗ cũ giá tốt</h2>
            <p>Chất lượng - Tiết kiệm - Bền đẹp</p>
        </div>
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
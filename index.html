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

    <div class="top-banner">
        <div class="banner-content" , style="font-size: 16px">
            <span><i class="bi bi-telephone-forward-fill"></i> Mua hàng & CSKH: <strong>1900.8888</strong> (Free)</span>

            <a href="find_store.php" class="text-decoration-none banner-link" style="color: #6c757d;">
                <i class="bi bi-geo-alt-fill" style="color: brown"></i> Tìm Siêu Thị
            </a>

            <a href="account.php" class="text-decoration-none banner-link" , color: #6c757d;">
                <i class="bi bi-person-circle"></i> Tài khoản
            </a>
        </div>
    </div>
    </div>
    <div id="realtimeClock" style="position: fixed; top: 10px; left: 10px; padding: 8px; background: #33d41e; 
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
    setInterval(updateClock, 1000);

    let mybutton = document.getElementById("backToTopBtn");

    window.onscroll = function() {
        let mybutton = document.getElementById("backToTopBtn");
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            mybutton.style.display = "flex";
        } else {
            mybutton.style.display = "none";
        }
    };

    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
    </script>

    <style>
    .btn-scroll-top {
        position: fixed !important;
        bottom: 0 !important;
        left: 0 !important;
        width: 100% !important;
        height: 60px !important;
        z-index: 9999 !important;
        transform: none !important;
        transition: background-color 0.3s ease !important;
    }

    .btn-scroll-top:hover {
        background-color: #442e28;
    }

    .btn-scroll-top i {
        display: none;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50px;
        background-color: #5D4037;
        color: #ffffff;
        border: none;
        cursor: pointer;
        z-index: 999;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        transition: background-color 0.3s ease;
    }

    .btn-scroll-top span {
        font-size: 16px;
        text-transform: uppercase;
        font-weight: bold;
    }


    footer {
        padding-bottom: 60px;
        text-align: center;
        position: relative;
        z-index: 1;
    }
    </style>

    <header>
        <h1>ĐỒ GỖ 2HAND</h1>
        <nav>
            <a href="#" onclick="window.location.reload(); return false;">
                Trang chủ
            </a>
            <a href="products.php">Sản phẩm</a>
            <a href="cart.php" class="cart-link">
                <i class="bi bi-cart4"></i>
                Giỏ hàng (<span id="cartCount">0</span>)
            </a>
            <a href="contact.php">Liên hệ</a>
            <a href="admin/login.php">Quản trị viên</a>
            <a href="about_us.php">Về chúng tôi</a>


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
            <div class="product" data-name="<?= strtolower($row['name']) ?>">
                <img src="./img/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                <h3>
                    <?= $row['name'] ?>
                </h3>
                <p>
                    <?= number_format($row['price']) ?>đ
                </p>
                <button onclick="addToCart(
                '<?= $row['name'] ?>',
                <?= $row['price'] ?>,
                './img/<?= $row['image'] ?>'
            )">
                    Mua ngay
                </button>
            </div>
            <?php } ?>
        </div>
    </section>

    <footer class="main-footer">
        <div class="footer-container">
            <div class="footer-col">
                <h3>ĐỒ GỖ 2HAND</h3>
                <p><strong>Địa chỉ:</strong> Quận 7, TP. Hồ Chí Minh</p>
                <p><i class="bi bi-telephone-inbound-fill"></i><strong> Hotline:</strong> <a
                        href="tel:19008888">1900.8888</a>
                </p>
                <p><i class="bi bi-envelope-at-fill"></i><strong> Email: </strong> <a
                        href="mailto: admin@org.json">admin@org.json</a>
                </p>
            </div>

            <div class="footer-col">
                <h3>Hỗ Trợ Khách Hàng</h3>
                <ul>
                    <li><a href="look_up_orders.php">Tra cứu đơn hàng</a></li>
                    <li><a href="buying_guide.php">Hướng dẫn mua hàng</a></li>
                    <li><a href="warranty_policy.php">Chính sách bảo hành</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Chấp Nhận Thanh Toán</h3>
                <div class="payment-methods">
                    <img src="img/visa.png" alt="Visa" title="Visa/Mastercard">
                    <img src="img/momo.png" alt="Momo" title="Momo">
                    <img src="img/COD.png" alt="COD" title="COD">

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <span>
                <Strong>© 2026 ĐỒ GỖ 2HAND - Hệ thống nội thất gỗ cũ giá tốt</Strong>
            </span>
        </div>
    </footer>

    <script src="script.js"></script>
    <button onclick="scrollToTop()" id="backToTopBtn" class="btn-scroll-top" title="Về đầu trang">
        <i class="bi bi-arrow-up-circle-fill"></i>
        <span class="d-block small fw-bold">Lên đầu</span>
    </button>
</body>

</html>
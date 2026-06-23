<?php
include "config.php";

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm - Đồ Gỗ 2Hand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        .product-img {
            height: 220px;
            object-fit: cover;
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15) !important;
        }

        .top-banner {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e0e0e0;
            padding: 8px 0;
            font-size: 13px;
            color: #555;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .banner-content {
            max-width: 1200px;
            margin: 0;
            display: flex;
            justify-content: center;
            /* Đẩy hotline sang trái, cụm link sang phải */
            align-items: center;
            /* Căn tất cả các khối thẳng hàng ngang với nhau */
            padding: 0 15px;
            gap: 50px;
        }

        .banner-content a:hover {
            opacity: 0.8;
        }

        .banner-right {
            display: flex;
            align-items: center;
            /* Căn các icon và chữ bên phải thẳng hàng */
            gap: 20px;
            /* Khoảng cách giữa Tìm siêu thị - Tài khoản - Giỏ hàng */
        }

        */ .banner-link {
            text-decoration: none;
            color: #6c757d;
            display: inline-flex;
            align-items: center;
            /* Giúp icon và chữ bên trong link không bị lệch dòng */
            gap: 4px;
            /* Khoảng cách giữa icon và chữ */
        }

        .banner-link:hover {
            opacity: 0.8;
        }

        /* Giúp đồng hồ không bị đè bởi banner */
        #realtimeClock {
            top: 30px !important;
            /* Dời đồng hồ xuống dưới banner một chút */
        }
    </style>
</head>
<div class="top-banner">
    <div class="banner-content">
        <div class="banner-left" , style="font-size: 20px">
            <a href="index.php" class="text-decoration-none banner-link">
                <span><i class="bi bi-house-fill"></i> Home</span>
            </a>
        </div>

        <div class="banner-left" , style="font-size: 16px">
            <span><i class="bi bi-telephone-forward-fill"></i> Mua hàng & CSKH: <strong>1900.8888</strong> (Free)</span>
        </div>

        <div class="banner-right" , style="font-size: 16px">
            <a href="find_store.php" class="text-decoration-none banner-link" style="color: #6c757d;">
                <i class="bi bi-geo-alt-fill" style="color: brown"></i> Tìm Siêu Thị
            </a>

            <a href="account.php" class="text-decoration-none banner-link" style="font-size: 16px; color: #6c757d;">
                <i class="bi bi-person-circle"></i> Tài khoản
            </a>

            <a href="cart.php" class="text-decoration-none banner-link" style="color: #8b4513;">
                <i class="bi bi-cart3 position-relative me-1" , style="font-size: 20px">
                    <span id="cartCount"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
                        style="font-size: 13px; padding: 2px 5px;">
                        0
                    </span>
                </i>
                Giỏ hàng
            </a>
        </div>
    </div>
</div>

<div id="realtimeClock" style="position: fixed; top: 10px !important; left: 10px; padding: 4px; background: #33d41e; 
                color: white; border-radius: 8px; z-index: 9999; font-size: 13px; 
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

<body class="bg-light">

    <div class="container my-5">
        <h2 class="text-center fw-bold mb-5 text-uppercase" style="color: #5a3825; letter-spacing: 1px;">
            Danh Sách Sản Phẩm Đồ Gỗ
        </h2>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm rounded-3">

                        <img src="./img/<?= $row["image"] ?>" class="card-img-top product-img rounded-top-3"
                            alt="<?= $row["name"] ?>">

                        <div class="card-body d-flex flex-column justify-content-between p-3">
                            <div>
                                <h5 class="card-title fw-bold text-dark text-truncate mb-2" title="<?= $row["name"] ?>">
                                    <?= $row["name"] ?>
                                </h5>
                                <p class="card-text text-danger fw-bold fs-5 mb-3">
                                    <?= number_format($row["price"]) ?> VNĐ
                                </p>
                            </div>

                            <a href="product_detail.php" class="btn btn-outline-dark w-100 fw-bold mt-2">
                                Xem Chi Tiết
                            </a>

                            <button
                                onclick="addToCart('<?= $row['name'] ?>', <?= $row['price'] ?>, './img/<?= $row['image'] ?>')"
                                class="btn btn-dark w-100 fw-bold mt-2">
                                🛒 Thêm vào giỏ
                            </button>
                        </div>

                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
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
    </style>
</head>

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

                        <a href="product_detail.php?id=<?= $row["id"] ?>"
                            class="btn btn-outline-dark w-100 fw-bold mt-2">
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
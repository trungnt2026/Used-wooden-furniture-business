<?php
// Cho phép lấy id sản phẩm nếu cần dùng sau này
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính Năng Đang Bảo Trì - ĐỒ GỖ 2HAND</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #ebdcd0 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', system-ui, sans-serif;
    }

    .maintenance-card {
        background: rgba(255, 255, 255, 0.95);
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .gear-icon {
        animation: spin 4s linear infinite;
        color: #8c6239;
        /* Màu nâu gỗ thương hiệu của bạn */
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

    .text-wood {
        color: #4a3424;
    }

    .btn-wood {
        background-color: #8c6239;
        color: white;
        border-radius: 50px;
    }

    .btn-wood:hover {
        background-color: #4a3424;
        color: white;
    }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center">
                <div class="card maintenance-card p-5 shadow">

                    <div class="mb-4">
                        <i class="fa-solid fa-screwdriver-wrench fa-4x gear-icon"></i>
                    </div>

                    <h2 class="fw-bold text-wood mb-3">TÍNH NĂNG CHI TIẾT <br> ĐANG BẢO TRÌ</h2>
                    <p class="text-muted mb-4 fs-6">
                        Trang xem chi tiết cho sản phẩm (ID: #<?php echo $product_id; ?>) đang được nâng cấp hệ thống dữ
                        liệu và tối ưu hình ảnh giao diện.
                    </p>

                    <div class="progress mb-4" style="height: 10px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                            style="width: 85%; background-color: #8c6239;"></div>
                    </div>

                    <div>
                        <a href="index.php" class="btn btn-wood px-4 py-2 fw-semibold shadow-sm">
                            <i class="fa-solid fa-house me-2"></i> Tiếp tục mua sắm
                        </a>
                    </div>

                </div>

                <p class="text-muted small mt-4">&copy; <?php echo date("Y"); ?> ĐỒ GỖ 2HAND - Hệ thống nội thất gỗ cũ
                    giá tốt.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
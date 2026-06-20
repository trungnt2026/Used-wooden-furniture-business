<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Quản Trị Hệ Thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-5 pb-3 border-bottom">
            <h2 class="text-dark fw-bold m-0">
                <i class="bi bi-speedometer2 me-2"></i>Hệ thống Dashboard Admin - ĐỒ GỖ 2HAND
            </h2>
            <a href="logout.php" class="btn btn-outline-danger fw-bold">
                <i class="bi bi-box-arrow-right me-1"></i> ĐĂNG XUẤT
            </a>
        </div>

        <div class="row g-4">

            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center p-4">
                        <div class="display-5 text-success mb-3">
                            <i class="bi bi-plus-circle-fill"></i>
                        </div>
                        <h4 class="card-title fw-bold">Thêm Sản Phẩm</h4>
                        <p class="card-text text-muted">Đăng bán các sản phẩm gỗ cũ, bàn ghế mỹ nghệ mới lên hệ thống cửa hàng.</p>
                        <a href="products/add_product.php" class="btn btn-success px-4 mt-2">
                            Vào Thêm Ngay
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center p-4">
                        <div class="display-5 text-primary mb-3">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <h4 class="card-title fw-bold">Quản Lý Danh Sách</h4>
                        <p class="card-text text-muted">Xem toàn bộ sản phẩm gỗ hiện có, thực hiện cập nhật giá, chỉnh sửa hoặc xóa bỏ.</p>
                        <a href="products/manage_products.php" class="btn btn-primary px-4 mt-2">
                            Vào Quản Lý
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="text-center text-muted mt-5 pt-4 border-top style=" font-size: 14px;">
            &copy; 2026 Đồ Gỗ 2Hand - Trang Quản Trị.
        </div>
    </div>

</body>

</html>
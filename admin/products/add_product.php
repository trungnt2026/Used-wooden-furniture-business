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
    <title>Thêm sản phẩm - Đồ Gỗ 2Hand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* Định nghĩa màu nâu gỗ */
        .btn-wood {
            background-color: #7A4A21;
            border-color: #7A4A21;
            color: #fff;
        }

        .btn-wood:hover {
            background-color: #5C3718;
            border-color: #5C3718;
            color: #fff;
        }

        .text-wood {
            color: #7A4A21 !important;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="mb-3">
                    <a href="dashboard.php" class="text-decoration-none text-secondary small">
                        <i class="bi bi-arrow-left"></i> Quay lại Dashboard
                    </a>
                </div>

                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4 p-sm-5">

                        <div class="mb-4 text-center border-bottom pb-3">
                            <h2 class="fw-bold text-dark m-0">
                                <i class="bi bi-plus-circle-fill text-wood me-2"></i>Thêm Sản Phẩm Mới
                            </h2>
                            <small class="text-muted">Đăng bán sản phẩm đồ gỗ cũ lên hệ thống</small>
                        </div>

                        <form action="save_product.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary small">Tên sản phẩm gỗ</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-muted"><i class="bi bi-tag"></i></span>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        placeholder="Ví dụ: Tủ quần áo gỗ thông đã qua sử dụng"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary small">Giá bán (VNĐ)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-muted"><i class="bi bi-currency-dollar"></i></span>
                                    <input
                                        type="number"
                                        class="form-control"
                                        name="price"
                                        placeholder="Ví dụ: 3500000"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary small">Tên file ảnh sản phẩm</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-muted"><i class="bi bi-image"></i></span>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="image"
                                        placeholder="Ví dụ: ban_ghe_go_01.png"
                                        required>
                                </div>
                                <div class="form-text text-muted small" style="font-size: 12px;">
                                    * Hãy đảm bảo ảnh đã được copy sẵn vào thư mục <code class="text-dark">img/</code> ngoài trang chủ.
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold text-secondary small">Mô tả chi tiết sản phẩm</label>
                                <textarea
                                    class="form-control"
                                    name="description"
                                    rows="4"
                                    placeholder="Nhập trạng thái cũ/mới, kích thước, chất liệu gỗ..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-wood w-100 fw-bold py-2 shadow-sm">
                                <i class="bi bi-cloud-arrow-up-fill me-1"></i> LƯU SẢN PHẨM MỚI
                            </button>

                        </form>

                    </div>
                </div>

                <div class="text-center text-muted mt-4 mb-5" style="font-size: 13px;">
                    Hệ thống quản lý kho đồ gỗ 2Hand.
                </div>

            </div>
        </div>
    </div>

</body>

</html>
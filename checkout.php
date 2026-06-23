<?php
session_start();
// Tự động sinh ID ngẫu nhiên mỗi lần tạo trang (Kiểu số dài tương tự như ảnh mẫu)
$random_order_id = date('dmy') . rand(100000, 999999) . rand(1000, 9999);
// Lấy thời gian hiện tại theo định dạng giống trong ảnh
$current_time = date('H:i d/m/Y');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận thanh toán - ĐỒ GỖ 2HAND</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --wood-dark: #4a3424;
            --wood-main: #8c6239;
            --wood-light: #f7f4f0;
            --wood-banner: #5D4037;
        }

        body {
            /* Nền màu gỗ sáng đồng bộ với giỏ hàng của bạn */
            background-color: var(--wood-light);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        .text-wood {
            color: var(--wood-dark);
        }

        .btn-wood {
            background-color: var(--wood-main);
            color: white;
            border: none;
            transition: 0.3s;
        }

        .btn-wood:hover {
            background-color: var(--wood-dark);
            color: white;
        }

        /* Định dạng vòng tròn check xanh lá giống y hệt file image_0b1afd.png */
        .success-icon-circle {
            width: 100px;
            height: 100px;
            border: 6px solid #32c832;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px auto;
        }

        .success-icon-circle i {
            font-size: 55px;
            color: #32c832;
            line-height: 1;
        }

        /* Khu vực chi tiết đơn hàng canh lề chuẩn */
        .order-details-box {
            max-width: 450px;
            margin: 0 auto;
        }

        .order-label {
            color: #666;
            text-align: left;
        }

        .order-value {
            font-weight: 600;
            text-align: right;
            color: #111;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <!-- Thẻ Card trắng bo góc chứa nội dung thanh toán thành công -->
                <div class="card shadow-sm border-0 rounded-3 p-5 bg-white text-center">

                    <!-- 1. Icon dấu tích xanh lá tròn -->
                    <div class="success-icon-circle">
                        <i class="bi bi-check-lg"></i>
                    </div>

                    <!-- 2. Tiêu đề thông báo-->
                    <h2 class="fw-bold mb-2 text-dark">Đặt hàng thành công</h2>
                    <p class="text-muted small mb-5">Cảm ơn bạn đã mua hàng tại Đồ Gỗ 2HAND - Hệ thống nội thất cũ giá tốt!</p>

                    <!-- 3. Khu vực thông tin đơn hàng -->
                    <div class="order-details-box border-top pt-4 mb-5">
                        <div class="row mb-3">
                            <div class="col-5 order-label">Mã đơn hàng</div>
                            <div class="col-7 order-value text-dark" id="orderIdDisplay"><?= $random_order_id ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5 order-label">Thời gian</div>
                            <div class="col-7 order-value" id="orderTimeDisplay"><?= $current_time ?></div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-5 order-label">Giá trị đơn hàng</div>
                            <div class="col-7 order-value text-danger fs-5" id="orderPriceDisplay">0đ</div>
                        </div>
                    </div>

                    <!-- 4. Nút điều hướng quay lại hệ thống -->
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <a href="index.php" class="btn btn-outline-secondary px-4 py-2 me-sm-2">
                            <i class="bi bi-house-door"></i> Về trang chủ
                        </a>
                        <button onclick="clearCartAndGoBack()" class="btn btn-wood px-4 py-2 fw-semibold">
                            Tiếp tục mua sắm 👉
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Lấy tổng tiền từ LocalStorage
            let totalAmount = 0;

            if (typeof cart !== 'undefined' && Array.isArray(cart)) {
                totalAmount = cart.reduce((sum, item) => sum + (item.price * (item.quantity || 1)), 0);
            } else if (localStorage.getItem('cart')) {
                try {
                    let localCart = JSON.parse(localStorage.getItem('cart'));
                    totalAmount = localCart.reduce((sum, item) => sum + (item.price * (item.quantity || 1)), 0);
                } catch (e) {
                    totalAmount = 0;
                }
            }

            // Định dạng tiền tệ có dấu chấm phân cách hàng nghìn (Ví dụ: 235.000đ giống ảnh mẫu)
            let formattedPrice = new Intl.NumberFormat('vi-VN').format(totalAmount) + 'đ';
            document.getElementById('orderPriceDisplay').innerText = formattedPrice;
        });

        // Hàm xóa sạch giỏ hàng sau khi đã đặt hàng thành công và chuyển hướng về trang sản phẩm
        function clearCartAndGoBack() {
            if (typeof cart !== 'undefined') {
                cart = [];
            }
            localStorage.removeItem('cart');
            window.location.href = 'products.php';
        }
    </script>
</body>

</html>
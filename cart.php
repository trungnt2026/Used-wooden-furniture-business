<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn - ĐỒ GỖ 2HAND</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    :root {
        --wood-dark: #4a3424;
        --wood-main: #8c6239;
        --wood-light: #f7f4f0;
    }

    body {
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
    }

    .btn-wood:hover {
        background-color: var(--wood-dark);
        color: white;
    }

    .table-cart th {
        background-color: #ebdcd0 !important;
        color: var(--wood-dark);
        font-weight: 600;
    }

    .product-img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 8px;
    }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="row">
            <div class="col-10 mx-auto">
                <div class="card shadow-sm border-0 rounded-3 p-4 bg-white">

                    <div class="d-flex align-items-center mb-4 border-bottom pb-3">
                        <h2 class="fw-bold text-wood m-0">🛒 Giỏ hàng của bạn</h2>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table table-cart align-middle table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%;">Ảnh</th>
                                    <th scope="col" style="width: 40%;">Sản phẩm</th>
                                    <th scope="col" style="width: 15%;">Giá</th>
                                    <th scope="col" style="width: 15%; text-align: center;">Số lượng</th>
                                    <th scope="col" style="width: 15%;">Tổng tiền</th>
                                    <th scope="col" style="width: 5%; text-align: center;">Xóa</th>
                                </tr>
                            </thead>
                            <tbody id="cartItems">
                            </tbody>
                        </table>
                    </div>

                    <div class="row align-items-center bg-light p-3 rounded-3 g-3">
                        <div class="col-md-6 text-center text-md-start">
                            <h4 class="m-0 text-wood fw-bold">Tổng thanh toán:
                                <span id="totalPrice" class="text-danger">0</span>đ
                            </h4>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <a href="index.php" class="btn btn-outline-secondary me-2 px-4">
                                👈 Tiếp tục mua sắm
                            </a>
                            <a href="checkout.php" class="btn btn-wood px-4 py-2 fw-semibold" onclick="checkout(event)">
                                Tiến hành thanh toán 👉
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof updateCart === 'function') {
            updateCart();
        }
    });

    function checkout(event) {
        if (typeof window.checkoutLogic === 'function') {
            window.checkoutLogic();
        }
    }
    </script>
</body>

</html>
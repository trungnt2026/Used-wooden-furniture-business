<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng của bạn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4">Giỏ hàng của bạn</h2>
            
            <ul id="cartItems" class="list-group mb-3">
                </ul>
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="m-0">Tổng tiền: <span id="totalPrice" class="text-primary">0</span>đ</h4>
            </div>

            <div class="d-grid gap-2 d-md-block">
                <a href="index.php" class="btn btn-outline-secondary">Tiếp tục mua sắm</a>
                <button onclick="checkout()" class="btn btn-primary">Thanh toán</button>
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
    </script>
</body>
</html>
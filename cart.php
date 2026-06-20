<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng của bạn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

    <div class="container mt-5">
        <h2>Giỏ hàng của bạn</h2>
        <ul id="cartItems" class="list-group">
            </ul>
        <h3>Tổng tiền: <span id="totalPrice">0</span>đ</h3>
        <a href="index.php" class="btn btn-secondary">Tiếp tục mua sắm</a>
        <button onclick="checkout()" class="btn btn-primary">Thanh toán</button>
    </div>
    
    <script src="script.js"></script>
    <script>
    // Gọi hàm updateCart() ngay khi trang tải xong để đọc dữ liệu từ localStorage
    document.addEventListener("DOMContentLoaded", function() {
        updateCart(); 
    });
    </script>
</body>
</html>
<?php
session_start();
header('Content-Type: application/json'); // Khai báo trả về dữ liệu dạng JSON

require_once "../../config.php";

// Kiểm tra quyền Admin
if (!isset($_SESSION["admin"])) {
    echo json_encode(['success' => false, 'message' => 'Yêu cầu đăng nhập admin.']);
    exit();
}

// Kiểm tra dữ liệu truyền lên
if (isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = (int)$_POST['id'];
    $quantity = (int)$_POST['quantity'];

    if ($quantity < 0) {
        echo json_encode(['success' => false, 'message' => 'Số lượng không được âm.']);
        exit();
    }

    // Cập nhật số lượng vào MySQL
    $sql = "UPDATE products SET quantity = $quantity WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => true, 'message' => 'Cập nhật thành công!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Lỗi kết nối MySQL.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Thiếu dữ liệu đầu vào.']);
}
exit();
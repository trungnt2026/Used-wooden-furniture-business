<?php
session_start();
include "../config.php";

// chỉ cho phép Adm đã đăng nhập mới được quyền vào trang này để tạo Admin khác
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$message = "";
$status = "";

// khi Adm bấm tạo acc gửi data dạng post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // loại bỏ khoảng trắng thừa
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // check xem mật khẩu nhập lại khớp không
    if ($password !== $confirm_password) {
        $status = "danger";
        $message = "<strong>Thất bại:</strong> Mật khẩu nhập lại không khớp. Vui lòng kiểm tra lại!";
    } else {
        // hash bảo mật pass
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO admins(username, password) VALUES('$username', '$hashed_password')";

        try {
            if (mysqli_query($conn, $sql)) {
                $status = "success";
                $message = "<strong>Thành công!</strong> Tài khoản Admin mới <code>$username</code> đã được tạo.";
            }
        } catch (mysqli_sql_exception $e) {
            $status = "danger";
            // Check lỗi trùng lặp tên đăng nhập (Mã lỗi MySQL 1062)
            if ($e->getCode() == 1062) {
                $message = "<strong>Thất bại:</strong> Tên đăng nhập <code>$username</code> đã tồn tại. Vui lòng chọn tên khác!";
            } else {
                $message = "<strong>Lỗi hệ thống:</strong> " . $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Admin Mới - Hệ Thống Quản Trị</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="mb-3">
                    <a href="dashboard.php" class="text-decoration-none text-secondary small">
                        <i class="bi bi-arrow-left"></i> Quay lại Dashboard
                    </a>
                </div>

                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <div class="display-6 text-primary mb-2">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <h3 class="fw-bold m-0">Thêm Admin Mới</h3>
                            <small class="text-muted">Tạo tài khoản quản trị viên cho hệ thống</small>
                        </div>

                        <?php if (!empty($message)) { ?>
                            <div class="alert alert-<?= $status ?> alert-dismissible fade show" role="alert">
                                <?= $message ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <form action="create_admin.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary small">Tên đăng nhập admin</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-muted"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Ví dụ: trung_admin" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary small">Mật khẩu mới</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-muted"><i class="bi bi-lock"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Tối thiểu 6 ký tự..." required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold text-secondary small">Xác nhận lại mật khẩu</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white text-muted"><i class="bi bi-shield-lock"></i></span>
                                    <input type="password" class="form-control" name="confirm_password" placeholder="Nhập lại mật khẩu phía trên..." required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">
                                <i class="bi bi-plus-circle me-1"></i> TẠO TÀI KHOẢN
                            </button>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
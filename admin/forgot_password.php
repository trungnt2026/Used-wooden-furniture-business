<!-- <?php
session_start();
require_once "../config.php";  

$error = "";
$step = 1; // Khởi tạo: Bước 1 = Nhập tài khoản; Bước 2 = Trả lời câu hỏi; Bước 3 = Đổi mật khẩu
$username = "";
$question = "";

// ==========================================================
// XỬ LÝ BƯỚC 1: KIỂM TRA TÀI KHOẢN ADMIN CÓ TỒN TẠI KHÔNG
// ==========================================================
if (isset($_POST['check_user'])) {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    
    $sql = "SELECT * FROM admins WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Lưu các thông tin cần thiết vào Session để chuyển tiếp giữa các bước
        $_SESSION['reset_user'] = $username;
        $_SESSION['db_question'] = $row['security_question'];
        $_SESSION['db_answer'] = $row['security_answer'];
        
        $question = $row['security_question'];
        $step = 2; // Chuyển sang giao diện Bước 2
    } else {
        $error = "Tài khoản quản trị không tồn tại trong hệ thống!";
    }
}

// ==========================================================
// XỬ LÝ BƯỚC 2: KIỂM TRA CÂU TRẢ LỜI BẢO MẬT
// ==========================================================
if (isset($_POST['check_answer'])) {
    $user_answer = trim($_POST['security_answer']);
    
    // Sử dụng strcasecmp để so sánh không phân biệt chữ hoa / chữ thường
    if (strcasecmp($user_answer, $_SESSION['db_answer']) === 0) {
        $step = 3; // Trả lời đúng, chuyển sang giao diện Đổi mật khẩu
    } else {
        $error = "Câu trả lời bảo mật không chính xác. Vui lòng thử lại!";
        $username = $_SESSION['reset_user'];
        $question = $_SESSION['db_question'];
        $step = 2; // Giữ nguyên ở bước 2 để người dùng nhập lại
    }
}

// ==========================================================
// XỬ LÝ BƯỚC 3: TIẾN HÀNH CẬP NHẬT MẶT KHẨU MỚI
// ==========================================================
if (isset($_POST['reset_password'])) {
    $new_pass = $_POST['new_password'];
    $confirm_pass = $_POST['confirm_password'];
    $username = $_SESSION['reset_user'];
    
    if ($new_pass !== $confirm_pass) {
        $error = "Xác nhận mật khẩu mới không trùng khớp!";
        $step = 3; // Giữ ở bước 3 để nhập lại mật khẩu
    } else {
        // Mã hóa 1 chiều mật khẩu mới bằng password_hash theo đúng chuẩn bảo mật của đồ án
        $hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);
        
        $sql = "UPDATE admins SET password = '$hashed_password' WHERE username = '$username'";
        if (mysqli_query($conn, $sql)) {
            // Đổi thành công -> Hủy toàn bộ session tạm của chức năng này
            unset($_SESSION['reset_user']);
            unset($_SESSION['db_question']);
            unset($_SESSION['db_answer']);
            
            echo "<script>
                alert('Khôi phục mật khẩu thành công! Hãy đăng nhập bằng mật khẩu mới.');
                window.location.href='login.php';
            </script>";
            exit();
        } else {
            $error = "Lỗi hệ thống: Không thể cập nhật cơ sở dữ liệu.";
            $step = 3;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khôi phục mật khẩu Admin - Đồ Gỗ 2Hand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

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
    </style>
</head>

<body class="d-flex align-items-center justify-content- -->

<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đang Cập Nhật</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .coming-soon-card {
        background: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
        backdrop-filter: blur(4px);
    }

    .gear-icon {
        animation: spin 4s linear infinite;
        color: #0d6efd;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 text-center">
                <div class="card coming-soon-card p-5">

                    <div class="mb-4">
                        <i class="fa-solid fa-gear fa-4x gear-icon"></i>
                    </div>

                    <h1 class="fw-bold text-dark mb-3">TRANG ĐANG NÂNG CẤP</h1>
                    <p class="text-secondary mb-4 fs-5">
                        Hệ thống đang được nâng cấp và hoàn thiện các tính năng mới để mang lại trải nghiệm tốt nhất cho
                        bạn. Xin vui lòng quay lại sau!
                    </p>

                    <div class="progress mb-4" style="height: 10px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>

                    <div>
                        <a href="index.php" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
                            <i class="fa-solid fa-house me-2"></i> Quay về Trang chủ
                        </a>
                    </div>

                </div>

                <p class="text-muted small mt-4">&copy; <?php echo date("Y"); ?> ĐỒ GỖ 2HAND - Hệ thống nội thất gỗ cũ
                    giá tốt.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
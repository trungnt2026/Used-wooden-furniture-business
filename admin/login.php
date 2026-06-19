<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản trị - Đồ Gỗ 2Hand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">

                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body p-4 p-sm-5">

                        <div class="text-center mb-4">
                            <div class="display-5 text-secondary mb-2">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <h3 class="fw-bold text-dark m-0">Đăng Nhập Admin</h3>
                            <small class="text-muted">Hệ thống quản lý - Đồ Gỗ 2Hand</small>
                        </div>

                        <?php if (isset($_SESSION["login_error"])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show small py-2 mb-3" role="alert">
                                <i class="bi bi-exclamation-circle-fill me-1"></i>
                                <?= $_SESSION["login_error"] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 0.75rem 0.75rem;"></button>
                            </div>
                        <?php
                            // khi user nhập sai, back lại login + báo lỗi
                            unset($_SESSION["login_error"]);
                        }
                        ?>

                        <form action="login_process.php" method="POST">

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-secondary small">Tên đăng nhập</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0 text-muted">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input
                                        type="text"
                                        class="form-control border-start-0 ps-0"
                                        name="username"
                                        placeholder="Nhập tài khoản admin..."
                                        required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold text-secondary small">Mật khẩu</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0 text-muted">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input
                                        type="password"
                                        class="form-control border-start-0 ps-0"
                                        name="password"
                                        placeholder="Nhập mật khẩu..."
                                        required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">
                                ĐĂNG NHẬP <i class="bi bi-box-arrow-in-right ms-1"></i>
                            </button>

                        </form>

                    </div>
                </div>

                <div class="text-center mt-3">
                    <a href="../index.php" class="text-decoration-none text-muted small">
                        ← Quay lại Trang Chủ Cửa Hàng
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
include "../config.php";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đang Cập Nhật - Coming Soon</title>
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

                    <h1 class="fw-bold text-dark mb-3">QUẢN LÝ USERS <br> ĐANG CẬP NHẬT</h1>
                    <p class="text-secondary mb-4 fs-5">
                        Hệ thống đang được nâng cấp và hoàn thiện các tính năng mới để mang lại trải nghiệm tốt nhất cho
                        bạn. Xin vui lòng quay lại sau!
                    </p>

                    <div class="progress mb-4" style="height: 10px;">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>

                    <div>
                        <a href="../admin/dashboard.php"
                            class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
                            <i class="fa-solid fa-house me-2"></i> Quay về Dashboard
                        </a>
                    </div>

                </div>

                <p class="text-muted small mt-4" style="font-weight: bold">&copy; <?php echo date("Y"); ?> ĐỒ GỖ 2HAND -
                    Hệ thống nội thất gỗ cũ
                    giá tốt.</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
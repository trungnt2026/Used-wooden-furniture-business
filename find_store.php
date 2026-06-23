<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Siêu Thị - ĐỒ GỖ 2HAND</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

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
            transition: 0.3s;
        }

        .btn-wood:hover {
            background-color: var(--wood-dark);
            color: white;
        }

        /* Bo góc và tạo shadow cho khung bản đồ */
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            height: 450px;
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .store-info-card {
            border-left: 5px solid var(--wood-main);
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="mb-4">
            <a href="index.php" class="text-decoration-none text-wood fw-bold">
                <i class="bi bi-arrow-left-circle-fill"></i> Quay lại Trang Chủ
            </a>
        </div>

        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 rounded-3 p-4 bg-white h-100">
                    <h3 class="fw-bold text-wood mb-4">
                        <i class="bi bi-geo-alt-fill text-danger"></i> Hệ Thống Cửa Hàng
                    </h3>

                    <div class="card store-info-card bg-light border-0 p-3 mb-3">
                        <h5 class="fw-bold text-wood mb-2">ĐỒ GỖ 2HAND - Chi Nhánh Q7</h5>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-geo-alt"></i> <strong>Địa chỉ:</strong> Đường Nguyễn Văn Linh, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh
                        </p>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-telephone"></i> <strong>Hotline:</strong> 1900.8888 (Miễn phí)
                        </p>
                        <p class="text-muted small mb-0">
                            <i class="bi bi-clock"></i> <strong>Giờ mở cửa:</strong> 08:00 - 21:00 (Kể cả CN & Ngày lễ)
                        </p>
                    </div>

                    <div class="mt-4">
                        <h6 class="fw-bold text-wood mb-2">Bạn cần hỗ trợ đường đi?</h6>
                        <p class="text-muted small mb-3">Bản đồ bên cạnh đã ghim sẵn vị trí chính xác của siêu thị nội thất gỗ cũ của chúng tôi.</p>
                        <a href="https://maps.google.com" target="_blank" class="btn btn-wood w-100 fw-semibold">
                            <i class="bi bi-cursor-fill me-2"></i> Mở bằng Google Maps app
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3 p-3 bg-white h-100">
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.954341999912!2d106.7011481!3d10.7380025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fbc9bb3df99%3A0x6bda19cb07a4a980!2zUXXhuq1uIDcsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaA!5e0!3m2!1svi!2s!4v1710000000000!5m2!1svi!2s"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
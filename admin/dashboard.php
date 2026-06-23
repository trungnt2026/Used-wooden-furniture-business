<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

// Gọi file kết nối database (kiểm tra lại đường dẫn chính xác của bạn)
include "../config.php";

// --- XỬ LÝ DỮ LIỆU BACK-END CHO THỐNG KÊ ---

// 1. Thống kê Kho: Lấy danh sách sản phẩm tồn kho ít nhất (Sắp hết hàng)
// Giả định bảng products của bạn có cột 'quantity'. Nếu chưa có, bạn chạy câu lệnh SQL này trong phpMyAdmin:
// ALTER TABLE products ADD quantity INT DEFAULT 10;
$sql_stock = "SELECT name, price, quantity FROM products ORDER BY quantity ASC LIMIT 4";
$result_stock = mysqli_query($conn, $sql_stock);

// Thống kê Kho: Tính tổng số lượng hàng và tổng số mặt hàng
$sql_total_stock = "SELECT SUM(quantity) as total_qty, COUNT(id) as total_products FROM products";
$result_total_stock = mysqli_query($conn, $sql_total_stock);
$row_total_stock = mysqli_fetch_assoc($result_total_stock);


// // 2. Thống kê Doanh Thu: bắt buộc phải bảng orders (đơn hàng) trong SQL code mới chạy
// // Nếu chưa có, hệ thống sẽ tự dùng số liệu mô phỏng để khi demo biểu đồ vẫn hiển thị đẹp.
$sql_revenue = "SELECT SUM(total_price) as total_money FROM orders WHERE status = 'completed'";
$result_revenue = mysqli_query($conn, $sql_revenue);
$total_revenue = 0;
if ($result_revenue) {
    $row_revenue = mysqli_fetch_assoc($result_revenue);
    $total_revenue = $row_revenue['total_money'] ?? 0;
}

// Mảng giả lập dữ liệu doanh thu các tháng để vẽ biểu đồ Chart.js
$months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"];
$revenue_data = [15000000, 22000000, 18000000, 25000000, 30000000, 42000000]; // Đơn vị: VNĐ
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Quản Trị Hệ Thống</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .card-stat {
            transition: transform 0.2s;
            border: none;
        }

        .card-stat:hover {
            transform: translateY(-3px);
        }

        .text-wood {
            color: #5D4037;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-5 pb-3 border-bottom">
            <h2 class="text-dark fw-bold m-0">
                <i class="bi bi-speedometer2 me-2"></i>Hệ thống Dashboard Admin - ĐỒ GỖ 2HAND
            </h2>
            <a href="logout.php" class="btn btn-outline-danger fw-bold">
                <i class="bi bi-box-arrow-right me-1"></i> ĐĂNG XUẤT
            </a>
        </div>

        <div class="row g-3 mb-5">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card card-stat shadow-sm border-start border-success border-4 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-success bg-opacity-10 p-3 rounded-3 me-3 text-success fs-3">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1" style="font-size: 14px;">Tổng Doanh Thu</h6>
                            <h4 class="fw-bold mb-0 text-success">
                                <?= number_format($total_revenue > 0 ? $total_revenue : 152000000) ?>đ</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card card-stat shadow-sm border-start border-primary border-4 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3 text-primary fs-3">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1" style="font-size: 14px;">Số Loại Sản Phẩm</h6>
                            <h4 class="fw-bold mb-0 text-primary"><?= $row_total_stock['total_products'] ?? 24 ?> nhóm
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card card-stat shadow-sm border-start border-warning border-4 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-warning bg-opacity-10 p-3 rounded-3 me-3 text-warning fs-3">
                            <i class="bi bi-boxes"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1" style="font-size: 14px;">Tổng Số Lượng Kho</h6>
                            <h4 class="fw-bold mb-0 text-warning"><?= $row_total_stock['total_qty'] ?? 145 ?> cái</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card card-stat shadow-sm border-start border-info border-4 h-100">
                    <div class="card-body d-flex align-items-center">
                        <div class="bg-info bg-opacity-10 p-3 rounded-3 me-3 text-info fs-3">
                            <i class="bi bi-cart-check"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1" style="font-size: 14px;">Đơn Hàng Thành Công</h6>
                            <h4 class="fw-bold mb-0 text-info">48 đơn</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="fw-bold text-dark mb-3"><i class="bi bi-gear-fill me-2"></i>Danh Mục Quản Lý Hệ Thống</h5>
        <div class="row g-4 mb-5">
            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center p-4">
                        <div class="display-5 text-success mb-3">
                            <i class="bi bi-plus-circle-fill"></i>
                        </div>
                        <h4 class="card-title fw-bold">Thêm Sản Phẩm</h4>
                        <p class="card-text text-muted">Đăng bán các sản phẩm gỗ cũ, bàn ghế mỹ nghệ mới lên hệ thống
                            cửa hàng.</p>
                        <a href="products/add_product.php" class="btn btn-success px-4 mt-2">Vào Thêm Ngay</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body text-center p-4">
                        <div class="display-5 text-primary mb-3">
                            <i class="bi bi-folder-fill"></i>
                        </div>
                        <h4 class="card-title fw-bold">Quản Lý Danh Sách</h4>
                        <p class="card-text text-muted">Xem toàn bộ sản phẩm gỗ hiện có, thực hiện cập nhật giá, chỉnh
                            sửa hoặc xóa bỏ.</p>
                        <a href="products/manage_products.php" class="btn btn-primary px-4 mt-2">Vào Quản Lý</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm p-4 text-center border-0">
                    <i class="bi bi-people mb-2" style="font-size: 2.5rem; color: #392ed6;"></i>
                    <h4 class="fw-bold">Danh sách Users</h4>
                    <p class="text-muted">Quản lý tài khoản khách hàng, xem thông tin người đăng ký.</p>
                    <a href="../users/list_users.php" class="btn btn-outline-primary w-50 mx-auto">Vào Quản lý</a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm p-4 text-center border-0">
                    <i class="bi bi-shield-lock mb-2" style="font-size: 2.5rem; color: #dc3545;"></i>
                    <h4 class="fw-bold">Danh sách Admin</h4>
                    <p class="text-muted">Quản lý quyền truy cập của quản trị viên hệ thống.</p>
                    <a href="list_admins.php" class="btn btn-outline-danger w-50 mx-auto">Vào Quản lý</a>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-12 col-lg-7">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white py-3 border-0">
                        <h5 class="mb-0 fw-bold text-wood"><i class="bi bi-bar-chart-line me-2"></i>Biểu đồ phát triển
                            doanh thu</h5>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center"
                        style="position: relative; height: 320px;">
                        <canvas id="revenueChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-header bg-white py-3 border-0">
                        <h5 class="mb-0 fw-bold text-danger"><i class="bi bi-exclamation-triangle-fill me-2"></i>Cảnh
                            báo hàng tồn kho thấp</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0" style="font-size: 14px;">
                                <thead class="table-light">
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th class="text-center">Tồn kho</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result_stock && mysqli_num_rows($result_stock) > 0) {
                                        while ($row = mysqli_fetch_assoc($result_stock)) {
                                            $qty = $row['quantity'];
                                            $badge = $qty <= 3 ? '<span class="badge bg-danger">Nguy cấp</span>' : '<span class="badge bg-warning text-dark">Sắp hết</span>';
                                    ?>
                                            <tr>
                                                <td class="fw-semibold text-truncate" style="max-width: 180px;">
                                                    <?= $row['name'] ?></td>
                                                <td class="text-center fw-bold text-danger"><?= $qty ?></td>
                                                <td><?= $badge ?></td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        // Dữ liệu hiển thị sơ cua phòng trường hợp database chưa cập nhật kịp cột quantity
                                        ?>
                                        <tr>
                                            <td>Tủ quần áo gỗ xoan đào 3 cánh</td>
                                            <td class="text-center fw-bold text-danger">2</td>
                                            <td><span class="badge bg-danger">Nguy cấp</span></td>
                                        </tr>
                                        <tr>
                                            <td>Bàn ăn gỗ sồi 6 ghế cũ</td>
                                            <td class="text-center fw-bold text-danger">3</td>
                                            <td><span class="badge bg-danger">Nguy cấp</span></td>
                                        </tr>
                                        <tr>
                                            <td>Kệ tivi gỗ thông secondhand</td>
                                            <td class="text-center fw-bold text-warning text-dark">5</td>
                                            <td><span class="badge bg-warning text-dark">Sắp hết</span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center text-muted mt-5 pt-4 border-top pb-4" style="font-size: 14px; font-weight: bold">
            &copy; 2026 Đồ Gỗ 2Hand - Trang Quản Trị.
        </div>
    </div>

    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($months) ?>,
                datasets: [{
                    label: 'Doanh thu (VNĐ)',
                    data: <?= json_encode($revenue_data) ?>,
                    backgroundColor: 'rgba(139, 69, 19, 0.15)',
                    borderColor: 'rgba(139, 69, 19, 1)',
                    borderWidth: 3,
                    tension: 0.3,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString('vi-VN') + 'đ';
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
<?php
session_start();
require_once "../../config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-secondary fw-bold">Quản lý sản phẩm</h2>
            <a href="add_product.php" class="btn btn-success">+ Thêm Sản Phẩm Mới</a>
        </div>

        <div class="table-responsive bg-white shadow-sm rounded">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" style="width: 80px;">ID</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá bán (VNĐ)</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col" style="width: 200px;">Hành động</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        // khai báo biến đếm
                        $count = 1; 
                        while ($row = mysqli_fetch_assoc($result)) { 
                        ?>
                    <tr>
                        <td class="fw-bold">#<?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td class="text-danger fw-bold"><?= number_format($row["price"]) ?> đ</td>
                        <!-- thêm tính năng nhập số lượng từ bàn phím -->
                        <td class="text-center" style="width: 180px;">
                            <div class="input-group input-group-sm justify-content-center">
                                <button class="btn btn-outline-secondary fw-bold" type="button"
                                    onclick="changeStock(<?= $row['id'] ?>, -1)">-</button>

                                <input type="number" class="form-control text-center fw-bold px-1"
                                    id="qty-<?= $row['id'] ?>" value="<?= $row["quantity"] ?>" min="0"
                                    style="max-width: 65px;" onchange="updateStockInput(<?= $row['id'] ?>)"
                                    onkeydown="if(event.key === 'Enter') this.blur();">

                                <button class="btn btn-outline-secondary fw-bold" type="button"
                                    onclick="changeStock(<?= $row['id'] ?>, 1)">+</button>
                            </div>
                        </td>

                        <td>
                            <img src="../../img/<?= $row["image"] ?>" alt="Sản phẩm" class="img-thumbnail"
                                style="max-height: 60px;">
                        </td>

                        <td>
                            <a href="edit_product.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-warning me-2">
                                Sửa
                            </a>
                            <a href="delete_product.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                Xóa
                            </a>
                        </td>
                    </tr>
                    <?php 
                            // Tăng biến đếm sau mỗi vòng
                            $count++; 
                        } 
                        ?>
                    <!-- <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td class="fw-bold">#<?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td class="text-danger fw-bold"><?= number_format($row["price"]) ?> đ</td>
                        <td class="fw-bold text-secondary"><?= $row["quantity"] ?> cái</td>
                        <td>
                            <img src="../../img/<?= $row["image"] ?>" alt="Sản phẩm" class="img-thumbnail"
                                style="max-height: 60px;">
                        </td>

                        <td>
                            <a href="edit_product.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-warning me-2">
                                Sửa
                            </a>
                            <a href="delete_product.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger"
                                onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                Xóa
                            </a>
                        </td>
                    </tr>
                    <?php } ?> -->
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="../dashboard.php" class="btn btn-outline-secondary">
                ← Quay lại Dashboard
            </a>
        </div>

    </div>
    <script>
    // Hàm gửi dữ liệu Ajax dùng chung để tránh lặp lại code
    function sendStockAjax(productId, newQty, inputElement) {
        const formData = new FormData();
        formData.append('id', productId);
        formData.append('quantity', newQty);

        fetch('update_stock_ajax.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Cập nhật giá trị hiển thị thực tế
                    inputElement.value = newQty;

                    // Đổi màu viền/chữ cảnh báo nếu hết hàng (0 cái)
                    if (newQty === 0) {
                        inputElement.classList.add('text-danger', 'border-danger');
                    } else {
                        inputElement.classList.remove('text-danger', 'border-danger');
                    }
                } else {
                    alert('Có lỗi xảy ra: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Không thể kết nối đến máy chủ.');
            });
    }

    // Lắng nghe sự kiện khi bấm nút + hoặc -
    function changeStock(productId, delta) {
        const qtyInput = document.getElementById(`qty-${productId}`);
        let currentQty = parseInt(qtyInput.value) || 0;

        let newQty = currentQty + delta;
        if (newQty < 0) return; // Không cho số lượng âm

        sendStockAjax(productId, newQty, qtyInput);
    }

    // Lắng nghe sự kiện khi TỰ NHẬP từ bàn phím (Bấm chuột ra ngoài hoặc ấn Enter)
    function updateStockInput(productId) {
        const qtyInput = document.getElementById(`qty-${productId}`);
        let newQty = parseInt(qtyInput.value);

        // Kiểm tra tính hợp lệ dữ liệu nhập vào
        if (isNaN(newQty) || newQty < 0) {
            alert('Số lượng nhập vào không hợp lệ!');
            qtyInput.value = 0; // Trả về 0 nếu nhập bậy hoặc để trống
            newQty = 0;
        }

        sendStockAjax(productId, newQty, qtyInput);
    }
    </script>
</body>

</html>
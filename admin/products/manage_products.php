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
                                <td class="fw-bold">#<?= $count ?></td> 
                                
                                <td><?= $row["name"] ?></td>
                                <td class="text-danger fw-bold"><?= number_format($row["price"]) ?> đ</td>

                                <td>
                                    <img src="../../img/<?= $row["image"] ?>" alt="Sản phẩm" class="img-thumbnail" style="max-height: 60px;">
                                </td>

                                <td>
                                    <a href="edit_product.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-warning me-2">Sửa</a>
                                    <a href="delete_product.php?id=<?= $row["id"] ?>"
                                        class="btn btn-sm btn-danger"
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
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td class="fw-bold">#<?= $row["id"] ?></td>
                            <td><?= $row["name"] ?></td>
                            <td class="text-danger fw-bold"><?= number_format($row["price"]) ?> đ</td>

                            <td>
                                <img src="../../img/<?= $row["image"] ?>" alt="Sản phẩm" class="img-thumbnail" style="max-height: 60px;">
                            </td>

                            <td>
                                <a href="edit_product.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-warning me-2">
                                    Sửa
                                </a>
                                <a href="delete_product.php?id=<?= $row["id"] ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="../dashboard.php" class="btn btn-outline-secondary">
                ← Quay lại Dashboard
            </a>
        </div>

    </div>
</body>

</html>
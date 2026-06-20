<?php
session_start();
require_once "../../config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: manage_products.php");
    exit();
}

$id = (int)$_GET["id"];
$sql = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Sản phẩm không tồn tại!");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0"><i class="bi bi-pencil-square"></i> Chỉnh sửa sản phẩm</h4>
                </div>
                <div class="card-body">
                    <form action="update_product.php" method="POST">
                        <input type="hidden" name="id" value="<?= $product['id'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Giá bán</label>
                            <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Hình ảnh (tên file)</label>
                            <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($product['image']) ?>" required>
                        </div>
                        <div class="form-text text-muted small" style="font-size: 12px;">
                            * Hãy đảm bảo ảnh đã được thêm vào thư mục <code class="text-dark">img/</code> ngoài trang chủ.
                        </div>
                        <br><br>
                        <div class="mb-3">
                            <label class="form-label">Mô tả</label>
                            <textarea name="description" class="form-control" rows="4"><?= htmlspecialchars($product['description']) ?></textarea>
                        </div>

                    

                        <div class="d-flex justify-content-between">
                            <a href="manage_products.php" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Quay lại
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Cập nhật sản phẩm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
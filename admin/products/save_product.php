<?php
session_start();
require_once "../../config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$name = mysqli_real_escape_string($conn, $_POST["name"]);
$price = (int)$_POST["price"];
$quantity = (int)$_POST["quantity"]; // Thêm dòng này để nhận số lượng
$image = mysqli_real_escape_string($conn, $_POST["image"]);
$description = mysqli_real_escape_string($conn, $_POST["description"]);

$sql = "INSERT INTO products (name, price, quantity, image, description) 
        VALUES ('$name', '$price', '$quantity', '$image', '$description')";
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Kết quả thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (mysqli_query($conn, $sql)) : ?>
                <div class="card shadow text-center p-4">
                    <div class="text-success mb-3" style="font-size: 3rem;">
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                    <h4 class="card-title text-success">Thêm sản phẩm thành công!</h4>
                    <p class="card-text">Sản phẩm "<?php echo htmlspecialchars($name); ?>" đã được lưu vào hệ thống.</p>

                    <div class="mt-3">
                        <a href="add_product.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Thêm sản phẩm khác
                        </a>
                        <a href="manage_products.php" class="btn btn-outline-secondary">
                            <i class="bi bi-list"></i> Xem danh sách
                        </a>
                    </div>
                </div>
                <?php else : ?>
                <div class="alert alert-danger">
                    <i class="bi bi-x-circle-fill"></i> Có lỗi xảy ra: <?php echo mysqli_error($conn); ?>
                    <br><br>
                    <a href="add_product.php" class="btn btn-danger">Thử lại</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>
<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
</head>

<body>

    <h2>Thêm sản phẩm</h2>

    <form action="save_product.php" method="POST">

        <input
            type="text"
            name="name"
            placeholder="Tên sản phẩm"
            required>

        <br><br>

        <input
            type="number"
            name="price"
            placeholder="Giá"
            required>

        <br><br>

        <input
            type="text"
            name="image"
            placeholder="Tên ảnh"
            required>

        <br><br>

        <textarea
            name="description"
            placeholder="Mô tả">
    </textarea>

        <br><br>

        <button type="submit">
            Lưu sản phẩm
        </button>

    </form>

</body>

</html>
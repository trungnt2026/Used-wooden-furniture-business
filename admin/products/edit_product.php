<?php

session_start();

require_once "../config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$id = (int)$_GET["id"];

$sql = "
SELECT *
FROM products
WHERE id = $id
";

$result = mysqli_query($conn, $sql);

$product = mysqli_fetch_assoc($result);

?>

<h2>Sửa sản phẩm</h2>

<form action="update_product.php" method="POST">

    <input
        type="hidden"
        name="id"
        value="<?= $product['id'] ?>">

    <input
        type="text"
        name="name"
        value="<?= $product['name'] ?>"
        required>

    <br><br>

    <input
        type="number"
        name="price"
        value="<?= $product['price'] ?>"
        required>

    <br><br>

    <input
        type="text"
        name="image"
        value="<?= $product['image'] ?>"
        required>

    <br><br>

    <textarea
        name="description"><?= $product['description'] ?></textarea>

    <br><br>

    <button type="submit">
        Cập nhật
    </button>

</form>
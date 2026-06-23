<?php
session_start();
require_once "../../config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$id = (int)$_POST["id"];
$name = mysqli_real_escape_string($conn, $_POST["name"]);
$price = (int)$_POST["price"];
$quantity = (int)$_POST["quantity"]; // Nhận số lượng từ form edit
$image = mysqli_real_escape_string($conn, $_POST["image"]);
$description = mysqli_real_escape_string($conn, $_POST["description"]);

// Thêm quantity=$quantity vào câu lệnh SQL UPDATE
$sql = "
UPDATE products
SET
name='$name',
price='$price',
quantity=$quantity,
image='$image',
description='$description'
WHERE id=$id
";

mysqli_query($conn, $sql);

header("Location: manage_products.php");
exit();
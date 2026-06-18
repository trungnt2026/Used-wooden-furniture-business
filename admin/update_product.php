<?php

session_start();

require_once "../config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$id = (int)$_POST["id"];

$name = $_POST["name"];
$price = $_POST["price"];
$image = $_POST["image"];
$description = $_POST["description"];

$sql = "
UPDATE products
SET
name='$name',
price='$price',
image='$image',
description='$description'
WHERE id=$id
";

mysqli_query($conn, $sql);

header("Location: manage_products.php");
exit();

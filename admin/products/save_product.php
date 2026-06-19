<?php

session_start();

require_once "../config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$name = $_POST["name"];
$price = $_POST["price"];
$image = $_POST["image"];
$description = $_POST["description"];

$sql = "
INSERT INTO products
(name, price, image, description)
VALUES
('$name', '$price', '$image', '$description')
";

if (mysqli_query($conn, $sql)) {

    echo "Them san pham thanh cong";
} else {

    echo mysqli_error($conn);
}

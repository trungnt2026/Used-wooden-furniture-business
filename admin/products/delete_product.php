<?php

session_start();

require_once "../../config.php";

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit();
}

$id = (int)$_GET["id"];

$sql = "
DELETE FROM products
WHERE id = $id
";

mysqli_query($conn, $sql);

header("Location: manage_products.php");
exit();

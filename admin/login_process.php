<?php

session_start();

require_once "../config.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "
SELECT *
FROM admins
WHERE username='$username'
";

$result = mysqli_query($conn, $sql);

$admin = mysqli_fetch_assoc($result);

if (
    $admin &&
    password_verify(
        $password,
        $admin["password"]
    )
) {

    $_SESSION["admin"] =
        $admin["username"];

    header("Location: dashboard.php");
    exit();
}

echo "Sai tài khoản hoặc mật khẩu";

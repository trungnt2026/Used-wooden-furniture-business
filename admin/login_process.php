<?php
session_start();
require_once "../config.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM admins WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$admin = mysqli_fetch_assoc($result);

if ($admin && password_verify($password, $admin["password"])) {
    $_SESSION["admin"] = $admin["username"];
    header("Location: dashboard.php");
    exit();
} else {
    // sai -> lưu nottice
    $_SESSION["login_error"] = "Tài khoản hoặc mật khẩu không chính xác!";
    // kick về lại trang login.php
    header("Location: login.php");
    exit();
}

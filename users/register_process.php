<?php

require_once "config.php";

// lấy dữ liệu từ form
$fullname = trim($_POST["fullname"]);
$username = trim($_POST["username"]);
$password = trim($_POST["password"]);
$confirmPassword = trim($_POST["confirm_password"]);
$gender = trim($_POST["gender"]);
$email = trim($_POST["email"]);
$address = trim($_POST["address"]);

// check xác nhận pass
if ($password != $confirmPassword) {

    die("Mật khẩu xác nhận không khớp");
}

// Hash pass trước lưu
$hashPassword = password_hash(
    $password,
    PASSWORD_DEFAULT
);

$sql = "
INSERT INTO users
(
    fullname,
    username,
    password,
    gender,
    email,
    address
)
VALUES
(
    '$fullname',
    '$username',
    '$hashPassword',
    '$gender',
    '$email',
    '$address'
)
";

if (mysqli_query($conn, $sql)) {

    echo "
    <script>
        alert('Đăng ký thành công');
        window.location='login.php';
    </script>
    ";
} else {

    echo "
    <script>
        alert('Tên đăng nhập hoặc Email đã tồn tại');
        history.back();
    </script>
    ";
}

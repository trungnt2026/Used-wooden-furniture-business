<?php

session_start();

require_once "../config.php";

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

$sql = "
SELECT * FROM users
WHERE username = '$username'
";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    // check password hash
    if (password_verify($password, $user["password"])) {

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["fullname"] = $user["fullname"];
        $_SESSION["username"] = $user["username"];

        echo "
        <script>
            alert('Đăng nhập thành công');
            window.location='../index.php';
        </script>
        ";

    } else {

        echo "
        <script>
            alert('Sai mật khẩu');
            history.back();
        </script>
        ";
    }

} else {

    echo "
    <script>
        alert('Tài khoản không tồn tại');
        history.back();
    </script>
    ";
}
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background-image: url('../img/bg_users_login.avif');
            background-size: cover;
            background-position: center;
        }

        .container {

            width: 400px;
            background: rgba(255, 255, 255, 0.88);
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        h2 {
            font-weight: bold;
            font-size: 34px;
            text-align: center;
            margin-bottom: 25px;
            color: #5c3b1e;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-top: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            font-size: 15px;
        }

        input:focus {
            border-color: #8b5a2b;
        }

        .password-box {
            position: relative;
        }

        .password-box input {
            padding-right: 45px;
        }

        .toggle-password {
            position: absolute;
            right: 25px;
            top: 10px;
            bottom: 0;
            display: flex;
            align-items: center;
            cursor: pointer;
            user-select: none;
            font-size: 18px;
        }

        button {

            width: 100%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            background: #8b5a2b;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #6d4420;
        }

        p {
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }

        a {

            text-decoration: none;
            color: #2b3d8b;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">

        <h2>Đăng nhập</h2>

        <form action="login_process.php" method="POST">

            <input
                type="text"
                name="username"
                placeholder="Tên đăng nhập"
                required>

            <div class="password-box">

            <input
                type="password"
                id="password"
                name="password"
                placeholder="Mật khẩu"
                required>

            <span class="toggle-password" onclick="togglePassword()">
                  👁️
            </span>

</div>

            <button type="submit">
                Đăng nhập
            </button>

        </form>

        <p>
            Chưa có tài khoản?
            <a href="register.php">
                Đăng ký
            </a>
        </p>

    </div>

    <script>
        function togglePassword() {

            let input = document.getElementById("password");
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>

</body>

</html>
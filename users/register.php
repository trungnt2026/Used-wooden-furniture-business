<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .container {
            width: 500px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
        }

        h2 {
            text-align: center;
        }

        input,
        select,
        textarea {

            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;

            box-sizing: border-box;
        }

        button {

            width: 100%;
            padding: 12px;

            border: none;

            background: #2c7a2c;
            color: white;

            cursor: pointer;

            font-size: 16px;
        }

        button:hover {
            opacity: .9;
        }

        .password-box {
            position: relative;
        }

        .password-box input {
            width: 100%;
            padding-right: 45px;
        }

        .toggle-password {

            position: absolute;

            right: 15px;
            top: 50%;

            transform: translateY(-50%);

            cursor: pointer;

            user-select: none;

            font-size: 18px;
        }
    </style>

</head>

<body>

    <div class="container">

        <h2>Đăng ký tài khoản</h2>

        <form action="register_process.php" method="POST">

            <label>Họ và tên</label>

            <input
                type="text"
                name="fullname"
                required>

            <label>Tên đăng nhập</label>

            <input
                type="text"
                name="username"
                required>

            <label>Mật khẩu</label>

            <div class="password-box">

                <input
                    type="password"
                    id="password"
                    name="password"
                    required>

                <span
                    class="toggle-password"
                    onclick="togglePassword('password', this)">
                    👁️
                </span>

            </div>

            <label>Xác nhận mật khẩu</label>

            <div class="password-box">

                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    required>

                <span
                    class="toggle-password"
                    onclick="togglePassword('confirm_password', this)">
                    👁️
                </span>

            </div>

            <label>Giới tính</label>

            <select name="gender" required>

                <option value="">
                    -- Chọn giới tính --
                </option>

                <option value="Nam">
                    Nam
                </option>

                <option value="Nữ">
                    Nữ
                </option>

                <option value="Khác">
                    Khác
                </option>

            </select>

            <label>Email</label>

            <input
                type="email"
                name="email"
                required>

            <label>Địa chỉ</label>

            <textarea
                name="address"
                required></textarea>

            <button type="submit">
                Đăng ký
            </button>

        </form>

    </div>

    <script>
        function togglePassword(inputId, eye) {

            let input =
                document.getElementById(inputId);

            if (input.type === "password") {

                input.type = "text";

                eye.textContent = "🙈";

            } else {

                input.type = "password";

                eye.textContent = "👁️";

            }
        }
    </script>

</body>

</html>
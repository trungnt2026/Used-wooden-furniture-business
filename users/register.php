<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký tài khoản</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("../img/bg_users_register.png");
            background-size: 55%;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            insert: 0;
            background: rgba(0,0,0,0.35);
            background-filter: blur(2px);
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
            width: 380px;
            background: rgba(255,255,255,0.88);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }

        label {
            font-weight: bold;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #5c3b1e;
            font-size: 30px;
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

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border: 1px solid #8b4513;
            box-shadow: 0 0 5px rgba(139,69,19,0.4);
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            background: linear-gradient(90deg,#6b3e1f,#8b4513);            
            color: white;
            cursor: pointer;
            font-size: 16px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        button:hover {
            transform: translateY(-2px);
            opacity: .95;
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
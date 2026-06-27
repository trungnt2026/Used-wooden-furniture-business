<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - Dogo2hand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --wood-dark: #5D4037;
            --wood-medium: #8D6E63;
            --wood-light: #D7CCC8;
            --wood-alert-bg: #EFEBE9;
            /* Thêm màu nền gỗ nhạt cho thông báo */
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("img/hop-tac.jpg");
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            filter: blur(3px);
            background-repeat: repeat;
            align-items: center;
            justify-content: center;
            display: flex;
            z-index: -1;
        }

        .contact-box {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            border-left: 10px solid var(--wood-dark);
        }

        h2,
        h3 {
            color: var(--wood-dark);
            font-weight: bold;
        }

        .info-item {
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .info-item strong {
            color: var(--wood-medium);
        }

        .btn-custom {
            background-color: var(--wood-dark);
            color: white;
            border: none;
        }

        .btn-custom:hover {
            background-color: var(--wood-medium);
            color: white;
        }

        .form-check-input {
            border: 2px solid var(--wood-dark);
            width: 1.2em;
            height: 1.2em;
            cursor: pointer;
        }

        /* Khung thông báo thành công màu gỗ */
        .success-box {
            background-color: var(--wood-alert-bg);
            border: 2px dashed var(--wood-medium);
            border-radius: 10px;
            padding: 25px;
            color: var(--wood-dark);
        }

        .success-box icon {
            font-size: 3rem;
            color: var(--wood-dark);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="contact-box">
                    <h2 class="mb-4">Liên hệ ĐỒ GỖ 2HAND</h2>

                    <div class="mb-4">
                        <div class="info-item"><strong>Admin:</strong> Trung</div>
                        <div class="info-item"><strong>SĐT:</strong> 077.8899.000</div>
                        <div class="info-item"><strong>Email:</strong> admin@org.json</div>
                    </div>

                    <hr class="my-4">

                    <form id="contactForm">
                        <div class="mb-3">
                            <input type="text" id="fullname" class="form-control" placeholder="Họ và tên" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control"
                                placeholder="Số điện thoại (vui lòng nhập đủ 10 số)"
                                pattern="[0-9]{10}"
                                title="Vui lòng nhập đúng 10 chữ số"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);"
                                required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Email của bạn" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="3" placeholder="Nội dung cần hỗ trợ" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Bạn là:</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="userRole" id="roleBuyer" value="buyer" checked>
                                <label class="form-check-label" for="roleBuyer">Người mua sỉ (đơn trên 500 triệu)</label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="userRole" id="roleSupplier" value="supplier">
                                <label class="form-check-label" for="roleSupplier">Nhà cung cấp (có xưởng gỗ)</label>
                            </div>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="userRole" id="roleConsignor" value="consignor">
                                <label class="form-check-label" for="roleConsignor">Người ký gửi</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Gửi thông tin</button>
                    </form>

                    <div id="successMessage" class="success-box text-center d-none my-4">
                        <div class="mb-3" style="font-size: 3rem;">📦</div>
                        <h3 class="mb-3">Đăng Ký Thành Công!</h3>
                        <p class="fs-5">Cảm ơn <strong id="displayUser" class="text-decoration-underline"></strong> đã liên hệ với Đồ Gỗ 2Hand.</p>
                        <p class="mb-0">Yêu cầu của bạn đang được xử lý. Ban quản trị sẽ chủ động liên hệ lại với bạn trong vòng <strong>48 giờ</strong> tới.</p>
                    </div>

                    <div class="mt-3 text-center">
                        <a href="index.php" class="text-decoration-none" style="color: var(--wood-medium); font-weight:bolder">← Quay lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            // Ngăn trang web tải lại (Reload)
            e.preventDefault();

            // Lấy tên người dùng vừa nhập
            const username = document.getElementById('fullname').value;

            // Gán tên vào khung thông báo
            document.getElementById('displayUser').innerText = username;

            // Ẩn form đi và Hiển thị khung thông báo thành công màu gỗ
            document.getElementById('contactForm').classList.add('d-none');
            document.getElementById('successMessage').classList.remove('d-none');
        });
    </script>
</body>

</html>
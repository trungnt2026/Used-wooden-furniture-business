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
            align-items: center;
        }

        h2 {
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
            /* Tăng độ dày viền lên 2px */
            width: 1.2em;
            /* tăng kích thước radio */
            height: 1.2em;
            cursor: pointer;
        }

        /* Làm nổi bật ô input khi bị lỗi */
        .form-control:invalid {
            border: 2px solid #dc3545;
        }

        /* Tùy chỉnh thông báo lỗi của trình duyệt */
        .form-control:invalid:focus {
            box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
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

                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Họ và tên" required>
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
                        <button type="button" class="btn btn-custom w-100">Gửi thông tin</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="index.php" class="text-decoration-none" style="color: var(--wood-medium); font-weight:bolder">← Quay lại trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2026 lúc 05:06 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dogo2hand`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantity` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`, `created_at`, `quantity`) VALUES
(3, 'Tủ gỗ Nhật like new 90%', 18900000, 'tu-go-nhat.png', 'Tủ quần áo (gỗ Nhật) như mới, hàng siêu lướt, chủ dọn nhà mới nên pass giá hời.\r\nTủ gỗ Nhật 30 năm tuổi\r\nĐộ bền trên 100 năm\r\nCam kết không mối, mọt, ...\r\nChống nước tuyệt đối', '2026-06-18 10:08:25', 100),
(4, 'Tủ gỗ thông', 7590000, 'tu-go-thong.png', 'Tủ gỗ thông cao cấp\r\nTình trạng: 90%\r\nBảo hành: 36 tháng\r\nCam kết không mối, mọt, ...\r\nChống nước: nhẹ, không được rửa', '2026-06-18 10:20:13', 134),
(5, 'Tủ gỗ sồi Nga', 5580000, 'tu-go-soi-nga.png', 'Tủ quần áo gỗ sồi Nga\r\nTình trạng: 90%\r\nBảo hành: 1 tháng\r\nCam kết không mối, mọt, ...\r\nChống nước: nhẹ, không được rửa', '2026-06-18 11:55:56', 229),
(6, 'Bàn gỗ thông qua sử dụng 90%', 250000, 'ban-go.png', 'Bàn gỗ thông cao cấp, chủ pass dọn nhà.\r\nTình trạng: 90%\r\nBảo hành: 1 tháng\r\nCam kết không mối, mọt, ...\r\nChống nước: nhẹ, không được rửa', '2026-06-20 01:32:58', 153),
(8, 'Bộ Bàn ăn gia đình gỗ Liêm (qua sử dụng)', 168000000, 'ban-an-go-liem.png', 'Bộ Bàn ăn gia đình gỗ Liêm (qua sử dụng): Gồm 1 bàn, 1 băng ghế và 4 ghế ngồi tựa lưng\r\nĐộ bền trên 500 năm\r\nTuổi gỗ: 100 năm\r\nBảo hành: 36 tháng\r\nChống nước: tuyệt đối\r\nChống mối, mọt, ...', '2026-06-20 01:41:37', 510),
(9, 'Ghế gỗ Việt qua sử dụng', 159000, 'ghe-go-viet.png', 'Ghế gỗ Việt qua sử dụng, chủ pass dọn nhà.\r\nTình trạng: 90%\r\nBảo hành: 1 tháng\r\nCam kết không mối, mọt, ...\r\nChống nước: nhẹ, không được rửa', '2026-06-20 02:04:54', 251),
(10, 'Ghế gỗ Nga qua sử dụng', 299000, 'ghe-go-nga.png', 'Ghế gỗ Nga qua sử dụng\r\nTình trạng: 90%\r\nBảo hành: 1 tháng\r\nCam kết không mối, mọt, ...\r\nChống nước: nhẹ, không được rửa', '2026-06-20 02:06:00', 139),
(11, 'Ghế gỗ Nhật qua sử dụng', 199000, 'ghe-go-nhat.png', 'Ghế gỗ Nhật qua sử dụng, chủ pass dọn nhà.\r\nTình trạng: 90%\r\nBảo hành: 1 tháng\r\nCam kết không mối, mọt, ...\r\nChống nước: nhẹ, không được rửa', '2026-06-20 02:21:05', 188),
(12, 'Ghế gỗ sồi qua sử dụng', 399000, 'ghe-go-soi.png', 'Ghế gỗ sồi qua sử dụng cao cấp, chủ pass dọn nhà.\r\nTình trạng: 90%\r\nBảo hành: 1 tháng\r\nCam kết không mối, mọt, ...\r\nChống nước: nhẹ, không được rửa', '2026-06-20 02:22:24', 150),
(13, 'Ghế gỗ thông qua sử dụng', 295000, 'ghe-go-thong.png', 'Ghế gỗ thông qua sử dụng, chủ pass dọn nhà.\r\nTình trạng: 90%\r\nBảo hành: 1 tháng\r\nCam kết không mối, mọt, ...\r\nChống nước: nhẹ, không được rửa', '2026-06-20 02:23:45', 410),
(14, 'Ghế gỗ Ý qua sử dụng', 432000, 'ghe-go-y.png', 'Ghế gỗ Ý qua sử dụng, chủ pass dọn nhà.\r\nTình trạng: 90%\r\nBảo hành: 3 tháng\r\nCam kết không mối, mọt, ...\r\nChống nước: nhẹ, không được rửa', '2026-06-20 02:24:48', 600);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2026 lúc 04:16 PM
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
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('Nam','Nữ','Khác') NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `gender`, `email`, `address`, `created_at`) VALUES
(1, 'Ngô Minh Hảo', 'haonm878', '$2y$10$kf41hl8et2Pbx0K9n6oABO.d9uCd3NvMybMKF43b/FvUAXZvuyLrK', 'Nam', 'hao@mail.com', 'Phú La, Hà Nội', '2026-06-18 23:59:35'),
(2, 'Trần Ái Như', 'nhu55', '$2y$10$s/A.yWIegmfCJJhXlO8W6uTDFgpxcOyYt8lnek.d/nDa5N.2mtzP6', 'Nữ', 'nhu@mail.json', 'Phường 5, Vĩnh Long', '2026-06-19 00:01:00'),
(3, 'Trần Như Mộng', 'mong99', '$2y$10$3U90JcTZOc.QZ/uMj64D.OHyeEi9Nixz4Pf65BCzC0.TT.zotQL96', 'Nữ', 'mong@mail.json', 'Phường 4, Sài Gòn', '2026-06-19 00:05:33'),
(4, 'Nguyễn A', 'A123', '$2y$10$3sz8sTKBtxWMKlKtmuAvKuIQHwes3lTT0IHTx8KvkI.SD5jptLTFq', 'Nam', 'A@mail.Json', 'Phú Thứ, Cà Mau', '2026-06-19 00:18:48'),
(6, 'Nguyễn Như', 'nhu123', '$2y$10$0cEDpF3mHJObsook9Ooy8uwn22asCtJjkOpo1rx.TThWEX4JqJoJq', 'Nữ', 'nhu123@mail.json', 'Vĩnh long', '2026-06-20 00:52:43');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

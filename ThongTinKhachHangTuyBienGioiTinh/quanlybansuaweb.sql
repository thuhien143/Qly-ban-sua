-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2023 lúc 01:12 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybansuaweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ql_ban_sua`
--

CREATE TABLE `ql_ban_sua` (
  `id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ql_ban_sua`
--

INSERT INTO `ql_ban_sua` (`id`, `name`, `gender`, `address`, `phone`) VALUES
('kh001', 'Khuất Thuỳ Phương', 1, 'A21 Nguyễn Oanh quận Gò Vấp', 9874125),
('kh002', 'Đỗ Lâm Thiên', 0, '357 Lê Hồng Phong Q.10', 8351056),
('kh003', 'Phạm Thị Nhung', 1, '56 Đinh Tiên Hoàng quận 1', 9745698),
('kh004', 'Nguyễn Khắc Thiện', 0, '12bis Đường 3-2 quận 10', 8769128),
('kh005', 'Tô Trần Hồ Giáng', 0, '75 Nguyễn Kiệm quận Gò Vấp', 5792564),
('kh006', 'Nguyễn Kiến Thi', 1, '357 Lê Hồng Phong Q.10', 9874125),
('kh008', 'Nguyễn Anh Tuấn', 0, '1/2bis Nơ Trang Long Q.BT TP.HCM', 8753159);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ql_ban_sua`
--
ALTER TABLE `ql_ban_sua`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

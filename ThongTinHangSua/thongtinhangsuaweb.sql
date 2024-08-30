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
-- Cơ sở dữ liệu: `thongtinhangsuaweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ql_bansua`
--

CREATE TABLE `ql_bansua` (
  `mahang` varchar(50) NOT NULL,
  `tenhang` varchar(50) NOT NULL,
  `diachi` varchar(150) NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ql_bansua`
--

INSERT INTO `ql_bansua` (`mahang`, `tenhang`, `diachi`, `dienthoai`, `email`) VALUES
('AB', 'Abbott', 'Công ty nhập khẩu Việt Nam', 8741258, 'abbott@ab.com'),
('DS', 'Daisy', 'Khu công nghiệp Biên Hoà - Đồng Nai', 7826451, 'daisy@gmail.com'),
('NTF', 'Nutifood', 'Khu công nghiệp Sóng Thần Bình Dương', 7895632, 'nutifood@gmail.com'),
('VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1 - TP.HCM', 8794561, 'vinamilk@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ql_bansua`
--
ALTER TABLE `ql_bansua`
  ADD PRIMARY KEY (`mahang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

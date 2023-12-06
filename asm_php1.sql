-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2023 lúc 12:35 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm_php1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL,
  `hinhanh` varchar(100) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `ngaycapnhat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `tendanhmuc`, `hinhanh`, `ngaytao`, `ngaycapnhat`) VALUES
(10, 'Thịt Heo', 'thit_heo.png', '2023-12-05 11:11:20', '0000-00-00 00:00:00'),
(11, 'Thịt Bò', 'thit_bo.png', '2023-12-05 11:11:41', '0000-00-00 00:00:00'),
(12, 'Thịt gà', 'hai_san.gif', '2023-12-05 13:04:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `hinhanhsp` varchar(100) NOT NULL,
  `giagoc` int(50) NOT NULL DEFAULT 0,
  `giamgia` int(50) NOT NULL DEFAULT 0,
  `trongluong` int(50) NOT NULL DEFAULT 0,
  `ngaytao` datetime NOT NULL,
  `ngaycapnhat` datetime NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `tensanpham`, `hinhanhsp`, `giagoc`, `giamgia`, `trongluong`, `ngaytao`, `ngaycapnhat`, `cat_id`) VALUES
(11, 'Ba chỉ bò', 'bo-4.png', 4000, 30, 1000, '2023-12-05 10:10:32', '0000-00-00 00:00:00', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `signup`
--

CREATE TABLE `signup` (
  `signup_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `signup`
--

INSERT INTO `signup` (`signup_id`, `username`, `email`, `password`) VALUES
(1, 'Định béo', 'congdinh@gmail.com', '1234567'),
(2, 'Định béo', 'congdinh@gmail.com', '1234567'),
(3, 'Định béo', 'congdinh@gmail.com', '1234567'),
(4, 'Định béo', 'congdinh@gmail.com', '1234567'),
(5, 'Phạm Thị Phương Anh', 'phamphuonganh5112002@gmail.com', '1234567');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_cat_pro` (`cat_id`);

--
-- Chỉ mục cho bảng `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`signup_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `signup`
--
ALTER TABLE `signup`
  MODIFY `signup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_cat_pro` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

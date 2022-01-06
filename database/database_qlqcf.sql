-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2021 lúc 07:58 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database_qlqcf`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `position_id`, `account_name`, `password`, `status`) VALUES
(1, 1, 'admin', '$2y$04$RAgrqc5BiKDi6L8uxgmTROP8AYAaaADqCIXTOibIorTavU3VWrnMK', 1),
(2, 2, 'qlcuahang1', '$2y$04$/MMZA5/P5aadV8xTSEdsjOn7fmp1S/u1exCHlxW9a0bPGFwoPruaO', 1),
(3, 3, 'nhanvien1', '$2y$04$/MMZA5/P5aadV8xTSEdsjOn7fmp1S/u1exCHlxW9a0bPGFwoPruaO', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `convert`
--

CREATE TABLE `convert` (
  `product_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `quantity` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `importcoupon`
--

CREATE TABLE `importcoupon` (
  `id` int(11) NOT NULL,
  `producer_id` int(11) DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importdate` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*--
--Đổ dữ liệu cho bảng import
*/

INSERT INTO `importcoupon` (`id`, `producer_id`,`total`,`importdate`,`status`) VALUES
(1, 1, '6.600.000','2021-10-20', 1),
(2, 2, '2.900.000','2021-10-20', 1),
(3, 3, '2.000.000','2021-10-20', 1),
(4, 1, '7.725.000','2021-10-21', 1),
(5, 2, '2.250.000','2021-10-21', 1),
(6, 3, '1.200.000','2021-10-21', 1);
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `importcoupon_detail` thêm quantity
--

CREATE TABLE `importcoupon_detail` (
  `importcoupon_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*--
--Đổ dữ liệu cho bảng chi tiết nhập
--*/
INSERT INTO `importcoupon_detail` (`importcoupon_id`, `material_id`,`quantity`,`total`,`importdate`) VALUES
(1, 1, 10,'2.350.000','2021-10-20'),
(1, 2, 1000,'1.500.000','2021-10-20'),
(1, 3, 1000,'1.500.000','2021-10-20'),
(1, 4, 100,'1.250.000','2021-10-20'),
(2, 10, 20,'1.750.000','2021-10-20'),
(2, 11, 15,'250.000','2021-10-20'),
(2, 12, 30,'900.000','2021-10-20'),
(3, 13, 200,'1.000.000','2021-10-20'),
(3, 14, 200,'1.000.000','2021-10-20'),
(4, 5, 100,'1.300.000','2021-10-21'),
(4, 6, 10,'1.100.000','2021-10-21'),
(4, 7, 10,'1.100.000','2021-10-21'),
(4, 8, 10,'2.100.000','2021-10-21'),
(4, 9, 10,'2.125.000','2021-10-21'),
(5, 15, 48,'750.000','2021-10-21'),
(5, 16, 50,'1.500.000','2021-10-21'),
(6, 17, 20,'400.000','2021-10-21'),
(6, 18, 20,'400.000','2021-10-21'),
(6, 19, 20,'400.000','2021-10-21');


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `producer_id` int(11) DEFAULT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  `importprice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importdate` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đổ dữ liệu cho bảng `material`
--
INSERT INTO `material` (`id`, `producer_id`, `title_name`, `quantity`, `importprice`,`importdate`,`status`) VALUES
(1, 1, 'Cà phê gói'     , 10  , '2.350.000', '2021-10-20', 1),
(2, 1, 'Trà olong gói'  , 1000, '1.500.000', '2021-10-20', 1),
(3, 1, 'Trà đào gói'    , 1000, '1.500.000', '2021-10-20', 1),
(4, 1, 'Sen hộp'        , 100 , '1.250.000', '2021-10-20', 1),
(5, 1, 'Đào hộp'        , 100 , '1.300.000', '2021-10-20', 1),
(6, 1, 'Sysrup đào'     , 10  , '1.100.000', '2021-10-20', 1),
(7, 1, 'Syrup Sả'       , 10  , '1.100.000', '2021-10-20', 1),
(8, 1, 'Bột trà xanh'   , 10  , '2.100.000', '2021-10-20', 1),
(9, 1, 'Bột chocolate'  , 10  , '2.125.000', '2021-10-20', 1),
(10, 2, 'Sữa kem béo'    , 20  , '1.750.000', '2021-10-20', 1),
(11, 2, 'Bánh oreo'      , 15  , '250.000'  , '2021-10-20', 1),
(12, 2, 'Đường cát'      , 30  , '900.000'  , '2021-10-20', 1),
(13, 3, 'Ly'             , 200 , '1.000.000', '2021-10-20', 1),
(14, 3, 'Nắp'            , 200 , '1.000.000', '2021-10-20', 1),
(15, 2, 'Sữa đặc'        , 48  , '750.000'  , '2021-10-20', 1),
(16, 2, 'Sữa tươi'       , 50  , '1.500.000', '2021-10-20', 1),
(17, 3, 'Bánh mouse Trà Xanh',20,'400.000'  , '2021-10-20', 1),
(18, 3, 'Bánh mouse Đào' , 20  , '400.000'  , '2021-10-20', 1),
(19, 3, 'Bánh mouse Cacao', 20 , '400.000'  , '2021-10-20', 1);


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `importcoupon_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importdate` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Đổ dữ liệu cho bảng payment
--
INSERT INTO `payment` (`id`, `importcoupon_id`, `staff_id`, `total`, `importdate`,`status`) VALUES
(1, 1, 2  , '6.600.000', '2021-10-20', 1),
(2, 2, 2  , '2.900.000', '2021-10-20', 1),
(3, 3, 2  , '2.000.000', '2021-10-20', 1),
(4, 4, 2  , '7.725.000', '2021-10-21', 1),
(5, 5, 2  , '2.250.000', '2021-10-21', 1),
(6, 6, 2  , '1.200.000', '2021-10-21', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`id`, `title_name`, `status`) VALUES
(1, 'Quản lý thống kê báo cáo', 'fa fa-bar-chart-o'),
(2, 'Quản lý kho nguyên liệu', 'fa fa-apple'),
(3, 'Quản lý loại sản phẩm', 'fa fa-list'),
(4, 'Quản lý sản phẩm', 'fa fa-shopping-basket'),
(5, 'Quản lý hóa đơn nhập', 'fa fa-th-list'),
(6, 'Quản lý hóa đơn xuất', 'fa fa-th-list'),
(7, 'Quản lý hóa đơn bán hàng', 'fa fa-th-list'),
(8, 'Quản lý nhân viên', 'fa fa-user'),
(9, 'Quản lý tài khoản', 'fa fa-th-list'),
(10, 'Quản lý phân quyền', 'fa fa-th-list');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `position`
--

INSERT INTO `position` (`id`, `title_name`, `status`) VALUES
(1, 'Admin', 1),
(2, 'Quản Lý', 1),
(3, 'Nhân viên', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position_permission`
--

CREATE TABLE `position_permission` (
  `permission_id` int(11) DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `position_permission`
--

INSERT INTO `position_permission` (`permission_id`, `position_id`) VALUES
(9, 1),
(10, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(1, 3),
(2, 3),
(5, 3),
(6, 3),
(7, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producer`
--

CREATE TABLE `producer` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đổ dữ liệu bảng `producer`
--
INSERT INTO `producer` (`id`, `title_name`, `phonenumber`, `address` ,`status`) VALUES
(1, 'Thái Phiên', '0987654321', '12 Hai Bà Trưng Quận 1'    , 1),
(2, 'Câu lạc bộ', '0123456789', '980 Nguyễn Thái Học Quận 1', 1),
(3, 'Việt Thái' , '0132457689', '25/2 Lý Nam Đế Quận 11'    , 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` nvarchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `saleprice` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dates` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*--Đổ dữ liệu cho bảng product _ sản phẩm*/

INSERT INTO `product` (`id`,`name`, `type_id`, `saleprice`,`dates`,`status`) VALUES
(1,'Cà phê đen',1,"29.000",'2021-10-20',1), /*cf den*/
(2,'Cà phê sữa',1,"29.000",'2021-10-20',1), /*cf sua*/
(3,'Bạc xỉu',1,"29.000",'2021-10-20',1), /*bac xiu*/
(4,'Trà sen vàng',2,"39.000",'2021-10-20',1), /*tra olong*/
(5,'Trà đào sả',2,"39.000",'2021-10-20',1), /*tra dao*/
(6,'Trà đào sữa',2,"39.000",'2021-10-20',1), /*tra sua*/
(7,'Bánh tiramisu',3,"19.000",'2021-10-20',1), /*banh tira*/
(8,'Bánh mouse Đào',3,"19.000",'2021-10-20',1), /*banh mouse Dao*/
(9,'Bánh mouse Chanh dây',3,"19.000",'2021-10-20',1), /*banh mouse Chanh day*/
(10,'Trà xanh đá xay',4,"49.000",'2021-10-20',1), /*tra xanh da xay*/
(11,'Socola đá xay',4,"49.000",'2021-10-20',1), /*socola da xay*/
(12,'Cookie&Cream',4,"49.000",'2021-10-20',1); /*cookie&cream*/


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt`
--

CREATE TABLE `receipt` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importdate` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receipt_detail`
--

CREATE TABLE `receipt_detail` (
  `receipt_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id`, `account_id`, `surname`, `firstname`, `dateofbirth`, `phonenumber`, `address`, `email`, `status`) VALUES
(1, 1, 'Admin', NULL, NULL, NULL, NULL, NULL, 1),
(2, 2, 'Nguyễn Phong', 'Phú', '2000-02-18', '0367945523', '30/10 Lê Văn Quới', 'phongphunguyen7575@gmail.com', 1),
(3, 3, 'Nguyễn Phong ', 'Phú', '2000-02-18', '0367945523', '322/12 Lê Trọng Tấn', 'phongphunguyen7575@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `title_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*--Đổ dữ liệu cho bảng type _ loại sản phẩm*/

INSERT INTO `type` (`id`, `title_name`, `status`) VALUES
(1,'Cà phê', 1),
(2,'Trà', 1),
(3,'Bánh ngọt', 1),
(4,'Đá xay', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- Chỉ mục cho bảng `convert`
--
ALTER TABLE `convert`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Chỉ mục cho bảng `importcoupon`
--
ALTER TABLE `importcoupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producer_id` (`producer_id`);

--
-- Chỉ mục cho bảng `importcoupon_detail`
--
ALTER TABLE `importcoupon_detail`
  ADD KEY `importcoupon_id` (`importcoupon_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Chỉ mục cho bảng `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producer_id` (`producer_id`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `importcoupon_id` (`importcoupon_id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `position_permission`
--
ALTER TABLE `position_permission`
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `position_id` (`position_id`);

--
-- Chỉ mục cho bảng `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Chỉ mục cho bảng `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Chỉ mục cho bảng `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD KEY `receipt_id` (`receipt_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `importcoupon`
--
ALTER TABLE `importcoupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `producer`
--
ALTER TABLE `producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- Các ràng buộc cho bảng `convert`
--
ALTER TABLE `convert`
  ADD CONSTRAINT `convert_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `convert_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`);

--
-- Các ràng buộc cho bảng `importcoupon`
--
ALTER TABLE `importcoupon`
  ADD CONSTRAINT `importcoupon_ibfk_1` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`);

--
-- Các ràng buộc cho bảng `importcoupon_detail`
--
ALTER TABLE `importcoupon_detail`
  ADD CONSTRAINT `importcoupon_detail_ibfk_1` FOREIGN KEY (`importcoupon_id`) REFERENCES `importcoupon` (`id`),
  ADD CONSTRAINT `importcoupon_detail_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`);

--
-- Các ràng buộc cho bảng `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`);

--
-- Các ràng buộc cho bảng `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`importcoupon_id`) REFERENCES `importcoupon` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `position_permission`
--
ALTER TABLE `position_permission`
  ADD CONSTRAINT `position_permission_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`),
  ADD CONSTRAINT `position_permission_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `position` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Các ràng buộc cho bảng `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD CONSTRAINT `receipt_detail_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`id`),
  ADD CONSTRAINT `receipt_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

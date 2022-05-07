-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2021 lúc 09:48 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `linhvu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `status`, `date_create`) VALUES
(14, '1', 1, '1', '1', 110700000, 0, '2021-10-14 15:19:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date_create` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `date_create`) VALUES
(4, 9, 9, 1, 33900000, 2021),
(7, 12, 13, 3, 42999000, 2021),
(8, 13, 9, 2, 33900000, 2021),
(9, 14, 33, 3, 36900000, 2021);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_create` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `cat_id`, `price`, `description`, `image`, `status`, `date_create`) VALUES
(2, 'iPhone 13 mini', 1, 21990000, 'Màn hình:\r\n\r\nOLED5.4\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 15\r\nCamera sau:\r\n\r\n2 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A15 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIM Hỗ trợ 5G\r\nPin, Sạc:\r\n\r\n20 W', 'uploads/iphone 13 mini.jpg', 0, '2021-09-22 15:57:20'),
(9, 'iPhone 13', 1, 33900000, 'Màn hình:\r\n\r\nOLED6.1\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 15\r\nCamera sau:\r\n\r\n2 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A15 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n20 W', 'uploads/iphone-13-128gb-hong-didongviet_1.jpg', 1, '2021-09-23 16:31:38'),
(10, 'iPhone 13 pro', 1, 30900000, 'Màn hình:\r\n\r\nOLED6.1\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 15\r\nCamera sau:\r\n\r\n3 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A15 Bionic\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n20 W', 'uploads/iphone-13-pro-128gb-vang-didongviet_1_1.jpg', 1, '2021-09-23 16:34:46'),
(11, 'iPhone 13 pro 1TB', 1, 46900000, 'Màn hình:\r\n\r\nOLED6.1\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 15\r\nCamera sau:\r\n\r\n3 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A15 Bionic\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n1 TB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n20 W', 'uploads/iphone_13-_pro-3_2.jpg', 1, '2021-09-23 16:36:42'),
(12, 'iPhone 13 pro max 1TB', 1, 49999999, 'Màn hình:\r\n\r\nOLED6.7\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 15\r\nCamera sau:\r\n\r\n3 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A15 Bionic\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n1 TB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n20 W', 'uploads/iphone_13-_pro-5_4.jpg', 1, '2021-09-23 16:38:15'),
(13, 'iPhone 12 Pro Max', 1, 42999000, 'Màn hình:\r\n\r\nOLED6.7\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 14\r\nCamera sau:\r\n\r\n3 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A14 Bionic\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n512 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n3687 mAh20 W', 'uploads/iphone-12-pro-max-blue-aar-didongviet_2.jpg', 1, '2021-09-23 16:40:12'),
(14, 'iPhone 12 pro', 1, 35300000, 'Màn hình:\r\n\r\nOLED6.1\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 14\r\nCamera sau:\r\n\r\n3 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A14 Bionic\r\nRAM:\r\n\r\n6 GB\r\nBộ nhớ trong:\r\n\r\n512 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n2815 mAh20 W', 'uploads/iphone-12-pro-xam-aar-didongviet_5.jpg', 1, '2021-09-23 16:40:48'),
(23, 'iPhone 12', 1, 19900000, 'Màn hình:\r\n\r\nOLED6.1\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 14\r\nCamera sau:\r\n\r\n2 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A14 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n64 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n2815 mAh20 W', 'uploads/iphone-12-128gb-vna-didongviet.jpg', 1, '2021-10-07 19:46:34'),
(26, 'iPhone 13 mini', 1, 21990000, 'Màn hình:\r\n\r\nOLED5.4\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 15\r\nCamera sau:\r\n\r\n2 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A15 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n128 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n20 W', 'uploads/iphone 13 mini.jpg', 1, '2021-10-07 19:51:18'),
(29, 'iPhone 12 mini', 1, 16990000, 'Màn hình:\r\n\r\nOLED5.4\"Super Retina XDR\r\nHệ điều hành:\r\n\r\niOS 14\r\nCamera sau:\r\n\r\n2 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A14 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n64 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nPin, Sạc:\r\n\r\n2227 mAh20 W', 'uploads/iphone-12mini.jpg', 1, '2021-10-07 19:56:08'),
(30, ' iPhone 11', 1, 19400000, 'Màn hình:\r\n\r\nIPS LCD6.1\"Liquid Retina\r\nHệ điều hành:\r\n\r\niOS 14\r\nCamera sau:\r\n\r\n2 camera 12 MP\r\nCamera trước:\r\n\r\n12 MP\r\nChip:\r\n\r\nApple A13 Bionic\r\nRAM:\r\n\r\n4 GB\r\nBộ nhớ trong:\r\n\r\n256 GB\r\nSIM:\r\n\r\n1 Nano SIM & 1 eSIMHỗ trợ 4G\r\nPin, Sạc:\r\n\r\n3110 mAh18 W', 'uploads/ip11.jpg', 1, '2021-10-07 20:01:47'),
(31, 'iPhone XR', 1, 14500000, 'Kích thước màn hình	6.1 inches\r\nCông nghệ màn hình	IPS LCD\r\nCamera sau	12MP\r\nCamera trước	7MP\r\nChipset	Apple A12 Bionic\r\nDung lượng RAM	3 GB', 'uploads/apple-iphone-xr-64-gb-chinh-hang-vn_1__1.jpg', 1, '2021-10-07 20:26:21'),
(32, 'MacBook Pro M1 2020', 2, 34900000, 'CPU:\r\n\r\nApple M1\r\nRAM:\r\n\r\n8 GB\r\nỔ cứng:\r\n\r\nSSD 256 GB\r\nMàn hình:\r\n\r\n13.3\"Retina (2560 x 1600)\r\nCard màn hình:\r\n\r\nCard tích hợp8 nhân GPU\r\nCổng kết nối:\r\n\r\n2 x Thunderbolt 3 (USB-C)Jack tai nghe 3.5 mm\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nMac OS\r\nThiết kế:\r\n\r\nVỏ kim loại nguyên khối\r\nKích ', 'uploads/macbook-pro-13-i5-8gb-256gb-2018-mr9q2-cu-didongviet.jpg', 1, '2021-10-07 20:33:11'),
(33, ' MacBook Air 13 ', 2, 36900000, 'CPU:\r\n\r\nApple M1\r\nRAM:\r\n\r\n16 GB\r\nỔ cứng:\r\n\r\nSSD 512 GB\r\nMàn hình:\r\n\r\n13.3\"Retina (2560 x 1600)\r\nCard màn hình:\r\n\r\nCard tích hợp7 nhân GPU\r\nCổng kết nối:\r\n\r\n2 x Thunderbolt 3 (USB-C)Jack tai nghe 3.5 mm\r\nĐặc biệt:\r\n\r\nCó đèn bàn phím\r\nHệ điều hành:\r\n\r\nMac OS\r\nThiết kế:\r\n\r\nVỏ kim loại nguyên khối\r\nKích', 'uploads/macbook-air-13-touch-id-core-i3-1.1ghz-8gb-256gb.jpg', 1, '2021-10-07 20:34:16'),
(38, 'iPad mini 6', 5, 21990000, 'Màn hình\r\nCông nghệ màn hình: Liquid Retina\r\nĐộ phân giải: 2048 x 1536 pixels\r\nKích thước màn hình: 8.5 inch\r\nChụp ảnh - Quay phim\r\nCamera sau: 12 MP\r\nQuay phim: Có\r\nCamera trước: 8 MP\r\nCấu hình\r\nHệ điều hành: iOS\r\nRAM: 4 GB\r\nBộ nhớ trong (ROM): 256 GB', 'uploads/ipad-mini-6-256gb-wifi-5g-didongviet.jpg', 1, '2021-10-07 23:29:03'),
(39, 'iPad pro 2021', 5, 33900000, 'Công nghệ màn hình\r\n\r\nLiquid Retina XDR mini-LED LCD\r\nĐộ phân giải\r\n\r\n2048 x 2732 Pixels\r\nMàn hình rộng\r\n\r\n12.9\"\r\nHệ điều hành\r\n\r\niPadOS 14\r\nChip xử lý (CPU)\r\n\r\nApple M1 8 nhân\r\nChip đồ hoạ (GPU)\r\n\r\nApple GPU 8 nhân\r\nRAM\r\n\r\n8 GB\r\nBộ nhớ trong\r\n\r\n256 GB', 'uploads/ipad-pro-2021-11inch-512gb-wifi-5g-didongviet.jpg', 1, '2021-10-07 23:34:49'),
(40, 'iPad Gen 9', 5, 26900000, 'Công nghệ màn hình\r\n\r\nLiquid Retina XDR mini-LED LCD\r\nĐộ phân giải\r\n\r\n2048 x 2732 Pixels\r\nMàn hình rộng\r\n\r\n12.9\"\r\nHệ điều hành\r\n\r\niPadOS 14\r\nChip xử lý (CPU)\r\n\r\nApple M1 8 nhân\r\nChip đồ hoạ (GPU)\r\n\r\nApple GPU 8 nhân\r\nRAM\r\n\r\n8 GB\r\nBộ nhớ trong\r\n\r\n256 GB', 'uploads/ipad-gen-9-10-2inch-2021-256gb-4g.jpg', 1, '2021-10-07 23:36:10'),
(41, 'iPad Air 4', 5, 21990000, 'Màn hình\r\nCông nghệ màn hình: Liquid Retina IPS LCD\r\nĐộ phân giải: 1640 x 2360 pixels\r\nKích thước màn hình: 10.9 inches\r\nChụp ảnh - Quay phim\r\nCamera sau: 12 MP\r\nQuay phim: 4K@24/30/60fps, 1080p@30/60/120/240fps; gyro-EIS\r\nCamera trước: 7 MP\r\nCấu hình\r\nHệ điều hành: iPadOS 14\r\nTốc độ CPU: Hexa-c', 'uploads/ipad-air-4-aar-xam-didongviet_2.jpg', 1, '2021-10-07 23:37:31'),
(42, 'iPad pro 2020', 5, 18691000, 'Màn hình\r\nCông nghệ màn hình: Liquid Retina IPS LCD\r\nĐộ phân giải: 1640 x 2360 pixels\r\nKích thước màn hình: 10.9 inches\r\nChụp ảnh - Quay phim\r\nCamera sau: 12 MP\r\nQuay phim: 4K@24/30/60fps, 1080p@30/60/120/240fps; gyro-EIS\r\nCamera trước: 7 MP\r\nCấu hình\r\nHệ điều hành: iPadOS 14\r\nTốc độ CPU: Hexa-c', 'uploads/apple-ipad-2020-didongviet.jpg', 1, '2021-10-07 23:39:44'),
(43, 'iPad 2019', 5, 8900000, 'Màn hình\r\nCông nghệ màn hình: Retina display\r\nĐộ phân giải: 2160 x 1620 Pixels\r\nKích thước màn hình: 10.2 inchs\r\nChụp ảnh - Quay phim\r\nCamera sau: 8 MP\r\nQuay phim: 1080p HD\r\nCamera trước: 1.2 MP\r\nCấu hình\r\nHệ điều hành: iPadOS\r\nRAM: 3 GB\r\nBộ nhớ trong (ROM): 32 GB', 'uploads/ipad-wifi-4g-2019-vang-didongviet.jpg', 1, '2021-10-07 23:40:38'),
(44, 'iPad air', 5, 4450000, 'Màn hình\r\nCông nghệ màn hình: Retina display\r\nĐộ phân giải: 2160 x 1620 Pixels\r\nKích thước màn hình: 10.2 inchs\r\nChụp ảnh - Quay phim\r\nCamera sau: 8 MP\r\nQuay phim: 1080p HD\r\nCamera trước: 1.2 MP\r\nCấu hình\r\nHệ điều hành: iPadOS\r\nRAM: 3 GB\r\nBộ nhớ trong (ROM): 32 GB', 'uploads/ipad-air-xam-didongviet.jpg', 1, '2021-10-07 23:41:47'),
(45, 'iPad 9.7inch 32GB (2018)', 5, 7410000, 'Màn hình\r\nCông nghệ màn hình: LED-backlit IPS LCD\r\nĐộ phân giải: 1536 x 2048 pixel\r\nKích thước màn hình: 9.7 inches\r\nChụp ảnh - Quay phim\r\nCamera sau: 8 MP (f/2.4, 31mm, 1.12 µm), autofocus\r\nQuay phim: 1080p@30fps, 720p@120fps, HDR, stereo sound rec.\r\nCamera trước: 1.2 MP, f/2.2, 31mm\r\nCấu hình\r', 'uploads/ipad-9-7inch-32gb-2018-wifi-4g-didongviet.jpg', 1, '2021-10-07 23:43:36'),
(46, 'MacBook Pro 13', 2, 24990000, 'Bộ xử lý\r\nCông nghệ CPU: Core i5-8259U\r\nTốc độ CPU: 2.30 GHz (Turbo Boost 3.8 GHz)\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM: 8GB\r\nLoại RAM: LPDDR3 Bus 2133MHz\r\nỔ cứng: 256GB SSD\r\nMàn hình\r\nKích thước màn hình: 13.3 inch\r\nĐộ phân giải: 2560×1600 pixels\r\nCông nghệ màn hình: Công nghệ IPS, LED Backlit, Retina', 'uploads/macbook-pro-13-i5-8gb-256gb-2018-mr9q2-cu-didongviet.jpg', 1, '2021-10-07 23:50:09'),
(47, 'Macbook Air 13 Touch ID', 2, 23990000, 'Bộ xử lý\r\nCông nghệ CPU: Intel Core i3\r\nTốc độ CPU: 1.1GHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM: 8 GB\r\nLoại RAM: LPDDR4X\r\nỔ cứng: 256GB SSD\r\nMàn hình\r\nKích thước màn hình: 13.3 inch\r\nĐộ phân giải: 2560×1600 pixels\r\nCông nghệ màn hình: Retina', 'uploads/macbook-air-13-touch-id-core-i3-1.1ghz-8gb-256gb.jpg', 1, '2021-10-07 23:51:10'),
(48, 'MacBook Pro Retina 15 ', 2, 14500000, 'Bộ xử lý\r\nCông nghệ CPU: Intel Core i7\r\nTốc độ CPU: 2.30 GHz (Turbo Boost 3.7 GHz)\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM: 16GB\r\nLoại RAM: LPDDR3 Bus 1600MHz\r\nỔ cứng: 512GB\r\nMàn hình\r\nKích thước màn hình: 15.4 inch\r\nĐộ phân giải: 2800×1800 pixels\r\nCông nghệ màn hình: Công nghệ IPS, LED Backlit, Retina', 'uploads/macbook-pro-retina-15-didongviet.jpg', 1, '2021-10-07 23:54:28'),
(49, 'MacBook Air 11 ', 2, 21990000, 'Bộ xử lý\r\nCông nghệ CPU: Core i5-4250U\r\nTốc độ CPU: 1.30 GHz (Turbo Boost 2.6 GHz)\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM: 4GB\r\nLoại RAM: DDR3 bus 1600MHz\r\nỔ cứng: 128GB SSD\r\nMàn hình\r\nKích thước màn hình: 11.6 inch\r\nĐộ phân giải: HD (1366 x 768)\r\nCông nghệ màn hình: LED Backlit', 'uploads/macbook-air-11-core-i5-didongviet.jpg', 1, '2021-10-07 23:55:23'),
(50, 'MacBook Pro Retina 13 ', 2, 8900000, 'Bộ xử lý\r\nCông nghệ CPU: Intel Core i5 2.4GHz\r\nTốc độ CPU: 2.4GHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM: 4 GB 1333MHz DDR3\r\nỔ cứng: HDD 512 GB\r\nMàn hình\r\nKích thước màn hình: 13.3-inch\r\nĐộ phân giải: 1280 x 800 pixels\r\nCông nghệ màn hình: Công nghệ IPS, LED Backlit', 'uploads/macbook-pro-retina-13-didongviet-2.jpg', 1, '2021-10-07 23:56:30'),
(51, 'MacBook Air 13 Core i5', 2, 13500000, 'Bộ xử lý\r\nCông nghệ CPU: Intel Core i5 Broadwell\r\nTốc độ CPU: 1.60 GHz\r\nBộ nhớ, RAM, Ổ cứng\r\nRAM: 4 GB\r\nLoại RAM: DDR3L(On board)\r\nỔ cứng: SSD: 256 GB\r\nMàn hình\r\nKích thước màn hình: 13.3 inch\r\nĐộ phân giải: WXGA+(1440 x 900)\r\nCông nghệ màn hình: LED Backlit', 'uploads/macbook-air-13-core_i5-2015-didongviet-3.jpg', 1, '2021-10-07 23:58:01'),
(52, 'Apple Watch Series 7 41mm', 3, 12900000, 'Đường kính mặt	41mm\r\nCông nghệ màn hình	Màn hình luôn bật\r\nRetina\r\nChất liệu mặt	Kính cường lực\r\nChống nước	IP6X (Bơi,chống bụi)\r\nThời lượng pin	18 giờ sử dụng\r\nThời gian sạc	45 phút sạc 80%', 'uploads/apple_watch_series_7_gps_41mm_product_red_aluminum_product_red_sport_band_34fr_screen__usen_copy.jpg', 1, '2021-10-08 21:22:55'),
(53, 'Apple Watch SE 40mm', 3, 7300000, 'Độ phân giải	324 x 394 pixels\r\nKích thước màn hình	1.57 inch\r\nCông nghệ màn hình	LTPO OLED display (1000 nits)\r\nChất liệu viền	Nhôm\r\nChất liệu dây	Cao Su\r\nBộ nhớ trong	32 GB', 'uploads/apple-watch-se-40mm-2.jpg', 1, '2021-10-08 21:24:21'),
(54, 'Apple Watch Series 6 40mm', 3, 9700000, 'Độ phân giải	448 x 368 pixels\r\nKích thước màn hình	1.78 inch\r\nCông nghệ màn hình	Retina LTPO OLED, 16 triệu màu,mặt lưng kính Sapphire, 3D Touch, độ sáng 1000 nits\r\nChất liệu viền	Nhôm\r\nChất liệu dây	Cao Su\r\nCó thể thay dây	Có', 'uploads/apple-watch-series-6-40mm-3_3_1_1.jpg', 1, '2021-10-08 21:25:27'),
(55, 'Apple Watch SE 44mm', 3, 8000000, 'Độ phân giải	324 x 394 pixels\r\nKích thước màn hình	1.57 inch\r\nCông nghệ màn hình	LTPO OLED display (1000 nits)\r\nChất liệu viền	Nhôm\r\nChất liệu dây	Cao Su\r\nBộ nhớ trong	32 GB', 'uploads/apple-watch-se-40mm_1_2_1.jpg', 1, '2021-10-08 21:26:38'),
(56, 'Apple Watch Series 6 40mm (4G)', 3, 12500000, 'Độ phân giải	448 x 368 pixels\r\nKích thước màn hình	1.78 inch\r\nCông nghệ màn hình	Retina LTPO OLED, 16 triệu màu,mặt lưng kính Sapphire, 3D Touch, độ sáng 1000 nits\r\nChất liệu viền	Nhôm\r\nChất liệu dây	Cao Su\r\nCó thể thay dây	Có', 'uploads/apple-watch-series-6-40mm-4g-8_2_1_3.jpg', 1, '2021-10-08 22:22:14'),
(57, 'Apple Watch Series 3 42mm', 3, 5550000, 'Độ phân giải	340 x 272 pixels\r\nKích thước màn hình	1.9 inch\r\nChất liệu viền	Nhôm\r\nChất liệu dây	Cao Su\r\nPin	Li-ion 279 mAh\r\nChống nước	Độ chịu nước 50 mét theo tiêu chuẩn ISO 22810:2010', 'uploads/apple-watch-series-3-42mm-gps-vien-nhom-day-cao-su-2.jpg', 1, '2021-10-08 22:23:44'),
(58, 'Apple Watch Series 6 44mm (4G)', 3, 19500000, 'Độ phân giải	448 x 368 pixels\r\nKích thước màn hình	1.78 inch\r\nCông nghệ màn hình	Retina LTPO OLED, 16 triệu màu,mặt lưng kính Sapphire, 3D Touch, độ sáng 1000 nits\r\nChất liệu viền	Thép\r\nChất liệu dây	Kim loại\r\nCó thể thay dây	Có', 'uploads/apple-watch-series-6-44mm-4g-vien-thep-day-thep-1_1_1_3.jpg', 1, '2021-10-08 22:29:37'),
(59, 'Apple Watch Series 7 41mm (4G) ', 3, 20900000, 'Đường kính mặt	41mm\r\nCông nghệ màn hình	Màn hình luôn bật\r\nRetina\r\nChất liệu mặt	Kính cường lực\r\nChống nước	IP6X (Bơi,chống bụi)\r\nThời lượng pin	18 giờ sử dụng\r\nThời gian sạc	45 phút sạc 80%', 'uploads/series_7_steel_41mm.jpg', 1, '2021-10-08 22:31:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `status`, `date_create`, `date_update`) VALUES
(1, 'iPhone', 1, '2021-09-21 17:32:51', '2021-10-05 23:52:25'),
(2, 'Macbook', 1, '2021-09-21 17:33:19', NULL),
(3, 'Watch', 1, '2021-09-22 14:17:48', NULL),
(5, 'iPad', 1, '2021-09-22 14:18:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_position`
--

CREATE TABLE `tbl_position` (
  `cv_id` int(11) NOT NULL,
  `pos_name` varchar(255) NOT NULL,
  `pos_status` tinyint(4) NOT NULL,
  `pos_date_create` datetime NOT NULL,
  `pos_date_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_position`
--

INSERT INTO `tbl_position` (`cv_id`, `pos_name`, `pos_status`, `pos_date_create`, `pos_date_update`) VALUES
(1, 'Giám Đốc', 1, '2021-10-06 00:57:18', '0000-00-00 00:00:00'),
(2, 'Quản Lý', 1, '2021-10-06 00:57:27', '0000-00-00 00:00:00'),
(3, 'Nhân Viên', 1, '2021-10-06 00:57:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `ten_nv` varchar(255) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `gioi_tinh` varchar(255) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `ngay_tao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_ibfk_1` (`order_id`),
  ADD KEY `order_detail_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Chỉ mục cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`cv_id`);

--
-- Chỉ mục cho bảng `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

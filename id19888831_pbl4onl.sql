-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 25, 2022 lúc 02:54 AM
-- Phiên bản máy phục vụ: 10.5.16-MariaDB
-- Phiên bản PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id19888831_pbl4onl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(66, 554065426, 648144382, 'kkk'),
(67, 648144382, 1613380769, 'll'),
(68, 554065426, 1349445061, 'hello'),
(69, 554065426, 1349445061, 'Web nhu buoi'),
(70, 1349445061, 554065426, 'chịu thôi:(('),
(71, 554065426, 1019398588, 'con'),
(72, 1019398588, 554065426, 'chào'),
(73, 1019398588, 554065426, 'con đây'),
(74, 554065426, 897880861, 'onni chan baka hentai'),
(75, 897880861, 554065426, 'kkk'),
(76, 897880861, 554065426, 'm đây à tiến'),
(77, 897880861, 554065426, 'hay a thông đay'),
(78, 1349445061, 554065426, 'hello a tiến'),
(79, 554065426, 1349445061, 'hello a '),
(80, 1349445061, 554065426, 'kkk'),
(81, 648144382, 554065426, 'k'),
(82, 648144382, 554065426, 'k'),
(83, 648144382, 554065426, 'k'),
(84, 648144382, 554065426, 'k'),
(85, 648144382, 554065426, 'k'),
(86, 648144382, 554065426, 'k'),
(87, 648144382, 554065426, 'k'),
(88, 648144382, 554065426, 'k'),
(89, 648144382, 554065426, 'k'),
(90, 648144382, 554065426, 'k'),
(91, 648144382, 554065426, 'k'),
(92, 1613380769, 554065426, 'alo'),
(93, 1613380769, 554065426, 'solo yasua'),
(94, 1191851018, 554065426, 'alo'),
(95, 554065426, 1191851018, 'hhi idol'),
(96, 1191851018, 554065426, 'solo yasua khong'),
(97, 554065426, 1191851018, 'ok'),
(98, 1191851018, 554065426, '1111'),
(99, 554065426, 344680182, 'hello'),
(100, 344680182, 554065426, '<3'),
(101, 554065426, 344680182, 'how are you today'),
(102, 344680182, 554065426, '<======3'),
(103, 554065426, 344680182, 'what\'s your name'),
(104, 344680182, 554065426, 'my name is tao'),
(105, 554065426, 344680182, 'i want to f you'),
(106, 344680182, 554065426, 'iam attack'),
(107, 554065426, 344680182, 'do you have some oil?'),
(108, 344680182, 554065426, 'cook oil pls');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` varchar(200) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(400) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fullname`, `email`, `password`, `img`, `status`) VALUES
(29, '554065426', 'thành phương phương', 'thanhphuong@gmail.com', '123456', '16690113301c0d01885e3731b6003d4e2151add9cc.jpg', 'Active now'),
(30, '648144382', 'bùi văn thông', 'thong@gmail.com', '123456', '166901147916808cdb33c7504ee25c2582ac32ef7c--samurai-tattoo-samurai-art.jpg', 'Offline now'),
(31, '1613380769', 'le lam', 'lamphuong@gmail.com', '123456', '1669011744274142771_320827586751978_4054708201644979657_n.jpg', 'Offline now'),
(32, '1349445061', 'nguyễn văn quốc đạt', 'dat@gmail.com', '123456', '1669031759inbound1301338103555664127.jpg', 'Offline now'),
(33, '1019398588', 'thành  xô', 'thanhxo@gmail.com', '123456', '1669034290274142771_320827586751978_4054708201644979657_n.jpg', 'Active now'),
(34, '897880861', 'Minas Anor', 'thongbui0112@gmail.com', '123456789', '1669035812hpBar.png', 'Active now'),
(35, '1191851018', 'joker jk', 'jk@gmail.com', '123456', '1669100357inbound8172044707667437342.jpg', 'Active now'),
(36, '344680182', 'trần tới', 'khautrangcoconchim2@gmail.com', '12345', '16692713091f58bac1f11f2e44992e1c7119727f78.jpg', 'Active now');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

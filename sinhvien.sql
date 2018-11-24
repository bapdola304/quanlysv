-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 06:14 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `id` int(11) NOT NULL,
  `TaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`id`, `TaiKhoan`, `MatKhau`) VALUES
(1, 'khanh', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `tbllop`
--

CREATE TABLE `tbllop` (
  `MaLop` int(11) NOT NULL,
  `TenLop` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbllop`
--

INSERT INTO `tbllop` (`MaLop`, `TenLop`) VALUES
(1, '15SE111'),
(2, '15SE112'),
(3, '15CN111'),
(4, '15CN112'),
(5, '15PH116');

-- --------------------------------------------------------

--
-- Table structure for table `tblmonhoc`
--

CREATE TABLE `tblmonhoc` (
  `MaMH` int(11) NOT NULL,
  `TenMH` varchar(200) NOT NULL,
  `SoChiTH` int(11) NOT NULL,
  `SoChiLT` int(11) NOT NULL,
  `SoChiBT` int(11) NOT NULL,
  `ToongSoTiet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblmonhoc`
--

INSERT INTO `tblmonhoc` (`MaMH`, `TenMH`, `SoChiTH`, `SoChiLT`, `SoChiBT`, `ToongSoTiet`) VALUES
(1, 'Cấu trúc dữ liệu', 2, 2, 1, 135),
(2, 'Phát triển mã nguồn mở', 2, 2, 1, 135),
(3, 'Lập trình android', 2, 1, 1, 120),
(4, 'Xử lý ảnh', 2, 1, 3, 120),
(5, 'Cấu trúc dữ liệu', 1, 2, 1, 120),
(6, 'Xử lý database', 2, 1, 3, 120),
(7, 'Lập trình C#', 1, 2, 1, 90),
(8, 'Cấu trức dữ liệu SQL', 2, 1, 1, 45),
(9, 'xử lý thông tin', 2, 1, 1, 90),
(11, 'Công Nghê Java', 2, 1, 2, 165),
(12, 'PHP', 2, 1, 1, 120),
(13, 'C#', 1, 2, 1, 105);

-- --------------------------------------------------------

--
-- Table structure for table `tblphanmon`
--

CREATE TABLE `tblphanmon` (
  `MaID` int(11) NOT NULL,
  `Lop` varchar(20) NOT NULL,
  `HocKy` varchar(20) NOT NULL,
  `TenMH1` varchar(100) NOT NULL,
  `TenMH2` varchar(100) NOT NULL,
  `TenMH3` varchar(100) NOT NULL,
  `TenMH4` varchar(100) NOT NULL,
  `TenMH5` varchar(100) NOT NULL,
  `TenMH6` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblphanmon`
--

INSERT INTO `tblphanmon` (`MaID`, `Lop`, `HocKy`, `TenMH1`, `TenMH2`, `TenMH3`, `TenMH4`, `TenMH5`, `TenMH6`) VALUES
(35, '15SE111', '1', 'Xử lý ảnh', 'Cấu trúc dữ liệu', 'Cấu trức dữ liệu SQL', 'Công Nghê Java', 'PHP', 'C#'),
(36, '15SE112', '1', 'Phát triển mã nguồn mở', 'Lập trình android', 'Xử lý ảnh', 'Cấu trúc dữ liệu', 'Xử lý database', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblsinhvien`
--

CREATE TABLE `tblsinhvien` (
  `MaSV` varchar(20) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `NgaySinh` date NOT NULL,
  `Email` varchar(200) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Lop` varchar(20) NOT NULL,
  `Avatar` varchar(100) NOT NULL,
  `DiaChi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsinhvien`
--

INSERT INTO `tblsinhvien` (`MaSV`, `HoTen`, `NgaySinh`, `Email`, `SDT`, `Lop`, `Avatar`, `DiaChi`) VALUES
('1150000500', 'Nguyễn Thị Lan', '1997-02-01', 'bapdola304@gmail.com', '123456789', '15CN112', 'hanpro.jpg', 'Diêu Trì'),
('1150000501', 'Nguyễn Thị Huệ 2', '1998-05-12', 'bapdola30300@gmail.com', '123456789', '15SE112', 'ga.jpg', 'Quy Nhơn'),
('1150000789', 'Nguyễn Văn A', '1997-11-13', 'Nguyenvana@gmail.com', '0236547895', '15SE112', 'ys.jpg', 'Biên Hòa'),
('115000147', 'Nguyễn Văn D', '1997-11-01', 'nguyenvanD@gmail.com', '012345698', '15CN111', 'ys2.jpg', 'Hồ Chí Minh'),
('115000189', 'Ngô Quốc Hưng', '1997-04-04', 'Ngohung@gmail.com', '01656267643', '15SE111', 'ys.jpg', 'Bình Định'),
('115000236', 'Dương Gia Quốc', '1997-11-21', 'giaquoc@gmail.com', '0235697441', '15SE111', 'ys2.jpg', 'Bình Phước'),
('115000369', 'Nguyễn Văn Lanh', '1997-11-22', 'NguyenVanLanh@gmail.com', '015987562', '15CN111', 'ys.jpg', 'Bình Định'),
('115000797', 'Nguyễn Duy Khanh', '1997-11-11', 'DuyKhanh14723@gmail.com', '0356267643', '15SE111', 'hi.jpg', 'Gia Lai'),
('123123', '123', '2018-11-10', '123', '', '15SE111', 'ys2.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmonhoc`
--
ALTER TABLE `tblmonhoc`
  ADD PRIMARY KEY (`MaMH`);

--
-- Indexes for table `tblphanmon`
--
ALTER TABLE `tblphanmon`
  ADD PRIMARY KEY (`MaID`);

--
-- Indexes for table `tblsinhvien`
--
ALTER TABLE `tblsinhvien`
  ADD PRIMARY KEY (`MaSV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblmonhoc`
--
ALTER TABLE `tblmonhoc`
  MODIFY `MaMH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblphanmon`
--
ALTER TABLE `tblphanmon`
  MODIFY `MaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

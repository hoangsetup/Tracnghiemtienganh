-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2015 at 04:00 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tracnghiemtienganh`
--

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE IF NOT EXISTS `cauhoi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loaicauhoi` int(11) NOT NULL,
  `noidung` varchar(5000) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`id`, `loaicauhoi`, `noidung`, `userid`) VALUES
(4, 3, 'Eating', 2),
(5, 2, 'He ... the work.', 2),
(6, 1, 'Chúng tôi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dapan`
--

CREATE TABLE IF NOT EXISTS `dapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cauhoiid` int(11) NOT NULL,
  `noidung` varchar(5000) NOT NULL,
  `dadung` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `dapan`
--

INSERT INTO `dapan` (`id`, `cauhoiid`, `noidung`, `dadung`) VALUES
(13, 4, 'Đu inh', 0),
(14, 4, 'Ít tinh', 1),
(15, 4, 'Gao', 0),
(16, 4, 'Xao minh', 0),
(17, 5, 'like', 0),
(18, 5, 'have', 0),
(19, 5, 'loves', 1),
(20, 5, 'do', 0),
(21, 6, 'we', 0),
(22, 6, 'he', 0),
(23, 6, 'she', 0),
(24, 6, 'they', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ketqua`
--

CREATE TABLE IF NOT EXISTS `ketqua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thoigian` varchar(20) NOT NULL,
  `ketqua` varchar(10) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loaicauhoi`
--

CREATE TABLE IF NOT EXISTS `loaicauhoi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `loaicauhoi`
--

INSERT INTO `loaicauhoi` (`id`, `tenloai`) VALUES
(2, 'Từ vựng'),
(3, 'Ngữ pháp'),
(4, 'Phát âm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `PK_iUserId` int(11) NOT NULL AUTO_INCREMENT,
  `iPermission` int(11) NOT NULL DEFAULT '3',
  `sName` varchar(50) NOT NULL,
  `sUser` varchar(50) NOT NULL,
  `sPassword` varchar(50) NOT NULL,
  `sEmail` varchar(50) NOT NULL,
  `sNgaysinh` varchar(20) DEFAULT NULL,
  `sSdt` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`PK_iUserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`PK_iUserId`, `iPermission`, `sName`, `sUser`, `sPassword`, `sEmail`, `sNgaysinh`, `sSdt`, `image`) VALUES
(1, 0, 'Đinh Văn Hoàng', 'hoangdv', '123456', 'hoang.dv@outlook.com', '01/08/1994', '01676322963', 'read view contextmenu.JPG'),
(2, 1, 'Đinh Văn Trang', 'trangdv', '123456', 'email@outlook.com', '01/08/1994', '0236589456', NULL),
(3, 2, 'Huyền', 'huyentracy', '123456', 'huyen@gmail.com', '01/08/1994', '123505893', 'britneyspears.jpg'),
(4, 2, 'Thanh Huyền', 'huyen', '123456', 'huyen@gmail.com', '01/08/1994', '0125', ''),
(19, 0, 'Admin', 'admin', 'admin', 'trangdv@haintheme.com', '02/08/1993', '01693 280 409', 'damvinhhung.jpg'),
(20, 2, 'Vương Minh', 'vuong', '1', '', NULL, NULL, NULL),
(21, 2, 'Đàm Vĩnh Hưng', 'vinhhung', '1', '', NULL, NULL, NULL),
(23, 2, 'Đông Nhi H', 'dongnhih', '123456', 'sample@info.com', '12/05/1990', '123456789', NULL),
(24, 2, 'Mỹ Tâm', 'mytam', '123456', 'nhi@gmail.com', '12/05/1990', '123456789', 'Carly.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2015 at 05:58 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`PK_iUserId`, `iPermission`, `sName`, `sUser`, `sPassword`, `sEmail`, `sNgaysinh`, `sSdt`, `image`) VALUES
(1, 3, 'Đinh Văn Hoàng', 'hoangdv', '1', 'hoang.dv@outlook.com', '01/08/1994', '01676322963', 'read view contextmenu.JPG'),
(2, 3, 'Đinh Văn Trang', 'trangdv', '123456', 'email@outlook.com', '01/08/1994', '0236589456', NULL),
(3, 3, 'Huyền', 'huyen', '123456', 'huyen@gmail.com', '01/08/1994', '123505893', NULL),
(4, 3, 'Huyền', 'huyen', '123456', 'huyen@gmail.com', '01/08/1994', '', NULL),
(5, 3, 'Huyền', 'huyen', '123456', 'huyen@gmail.com', '01/08/1994', '', NULL),
(6, 3, 'Tien', 'hacker', '123456', '', '28-02-1994', '', NULL),
(7, 3, 'j', 'j', 'j', 'j@gmai.con', '01-03-1994', '012365987', NULL),
(8, 3, 'j', 'j', 'jnj', 'j@gmail.com', '02/12/1993', '12355', NULL),
(9, 3, 'j', 'jjj', 'j', 'j@gmil.com', '01/01/1994', '123655', NULL),
(10, 3, 'j', 'j55', 'j', 'j@gmai.com', '01/01/1994', '13', NULL),
(11, 3, 'j', 'jjj0', '0', 'h@h.com', '01/01/1994', '2563', NULL),
(12, 3, 'asda', 'sdf', 'asdf', 'asdfasdf@gmail.com', '01/01/1994', '1235', NULL),
(13, 3, 'fda', 'sdfsdaf', 'asdf', 'f@g.co', '01/02/1997', '34', ''),
(14, 3, 'fasa', 'sdfa', 'sdf', 'd@g.vom', '02/03/1997', '34', 'read view contextmenu.JPG'),
(15, 3, 'g', 'g', 'g', 'g@g.vom', '01/01/1994', '342', 'read view contextmenu.JPG'),
(16, 3, 'g', 'g', '*****', 'g@g.vom', '01/01/1994', '342', 'plash screen.JPG'),
(17, 3, '', '', '', '', '', '', ''),
(18, 3, 'vaf', 'asdf', '*****', 'fasd@gmai.com', '01/01/1994', '23433333', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

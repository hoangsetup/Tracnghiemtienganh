-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2015 at 11:29 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`id`, `loaicauhoi`, `noidung`, `userid`) VALUES
(1, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.', 5),
(2, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua.', 5);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dapan`
--

INSERT INTO `dapan` (`id`, `cauhoiid`, `noidung`, `dadung`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet.', 1),
(2, 1, 'Lorem ipsum dolor sit amet.', 0),
(3, 1, 'Lorem ipsum dolor sit amet.', 0),
(4, 1, 'Lorem ipsum dolor sit amet.', 0),
(5, 2, 'Lorem ipsum dolor sit amet.', 1),
(6, 2, 'Lorem ipsum dolor sit amet.', 0),
(7, 2, 'Lorem ipsum dolor sit amet.', 0),
(8, 2, 'Lorem ipsum dolor sit amet.', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `ketqua`
--

INSERT INTO `ketqua` (`id`, `thoigian`, `ketqua`, `userid`) VALUES
(1, '01/01/2015 12:53', '5/20', 6),
(2, '06/06/2015 01:29', '5/20', 1),
(3, '06/06/2015 01:38', '0/2', 1),
(4, '06/06/2015 01:41', '0/2', 1),
(5, '06/06/2015 01:45', '0/2', 1),
(6, '06/06/2015 01:47', '1/2', 1),
(7, '06/06/2015 01:52', '0/2', 1),
(8, '06/06/2015 01:53', '1/2', 1),
(9, '06/06/2015 02:14', '1/2', 1),
(10, '06/06/2015 02:17', '1/2', 1),
(11, '06/06/2015 02:28', '0/2', 1),
(12, '06/06/2015 02:28', '1/2', 1),
(13, '06/06/2015 03:18', '2/2', 1),
(14, '06/06/2015 03:19', '2/2', 1),
(15, '01/01/2015 12:53', '5/20', 1),
(16, '06/06/2015 03:31', '2/2', 1),
(17, '06/06/2015 04:11', '0/2', 1),
(18, '06/06/2015 05:43', '1/2', 1);

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
(1, 0, 'Đinh Văn Hoàng', 'hoangdv', '1', 'hoang.dv@outlook.com', '01/08/1994', '01676322963333', 'plash screen.JPG'),
(2, 3, 'Đinh Văn Trang', 'trangdv', '123456', 'email@outlook.com', '01/08/1994', '0236589456', NULL),
(3, 3, 'Huyền', 'huyen', '123456', 'huyen@gmail.com', '01/08/1994', '123505893', NULL),
(4, 3, 'Huyền', 'huyen', '123456', 'huyen@gmail.com', '01/08/1994', '', NULL),
(5, 3, 'Huyền', 'huyen', '123456', 'huyen@gmail.com', '01/08/1994', '', NULL),
(6, 2, 'Tien', 'hacker', '123456', '', '28-02-1994', '', NULL),
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

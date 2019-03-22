-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019-03-21 16:59:12
-- 服务器版本: 5.5.54-log
-- PHP 版本: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ci_data`
--

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `text`) VALUES
(1, '1111', '222', '3333'),
(2, 'qqqq', 'wwww', 'eeee'),
(3, '1111', '222', '3333'),
(4, 'qqqq', 'wwww', 'eeee'),
(5, '?????1 ??', '?????1-??', '1212');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

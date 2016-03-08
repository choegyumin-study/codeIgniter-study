-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 호스트: localhost
-- 처리한 시간: 16-03-08 13:45
-- 서버 버전: 5.5.47-0ubuntu0.14.04.1
-- PHP 버전: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `codeigniter_sql`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` varchar(200) NOT NULL,
  `pw` varchar(200) NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='사이트 관리 정보';

--
-- 테이블의 덤프 데이터 `admin`
--

INSERT INTO `admin` (`id`, `pw`, `file`, `file_name`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055', 'data20150201110138_23167.jpg', 'data20140331015502_2070643744.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `bbs`
--

CREATE TABLE IF NOT EXISTS `bbs` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `cate` char(20) NOT NULL,
  `od` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `contents` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `file_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idx`),
  KEY `idx` (`idx`),
  KEY `idx_2` (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='게시판' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 테이블 구조 `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `cate` char(20) NOT NULL,
  `od` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `file` varchar(200) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  `thumb_name` varchar(200) NOT NULL,
  PRIMARY KEY (`idx`),
  KEY `idx` (`idx`),
  KEY `idx_2` (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='사진첩' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

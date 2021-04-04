-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Apr 22, 2018 at 10:38 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `stock_mat`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `material`
-- 

CREATE TABLE `material` (
  `id_mat` int(10) NOT NULL auto_increment,
  `type_mat` varchar(5) NOT NULL COMMENT '1=วัสดุ, 2=อุปกรณ์',
  `name_material` varchar(255) NOT NULL,
  `id_unit` varchar(5) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `stock_qty` int(10) NOT NULL,
  `reorder_point` int(10) NOT NULL,
  PRIMARY KEY  (`id_mat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `material`
-- 

INSERT INTO `material` VALUES (1, '2', 'CANON SELPHY CP 1300 Black', '2', 'product/120418_143339.jpg', 5, 0);
INSERT INTO `material` VALUES (2, '2', 'PS/2 Keyboard LOGITECH (K100) Black', '1', 'product/120418_143421.jpg', 10, 0);
INSERT INTO `material` VALUES (3, '2', 'USB Optical Mouse 45 DEGREE (F-53) Black', '1', 'product/120418_143506.jpg', 10, 0);
INSERT INTO `material` VALUES (4, '2', 'Bluetooth USB ES-388', '1', 'product/120418_143608.jpg', 5, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `order_material`
-- 

CREATE TABLE `order_material` (
  `id_order` int(10) NOT NULL auto_increment,
  `date_mat` date NOT NULL,
  `id_mat` varchar(5) NOT NULL,
  `num_order` int(5) NOT NULL,
  `ream` varchar(10) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY  (`id_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `order_material`
-- 

INSERT INTO `order_material` VALUES (1, '2018-04-12', '1', 5, '', 0);
INSERT INTO `order_material` VALUES (2, '2018-04-12', '3', 10, '', 0);
INSERT INTO `order_material` VALUES (3, '2018-04-12', '2', 10, '', 0);
INSERT INTO `order_material` VALUES (4, '2018-04-12', '4', 5, '', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `ream`
-- 

CREATE TABLE `ream` (
  `id_ream` int(10) NOT NULL auto_increment,
  `id_mat` varchar(20) collate utf8_unicode_ci NOT NULL,
  `num_ream` varchar(10) collate utf8_unicode_ci NOT NULL COMMENT 'จำนวนเบิก',
  `detail` text collate utf8_unicode_ci NOT NULL,
  `id_user` varchar(20) collate utf8_unicode_ci NOT NULL COMMENT 'ผู้เบิก',
  `status` varchar(2) collate utf8_unicode_ci NOT NULL COMMENT 'Y=อนุมัติ N=ไม่อนุมัติ B=คืน BY=รับคืน BN=ไม่ได้รับ ',
  `date_ream` date NOT NULL,
  `date_back` date NOT NULL,
  PRIMARY KEY  (`id_ream`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `ream`
-- 

INSERT INTO `ream` VALUES (1, '1', '1', 'พิมพ์งาน', '2', 'BY', '2018-04-12', '2018-04-12');
INSERT INTO `ream` VALUES (2, '3', '3', 'สำรอง', '1', '', '2018-04-12', '0000-00-00');

-- --------------------------------------------------------

-- 
-- Table structure for table `unit`
-- 

CREATE TABLE `unit` (
  `id_unit` int(10) NOT NULL auto_increment,
  `name_unit` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_unit`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `unit`
-- 

INSERT INTO `unit` VALUES (1, 'ชิ้น');
INSERT INTO `unit` VALUES (2, 'เครื่อง');
INSERT INTO `unit` VALUES (3, 'เส้น');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL auto_increment,
  `full_name` varchar(200) collate utf8_unicode_ci NOT NULL,
  `email` varchar(200) collate utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) collate utf8_unicode_ci NOT NULL,
  `username` varchar(20) collate utf8_unicode_ci NOT NULL,
  `password` varchar(20) collate utf8_unicode_ci NOT NULL,
  `status` varchar(10) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (1, 'ADMIN', 'kben_49@hotmail.com', '(085) 445-9901', 'admin', '1234', 'ADMIN');
INSERT INTO `user` VALUES (2, 'user', 'dr@hotmail.com', '(080) 445-1212', 'user', '1234', 'USER');

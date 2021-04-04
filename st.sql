-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 17, 2017 at 02:19 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `material`
-- 

INSERT INTO `material` VALUES (1, '1', 'ก๊อกบอล SANWA ด้ามแดง 1/2"', '5', 'product/011117_172207.jpg', 30, 10);
INSERT INTO `material` VALUES (2, '1', 'ข้อต่อเกลียวใน 2 ข้าง ทองเหลือง 1/2', '5', 'product/011117_172253.jpg', 10, 10);
INSERT INTO `material` VALUES (3, '2', 'ตลับเมตร Stanley รุ่น Global Tape', '5', 'product/011117_172604.jpg', 10, 3);

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

INSERT INTO `order_material` VALUES (1, '2017-11-01', '1', 20, '', 0);
INSERT INTO `order_material` VALUES (2, '2017-11-01', '2', 10, '', 0);
INSERT INTO `order_material` VALUES (3, '2017-11-01', '3', 10, '', 0);
INSERT INTO `order_material` VALUES (4, '2017-11-03', '1', 10, '', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `ream`
-- 

INSERT INTO `ream` VALUES (6, '1', '3', '22', '1', 'Y', '2017-11-17', '0000-00-00');
INSERT INTO `ream` VALUES (2, '1', '2', 'เปลี่ยนแทนของเก่า', '1', 'Y', '2017-11-01', '0000-00-00');
INSERT INTO `ream` VALUES (3, '3', '1', 'สำรอง', '1', 'BY', '2017-11-01', '2017-11-01');
INSERT INTO `ream` VALUES (5, '1', '5', '1111', '2', '', '2017-11-07', '0000-00-00');
INSERT INTO `ream` VALUES (7, '3', '1', '55', '1', 'BY', '2017-11-17', '2017-11-17');

-- --------------------------------------------------------

-- 
-- Table structure for table `unit`
-- 

CREATE TABLE `unit` (
  `id_unit` int(10) NOT NULL auto_increment,
  `name_unit` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_unit`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `unit`
-- 

INSERT INTO `unit` VALUES (1, 'ชิ้น');
INSERT INTO `unit` VALUES (2, 'เส้น');
INSERT INTO `unit` VALUES (3, 'หุน');
INSERT INTO `unit` VALUES (4, 'แท่ง');
INSERT INTO `unit` VALUES (5, 'อัน');
INSERT INTO `unit` VALUES (6, 'เครื่อง');

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
INSERT INTO `user` VALUES (2, 'tumweb', 'dr@hotmail.com', '(080) 445-1212', 'user', '1234', 'USER');

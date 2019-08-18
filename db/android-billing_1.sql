-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2017 at 08:26 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `android-billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`no`, `id`, `product_id`, `qty`) VALUES
(1, 1, 7, 5),
(2, 1, 8, 5),
(3, 2, 7, 3),
(4, 2, 7, 2),
(5, 3, 7, 2),
(6, 3, 7, 2),
(7, 4, 13, 5),
(8, 5, 15, 2),
(9, 5, 13, 1),
(10, 5, 13, 2),
(11, 6, 14, 5),
(12, 6, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('username', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `unit-price` double NOT NULL,
  `tax` double NOT NULL,
  `stock` int(11) NOT NULL,
  `minimum-stock` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `unit-price`, `tax`, `stock`, `minimum-stock`, `shop_id`) VALUES
(12, 'Shirt', 500, 20, 100, 10, 17),
(13, 'Harddisk', 2000, 10, 189, 30, 26),
(14, 'SMPS', 600, 13, 95, 10, 26),
(15, 'Monitordb', 2000, 13, 10, 5, 26);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `bill-no` int(11) NOT NULL,
  `shop-id` int(11) NOT NULL,
  `purchase-id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer-name` varchar(50) NOT NULL,
  `customer-mob` varchar(50) NOT NULL,
  `day` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`purchase-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`bill-no`, `shop-id`, `purchase-id`, `time`, `customer-name`, `customer-mob`, `day`, `month`, `year`) VALUES
(1, 17, 1, '2017-03-21 09:32:22', 'jijith', '9895624669', 21, '03', 2017),
(2, 17, 2, '2017-03-21 13:03:53', 'ramees', '9446827218', 21, '03', 2017),
(3, 17, 3, '2017-03-21 13:05:16', 'ramees', '9446827218', 21, '03', 2017),
(4, 26, 4, '2017-03-27 14:42:39', 'ramees', '9446827218', 27, '03', 2017),
(5, 26, 5, '2017-03-27 14:45:22', 'ramees', '9446827218', 27, '03', 2017),
(6, 26, 6, '2017-03-27 16:54:12', 'ramees', '9446827218', 27, '03', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `reg.no` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `owner` int(11) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reg.no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`reg.no`, `name`, `category`, `location`, `owner`, `admin`) VALUES
(10, 'os1', 'c1', 'l1', 3, 21),
(11, 'mk hard ', 'hard', 'tirur', 6, 7),
(12, 'KK', 'Eletrical', 'Tirur', 8, 0),
(13, 'MK ', 'Supermarket ', 'Kavilakkkad', 8, 0),
(14, 'KR ', 'Bakery', 'Tirunavaya', 8, 0),
(15, 'metals', 'hardware', 'alathiyur ', 6, 0),
(16, 'pkh', 'sale', 'tirur', 9, 0),
(17, 'metal', 'hardware', 'alingal', 10, 0),
(18, 'COLOUR BALOON', 'Toys', 'Tirur', 8, 0),
(19, 'KISMATH', 'Fancy', 'Alathiyur', 8, 0),
(20, 'Jk', 'Sports', 'Tirur', 6, 0),
(21, 'narayan ', 'hardware ', 'tirur ', 15, 18),
(22, 'narayan ', 'textiles ', 'tirur', 15, 0),
(23, 'narayan ', 'electronics ', 'tirur ', 15, 0),
(24, 'j hard', 'hard', 'tirur', 19, 0),
(25, 'shop 2', 'hardware', 'tirur', 3, 0),
(26, 'ABC computers', 'Computers hardwares', 'Tirur', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `shop_id`, `name`) VALUES
(3, 'o1', 'o1', 'o1@e.com', 'owner', 17, '0'),
(4, 'osu1', 'osp1', 'ose@e.com', 'keeper', 10, 'osn1'),
(5, 'osu2', 'osp2', 'osn2@e.com', 'keeper', 10, 'osn2'),
(6, 'jijith ', 'xxx', 'a@gmail.com', 'owner', 0, '0'),
(7, 'su', 's', 's', 'keeper', 11, 'su'),
(8, 'Messi', 'Messi', '', 'owner', 0, '0'),
(9, 'rafeeq', '1234', 'rafeeq@mail.com', 'owner', 0, '0'),
(11, 'samad', 'samad', 'samad', 'keeper', 17, 'samad'),
(12, 'Kaka', 'Kaka', '', 'keeper', 12, 'Riyas'),
(13, 'Nani', 'Nani', '', 'owner', 0, '0'),
(14, '99', '99', '', 'keeper', 18, 'Hashir'),
(15, 'narayan', 'narayan ', 'narayan ', 'owner', 0, '0'),
(16, 'mon', 'mon', 'mon', 'keeper', 21, 'mon'),
(17, 'mol', 'mol', 'mol', 'keeper', 21, 'mol'),
(18, 'sura ', 'sura ', 'sura ', 'keeper', 21, 'sura '),
(19, 'j', 'j', 'j', 'owner', 0, '0'),
(20, 'i', 'i', 'i', 'keeper', 24, 'i'),
(21, 'j', 'j', 'jbnnk', 'keeper', 10, 'jkjkk'),
(22, '', '', '', 'owner', 0, '0'),
(23, 'ABC', '123', '', 'owner', 0, '0'),
(24, 'ABCD', '1234', '', 'owner', 0, '0'),
(25, 'AB', '12345', '', 'owner', 0, '0'),
(26, 'nishad ', 'nishad', 'nishad', 'owner', 0, '0'),
(27, 'Messi', 'Messi', 'Messi', 'owner', 0, '0'),
(28, 'Jiji', 'Jiji', 'Jiji', 'keeper', 26, 'Jiji');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

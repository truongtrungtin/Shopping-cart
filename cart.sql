-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 05:36 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--
CREATE DATABASE IF NOT EXISTS `cart` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cart`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `CODE` varchar(50) NOT NULL,
  `BRAND` int(11) NOT NULL,
  `NAME` varchar(1024) NOT NULL,
  `PRICE` decimal(18,0) NOT NULL,
  `QUANTITY` int(11) NOT NULL DEFAULT 0,
  `IMAGE` varchar(256) NOT NULL DEFAULT 'default.jpg',
  `CATEGORYID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `CODE`, `BRAND`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE`, `CATEGORYID`) VALUES
(1, 'LOG102', 1, 'Logitech G102', '224000', 45, 'LogitechG102.png', 1),
(2, 'LOG502H', 1, 'Logitech G502 Hero', '870000', 9, 'LogitechG502HERO.png', 1),
(3, 'IP11PM', 2, 'Iphone 11 Pro Max', '23000000', 16, 'Iphone11ProMax.jpg', 2),
(4, 'GWS46', 3, 'Samsung Galaxy Watch 46mm Silver', '2000000', 8, 'Samsung-GalaxyWatch-46mm-Silver-1-3x.jpg', 3),
(5, 'AWS540', 2, 'Apple Watch Series 5', '12000000', 3, 'Apple-Watch-Series-5-40mm-Space-Gray-Black-Band-frontimage.jpg', 3),
(6, 'AWS338', 2, 'Apple Aatch Series 3 ', '9800000', 10, 'apple-watch3-38-blackband-spacegrayaluminum-1-3x.jpg', 3),
(7, 'SGWA2', 3, 'Galaxy Watch Active 2', '7600000', 13, 'Samsung-Galaxy-Watch-Active2-44mm-Gold-leftimage.jpg', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `carts`
-- (See below for the actual view)
--
CREATE TABLE `carts` (
`ID` int(11)
,`USERNAME` varchar(50)
,`CODE` varchar(50)
,`SUPPLIER` varchar(256)
,`CATEGORY` varchar(256)
,`NAME` varchar(1024)
,`USERID` int(11)
,`INVOICENUMBER` int(50)
,`ORDERDATE` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cate_ID` int(11) NOT NULL,
  `Cate_Name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cate_ID`, `Cate_Name`) VALUES
(1, 'Mouse'),
(2, 'Phone'),
(3, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `ID` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  `PRODUCTID` int(11) NOT NULL,
  `INVOICENUMBER` int(50) NOT NULL,
  `ORDERDATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `ID` int(11) NOT NULL,
  `SKEY` varchar(50) NOT NULL,
  `SVALUE` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `SKEY`, `SVALUE`) VALUES
(1, 'LASTINVOICENUMBER', '28');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supp_ID` int(11) NOT NULL,
  `Supp_Name` varchar(256) NOT NULL,
  `Supp_Phone` varchar(256) NOT NULL,
  `Supp_Address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supp_ID`, `Supp_Name`, `Supp_Phone`, `Supp_Address`) VALUES
(1, 'Logitech', '0698425468', 'Lausanne, Thụy Sĩ'),
(2, 'Apple', '0945875462', 'Cupertino, California'),
(3, 'SamSung', '05648754545', 'Samsung Town, Seocho-gu, Seoul.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `LASTNAME` varchar(50) NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` varchar(50) NOT NULL DEFAULT 'CLIENT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `LASTNAME`, `PHONE`, `EMAIL`, `USERNAME`, `PASSWORD`, `ROLE`) VALUES
(1, 'ADMIN', '', '0943250607', 'a00_n00reply@gmail.com', 'admin', '$2y$10$pOHezwJZdVbD1sJvi3JnIu9upouc6a3bpKmSOXWGdfQB1wam9Zs8q', 'ADMIN'),
(7, 'Client', '', '0943250699', 'client@gmail.com', 'client', '$2y$10$dfIj8hm51OawiLNIWx8/s.CLMLbcqUY6eIWJFjTj9RWQSLIkaOoke', 'CLIENT');

-- --------------------------------------------------------

--
-- Structure for view `carts`
--
DROP TABLE IF EXISTS `carts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `carts`  AS  select `s`.`ID` AS `ID`,`u`.`USERNAME` AS `USERNAME`,`a`.`CODE` AS `CODE`,`su`.`Supp_Name` AS `SUPPLIER`,`ca`.`Cate_Name` AS `CATEGORY`,`a`.`NAME` AS `NAME`,`u`.`ID` AS `USERID`,`s`.`INVOICENUMBER` AS `INVOICENUMBER`,`s`.`ORDERDATE` AS `ORDERDATE` from ((((`order` `s` join `users` `u` on(`s`.`USERID` = `u`.`ID`)) join `products` `a` on(`s`.`PRODUCTID` = `a`.`ID`)) join `supplier` `su` on(`a`.`BRAND` = `su`.`Supp_ID`)) join `category` `ca` on(`a`.`CATEGORYID` = `ca`.`Cate_ID`)) order by `s`.`INVOICENUMBER` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CODE` (`CODE`),
  ADD KEY `fk_cate` (`CATEGORYID`),
  ADD KEY `fk_supp` (`BRAND`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cate_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_sale_products` (`PRODUCTID`),
  ADD KEY `fk_sale_users` (`USERID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `SKEY` (`SKEY`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supp_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `PHONE` (`PHONE`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`CATEGORYID`) REFERENCES `category` (`Cate_ID`),
  ADD CONSTRAINT `fk_supp` FOREIGN KEY (`BRAND`) REFERENCES `supplier` (`Supp_ID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_sale_products` FOREIGN KEY (`PRODUCTID`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `fk_sale_users` FOREIGN KEY (`USERID`) REFERENCES `users` (`ID`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table products
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'cart', 'products', '{\"sorted_col\":\"`CATEGORYID` ASC\"}', '2019-11-21 09:48:30');

--
-- Metadata for table carts
--

--
-- Metadata for table category
--

--
-- Metadata for table order
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'cart', 'order', '[]', '2019-11-21 15:55:16');

--
-- Metadata for table settings
--

--
-- Metadata for table supplier
--

--
-- Metadata for table users
--

--
-- Metadata for database cart
--

--
-- Dumping data for table `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('cart', 'cart.products', 'BRAND', 'cart', 'cart.supplier', 'Supp_ID'),
('cart', 'cart.products', 'CATEGORYID', 'cart', 'cart.category', 'Cate_ID');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

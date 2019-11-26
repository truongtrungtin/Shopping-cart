-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 04:01 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `carts`
-- (See below for the actual view)
--
CREATE TABLE `carts` (
`INVOICENUMBER` int(11)
,`ORDERDATE` datetime
,`USERNAME` varchar(50)
,`USERID` int(11)
,`CODE` varchar(50)
,`NAME` varchar(1024)
,`PRICE` decimal(18,0)
,`QUANTITY` int(11)
,`IMAGE` varchar(256)
,`SUPPLIER` varchar(256)
,`CATEGORY` varchar(256)
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
(3, 'Watch'),
(4, 'Bag'),
(5, 'Gundam'),
(6, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `INVOICENUMBER` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  `ORDERDATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`INVOICENUMBER`, `USERID`, `ORDERDATE`) VALUES
(1, 1, '2019-11-26 00:00:00'),
(2, 1, '2019-11-26 00:00:00'),
(3, 1, '2019-11-26 00:00:00'),
(4, 1, '2019-11-26 00:00:00'),
(5, 1, '2019-11-26 00:00:00'),
(6, 1, '2019-11-26 00:00:00'),
(7, 1, '2019-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `ID` int(11) NOT NULL,
  `INVOICENUMBER` int(11) NOT NULL,
  `PRODUCTID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`ID`, `INVOICENUMBER`, `PRODUCTID`, `QUANTITY`) VALUES
(1, 1, 2, 1),
(2, 1, 2, 1),
(3, 2, 1, 1),
(4, 2, 4, 1),
(5, 2, 7, 1),
(6, 4, 2, 1),
(7, 4, 3, 1),
(8, 4, 5, 1),
(9, 5, 1, 1),
(10, 5, 1, 1),
(11, 6, 2, 1),
(12, 7, 2, 1),
(13, 7, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `CODE` varchar(50) NOT NULL,
  `SUPPLIERID` int(11) NOT NULL,
  `NAME` varchar(1024) NOT NULL,
  `PRICE` decimal(18,0) NOT NULL,
  `QUANTITY` int(11) NOT NULL DEFAULT 0,
  `IMAGE` varchar(256) NOT NULL DEFAULT 'default.jpg',
  `CATEGORYID` int(11) NOT NULL,
  `DESCRIPTION` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `CODE`, `SUPPLIERID`, `NAME`, `PRICE`, `QUANTITY`, `IMAGE`, `CATEGORYID`, `DESCRIPTION`) VALUES
(1, 'LOG102', 1, 'Logitech G102', '224000', 29, 'LogitechG102.png', 1, 'GAMING-LEVEL EFFICIENCY: G102 reports at a rate of 1,000 times per second, 8 times faster than standard mice. This means that when clicking or moving the mouse, the reaction on the screen is almost instantaneous.'),
(2, 'LOG502H', 1, 'Logitech G502 Hero', '870000', 13, 'LogitechG502HERO.png', 1, 'G502 HERO features an advanced optical sensor for maximum tracking accuracy, customizable RGB lighting, custom game configurations, from 100 to 16,000 DPI, and repositionable heavy blocks. mind. HERO is our most accurate gaming sensor ever with its next generation precision and comprehensive structure. With the ability to handle the fastest frame rates, HERO is capable of creating 400+ IPS in the DPI range of 100 - 16,000 with the ability to smooth, filter or accelerate. HERO achieves the highest level of precision and the most consistent sensitivity ever. Be sure to customize and correct your DPI settings with Logitech G HUB.'),
(3, 'IP11PM', 2, 'Iphone 11 Pro Max', '23000000', 19, 'Iphone11ProMax.jpg', 2, 'iPhone 11 Pro Max chắc chắn là chiếc điện thoại mà ai cũng ao ước khi sở hữu những tính năng xuất sắc nhất, đặc biệt là camera và pin.\r\n Được trang bị bộ vi xử lý Apple A13 Bionic, iPhone 11 Pro Max tự tin thể hiện đẳng cấp hiệu năng “Pro”. So với thế hệ trước, Apple A13 Bionic nhanh hơn 20% và tiêu thụ năng lượng ít hơn tới 40% cả về CPU lẫn GPU. iPhone 11 Pro Max mạnh mẽ vượt trội khi đặt cạnh bất cứ đối thủ nào trên thị trường hiện nay. Mọi tác vụ kể cả những tựa game nặng nhất cũng đều được thể hiện trơn tru, mượt mà trên iPhone 11 Pro Max 64GB.\r\n Bạn đã từng thấy iPhone Xs Max có thời lượng pin tốt đến mức nào, nhưng đó chưa phải là tất cả. iPhone 11 Pro Max là chiếc iPhone có thời lượng pin tốt nhất từ trước đến nay, thậm chí còn vượt xa khi so với iPhone Xs Max. Thời gian sử dụng của iPhone 11 Pro Max dài hơn 5 giờ, cho phép bạn thoải mái làm tất cả những điều mình thích. Kết quả này có được nhờ sự kết nối ăn khớp giữa phần cứng (bao gồm pin, chip, màn hình) và hệ điều hành mới. Ấn tượng hơn nữa, với sạc nhanh 18W đi kèm, bạn chỉ mất 30 phút sạc cho 50% pin. Luôn đầy đủ năng lượng và sẵn sàng đương đầu với mọi thử thách, đó là iPhone 11 Pro Max.'),
(4, 'GWS46', 3, 'Samsung Galaxy Watch 46mm Silver', '2000000', 19, 'Samsung-GalaxyWatch-46mm-Silver-1-3x.jpg', 3, 'Liền mạch mọi trải nghiệm. Tận hưởng trọn vẹn các tính năng thông minh vượt trội được gói gọn trong thiết kế lịch lãm, cổ điển, mang đậm nét đẹp của chiếc đồng hồ truyền thống. Kết nối cả thế giới xung quanh bạn với Galaxy Watch.\r\n Tận hưởng hơi thở cổ điển của chiếc đồng hồ truyền thống với hiệu ứng ánh sáng và độ sâu ấn tượng từ các kiểu mặt hiển thị khác nhau của Galaxy Watch. Thiết kế màn hình tròn kết hợp giao diện kim đồng hồ mang đến cho bạn trải nghiệm đeo chân thực, thu hút mọi ánh nhìn.\r\n Thoải mái lựa chọn Galaxy Watch hỗ trợ Bluetooth hoặc mạng LTE. Tuỳ chỉnh mặt đồng hồ hiển thị, sẵn sàng trải nghiệm Galaxy Watch theo phong cách riêng bạn với phiên bản 42mm Vàng Ánh Hồng, Đen Huyền Bí hay tạo dấu ấn cá nhân với phiên bản 46mm Bạc Sang Trọng.\r\n Sử dụng Galaxy Watch như một phụ kiện thời trang sang trọng và nổi bật, phù hợp hoàn hảo cho mọi sự kiện. Linh hoạt thay đổi giữa dây đeo silicone năng động hoặc các phiên bản dây đeo 20 - 22m lần lượt cho dòng 42 - 46mm theo sở thích riêng bạn.'),
(5, 'AWS540', 2, 'Apple Watch Series 5', '12000000', 18, 'Apple-Watch-Series-5-40mm-Space-Gray-Black-Band-frontimage.jpg', 3, 'Tiếp nối sự thành công của Apple Watch series, Apple lại tiếp tục cho ra mắt phiên bản mới trong năm nay của mình với tên gọi Apple Watch Series 5. Qua mỗi sản phẩm, mẫu smartwatch của Apple ngày càng hoàn thiện hơn và cũng mang đến nhiều tính năng giá trị, hữu ích hơn cho người dùng.\r\n Tương tự như phiên bản kế nhiệm, Apple Watch Series 5 cũng có hai phiên bản lần lượt là Apple Watch 5 40mm và 44mm. Đối với phiên bản 40mm thì sẽ có đường kính mặt đồng hồ nhỏ hơn phù hợp với những người có cổ tay bé, hay những người dùng là nữ. Còn đối với phiên bản Apple Watch Series 5 44m thì chắc hẳn sẽ phù hợp với người dùng là nam và có cổ tay lớn hơn.\r\n Apple Watch Series 5 sẽ có thiết kế giống với Apple Watch Series 4, không sử dụng mặt đồng hồ tròn như những tin đồn gần đây. Đi cùng là phần khung kim loại không những cho cảm giác chắc chắn chống đập tốt mà còn được tích hợp công nghệ mới giúp phần khung mỏng hơn và người dùng sẽ không còn có cảm giác khó chịu trong thời gian dài sử dụng.'),
(6, 'AWS338', 2, 'Apple Aatch Series 3 ', '9800000', 20, 'apple-watch3-38-blackband-spacegrayaluminum-1-3x.jpg', 3, 'Apple Watch 3 vẫn mang thiết kế đặc trưng của Apple Watch đời trước, mặt kính vuông vắn làm từ Sapphire Crystal kết hợp với lớp vỏ đồng hồ bằng lớp vỏ hợp kim nhôm màu xám. Mặt dưới được hoàn thiện từ gốm ceramic bền bỉ được đặt cụm cảm biến có vai trò để đo nhịp tim. Tổng thể mang lại cho Apple Watch 3 38mm toát lên vẻ đẹp khó cưỡng, thu hút mọi ánh nhìn.\r\nMàn hình Apple Watch 3 có kích thước 1.65 inch, màn hình cảm ứng Force Touch tương tự như cảm ứng lực trên iPhone. Đi cùng là tấm nền AMOLED cho khả năng tiết kiệm pin, chất lượng hiển thị cũng được nâng cao hơn hẳn so với màn hình IPS góc nhìn rộng, màu sắc có chiều sâu hơn. Bên cạnh đó, độ phân 272 x 340 pixels cho chất lượng hình ảnh mịn và chi tiết, độ tương phản tốt khi ở ngoài trời.\r\nApple Watch 3 được sử dụng chip lõi kép mới có hiệu năng mạnh hơn 70% và tiết kiệm pin hơn 40% so với phiên bản cũ. Apple Watch 3 chạy hệ điều hành watchOS 4 mới, có trợ lý giọng nói Siri, nhiều tính năng luyện tập hơn và bao gồm nền tảng GymKit để người dùng có thể đồng bộ đồng hồ với thiết bị tập thể dục. Hơn nữa, thời lượng pin cũng được nâng cấp đáng kể lên đến 18 tiếng.'),
(7, 'SGWA2', 3, 'Galaxy Watch Active 2', '7600000', 19, 'Samsung-Galaxy-Watch-Active2-44mm-Gold-leftimage.jpg', 3, 'iPhone 11 Pro Max chắc chắn là chiếc điện thoại mà ai cũng ao ước khi sở hữu những tính năng xuất sắc nhất, đặc biệt là camera và pin.\r\n Được trang bị bộ vi xử lý Apple A13 Bionic, iPhone 11 Pro Max tự tin thể hiện đẳng cấp hiệu năng “Pro”. So với thế hệ trước, Apple A13 Bionic nhanh hơn 20% và tiêu thụ năng lượng ít hơn tới 40% cả về CPU lẫn GPU. iPhone 11 Pro Max mạnh mẽ vượt trội khi đặt cạnh bất cứ đối thủ nào trên thị trường hiện nay. Mọi tác vụ kể cả những tựa game nặng nhất cũng đều được thể hiện trơn tru, mượt mà trên iPhone 11 Pro Max 64GB.\r\n Bạn đã từng thấy iPhone Xs Max có thời lượng pin tốt đến mức nào, nhưng đó chưa phải là tất cả. iPhone 11 Pro Max là chiếc iPhone có thời lượng pin tốt nhất từ trước đến nay, thậm chí còn vượt xa khi so với iPhone Xs Max. Thời gian sử dụng của iPhone 11 Pro Max dài hơn 5 giờ, cho phép bạn thoải mái làm tất cả những điều mình thích. Kết quả này có được nhờ sự kết nối ăn khớp giữa phần cứng (bao gồm pin, chip, màn hình) và hệ điều hành mới. Ấn tượng hơn nữa, với sạc nhanh 18W đi kèm, bạn chỉ mất 30 phút sạc cho 50% pin. Luôn đầy đủ năng lượng và sẵn sàng đương đầu với mọi thử thách, đó là iPhone 11 Pro Max.'),
(8, 'LOG304', 1, 'Logitech G304', '870000', 27, 'LogitechG304.png', 1, 'Chuột chơi game Logitech G304 Wireless (Đen) được thiết kế và sản xuất bởi hãng Logitech - là 1 doanh nghiệp toàn cầu chuyên về sản xuất và cung ứng các thiết bị ngoại vi, phụ kiện,thiết bị âm thanh và gaming gear được thành lập vào tháng 10 năm 1981 và có trụ sở tại Thụy Sĩ.\r\n\r\nChuột chơi game Logitech G304 Wireless (Đen) được thiết kế chuyên dùng cho các game thủ với tông màu đen mạnh mẽ, có kích cỡ 116,6mm x 62,15mm x 38,2mm và khối lượng 99g vừa tay giúp cho các game thủ có thể dễ dàng làm quen với chuột sau 1, 2 giờ sử dụng. Chuột có thiết kế khung đối xứng phù hợp với thói quen sử dụng chuột bằng tay trái hoặc phải của người dùng.\r\nChuột chơi game Logitech G304 Wireless (Đen) được thiết kế với công nghệ đầu thu nano LIGHTSPEED tiên tiến có thời gian phản hồi chỉ 1ms cùng khả năng phản ứng mượt mà và chính xác giúp cho việc trải nghiệm game liền mạch, không bị trễ.\r\n\r\nChuột chơi game Logitech G304 Wireless (Đen) được trang bị với cảm biến HERO mới nhất do Logitech phát triển có hiệu suất cao gấp 10 lần so với những bộ cảm biến trước đó, mô phỏng đúng theo cử động của tay giúp cho chuột có tốc độ DPI lên đến 12000 hỗ trợ cho các game thủ có thể xử lý nhanh, chính xác hơn.'),
(9, 'SSSA', 3, 'SamSung S Action', '850000', 20, 'SamsungSAction.png', 1, 'Chuột S Action của Samsung được thiết kế để cung cấp cho bạn sự thoải mái tối đa, dù có sử dụng chuột trong một thời gian dài cũng không cảm thấy mỏi cổ tay.\r\nBluetooth của chuột S Action kết hợp tất cả các tiện ích của kết nối không dây với độ chính xác của một con chuột có dây. Với phạm vi đa hướng 10m, hỗ trợ bluetooth 3.0, S Action Mouse cung cấp kết nối liền mạch, kiểm soát đầy đủ và độ chính xác cao.\r\nChuột Samsung S Action được cài đặt chế độ điều khiển App và Multi Window. Chỉ cần ấn nút S Action, các ứng dụng gần đây được thực hiên sẽ hiện ra màn hình và bạn có thể nhanh chóng xem bất kỳ cửa sổ nào đang mở chỉ trong vài giây.\r\nKết hợp giữa quang học và laser, công nghệ Blue Trace đảm bảo độ chính xác tuyệt vời và cho phép sử dụng được trên bất kỳ bề mặt nào như gỗ, đá granite và thảm (công nghệ blue trace có thể không hoạt động được trên một số mặt kính hoặc bề mặt phản chiếu)'),
(10, 'GDRX0', 4, 'PG RX-0 Unicorn Gundam', '5999000', 20, 'TgDWTC_simg_de2fe0_500x500_maxb.jpg', 5, 'The above model is manufactured by Japanese firm Bandai. With a long history (since 1950), Bandai is a famous manufacturer specializing in Japanese toys. Since 1980, the company has become one of the leaders in the toy industry in Japan. In 2008, Bandai became the third largest manufacturer in the world after Mattel and Hasbro. Assembly model is a famous product line of the company.\r\nThe RX-0 Unicorn Gundam is controlled by Banagher Links, which appears in the Mobile Suit Gundam Unicorn. head. Under this mode, Unicorn\'s equipment is quite light. Destroy Mode is the shape of Unicorn when the NT-D system is activated. In this form, the system automatically scans the pilot\'s mind and transmits it directly to the control system. In other words, Unicorn will be completely controlled by the pilot\'s mind. Unicorn\'s performance spiked when NT-D was activated thanks to the activation of 6 thrusters. NT-D system can automatically activate when it detects Newtype.');

-- --------------------------------------------------------

--
-- Stand-in structure for view `products`
-- (See below for the actual view)
--
CREATE TABLE `products` (
`ID` int(11)
,`CATEGORYID` int(11)
,`DESCRIPTION` varchar(5000)
,`IMAGE` varchar(256)
,`NAME` varchar(1024)
,`CODE` varchar(50)
,`QUANTITY` int(11)
,`PRICE` decimal(18,0)
,`SUPPLIERID` int(11)
,`SUPPLIER` varchar(256)
,`CATEGORY` varchar(256)
);

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
(1, 'LASTINVOICENUMBER', '7');

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
(1, 'Logitech', '0945875464', 'Lausanne, Thụy Sĩ'),
(2, 'Apple', '0698425468', 'Cupertino, California'),
(3, 'SamSung', '05648754545', 'Samsung Town, Seocho-gu, Seoul.'),
(4, 'Daban', '0945367845', 'Quận 10, Hồ Chí Minh');

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
  `ROLE` varchar(50) DEFAULT 'CLIENT'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `LASTNAME`, `PHONE`, `EMAIL`, `USERNAME`, `PASSWORD`, `ROLE`) VALUES
(1, 'ADMIN', '', '0943250607', 'a00_n00reply@gmail.com', 'admin', 'admin', 'ADMIN'),
(2, 'client', '', '09090909', 'client@gmail.com', 'client', '123456', 'CLIENT');

-- --------------------------------------------------------

--
-- Structure for view `carts`
--
DROP TABLE IF EXISTS `carts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `carts`  AS  select `o`.`INVOICENUMBER` AS `INVOICENUMBER`,`o`.`ORDERDATE` AS `ORDERDATE`,`u`.`USERNAME` AS `USERNAME`,`u`.`ID` AS `USERID`,`p`.`CODE` AS `CODE`,`p`.`NAME` AS `NAME`,`p`.`PRICE` AS `PRICE`,`od`.`QUANTITY` AS `QUANTITY`,`p`.`IMAGE` AS `IMAGE`,`su`.`Supp_Name` AS `SUPPLIER`,`ca`.`Cate_Name` AS `CATEGORY` from (((((`order` `o` join `users` `u` on(`o`.`USERID` = `u`.`ID`)) join `order_detail` `od` on(`o`.`INVOICENUMBER` = `od`.`INVOICENUMBER`)) join `product` `p` on(`p`.`ID` = `od`.`PRODUCTID`)) join `supplier` `su` on(`p`.`SUPPLIERID` = `su`.`Supp_ID`)) join `category` `ca` on(`p`.`CATEGORYID` = `ca`.`Cate_ID`)) order by `o`.`INVOICENUMBER` ;

-- --------------------------------------------------------

--
-- Structure for view `products`
--
DROP TABLE IF EXISTS `products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products`  AS  select `p`.`ID` AS `ID`,`p`.`CATEGORYID` AS `CATEGORYID`,`p`.`DESCRIPTION` AS `DESCRIPTION`,`p`.`IMAGE` AS `IMAGE`,`p`.`NAME` AS `NAME`,`p`.`CODE` AS `CODE`,`p`.`QUANTITY` AS `QUANTITY`,`p`.`PRICE` AS `PRICE`,`p`.`SUPPLIERID` AS `SUPPLIERID`,`su`.`Supp_Name` AS `SUPPLIER`,`ca`.`Cate_Name` AS `CATEGORY` from ((`product` `p` join `supplier` `su` on(`p`.`SUPPLIERID` = `su`.`Supp_ID`)) join `category` `ca` on(`p`.`CATEGORYID` = `ca`.`Cate_ID`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cate_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`INVOICENUMBER`),
  ADD KEY `fk_sale_users` (`USERID`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_product` (`PRODUCTID`),
  ADD KEY `fk_INVOICENUMBER` (`INVOICENUMBER`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CODE` (`CODE`),
  ADD KEY `fk_cate` (`CATEGORYID`),
  ADD KEY `fk_supp` (`SUPPLIERID`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `INVOICENUMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_sale_users` FOREIGN KEY (`USERID`) REFERENCES `users` (`ID`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_INVOICENUMBER` FOREIGN KEY (`INVOICENUMBER`) REFERENCES `order` (`INVOICENUMBER`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`PRODUCTID`) REFERENCES `product` (`ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_cate` FOREIGN KEY (`CATEGORYID`) REFERENCES `category` (`Cate_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_supp` FOREIGN KEY (`SUPPLIERID`) REFERENCES `supplier` (`Supp_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2019 at 04:11 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meal-debit-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int(7) NOT NULL AUTO_INCREMENT,
  `customerIC` varchar(12) NOT NULL,
  `customerName` varchar(25) NOT NULL,
  `customerPhone` varchar(11) NOT NULL,
  `customerEmail` varchar(25) NOT NULL,
  `customerBalance` decimal(32,2) NOT NULL DEFAULT '0.00',
  `customerUsername` varchar(25) NOT NULL,
  `customerPassword` varchar(255) NOT NULL,
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=2000030 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerIC`, `customerName`, `customerPhone`, `customerEmail`, `customerBalance`, `customerUsername`, `customerPassword`) VALUES
(2000001, '680632045744', 'qwq', '0124422788', 'qwq@mail.com', '19238.00', 'qwq', 'a078b88157431887516448c823118d83'),
(2000002, '704379038701', 'Dick', '0106023523', 'Dick3044@mail.com', '0.00', 'Dick3044', '3fb5020720d2591c916fa9f15d38655b'),
(2000003, '727577227773', 'Yumna', '0115019812', 'Yumna7773@mail.com', '20.00', 'Yumna7773', '027a29e9b9907604b314e8baa6a75997'),
(2000004, '679523142023', 'Alex', '0190775140', 'Alex2446@mail.com', '1953.00', 'Alex2446', '0c4a0bf0fb9e6472a4aa768c84da7f94'),
(2000005, '728903393896', 'Eloise', '0108488702', 'Eloise5133@mail.com', '0.00', 'Eloise5133', 'bfcf1ed226c51a578cf24a0cf8a60f71'),
(2000006, '868616470861', 'Alexander', '0173728218', 'Alexander9855@mail.com', '0.00', 'Alexander9855', '3769156a769a8be5f2d120629616ad2a'),
(2000007, '853026524569', 'Gay', '0111611974', 'Gay7333@mail.com', '0.00', 'Gay7333', 'eb794edc9e007b99ed36b4a43c19355e'),
(2000008, '632602648077', 'Thomas', '0166068529', 'Thomas9132@mail.com', '0.00', 'Thomas9132', '5a538bb6439cc5c5836626a8e43bc79a'),
(2000009, '823862248164', 'Corinne', '0176919473', 'Corinne3384@mail.com', '0.00', 'Corinne3384', 'b4a27a32552a209bcaa23df392d85224'),
(2000010, '898403290441', 'Matthew', '0187584239', 'Matthew8022@mail.com', '0.00', 'Matthew8022', '762ded08397d6ea7f23bacc225fdc874'),
(2000011, '744348543793', 'Hannah', '0196760103', 'Hannah2007@mail.com', '0.00', 'Hannah2007', 'd0b28b3f1ed80c9fe9cff69d47008edb'),
(2000012, '896655303939', 'Adolfo', '0141961269', 'Adolfo3556@mail.com', '0.00', 'Adolfo3556', '2650f7401dd03ab4c7dea77d3573247f'),
(2000013, '872449628656', 'Alex', '0162620863', 'Alex9791@mail.com', '0.00', 'Alex9791', '08a0d94c1d9eb2519076b02b65a24331'),
(2000014, '723387477154', 'Christopher', '0175115820', 'Christopher9036@mail.com', '0.00', 'Christopher9036', 'b1e577058437379d87c7af9e097d574a'),
(2000015, '636759567043', 'April', '0155018392', 'April9132@mail.com', '0.00', 'April9132', '52ac358d3c1cfaa1d98bad4a685f3ec0'),
(2000016, '825554957795', 'Oliver', '0180309636', 'Oliver9715@mail.com', '0.00', 'Oliver9715', 'c249af3a84cbeeaaae59ce4b73deb939'),
(2000017, '751275682906', 'Abby', '0138422853', 'Abby8856@mail.com', '0.00', 'Abby8856', 'ffe4408004d283fc24a2a1b411bf76cc'),
(2000018, '726576928566', 'Richard', '0152203022', 'Richard3550@mail.com', '0.00', 'Richard3550', '654577e4523acb026e84f8b8fa22dbd7'),
(2000019, '684513546978', 'Alexandra', '0174531090', 'Alexandra6647@mail.com', '0.00', 'Alexandra6647', 'c913fec64b68f3760898527b755978b5'),
(2000020, '824943158655', 'Andrew', '0158857657', 'Andrew9411@mail.com', '0.00', 'Andrew9411', 'db66259e423ad62136401b554a7fa689'),
(2000021, '777599108760', 'Emily', '0198124512', 'Emily7582@mail.com', '0.00', 'Emily7582', '428956278a3c933511ee83d88eafa7ea'),
(2000022, '904502482232', 'asa', '0134526758', 'asa@mail.com', '0.00', 'asa', '457391c9c82bfdcbb4947278c0401e41'),
(2000023, '769201921551', 'William8731', '0186882046', 'William8731@mail.com', '0.00', 'William8731', 'cf83acb0590e4fde65c6b1dfb762bceb'),
(2000024, '801948490609', 'Abigail2546', '0156740673', 'Abigail2546@mail.com', '0.00', 'Abigail2546', '3b2f43682db194c42fc1a3e4237c8325'),
(2000025, '830824296863', 'Bailey2855', '0191803265', 'Bailey2855@mail.com', '56.30', 'Bailey2855', 'adea0d2f6b7441075ce263cb2170d5a5'),
(2000026, '859668265744', 'Alexander7982', '0113610063', 'Alexander7982@mail.com', '0.00', 'Alexander7982', 'e3f7e731fb0bc2be633647a30028ef03'),
(2000027, '889795649241', 'Julianna6803', '0135672659', 'Julianna6803@mail.com', '16.00', 'Julianna6803', 'fc14bff56b47b0328734b2304b57d60d'),
(2000028, '838009371254', 'Bailey2807', '0153148293', 'Bailey2807@mail.com', '0.00', 'Bailey2807', 'cf32fd05921d411c87a91c95d9fdfccd'),
(2000029, '991012015067', 'Tey', '01111765067', 'wjz1012.1999@gmail.com', '5.00', 'weekit', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employeeID` int(7) NOT NULL AUTO_INCREMENT,
  `employeeIC` varchar(12) NOT NULL,
  `employeeName` varchar(25) NOT NULL,
  `employeeRole` int(1) NOT NULL DEFAULT '1',
  `employeePhone` varchar(11) NOT NULL,
  `employeeEmail` varchar(25) NOT NULL,
  `employeeAddress` varchar(128) NOT NULL,
  `employeePassword` int(6) NOT NULL,
  PRIMARY KEY (`employeeID`)
) ENGINE=InnoDB AUTO_INCREMENT=1000003 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `employeeIC`, `employeeName`, `employeeRole`, `employeePhone`, `employeeEmail`, `employeeAddress`, `employeePassword`) VALUES
(1000001, '980721045843', 'Sashihara Rino', 0, '012-8456756', '345_chan@dc.cc', '41, Taman Bersari 1, Jalan Lencong Barat, 53300 Bukit Jalil, Kuala Lumpur', 123456),
(1000002, '980721045843', 'Zul', 1, '012-3628476', 'zul.zul@mail.com', 'something', 654321);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `itemID` int(7) NOT NULL AUTO_INCREMENT,
  `itemName` varchar(32) NOT NULL,
  `itemType` varchar(32) NOT NULL,
  `itemPrice` int(32) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=3000004 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `itemName`, `itemType`, `itemPrice`) VALUES
(3000001, 'Chicken Rice w/o Chicken', 'Meme', 10),
(3000002, 'Char Kuay Teow', 'Noodles', 7),
(3000003, 'Nasi Goreng Pattaya', 'Rice', 8);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `orderID` int(7) NOT NULL AUTO_INCREMENT,
  `transactionID` int(7) NOT NULL,
  `customerID` int(7) DEFAULT NULL,
  `employeeID` int(7) DEFAULT NULL,
  `itemID` int(7) DEFAULT NULL,
  `itemQuantity` int(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `customerID` (`customerID`),
  KEY `employeeID` (`employeeID`),
  KEY `itemID` (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=4000047 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `transactionID`, `customerID`, `employeeID`, `itemID`, `itemQuantity`, `datetime`, `status`, `remark`) VALUES
(4000001, 5000001, 2000001, 1000001, 3000001, 1, '2019-03-12 00:00:00', 0, ''),
(4000040, 5000002, 2000001, 1000001, 3000001, 2, '2019-03-27 14:06:26', 1, '27'),
(4000041, 5000002, 2000001, 1000001, 3000002, 1, '2019-03-27 14:06:26', 1, '27'),
(4000042, 5000003, 2000003, 1000001, 3000001, 1, '2019-03-27 18:16:26', 1, '17'),
(4000043, 5000003, 2000003, 1000001, 3000002, 1, '2019-03-27 18:16:26', 1, '17'),
(4000044, 5000004, 2000004, 1000001, 3000001, 4, '2019-03-27 18:16:56', 1, '47'),
(4000045, 5000004, 2000004, 1000001, 3000002, 1, '2019-03-27 18:16:56', 1, '47'),
(4000046, 5000005, 2000001, 1000001, 3000001, 2, '2019-03-27 18:17:42', 0, '20');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`itemID`) REFERENCES `item` (`itemID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

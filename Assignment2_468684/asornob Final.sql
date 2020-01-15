-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2019 at 02:48 PM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asornob`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--


--
-- Dumping data for table `access`
--


-- --------------------------------------------------------

--
-- Table structure for table `assignment2`
--

CREATE TABLE IF NOT EXISTS `assignment2` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `utasId` varchar(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `depositAmount` int(11) NOT NULL,
  `cardNumber` int(11) NOT NULL,
  `CVV` int(11) NOT NULL,
  `access` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment2`
--

INSERT INTO `assignment2` (`id`, `username`, `utasId`, `email`, `phoneNumber`, `password`, `depositAmount`, `cardNumber`, `CVV`, `access`) VALUES
(25, 'student', 'US1111', 'student@utas.edu.au', '1234', '686f3ee7ebfb313eb78bc34808af3675', 119840, 123, 123, 3),
(26, 'director', 'DB1111', 'director@utas.edu.au', '1234', '686f3ee7ebfb313eb78bc34808af3675', 4000, 1234, 123, 1),
(27, 'lazenbyManager', 'CM2221', 'lazenbyManager@utas.edu.au', '1234', '686f3ee7ebfb313eb78bc34808af3675', 9955, 1234, 1234, 2),
(28, 'refManager', 'CM2222', 'refManager@utas.edu.au', '1234', '686f3ee7ebfb313eb78bc34808af3675', 10000, 1234, 1234, 2),
(29, 'tradeTableManager', 'CM2223', 'tradeTableManager@utas.edu.au', '1234', '686f3ee7ebfb313eb78bc34808af3675', 10000, 1234, 1234, 2),
(34, 'staff', 'CS1111', 'cafeStaff@utas.edu.au', '1234', '686f3ee7ebfb313eb78bc34808af3675', 5000, 1234, 1234, 3),
(35, 'employee', 'UE1111', 'employee@utas.edu.au', '1234', '686f3ee7ebfb313eb78bc34808af3675', 2000, 1234, 1234, 3);


-- --------------------------------------------------------

--
-- Table structure for table `cafe`
--

CREATE TABLE IF NOT EXISTS `cafe` (
  `cafeId` int(11) NOT NULL,
  `cafeName` varchar(255) NOT NULL,
  `cafeManager` varchar(255) NOT NULL,
  `openingTime` time NOT NULL,
  `closingTime` time NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cafe`
--

INSERT INTO `cafe` (`cafeId`, `cafeName`, `cafeManager`, `openingTime`, `closingTime`) VALUES
(1, 'Lazenby', 'lazenbyManager', '10:00:00', '17:00:00'),
(2, 'The ref', 'refManager', '09:00:00', '16:30:00'),
(3, 'Trade table', 'tradeTableManager', '09:45:00', '16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `cafeFood`
--

CREATE TABLE IF NOT EXISTS `cafeFood` (
  `cafeFoodId` int(7) NOT NULL,
  `cafeId` int(11) NOT NULL,
  `foodId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cafeFood`
--

INSERT INTO `cafeFood` (`cafeFoodId`, `cafeId`, `foodId`) VALUES
(53, 1, 5),
(59, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--



--
-- Dumping data for table `countries`
--



-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

---------------------------------------------------

--
-- Table structure for table `masterFoodList`
--

CREATE TABLE IF NOT EXISTS `masterFoodList` (
  `foodId` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masterFoodList`
--

INSERT INTO `masterFoodList` (`foodId`, `foodName`, `price`, `date`) VALUES
(1, 'burger', 12, '2019-05-07 03:11:29'),
(3, 'beefsteak', 15, '2019-05-07 03:13:44'),
(4, 'fishAndChips', 15, '2019-05-07 03:15:53'),
(5, 'chickenBiriyani', 12, '2019-05-07 03:15:53'),
(6, 'beefBiriyani', 15, '2019-05-07 03:15:53'),
(7, 'lambBiriyani', 15, '2019-05-07 03:15:53'),
(8, 'tea', 4, '2019-05-07 03:15:53'),
(9, 'coffee', 5, '2019-05-26 14:00:00'),
(10, 'cookies', 2, '2019-05-27 03:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `staffList`
--

CREATE TABLE IF NOT EXISTS `staffList` (
  `staffId` int(11) NOT NULL,
  `utasId` varchar(11) NOT NULL,
  `staffName` varchar(20) NOT NULL,
  `cafeId` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffList`
--

INSERT INTO `staffList` (`staffId`, `utasId`, `staffName`, `cafeId`) VALUES
(3, 'CS1111', 'LazenbyStaff', 1),
(4, 'CS2222', 'theRefStaff', 2),
(5, 'CS3333', 'tradeTableStaff', 3);

-- --------------------------------------------------------

--
-- 

--
-- Table structure for table `transactionList`
--

CREATE TABLE IF NOT EXISTS `transactionList` (
  `transactionId` int(11) NOT NULL,
  `orderedAmount` int(11) NOT NULL,
  `orderedDatetime` date NOT NULL,
  `paid` varchar(1) NOT NULL,
  `orderDetails` varchar(255) NOT NULL,
  `foodId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--


--
-- Dumping data for table `users`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--


--
-- Indexes for table `assignment2`
--
ALTER TABLE `assignment2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`cafeId`);

--
-- Indexes for table `cafeFood`
--
ALTER TABLE `cafeFood`
  ADD PRIMARY KEY (`cafeFoodId`),
  ADD KEY `cafeId` (`cafeId`),
  ADD KEY `cafeId_2` (`cafeId`),
  ADD KEY `foodId` (`foodId`);

--
-- Indexes for table `countries`
--


--
-- Indexes for table `guestbook`
--


--
-- Indexes for table `KIT202_product`
--

--
-- Indexes for table `masterFoodList`
--
ALTER TABLE `masterFoodList`
  ADD PRIMARY KEY (`foodId`);

--
-- Indexes for table `staffList`
--
ALTER TABLE `staffList`
  ADD PRIMARY KEY (`staffId`),
  ADD KEY `cafeId` (`cafeId`),
  ADD KEY `cafeId_2` (`cafeId`);

--
-- Indexes for table `tb_cart`
--


--
-- Indexes for table `transactionList`
--
ALTER TABLE `transactionList`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `foodId` (`foodId`);

--
-- Indexes for table `users`


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--

--
-- AUTO_INCREMENT for table `assignment2`
--
ALTER TABLE `assignment2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `cafe`
--
ALTER TABLE `cafe`
  MODIFY `cafeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cafeFood`
--
ALTER TABLE `cafeFood`
  MODIFY `cafeFoodId` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `countries`
--

--
-- AUTO_INCREMENT for table `guestbook`
--

--
-- AUTO_INCREMENT for table `masterFoodList`
--
ALTER TABLE `masterFoodList`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `staffList`
--
ALTER TABLE `staffList`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_cart`
--

-- AUTO_INCREMENT for table `transactionList`
--
ALTER TABLE `transactionList`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `users`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cafeFood`
--
ALTER TABLE `cafeFood`
  ADD CONSTRAINT `cafeId` FOREIGN KEY (`cafeId`) REFERENCES `cafe` (`cafeId`),
  ADD CONSTRAINT `foodId` FOREIGN KEY (`foodId`) REFERENCES `masterFoodList` (`foodId`);

--
-- Constraints for table `staffList`
--
ALTER TABLE `staffList`
  ADD CONSTRAINT `staffList_ibfk_1` FOREIGN KEY (`cafeId`) REFERENCES `cafe` (`cafeId`);

--
-- Constraints for table `transactionList`
--
ALTER TABLE `transactionList`
  ADD CONSTRAINT `transactionList_ibfk_1` FOREIGN KEY (`foodId`) REFERENCES `masterFoodList` (`foodId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

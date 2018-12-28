-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2018 at 04:05 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `HotelAppDb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `EMAIL` varchar(300) NOT NULL,
  `Pass` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`EMAIL`, `Pass`) VALUES
('a.beltagy97@gmail.com', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `BlackList`
--

CREATE TABLE `BlackList` (
  `CustID` int(11) NOT NULL,
  `StartDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASS` varchar(255) NOT NULL,
  `TYPE` int(11) NOT NULL DEFAULT '0',
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `EMAIL`, `PASS`, `TYPE`, `Name`) VALUES
(24, 'shams2@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 0, 'Shams Elsayed'),
(25, 'E@h.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'E'),
(26, 'shadoda_2011@hotmail.com', '1a36591bceec49c832079e270d7e8b73', 0, 'shady Elkassas');

-- --------------------------------------------------------

--
-- Table structure for table `CUST_RATING`
--

CREATE TABLE `CUST_RATING` (
  `CUST_ID` int(11) NOT NULL,
  `HOTEL_ID` int(11) NOT NULL,
  `startDate` date NOT NULL DEFAULT '0000-00-00',
  `endDate` date NOT NULL DEFAULT '0000-00-00',
  `RATING` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CUST_RATING`
--

INSERT INTO `CUST_RATING` (`CUST_ID`, `HOTEL_ID`, `startDate`, `endDate`, `RATING`) VALUES
(24, 19, '2018-12-24', '2018-12-25', 10),
(24, 20, '2018-12-24', '2018-12-25', 9),
(24, 21, '2018-12-24', '2018-12-25', 6);

-- --------------------------------------------------------

--
-- Table structure for table `Facilities`
--

CREATE TABLE `Facilities` (
  `ID` int(11) NOT NULL,
  `Hotel_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Descr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Facilities`
--

INSERT INTO `Facilities` (`ID`, `Hotel_ID`, `Name`, `Descr`) VALUES
(13, 20, 'Pool', 'Olympic Pool'),
(14, 20, 'Parking', '24hr Parking'),
(15, 19, 'Restaurant ', 'A 2 Michelin star');

-- --------------------------------------------------------

--
-- Table structure for table `FacilitiesImage`
--

CREATE TABLE `FacilitiesImage` (
  `FacID` int(11) NOT NULL,
  `PATH` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FacilitiesImage`
--

INSERT INTO `FacilitiesImage` (`FacID`, `PATH`) VALUES
(13, 'http://digital-dental-scan.com/test/views/uploads/pool.jpg'),
(14, 'http://digital-dental-scan.com/test/views/uploads/park.jpg'),
(15, 'http://digital-dental-scan.com/test/views/uploads/rest.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Hotel`
--

CREATE TABLE `Hotel` (
  `ID` int(11) NOT NULL,
  `HNAME` varchar(255) NOT NULL,
  `STARS` int(11) NOT NULL,
  `Owner_ID` int(11) NOT NULL,
  `APPROVAL` int(11) NOT NULL DEFAULT '0',
  `Suspended` int(11) NOT NULL DEFAULT '0',
  `TYPE` int(11) NOT NULL,
  `Location` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Hotel`
--

INSERT INTO `Hotel` (`ID`, `HNAME`, `STARS`, `Owner_ID`, `APPROVAL`, `Suspended`, `TYPE`, `Location`) VALUES
(19, 'Marriott', 5, 6, 1, 0, 1, 26),
(20, 'Hilton Courniche', 4, 6, 1, 0, 1, 31),
(21, 'ElHaram', 2, 6, 1, 0, 0, 32),
(22, 'Four Seasons ', 5, 6, 1, 0, 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `HotelPayment`
--

CREATE TABLE `HotelPayment` (
  `ID` int(11) NOT NULL,
  `HotelID` int(11) NOT NULL,
  `Payment` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `isPaid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `HotelPayment`
--

INSERT INTO `HotelPayment` (`ID`, `HotelID`, `Payment`, `DATE`, `isPaid`) VALUES
(51, 21, 4, '2018-12-24', 1),
(52, 19, 5, '2018-12-24', 1),
(53, 20, 5, '2018-12-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Location`
--

CREATE TABLE `Location` (
  `ID` int(11) NOT NULL,
  `Country` varchar(300) NOT NULL,
  `City` varchar(300) NOT NULL,
  `Street` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Location`
--

INSERT INTO `Location` (`ID`, `Country`, `City`, `Street`) VALUES
(1, 'Egypt', 'alexandria', 'semouha'),
(3, 'Egypt', 'alexandria', 'share3 el na2el w el handasa'),
(4, 'Egypt', 'Cairo', 'maadii'),
(5, 'Egypt', 'Portsaeed', 'sadds'),
(6, 'Egypt', 'Portsaeed', 'ss'),
(7, 'Egypt', 'Portsaeed', 'ss'),
(8, 'eGYPT', '', ''),
(9, 'eGYPT', '', ''),
(10, 'eGYPT', '', ''),
(11, 'ytgf', '', ''),
(12, 'Egypt', '', ''),
(13, 'kjnkj', '', ''),
(14, 'dsj', '', ''),
(15, 'kjasbdn', '', ''),
(16, 'kjasbdn', '', ''),
(17, 'jhbjh', '', ''),
(18, 'eGYPT', '', ''),
(19, 'eGYPTasd', '', ''),
(20, 'eGYPTasd', '', ''),
(21, 'eGYPTasd', 'ADS', 'ADS'),
(22, 'EEE', 'AAAA', 'SDA'),
(23, 'eGYPTasd', 'ADS', 'ADS'),
(24, 'Egypt', 'Alexandria', '3 bahr street'),
(25, 'Egypt', 'Cairo', '90 st 5th settelment '),
(26, 'Egypt', 'alexandria', 'Montaza'),
(27, 'Egypt', 'alexandria', 'Montaza'),
(28, 'france', 'paris', '278 boulevard'),
(29, 'Egypt', 'Cairo', 'Shamsico street'),
(30, 'Egypt', 'Alexandria', 'Montaza'),
(31, 'Egypt', 'Alexandria', 'Sidi Bishr'),
(32, 'Egypt', 'Alexandria', 'Kelopatra '),
(33, 'Egypt', 'alexandria', 'ads');

-- --------------------------------------------------------

--
-- Table structure for table `Owners`
--

CREATE TABLE `Owners` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Owners`
--

INSERT INTO `Owners` (`ID`, `NAME`, `EMAIL`, `PASS`) VALUES
(6, 'Shams Hegab', 'shams2@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(11, 'Ahmed Zakria', 'zakria@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
(13, 'hotel_owneri', 'hotel@yahoo.com', '8b0dc2e34844337434b8475108a490ab'),
(14, 'Effat Hassan', 'shamsico@shamsico.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `ID` int(11) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `CustID` int(11) NOT NULL,
  `TotalPrice` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `ReservDate` datetime NOT NULL,
  `CheckIN` int(11) NOT NULL DEFAULT '0',
  `Approved` int(11) NOT NULL DEFAULT '1',
  `isRated` int(1) DEFAULT '0',
  `checked` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reservation`
--

INSERT INTO `Reservation` (`ID`, `RoomID`, `CustID`, `TotalPrice`, `StartDate`, `EndDate`, `ReservDate`, `CheckIN`, `Approved`, `isRated`, `checked`) VALUES
(112, 30, 24, 61, '2018-12-24', '2018-12-25', '2018-12-24 11:02:59', 0, 0, 0, 0),
(113, 25, 24, 57, '2018-12-24', '2018-12-25', '2018-12-24 11:03:05', 0, 0, 0, 0),
(114, 34, 24, 42, '2018-12-24', '2018-12-25', '2018-12-24 11:03:10', 0, 0, 0, 0),
(115, 30, 24, 61, '2018-12-24', '2018-12-25', '2018-12-24 11:03:39', 1, 1, 1, 0),
(116, 25, 24, 57, '2018-12-24', '2018-12-25', '2018-12-24 11:03:43', 0, 0, 0, 0),
(117, 25, 24, 57, '2018-12-24', '2018-12-25', '2018-12-24 11:03:43', 0, 0, 0, 0),
(118, 25, 24, 57, '2018-12-24', '2018-12-25', '2018-12-24 11:03:51', 1, 1, 1, 0),
(119, 34, 24, 42, '2018-12-24', '2018-12-25', '2018-12-24 11:03:56', 1, 1, 1, 0),
(120, 34, 24, 168, '2018-12-25', '2018-12-29', '2018-12-26 00:00:00', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ROOM`
--

CREATE TABLE `ROOM` (
  `ID` int(11) NOT NULL,
  `Hotel_ID` int(11) NOT NULL,
  `CAP` int(11) NOT NULL,
  `NO_AV` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ROOM`
--

INSERT INTO `ROOM` (`ID`, `Hotel_ID`, `CAP`, `NO_AV`, `PRICE`, `NAME`) VALUES
(24, 19, 2, 30, 80, 'Executive Room '),
(25, 19, 2, 25, 60, 'Standerd Double Room'),
(29, 19, 3, 20, 100, 'Triple Room'),
(30, 20, 2, 25, 65, 'Double Room'),
(31, 20, 3, 25, 75, 'Triple Room'),
(34, 21, 2, 20, 45, 'Double Room'),
(35, 22, 2, 35, 120, 'Double Room Sea View');

-- --------------------------------------------------------

--
-- Table structure for table `RoomImage`
--

CREATE TABLE `RoomImage` (
  `Room_ID` int(11) NOT NULL,
  `Path` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RoomImage`
--

INSERT INTO `RoomImage` (`Room_ID`, `Path`) VALUES
(25, 'http://digital-dental-scan.com/test/views/uploads/266369B900000578-2982438-image-a-1_1425659346909.jpg'),
(29, 'http://digital-dental-scan.com/test/views/uploads/Bedroom-ThePeninsulaParis-ParisFrance-CRHotel.jpg'),
(30, 'http://digital-dental-scan.com/test/views/uploads/c6ak1r.jpg'),
(31, 'http://digital-dental-scan.com/test/views/uploads/taj-hotel-room.jpg'),
(34, 'http://digital-dental-scan.com/test/views/uploads/js.jpg'),
(35, 'http://digital-dental-scan.com/test/views/uploads/nm.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`EMAIL`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `BlackList`
--
ALTER TABLE `BlackList`
  ADD PRIMARY KEY (`CustID`) USING BTREE,
  ADD KEY `CustID` (`CustID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `CUST_RATING`
--
ALTER TABLE `CUST_RATING`
  ADD PRIMARY KEY (`CUST_ID`,`HOTEL_ID`,`startDate`,`endDate`),
  ADD KEY `CUST_ID` (`CUST_ID`),
  ADD KEY `CUST_RATING_ibfk_2` (`HOTEL_ID`);

--
-- Indexes for table `Facilities`
--
ALTER TABLE `Facilities`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Hotel_ID` (`Hotel_ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `FacilitiesImage`
--
ALTER TABLE `FacilitiesImage`
  ADD PRIMARY KEY (`FacID`,`PATH`),
  ADD KEY `FacID` (`FacID`);

--
-- Indexes for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Owner_ID` (`Owner_ID`),
  ADD KEY `Location` (`Location`);

--
-- Indexes for table `HotelPayment`
--
ALTER TABLE `HotelPayment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `HotelPayment_ibfk_1` (`HotelID`);

--
-- Indexes for table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `Owners`
--
ALTER TABLE `Owners`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoomID` (`RoomID`),
  ADD KEY `CustID` (`CustID`);

--
-- Indexes for table `ROOM`
--
ALTER TABLE `ROOM`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Hotel_ID` (`Hotel_ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `RoomImage`
--
ALTER TABLE `RoomImage`
  ADD PRIMARY KEY (`Room_ID`,`Path`),
  ADD KEY `Room_ID` (`Room_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `Facilities`
--
ALTER TABLE `Facilities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `HotelPayment`
--
ALTER TABLE `HotelPayment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `Location`
--
ALTER TABLE `Location`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `Owners`
--
ALTER TABLE `Owners`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `ROOM`
--
ALTER TABLE `ROOM`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BlackList`
--
ALTER TABLE `BlackList`
  ADD CONSTRAINT `BlackList_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `customer` (`ID`);

--
-- Constraints for table `CUST_RATING`
--
ALTER TABLE `CUST_RATING`
  ADD CONSTRAINT `CUST_RATING_ibfk_1` FOREIGN KEY (`CUST_ID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CUST_RATING_ibfk_2` FOREIGN KEY (`HOTEL_ID`) REFERENCES `Hotel` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Facilities`
--
ALTER TABLE `Facilities`
  ADD CONSTRAINT `Facilities_ibfk_1` FOREIGN KEY (`Hotel_ID`) REFERENCES `Hotel` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `FacilitiesImage`
--
ALTER TABLE `FacilitiesImage`
  ADD CONSTRAINT `FacilitiesImage_ibfk_1` FOREIGN KEY (`FacID`) REFERENCES `Facilities` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD CONSTRAINT `Hotel_ibfk_1` FOREIGN KEY (`Owner_ID`) REFERENCES `Owners` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Hotel_ibfk_2` FOREIGN KEY (`Location`) REFERENCES `Location` (`ID`);

--
-- Constraints for table `HotelPayment`
--
ALTER TABLE `HotelPayment`
  ADD CONSTRAINT `HotelPayment_ibfk_1` FOREIGN KEY (`HotelID`) REFERENCES `Hotel` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`CustID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`RoomID`) REFERENCES `ROOM` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `ROOM`
--
ALTER TABLE `ROOM`
  ADD CONSTRAINT `ROOM_ibfk_1` FOREIGN KEY (`Hotel_ID`) REFERENCES `Hotel` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `RoomImage`
--
ALTER TABLE `RoomImage`
  ADD CONSTRAINT `RoomImage_ibfk_1` FOREIGN KEY (`Room_ID`) REFERENCES `ROOM` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

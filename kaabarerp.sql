-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2023 at 11:31 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaabarerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `ewaybills`
--

DROP TABLE IF EXISTS `ewaybills`;
CREATE TABLE IF NOT EXISTS `ewaybills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ewbGroupId` int DEFAULT NULL,
  `trackingId` int DEFAULT NULL,
  `ewbNo` bigint NOT NULL,
  `ewayBillDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `genMode` varchar(20) NOT NULL,
  `userGstin` varchar(20) NOT NULL,
  `supplyType` varchar(20) NOT NULL DEFAULT '',
  `subSupplyType` enum('Supply','Import','Export','JobWork','ForOwnUse','Job work Returns','Sales Return','Others','SKD/CKD/Lots','LineSales','RecipientNotKnown','ExhibitionOrFairs') NOT NULL DEFAULT 'Supply',
  `docType` varchar(20) NOT NULL DEFAULT '',
  `docNo` varchar(16) NOT NULL,
  `docDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fromGstin` varchar(15) NOT NULL,
  `fromTrdName` varchar(100) NOT NULL COMMENT 'LegalName of consignor',
  `fromAddr1` varchar(120) NOT NULL,
  `fromAddr2` varchar(120) NOT NULL,
  `fromPlace` varchar(50) NOT NULL,
  `fromPincode` bigint NOT NULL,
  `fromStateCode` varchar(20) NOT NULL,
  `toGstin` varchar(15) NOT NULL,
  `toTrdName` varchar(100) NOT NULL COMMENT 'Legalname of consignee',
  `toAddr1` varchar(120) NOT NULL,
  `toAddr2` varchar(120) NOT NULL,
  `toPlace` varchar(50) NOT NULL,
  `toPincode` bigint NOT NULL,
  `toStateCode` varchar(20) NOT NULL,
  `totalValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `totInvValue` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT 'Total Invoice Value',
  `cgstValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `sgstValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `igstValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `cessValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `transporterId` varchar(15) NOT NULL,
  `transporterName` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `actualDist` int NOT NULL,
  `noValidDays` int NOT NULL,
  `transitDist` int DEFAULT NULL,
  `transitDays` int DEFAULT NULL,
  `remainDist` int DEFAULT NULL,
  `remainDays` int DEFAULT NULL,
  `validUpto` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `extendedTimes` int NOT NULL,
  `rejectStatus` varchar(20) NOT NULL,
  `vehicleType` varchar(20) NOT NULL,
  `actFromStateCode` varchar(20) NOT NULL COMMENT 'State of Supply',
  `actToStateCode` varchar(20) NOT NULL,
  `transactionType` enum('Regular','BillTo-ShipTo','Bill-From-Dispatch-From','Combination-of-2-and-3') NOT NULL DEFAULT 'Regular',
  `otherValue` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT 'Other Charges if any',
  `cessNonAdvolValue` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT 'CESS Non Advol Amount',
  `VehiclListDetails` text,
  `itemList` text,
  `ownStatus` enum('Pending','InTransit','Reach','Unloading Point','Complete') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint NOT NULL DEFAULT '9999',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL DEFAULT '1',
  `isDeleted` enum('Yes','No') NOT NULL DEFAULT 'No',
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_by` bigint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ewaybills`
--

INSERT INTO `ewaybills` (`id`, `ewbGroupId`, `trackingId`, `ewbNo`, `ewayBillDate`, `genMode`, `userGstin`, `supplyType`, `subSupplyType`, `docType`, `docNo`, `docDate`, `fromGstin`, `fromTrdName`, `fromAddr1`, `fromAddr2`, `fromPlace`, `fromPincode`, `fromStateCode`, `toGstin`, `toTrdName`, `toAddr1`, `toAddr2`, `toPlace`, `toPincode`, `toStateCode`, `totalValue`, `totInvValue`, `cgstValue`, `sgstValue`, `igstValue`, `cessValue`, `transporterId`, `transporterName`, `status`, `actualDist`, `noValidDays`, `transitDist`, `transitDays`, `remainDist`, `remainDays`, `validUpto`, `extendedTimes`, `rejectStatus`, `vehicleType`, `actFromStateCode`, `actToStateCode`, `transactionType`, `otherValue`, `cessNonAdvolValue`, `VehiclListDetails`, `itemList`, `ownStatus`, `created_at`, `created_by`, `updated_at`, `updated_by`, `isDeleted`, `deleted_at`, `deleted_by`) VALUES
(1, NULL, NULL, 551008882487, '2023-04-21 17:27:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-7', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:9:\"Gali no.8\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 05:27:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:2:\"12\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Laptop\";s:11:\"productDesc\";s:6:\"Laptop\";s:7:\"hsnCode\";i:8471;s:8:\"quantity\";d:100;s:7:\"qtyUnit\";s:3:\"BAL\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:1000;}}', 'Pending', '2023-04-29 10:57:26', 9999, '2023-05-06 09:49:57', 1, 'No', '2023-05-06 09:49:57', 1),
(2, NULL, NULL, 581008882486, '2023-04-21 17:26:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-6', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:9:\"Gali no.8\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 05:26:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:2:\"12\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Laptop\";s:11:\"productDesc\";s:6:\"Laptop\";s:7:\"hsnCode\";i:8471;s:8:\"quantity\";d:100;s:7:\"qtyUnit\";s:3:\"BAL\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:1000;}}', 'Pending', '2023-04-29 10:57:27', 9999, '2023-05-07 08:48:24', 1, 'No', '2023-05-07 08:48:24', 1),
(3, NULL, NULL, 511008882485, '2023-04-20 17:25:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-5', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:9:\"Gali no.8\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 05:25:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:2:\"12\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Laptop\";s:11:\"productDesc\";s:6:\"Laptop\";s:7:\"hsnCode\";i:8471;s:8:\"quantity\";d:100;s:7:\"qtyUnit\";s:3:\"BAL\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:1000;}}', 'Pending', '2023-04-29 10:57:28', 9999, '2023-04-29 10:57:28', 1, 'No', '2023-04-29 10:57:28', 1),
(4, NULL, NULL, 541008882484, '2023-04-20 17:23:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-4', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:9:\"Gali no.8\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 05:23:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:2:\"12\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Laptop\";s:11:\"productDesc\";s:6:\"Laptop\";s:7:\"hsnCode\";i:8471;s:8:\"quantity\";d:100;s:7:\"qtyUnit\";s:3:\"BAL\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:1000;}}', 'Pending', '2023-04-29 10:57:29', 9999, '2023-04-29 10:57:29', 1, 'No', '2023-04-29 10:57:29', 1),
(5, NULL, NULL, 571008882483, '2023-04-20 17:06:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-3', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:9:\"Gali no.8\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 05:06:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:2:\"12\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Laptop\";s:11:\"productDesc\";s:6:\"Laptop\";s:7:\"hsnCode\";i:8471;s:8:\"quantity\";d:100;s:7:\"qtyUnit\";s:3:\"BAL\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:1000;}}', 'Pending', '2023-04-29 10:57:32', 9999, '2023-04-29 10:57:32', 1, 'No', '2023-04-29 10:57:32', 1),
(6, NULL, NULL, 501008882482, '2023-04-20 17:05:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-2', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '10000.00', '11200.00', '0.00', '0.00', '1200.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:9:\"Gali no.8\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 05:05:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:2:\"12\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Laptop\";s:11:\"productDesc\";s:6:\"Laptop\";s:7:\"hsnCode\";i:8471;s:8:\"quantity\";d:100;s:7:\"qtyUnit\";s:3:\"BAL\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:10000;}}', 'Pending', '2023-04-29 10:57:33', 9999, '2023-04-29 10:57:33', 1, 'No', '2023-04-29 10:57:33', 1),
(7, NULL, NULL, 531008882481, '2023-04-20 17:03:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-1', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '10000.00', '11200.00', '0.00', '0.00', '1200.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:9:\"Gali no.8\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 05:03:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:2:\"12\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Laptop\";s:11:\"productDesc\";s:6:\"Laptop\";s:7:\"hsnCode\";i:8471;s:8:\"quantity\";d:100;s:7:\"qtyUnit\";s:3:\"BAL\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:10000;}}', 'Pending', '2023-04-29 10:57:34', 9999, '2023-04-29 10:57:34', 1, 'No', '2023-04-29 10:57:34', 1),
(8, NULL, NULL, 551008882474, '2023-04-21 15:40:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'PPT/10', '2023-04-20 00:00:00', '34AACCC1596Q002', 'VIDHI AGRRITECH', 'INDUSTRIAL ESTATE 001 RICCO AREA,              SUMERPUR-306902 DIST.PALI (306902)', '', ' SUMERPUR', 605001, '34', '08ADUPA8441N1ZX', 'MANGILAL MAKHAN LAL', 'MAIN BAZAR, SUMERPUR, Rajasthan, 306902', '', 'SUMERPUR', 306902, '8', '2240.00', '2352.00', '0.00', '0.00', '112.00', '0.00', '', 'ASHAPURA ROADWAYS ', 'ACT', 2133, 11, NULL, 0, 0, 0, '2023-05-01 23:59:00', 0, 'N', 'R', '34', '8', 'Regular', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"RJ22SL1450\";s:9:\"fromPlace\";s:9:\" SUMERPUR\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 03:40:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";s:10:\"20/04/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:20:\"SARSON FACTORY THOK \";s:7:\"hsnCode\";i:120750;s:8:\"quantity\";d:20;s:7:\"qtyUnit\";s:3:\"KGS\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:2240;}}', 'Pending', '2023-04-29 10:57:35', 9999, '2023-05-07 08:29:23', 1, 'No', '2023-05-07 08:29:23', 1),
(9, NULL, NULL, 581008882473, '2023-04-20 15:31:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'AB-5', '2023-04-20 00:00:00', '34AACCC1596Q002', 'NIC COMPANY PVT LTD', 'I22222, THE SURAT CENTER MARKET RING AA,', 'MARINE LINE AREA, NR KAPODRA NEAR AREA, JAY NANARAYAN INDUSTIRES BHEING DOADSF, THE NEW SURAT TEXTIL', 'SURAT - 395023', 605001, '34', '29AWGPV7107B1Z1', 'XYZ COMPANY PVT LTD', '7TH BLOCK, KUVEMPU LAYOUT,', '7TH BLOCK, KUVEMPU LAYOUT,', 'RAMNAGARAM', 562160, '29', '107625.00', '113006.00', '0.00', '0.00', '5381.25', '0.00', '', '148 STM PARKING', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Regular', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"GJ05GC9999\";s:9:\"fromPlace\";s:14:\"SURAT - 395023\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 03:31:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";s:10:\"20/04/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:0:\"\";s:7:\"hsnCode\";i:540754;s:8:\"quantity\";d:123;s:7:\"qtyUnit\";s:3:\"PCS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:107625;}}', 'Pending', '2023-04-29 10:57:36', 9999, '2023-04-29 10:57:36', 1, 'No', '2023-04-29 10:57:36', 1),
(10, NULL, NULL, 541008882471, '2023-04-20 15:14:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'IFOXDV51', '2023-04-20 00:00:00', '34AACCC1596Q002', 'Neelkamal test', '364, Villianur Main Rd, Nellithope', 'Kuyavarpalayam, Puducherry', 'Kuyavarpalayam', 605005, '34', 'URP            ', 'Ujjivan Small Finance Bank Limited', 'Khampur Raya Village Shadi Kampur Plot No. 2364 / 8', 'Khampur Raya Village Shadi Kampur', 'New Delhi', 110008, '7', '2050.00', '2419.00', '0.00', '0.00', '369.00', '0.00', '05AAABC0181E1ZE', 'Logistar', 'ACT', 2350, 12, NULL, 0, 0, 0, '1970-01-01 00:00:00', 0, 'N', '', '34', '7', 'Regular', '0.00', '0.00', 'a:0:{}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:9:\"A1 Trolly\";s:11:\"productDesc\";s:3:\"ANY\";s:7:\"hsnCode\";i:2515;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"OTH\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:2050;}}', 'Pending', '2023-04-29 10:57:38', 9999, '2023-04-29 10:57:38', 1, 'No', '2023-04-29 10:57:38', 1),
(11, NULL, NULL, 501008882466, '2023-04-20 14:44:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'AV/G/2223/0002', '2023-04-20 00:00:00', '34AACCC1596Q002', 'welton', '4-9-35, GROUND,1ST, 2ND FLOOR, AURANGPURA', 'GROUND FLOOR OSBORNE ROAD', 'FRAZER TOWN', 605001, '34', '29AWGPV7107B1Z1', 'sthuthya', 'GODOWN NO 5 GAT NO 1214/1230', '', 'Beml Nagar', 562160, '29', '5609889.00', '5778485.67', '0.00', '0.00', '168296.67', '0.00', '', '', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Combination-of-2-and-3', '-100.00', '400.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:11:\"FRAZER TOWN\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 02:44:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:7:\"DOC/125\";s:12:\"transDocDate\";s:10:\"20/04/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:8:\"BLAZER-1\";s:11:\"productDesc\";s:8:\"BLAZER-1\";s:7:\"hsnCode\";i:4421;s:8:\"quantity\";d:25;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:3;s:8:\"cessRate\";d:3;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:5609889;}}', 'Pending', '2023-04-29 10:57:39', 9999, '2023-04-29 10:57:39', 1, 'No', '2023-04-29 10:57:39', 1),
(12, NULL, NULL, 561008882464, '2023-04-20 14:34:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '7AD241/5451170', '2022-03-02 00:00:00', '34AACCC1596Q002', 'welton', '2ND CROSS NO 59  19  A', 'GROUND FLOOR OSBORNE ROAD', 'FRAZER TOWN', 605001, '34', '29AWGPV7107B1Z1', 'sthuthya', 'Shree Nilaya', 'Dasarahosahalli', 'Beml Nagar', 562160, '29', '56099.00', '68358.00', '0.00', '0.00', '300.67', '400.56', '34AACCC1596Q002', 'Test', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Combination-of-2-and-3', '-100.00', '400.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:8:\"MH125454\";s:9:\"fromPlace\";s:11:\"FRAZER TOWN\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 02:34:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:3:\"A12\";s:12:\"transDocDate\";s:10:\"02/03/2022\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:8:\"BLAZER-1\";s:11:\"productDesc\";s:8:\"BLAZER-1\";s:7:\"hsnCode\";i:4421;s:8:\"quantity\";d:25;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:3;s:8:\"cessRate\";d:3;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:5609889;}}', 'Pending', '2023-04-29 10:57:40', 9999, '2023-04-29 10:57:40', 1, 'No', '2023-04-29 10:57:40', 1),
(13, NULL, NULL, 551008882458, '2023-04-20 12:02:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '53/23-24', '2023-04-20 00:00:00', '34AACCC1596Q002', 'NIRANT TECHNOLOGIES', 'B-93, SHRINATH PARK SOC, OPP. JOGESHWARI SOC.', 'NR JOGESHWARI SOC BRTS, AMRAIWADI', 'AHMEDABAD', 605001, '34', '29AWGPV7107B1Z1', 'CBE COMPANY PVT LTD', '1ST FLOOR, KRISHNA COMPLEX', 'NR CTM', 'BANGALORE', 562160, '29', '20500.00', '24190.00', '0.00', '0.00', '3690.00', '0.00', '', '', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'BillTo-ShipTo', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:9:\"GJ27X7664\";s:9:\"fromPlace\";s:9:\"AHMEDABAD\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 12:02:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:3:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:12:\"TRANSFORMERS\";s:7:\"hsnCode\";i:850410;s:8:\"quantity\";d:2;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:10000;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:12:\"TRANSFORMERS\";s:7:\"hsnCode\";i:850410;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:10000;}i:2;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:3;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:7:\"FREIGHT\";s:7:\"hsnCode\";i:996511;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"OTH\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:500;}}', 'Pending', '2023-04-29 10:57:41', 9999, '2023-04-29 10:57:41', 1, 'No', '2023-04-29 10:57:41', 1),
(14, NULL, NULL, 571008882454, '2023-04-20 11:31:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'AKP-80', '2023-02-08 00:00:00', '34AACCC1596Q002', 'prabhat.kumar+2@ankpal.com', 'Plot no 292', 'Road no. 4,GIDC', 'ahmedabad', 605001, '34', '29AWGPV7107B1Z1', 'RAJGURU', 'SHOP NO.35', 'OPP NTR COMPLEX,GOVERNORPET', 'Pondicherry', 562160, '29', '1720.64', '1721.00', '0.00', '0.00', '0.00', '0.00', '', '', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Regular', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"GJ00ZZ1001\";s:9:\"fromPlace\";s:9:\"ahmedabad\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 11:31:00 AM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:13:\"2112155454545\";s:12:\"transDocDate\";s:10:\"20/04/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:4:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Wallet\";s:11:\"productDesc\";s:0:\"\";s:7:\"hsnCode\";i:84303120;s:8:\"quantity\";d:26;s:7:\"qtyUnit\";s:3:\"PCS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:445.64;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Prod 1\";s:11:\"productDesc\";s:0:\"\";s:7:\"hsnCode\";i:0;s:8:\"quantity\";d:10;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:50;}i:2;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:3;s:9:\"productId\";i:0;s:11:\"productName\";s:2:\"P8\";s:11:\"productDesc\";s:0:\"\";s:7:\"hsnCode\";i:0;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"BAG\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:25;}i:3;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:4;s:9:\"productId\";i:0;s:11:\"productName\";s:100:\"Alpha P1 Generator Light Weight 100 KIlowatt Capacity With 12LTR Lorem Ipsum For Big Content Testing\";s:11:\"productDesc\";s:0:\"\";s:7:\"hsnCode\";i:0;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"BOX\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:1200;}}', 'Pending', '2023-04-29 10:57:42', 9999, '2023-04-29 10:57:42', 1, 'No', '2023-04-29 10:57:42', 1),
(15, NULL, NULL, 531008882452, '2023-04-20 11:12:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'AKP-78', '2023-02-08 00:00:00', '34AACCC1596Q002', 'prabhat.kumar+2@ankpal.com', 'Plot no 292', 'Road no. 4,GIDC', 'ahmedabad', 605001, '34', '29AWGPV7107B1Z1', 'RAJGURU', 'SHOP NO.35', 'OPP NTR COMPLEX,GOVERNORPET', 'Pondicherry', 562160, '29', '1720.64', '1721.00', '0.00', '0.00', '0.00', '0.00', '', 'TRANSNAME007', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Regular', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"GJ00ZZ1001\";s:9:\"fromPlace\";s:9:\"ahmedabad\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 11:12:00 AM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:13:\"2112155454545\";s:12:\"transDocDate\";s:10:\"20/04/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:4:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Wallet\";s:11:\"productDesc\";s:0:\"\";s:7:\"hsnCode\";i:84303120;s:8:\"quantity\";d:26;s:7:\"qtyUnit\";s:3:\"PCS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:445.64;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:6:\"Prod 1\";s:11:\"productDesc\";s:0:\"\";s:7:\"hsnCode\";i:0;s:8:\"quantity\";d:10;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:50;}i:2;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:3;s:9:\"productId\";i:0;s:11:\"productName\";s:2:\"P8\";s:11:\"productDesc\";s:0:\"\";s:7:\"hsnCode\";i:0;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"BAG\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:25;}i:3;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:4;s:9:\"productId\";i:0;s:11:\"productName\";s:100:\"Alpha P1 Generator Light Weight 100 KIlowatt Capacity With 12LTR Lorem Ipsum For Big Content Testing\";s:11:\"productDesc\";s:0:\"\";s:7:\"hsnCode\";i:0;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"BOX\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";i:0;s:13:\"taxableAmount\";d:1200;}}', 'Pending', '2023-04-29 10:57:43', 9999, '2023-04-29 10:57:43', 1, 'No', '2023-04-29 10:57:43', 1),
(16, NULL, NULL, 561008882448, '2023-04-20 10:35:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '230112', '2023-04-20 00:00:00', '34AACCC1596Q002', 'AWANI ENGINEERING WORKS', 'E-76 MIDC', 'SHIROLI', 'Maharashtra', 605001, '34', '23AAACJ4233B1ZC', 'John Deere India Pvt.Ltd. (Dewas.)', 'Surve No.501, Village Khatamba,Jamgod,', 'Dewas Bhopal Highway,Dewas,Madhya pradesh - 455115.', 'Dewas', 455115, '23', '4416.60', '5631.00', '0.00', '0.00', '1236.65', '0.00', '27BFBPK3051A1Z4', 'Shree Ganesh Roadlines', 'ACT', 1844, 10, NULL, 0, 0, 0, '2023-04-30 23:59:00', 0, 'N', 'R', '34', '23', 'Regular', '-22.25', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH09AB1234\";s:9:\"fromPlace\";s:11:\"Maharashtra\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"20/04/2023 10:35:00 AM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";s:10:\"20/04/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:50:\"Front Axle Support , Front Support Stopper-SU22452\";s:7:\"hsnCode\";i:87085000;s:8:\"quantity\";d:20;s:7:\"qtyUnit\";s:3:\"Nos\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:28;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:4416.6;}}', 'Pending', '2023-04-29 10:57:45', 9999, '2023-04-29 10:57:45', 1, 'No', '2023-04-29 10:57:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ewaybills1`
--

DROP TABLE IF EXISTS `ewaybills1`;
CREATE TABLE IF NOT EXISTS `ewaybills1` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `updMode` int NOT NULL,
  `fromPlace` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fromState` int NOT NULL,
  `tripshtNo` int NOT NULL,
  `userGSTINTransin` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `enteredDate` date NOT NULL,
  `transMode` int NOT NULL,
  `transDocNo` int NOT NULL,
  `transDocDate` date NOT NULL,
  `groupNo` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ewbmasters`
--

DROP TABLE IF EXISTS `ewbmasters`;
CREATE TABLE IF NOT EXISTS `ewbmasters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ewbId` int NOT NULL,
  `trackingId` int DEFAULT NULL,
  `driverNo` varchar(255) DEFAULT NULL,
  `partyNo` varchar(255) DEFAULT NULL,
  `ownerNo` varchar(255) DEFAULT NULL,
  `ewbVehicleType` varchar(255) DEFAULT NULL,
  `ewbNo` bigint NOT NULL,
  `ewayBillDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `genMode` varchar(20) NOT NULL,
  `userGstin` varchar(20) NOT NULL,
  `supplyType` varchar(20) NOT NULL DEFAULT '',
  `subSupplyType` enum('Supply','Import','Export','JobWork','ForOwnUse','Job work Returns','Sales Return','Others','SKD/CKD/Lots','LineSales','RecipientNotKnown','ExhibitionOrFairs') NOT NULL DEFAULT 'Supply',
  `docType` varchar(20) NOT NULL DEFAULT '',
  `docNo` varchar(16) NOT NULL,
  `docDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fromGstin` varchar(15) NOT NULL,
  `fromTrdName` varchar(100) NOT NULL COMMENT 'LegalName of consignor',
  `fromAddr1` varchar(120) NOT NULL,
  `fromAddr2` varchar(120) NOT NULL,
  `fromPlace` varchar(50) NOT NULL,
  `fromPincode` bigint NOT NULL,
  `fromStateCode` varchar(20) NOT NULL,
  `toGstin` varchar(15) NOT NULL,
  `toTrdName` varchar(100) NOT NULL COMMENT 'Legalname of consignee',
  `toAddr1` varchar(120) NOT NULL,
  `toAddr2` varchar(120) NOT NULL,
  `toPlace` varchar(50) NOT NULL,
  `toPincode` bigint NOT NULL,
  `toStateCode` varchar(20) NOT NULL,
  `totalValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `totInvValue` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT 'Total Invoice Value',
  `cgstValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `sgstValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `igstValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `cessValue` decimal(18,2) NOT NULL DEFAULT '0.00',
  `transporterId` varchar(15) NOT NULL,
  `transporterName` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `actualDist` int NOT NULL,
  `noValidDays` int NOT NULL,
  `transitDist` int DEFAULT NULL,
  `transitDays` int DEFAULT NULL,
  `remainDist` int DEFAULT NULL,
  `remainDays` int DEFAULT NULL,
  `validUpto` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `extendedTimes` int NOT NULL,
  `rejectStatus` varchar(20) NOT NULL,
  `vehicleType` varchar(20) NOT NULL,
  `actFromStateCode` varchar(20) NOT NULL COMMENT 'State of Supply',
  `actToStateCode` varchar(20) NOT NULL,
  `transactionType` enum('Regular','BillTo-ShipTo','Bill-From-Dispatch-From','Combination-of-2-and-3') NOT NULL DEFAULT 'Regular',
  `otherValue` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT 'Other Charges if any',
  `cessNonAdvolValue` decimal(18,2) NOT NULL DEFAULT '0.00' COMMENT 'CESS Non Advol Amount',
  `VehiclListDetails` text,
  `itemList` text,
  `ownStatus` enum('Pending','InTransit','Reach','Unloading Point','Complete','DirectUnload') NOT NULL DEFAULT 'Pending',
  `child_updMode` varchar(15) NOT NULL DEFAULT '',
  `child_vehicleNo` varchar(15) NOT NULL DEFAULT '',
  `child_fromPlace` varchar(50) NOT NULL DEFAULT '',
  `child_fromState` int NOT NULL DEFAULT '0',
  `child_tripshtNo` bigint NOT NULL DEFAULT '0',
  `child_userGSTINTransin` varchar(15) NOT NULL DEFAULT '',
  `child_enteredDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `child_transMode` enum('1','2','3','4','5') NOT NULL DEFAULT '1' COMMENT '1:Road, 2:Rail, 3:Air, 4:Ship, 5:inTransit',
  `child_transDocNo` varchar(20) DEFAULT NULL,
  `child_transDocDate` datetime DEFAULT NULL,
  `child_groupNo` int NOT NULL DEFAULT '0',
  `child_extandNumber` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint NOT NULL DEFAULT '9999',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint NOT NULL DEFAULT '1',
  `isDeleted` enum('Yes','No') NOT NULL DEFAULT 'No',
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_by` bigint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ewbmasters`
--

INSERT INTO `ewbmasters` (`id`, `ewbId`, `trackingId`, `driverNo`, `partyNo`, `ownerNo`, `ewbVehicleType`, `ewbNo`, `ewayBillDate`, `genMode`, `userGstin`, `supplyType`, `subSupplyType`, `docType`, `docNo`, `docDate`, `fromGstin`, `fromTrdName`, `fromAddr1`, `fromAddr2`, `fromPlace`, `fromPincode`, `fromStateCode`, `toGstin`, `toTrdName`, `toAddr1`, `toAddr2`, `toPlace`, `toPincode`, `toStateCode`, `totalValue`, `totInvValue`, `cgstValue`, `sgstValue`, `igstValue`, `cessValue`, `transporterId`, `transporterName`, `status`, `actualDist`, `noValidDays`, `transitDist`, `transitDays`, `remainDist`, `remainDays`, `validUpto`, `extendedTimes`, `rejectStatus`, `vehicleType`, `actFromStateCode`, `actToStateCode`, `transactionType`, `otherValue`, `cessNonAdvolValue`, `VehiclListDetails`, `itemList`, `ownStatus`, `child_updMode`, `child_vehicleNo`, `child_fromPlace`, `child_fromState`, `child_tripshtNo`, `child_userGSTINTransin`, `child_enteredDate`, `child_transMode`, `child_transDocNo`, `child_transDocDate`, `child_groupNo`, `child_extandNumber`, `created_at`, `created_by`, `updated_at`, `updated_by`, `isDeleted`, `deleted_at`, `deleted_by`) VALUES
(18, 27, NULL, NULL, NULL, NULL, NULL, 581008882473, '2023-04-20 15:31:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'AB-5', '2023-04-20 00:00:00', '34AACCC1596Q002', 'NIC COMPANY PVT LTD', 'I22222, THE SURAT CENTER MARKET RING AA,', 'MARINE LINE AREA, NR KAPODRA NEAR AREA, JAY NANARAYAN INDUSTIRES BHEING DOADSF, THE NEW SURAT TEXTIL', 'SURAT - 395023', 605001, '34', '29AWGPV7107B1Z1', 'XYZ COMPANY PVT LTD', '7TH BLOCK, KUVEMPU LAYOUT,', '7TH BLOCK, KUVEMPU LAYOUT,', 'RAMNAGARAM', 562160, '29', '107625.00', '113006.00', '0.00', '0.00', '5381.25', '0.00', '', '148 STM PARKING', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Regular', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'GJ05GC9999', 'SURAT - 395023', 34, 0, '34AACCC1596Q002', '2023-04-20 15:31:00', '1', '', '2023-04-20 00:00:00', 0, NULL, '2023-04-22 08:46:34', 9999, '2023-04-22 08:46:34', 1, 'No', '2023-04-22 14:16:34', 1),
(17, 26, NULL, NULL, NULL, NULL, NULL, 551008882474, '2023-04-20 15:40:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'PPT/10', '2023-04-20 00:00:00', '34AACCC1596Q002', 'VIDHI AGRRITECH', 'INDUSTRIAL ESTATE 001 RICCO AREA,              SUMERPUR-306902 DIST.PALI (306902)', '', ' SUMERPUR', 605001, '34', '08ADUPA8441N1ZX', 'MANGILAL MAKHAN LAL', 'MAIN BAZAR, SUMERPUR, Rajasthan, 306902', '', 'SUMERPUR', 306902, '8', '2240.00', '2352.00', '0.00', '0.00', '112.00', '0.00', '', 'ASHAPURA ROADWAYS ', 'ACT', 2133, 11, NULL, 0, 0, 0, '2023-05-01 23:59:00', 0, 'N', 'R', '34', '8', 'Regular', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'RJ22SL1450', ' SUMERPUR', 34, 0, '34AACCC1596Q002', '2023-04-20 15:40:00', '1', '', '2023-04-20 00:00:00', 0, NULL, '2023-04-22 08:46:33', 9999, '2023-04-22 08:46:33', 1, 'No', '2023-04-22 14:16:33', 1),
(16, 25, NULL, NULL, NULL, NULL, NULL, 531008882481, '2023-04-20 17:03:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-1', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '10000.00', '11200.00', '0.00', '0.00', '1200.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'PVC1234', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20 17:03:00', '1', '12', '1970-01-01 00:00:00', 0, NULL, '2023-04-22 08:46:33', 9999, '2023-04-22 08:46:33', 1, 'No', '2023-04-22 14:16:33', 1),
(15, 24, NULL, NULL, NULL, NULL, NULL, 501008882482, '2023-04-20 17:05:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-2', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '10000.00', '11200.00', '0.00', '0.00', '1200.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'PVC1234', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20 17:05:00', '1', '12', '1970-01-01 00:00:00', 0, NULL, '2023-04-22 08:46:32', 9999, '2023-04-22 08:46:32', 1, 'No', '2023-04-22 14:16:32', 1),
(14, 23, NULL, NULL, NULL, NULL, NULL, 571008882483, '2023-04-20 17:06:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-3', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'PVC1234', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20 17:06:00', '1', '12', '1970-01-01 00:00:00', 0, NULL, '2023-04-22 08:46:31', 9999, '2023-04-22 08:46:31', 1, 'No', '2023-04-22 14:16:31', 1),
(13, 22, NULL, NULL, NULL, NULL, NULL, 541008882484, '2023-04-20 17:23:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-4', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'PVC1234', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20 17:23:00', '1', '12', '1970-01-01 00:00:00', 0, NULL, '2023-04-22 08:46:30', 9999, '2023-04-22 08:46:30', 1, 'No', '2023-04-22 14:16:30', 1),
(12, 21, NULL, NULL, NULL, NULL, NULL, 511008882485, '2023-04-20 17:25:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-5', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'PVC1234', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20 17:25:00', '1', '12', '1970-01-01 00:00:00', 0, NULL, '2023-04-22 08:46:30', 9999, '2023-04-22 08:46:30', 1, 'No', '2023-04-22 14:16:30', 1),
(10, 19, NULL, NULL, NULL, NULL, NULL, 551008882487, '2023-04-20 17:27:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-7', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'PVC1234', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20 17:27:00', '1', '12', '1970-01-01 00:00:00', 0, NULL, '2023-04-22 08:46:28', 9999, '2023-04-22 08:46:28', 1, 'No', '2023-04-22 14:16:28', 1),
(11, 20, NULL, NULL, NULL, NULL, NULL, 581008882486, '2023-04-20 17:26:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV-6', '2023-04-20 00:00:00', '34AACCC1596Q002', 'TATA CONSULTANCY SERVICES LIMITED', 'PlotNo.23', 'Gali no.8', 'Gali no.8', 605001, '34', '18AABCU9603R1ZM', 'I Best MultiWork Company', 'PlotNo.23', 'Gali no.8', 'Assam', 781127, '18', '1000.00', '1120.00', '0.00', '0.00', '120.00', '0.00', '', '', 'ACT', 2812, 15, NULL, 0, 0, 0, '2023-05-05 23:59:00', 0, 'N', 'R', '34', '18', 'Combination-of-2-and-3', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'PVC1234', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20 17:26:00', '1', '12', '1970-01-01 00:00:00', 0, NULL, '2023-04-22 08:46:29', 9999, '2023-04-22 08:46:29', 1, 'No', '2023-04-22 14:16:29', 1),
(19, 29, NULL, NULL, NULL, NULL, NULL, 501008882466, '2023-04-20 14:44:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'AV/G/2223/0002', '2023-04-20 00:00:00', '34AACCC1596Q002', 'welton', '4-9-35, GROUND,1ST, 2ND FLOOR, AURANGPURA', 'GROUND FLOOR OSBORNE ROAD', 'FRAZER TOWN', 605001, '34', '29AWGPV7107B1Z1', 'sthuthya', 'GODOWN NO 5 GAT NO 1214/1230', '', 'Beml Nagar', 562160, '29', '5609889.00', '5778485.67', '0.00', '0.00', '168296.67', '0.00', '', '', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Combination-of-2-and-3', '-100.00', '400.00', NULL, NULL, 'Pending', 'API', 'PVC1234', 'FRAZER TOWN', 34, 0, '34AACCC1596Q002', '2023-04-20 14:44:00', '1', 'DOC/125', '2023-04-20 00:00:00', 0, NULL, '2023-04-22 08:46:36', 9999, '2023-04-22 08:46:36', 1, 'No', '2023-04-22 14:16:36', 1),
(20, 30, NULL, NULL, NULL, NULL, NULL, 561008882464, '2023-04-20 14:34:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '7AD241/5451170', '2022-03-02 00:00:00', '34AACCC1596Q002', 'welton', '2ND CROSS NO 59  19  A', 'GROUND FLOOR OSBORNE ROAD', 'FRAZER TOWN', 605001, '34', '29AWGPV7107B1Z1', 'sthuthya', 'Shree Nilaya', 'Dasarahosahalli', 'Beml Nagar', 562160, '29', '56099.00', '68358.00', '0.00', '0.00', '300.67', '400.56', '34AACCC1596Q002', 'Test', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Combination-of-2-and-3', '-100.00', '400.00', NULL, NULL, 'Pending', 'API', 'MH125454', 'FRAZER TOWN', 34, 0, '34AACCC1596Q002', '2023-04-20 14:34:00', '1', 'A12', '2022-03-02 00:00:00', 0, NULL, '2023-04-22 08:46:37', 9999, '2023-04-22 08:46:37', 1, 'No', '2023-04-22 14:16:37', 1),
(21, 31, NULL, NULL, NULL, NULL, NULL, 551008882458, '2023-04-20 12:02:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '53/23-24', '2023-04-20 00:00:00', '34AACCC1596Q002', 'NIRANT TECHNOLOGIES', 'B-93, SHRINATH PARK SOC, OPP. JOGESHWARI SOC.', 'NR JOGESHWARI SOC BRTS, AMRAIWADI', 'AHMEDABAD', 605001, '34', '29AWGPV7107B1Z1', 'CBE COMPANY PVT LTD', '1ST FLOOR, KRISHNA COMPLEX', 'NR CTM', 'BANGALORE', 562160, '29', '20500.00', '24190.00', '0.00', '0.00', '3690.00', '0.00', '', '', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'BillTo-ShipTo', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'GJ27X7664', 'AHMEDABAD', 34, 0, '34AACCC1596Q002', '2023-04-20 12:02:00', '1', '', '1970-01-01 00:00:00', 0, NULL, '2023-04-22 08:46:38', 9999, '2023-04-22 08:46:38', 1, 'No', '2023-04-22 14:16:38', 1),
(22, 32, NULL, NULL, NULL, NULL, NULL, 571008882454, '2023-04-20 11:31:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'AKP-80', '2023-02-08 00:00:00', '34AACCC1596Q002', 'prabhat.kumar+2@ankpal.com', 'Plot no 292', 'Road no. 4,GIDC', 'ahmedabad', 605001, '34', '29AWGPV7107B1Z1', 'RAJGURU', 'SHOP NO.35', 'OPP NTR COMPLEX,GOVERNORPET', 'Pondicherry', 562160, '29', '1720.64', '1721.00', '0.00', '0.00', '0.00', '0.00', '', '', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Regular', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'GJ00ZZ1001', 'ahmedabad', 34, 0, '34AACCC1596Q002', '2023-04-20 11:31:00', '1', '2112155454545', '2023-04-20 00:00:00', 0, NULL, '2023-04-22 08:46:38', 9999, '2023-04-22 08:46:38', 1, 'No', '2023-04-22 14:16:38', 1),
(23, 33, NULL, NULL, NULL, NULL, NULL, 531008882452, '2023-04-20 11:12:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'AKP-78', '2023-02-08 00:00:00', '34AACCC1596Q002', 'prabhat.kumar+2@ankpal.com', 'Plot no 292', 'Road no. 4,GIDC', 'ahmedabad', 605001, '34', '29AWGPV7107B1Z1', 'RAJGURU', 'SHOP NO.35', 'OPP NTR COMPLEX,GOVERNORPET', 'Pondicherry', 562160, '29', '1720.64', '1721.00', '0.00', '0.00', '0.00', '0.00', '', 'TRANSNAME007', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-04-22 23:59:00', 0, 'N', 'R', '34', '29', 'Regular', '0.00', '0.00', NULL, NULL, 'Pending', 'API', 'GJ00ZZ1001', 'ahmedabad', 34, 0, '34AACCC1596Q002', '2023-04-20 11:12:00', '1', '2112155454545', '2023-04-20 00:00:00', 0, NULL, '2023-04-22 08:46:39', 9999, '2023-04-22 08:46:39', 1, 'No', '2023-04-22 14:16:39', 1),
(24, 34, NULL, NULL, NULL, NULL, NULL, 561008882448, '2023-04-20 10:35:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '230112', '2023-04-20 00:00:00', '34AACCC1596Q002', 'AWANI ENGINEERING WORKS', 'E-76 MIDC', 'SHIROLI', 'Maharashtra', 605001, '34', '23AAACJ4233B1ZC', 'John Deere India Pvt.Ltd. (Dewas.)', 'Surve No.501, Village Khatamba,Jamgod,', 'Dewas Bhopal Highway,Dewas,Madhya pradesh - 455115.', 'Dewas', 455115, '23', '4416.60', '5631.00', '0.00', '0.00', '1236.65', '0.00', '27BFBPK3051A1Z4', 'Shree Ganesh Roadlines', 'ACT', 1844, 10, NULL, 0, 0, 0, '2023-04-30 23:59:00', 0, 'N', 'R', '34', '23', 'Regular', '-22.25', '0.00', NULL, NULL, 'Pending', 'API', 'MH09AB1234', 'Maharashtra', 34, 0, '34AACCC1596Q002', '2023-04-20 10:35:00', '1', '', '2023-04-20 00:00:00', 0, NULL, '2023-04-22 08:46:40', 9999, '2023-04-22 08:46:40', 1, 'No', '2023-04-22 14:16:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(126, '2014_10_12_000000_create_users_table', 1),
(127, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(128, '2014_10_12_100000_create_password_resets_table', 1),
(129, '2016_01_15_105324_create_roles_table', 1),
(130, '2016_01_15_114412_create_role_user_table', 1),
(131, '2016_01_26_115212_create_permissions_table', 1),
(132, '2016_01_26_115523_create_permission_role_table', 1),
(133, '2016_02_09_132439_create_permission_user_table', 1),
(134, '2019_08_19_000000_create_failed_jobs_table', 1),
(135, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(136, '2023_04_29_054032_create_vehicles_table', 1),
(137, '2023_04_29_070255_create_vehicle_ewaybill_masters_table', 1),
(138, '2023_04_29_071732_ewaybill', 1),
(139, '2023_05_18_095802_create_vewbgroups_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `model`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Can View Users', 'view.users', 'Can view users', 'Permission', '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL),
(2, 'Can Create Users', 'create.users', 'Can create new users', 'Permission', '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL),
(3, 'Can Edit Users', 'edit.users', 'Can edit users', 'Permission', '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL),
(4, 'Can Delete Users', 'delete.users', 'Can delete users', 'Permission', '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL),
(2, 2, 1, '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL),
(3, 3, 1, '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL),
(4, 4, 1, '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

DROP TABLE IF EXISTS `permission_user`;
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `permission_id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `level` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin', 'Admin Role', 5, '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL),
(2, 'User', 'user', 'User Role', 1, '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL),
(3, 'Unverified', 'unverified', 'Unverified Role', 0, '2023-04-29 02:02:44', '2023-04-29 02:02:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2023-04-29 02:05:22', '2023-04-29 02:05:22', NULL),
(2, 2, 2, '2023-04-29 02:05:22', '2023-04-29 02:05:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `customize` enum('No','Yes') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `name`, `value`, `customize`) VALUES
(1, 0, 'company_name', 'INTER INDIA READLINES', 'No'),
(2, 0, 'company_address', 'AHMEDABAD - 380050', 'No'),
(3, 0, 'company_contact', '+91 9825023781', 'No'),
(4, 0, 'company_email', 'admin@admin.com', 'No'),
(5, 0, 'company_website', 'https://www.ishanautomation.com', 'No'),
(6, 0, 'rows_per_page', '100', 'Yes'),
(7, 0, 'printer_name', '1020', 'Yes'),
(8, 0, 'service_tax', '0', 'No'),
(9, 0, 'hedu_cess', '2', 'No'),
(10, 0, 'edu_cess', '1', 'No'),
(11, 0, 'smtp_host', 'mail.connectithub.com', 'Yes'),
(12, 0, 'smtp_user', 'no-reply@connectithub.com', 'Yes'),
(13, 0, 'smtp_password', 'KH.bIAf,BZ88', 'Yes'),
(14, 0, 'smtp_port', '587', 'Yes'),
(15, 0, 'default_cc', 'automationishan@gmail.com', 'No'),
(19, 0, 'default_company', '1', 'Yes'),
(20, 0, 'icegate_fetch_frequency_min', '30', 'No'),
(21, 0, 'imap_host', '', 'No'),
(22, 0, 'imap_user', '', 'No'),
(23, 0, 'imap_password', '', 'No'),
(24, 0, 'imap_port', '', 'No'),
(25, 0, 'stamp_duty', '0.1', 'No'),
(26, 0, 'theme', 'bootstrap.min.css', 'Yes'),
(27, 0, 'tally_server', '', 'No'),
(28, 0, 'abatment', '75', 'No'),
(29, 0, 'chat_window', 'No', 'Yes'),
(30, 0, 'tds', '2', 'No'),
(31, 0, 'tds_surcharge', '0', 'No'),
(32, 0, 'tds_edu_cess', '0', 'No'),
(33, 0, 'tds_hedu_cess', '0', 'No'),
(34, 0, 'sms_api_url', 'https://msg.biometricsystems.co.in/api/api_http.php', 'No'),
(35, 0, 'sms_api_username', 'connectithub', 'No'),
(36, 0, 'sms_api_password', 'Martin77', 'No'),
(37, 0, 'sms_api_senderid', 'CIHGDM', 'No'),
(38, 0, 'sms_api_route', 'Informative', 'No'),
(39, 0, 'sms_api_otp_temp', '{OTP} is your one-time password and it is valid for the next 5 min. Pls, do not share this OTP with anyone.  Thank you  CONNECT IT HUB', 'No'),
(40, 0, 'sms_api_active', 'No', 'No'),
(41, 0, 'eway_test_auth_url', 'http://gstsandbox.charteredinfo.com/ewaybillapi/dec/v1.03/auth?', 'No'),
(42, 0, 'eway_test_ewaybill_url', 'http://gstsandbox.charteredinfo.com/ewaybillapi/dec/v1.03/ewayapi?', 'No'),
(43, 0, 'eway_test_asp_id', '1624731119', 'No'),
(44, 0, 'eway_test_password', 'Martin55!@', 'No'),
(45, 0, 'eway_test_gstin', '34AACCC1596Q002', 'No'),
(46, 0, 'eway_test_username', 'TaxProEnvPON', 'No'),
(47, 0, 'eway_test_ewbpwd', 'abc34*', 'No'),
(48, 0, 'eway_test_active', 'No', 'No'),
(49, 0, 'eway_auth_url', 'https://einvapi.charteredinfo.com/v1.03/dec/auth?', 'No'),
(50, 0, 'eway_ewaybill_url', 'https://einvapi.charteredinfo.com/v1.03/dec/ewayapi?', 'No'),
(51, 0, 'eway_asp_id', '1624731119', 'No'),
(52, 0, 'eway_password', 'Martin55!@', 'No'),
(53, 0, 'eway_gstin', '24AACCI6167K1ZD', 'No'),
(54, 0, 'eway_username', 'interindia_API_iir', 'No'),
(55, 0, 'eway_ewbpwd', 'interindia108', 'No'),
(56, 0, 'eway_active', 'Yes', 'No'),
(57, 0, 'eway_default_to', 'ops@interindiagroup.in', 'No'),
(58, 0, 'eway_default_cc', 'tracking@interindiagroup.in', 'No'),
(59, 0, 'eway_default_bcc', '', 'No'),
(60, 0, 'eway_default_source', 'TEST', 'No'),
(61, 0, 'user_eway_party', '', 'Yes'),
(62, 0, 'user_eway_from_place', '', 'Yes'),
(172, 1, 'rows_per_page', '100', 'No'),
(173, 1, 'printer_name', '1020', 'No'),
(174, 1, 'smtp_host', 'mail.connectithub.com', 'No'),
(175, 1, 'smtp_user', 'no-reply@connectithub.com', 'No'),
(176, 1, 'smtp_password', 'KH.bIAf,BZ88', 'No'),
(177, 1, 'smtp_port', '587', 'No'),
(178, 1, 'default_company', '1', 'No'),
(179, 1, 'theme', 'bootstrap.min.css', 'No'),
(180, 1, 'chat_window', 'No', 'No'),
(181, 1, 'user_eway_party', '', 'No'),
(182, 1, 'user_eway_from_place', '', 'No'),
(183, 2, 'rows_per_page', '100', 'No'),
(184, 2, 'printer_name', '1020', 'No'),
(185, 2, 'smtp_host', 'mail.connectithub.com', 'No'),
(186, 2, 'smtp_user', 'no-reply@connectithub.com', 'No'),
(187, 2, 'smtp_password', 'KH.bIAf,BZ88', 'No'),
(188, 2, 'smtp_port', '587', 'No'),
(189, 2, 'default_company', '1', 'No'),
(190, 2, 'theme', 'bootstrap.min.css', 'No'),
(191, 2, 'chat_window', 'No', 'No'),
(192, 2, 'user_eway_party', '', 'No'),
(193, 2, 'user_eway_from_place', '', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gst` char(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `code` char(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `union_territory` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `gst`, `code`, `name`, `union_territory`) VALUES
(35, '35', 'AN', 'ANDAMAN AND NICOBAR ISLANDS', 0),
(28, '28', 'AP', 'Andhra Pradesh', 0),
(18, '18', 'AS', 'Assam', 0),
(4, '04', 'CH', 'Chandigarh', 1),
(26, '26', 'DN', 'Dadra and Nagar Haveli', 1),
(7, '07', 'DL', 'Delhi', 1),
(24, '24', 'GJ', 'Gujarat', 0),
(6, '06', 'HR', 'Haryana', 0),
(2, '02', 'HP', 'Himachal Pradesh', 0),
(1, '01', 'JK', 'Jammu and Kashmir', 0),
(32, '32', 'KL', 'Kerala', 0),
(31, '31', 'LD', 'Lakshadweep', 1),
(27, '27', 'MH', 'Maharashtra', 0),
(14, '14', 'MN', 'Manipur', 0),
(17, '17', 'ML', 'Meghalaya', 0),
(29, '29', 'KA', 'Karnataka', 0),
(13, '13', 'NL', 'Nagaland', 0),
(21, '21', 'OR', 'Orissa', 0),
(34, '34', 'PY', 'Puducherry', 1),
(3, '03', 'PB', 'Punjab', 0),
(8, '08', 'RJ', 'Rajasthan', 0),
(33, '33', 'TN', 'Tamil Nadu', 0),
(16, '16', 'TR', 'Tripura', 0),
(19, '19', 'WB', 'West Bengal', 0),
(11, '11', 'SK', 'Sikkim', 0),
(12, '12', 'AR', 'Arunachal Pradesh', 0),
(15, '15', 'MZ', 'Mizoram', 0),
(25, '25', 'DD', 'Daman and Diu', 1),
(30, '30', 'GA', 'Goa', 0),
(10, '10', 'BR', 'Bihar', 0),
(23, '23', 'MP', 'Madhya Pradesh', 0),
(9, '09', 'UP', 'Uttar Pradesh', 0),
(22, '22', 'CG', 'Chhattisgarh', 0),
(20, '20', 'JH', 'Jharkhand', 0),
(5, '05', 'UA', 'Uttarakhand', 0),
(40, '36', 'AP', 'ANDHRA PRADESH NEW', 0),
(41, '37', 'AP', 'lADAKH', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$54n8WLzykyDH8M3CG/QKLer6I3aoUME0XXYwkrr1pLlMdRb3zUMKC', NULL, '2023-04-29 02:05:22', '2023-04-29 02:05:22'),
(2, 'User', 'user@user.com', NULL, '$2y$10$PrVfRay1yeOyJwLCTm34FeEusBUus8b/yaxSL1WKZInQXkEc0J4s6', NULL, '2023-04-29 02:05:22', '2023-04-29 02:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_ewaybill_masters`
--

DROP TABLE IF EXISTS `vehicle_ewaybill_masters`;
CREATE TABLE IF NOT EXISTS `vehicle_ewaybill_masters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicleno` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `eid` int NOT NULL,
  `updMode` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `fromPlace` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fromState` int NOT NULL,
  `tripshtNo` int NOT NULL,
  `userGSTINTransin` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `enteredDate` date NOT NULL,
  `transMode` int NOT NULL,
  `transDocNo` text COLLATE utf8mb3_unicode_ci,
  `transDocDate` date NOT NULL,
  `groupNo` int NOT NULL,
  `isgroup` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_VEMewbID_idx` (`eid`),
  KEY `FKewbID_idx` (`eid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `vehicle_ewaybill_masters`
--

INSERT INTO `vehicle_ewaybill_masters` (`id`, `vehicleno`, `eid`, `updMode`, `fromPlace`, `fromState`, `tripshtNo`, `userGSTINTransin`, `enteredDate`, `transMode`, `transDocNo`, `transDocDate`, `groupNo`, `isgroup`, `created_at`, `updated_at`) VALUES
(1, 'PVC1234', 1, 'API', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '12', '1970-01-01', 0, 0, NULL, NULL),
(2, 'PVC1234', 2, 'API', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '12', '1970-01-01', 0, 0, NULL, NULL),
(3, 'PVC1234', 3, 'API', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '12', '1970-01-01', 0, 0, NULL, NULL),
(4, 'PVC1234', 4, 'API', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '12', '1970-01-01', 0, 0, NULL, NULL),
(5, 'PVC1234', 5, 'API', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '12', '1970-01-01', 0, 0, NULL, NULL),
(6, 'PVC1234', 6, 'API', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '12', '1970-01-01', 0, 0, NULL, NULL),
(7, 'PVC1234', 7, 'API', 'Gali no.8', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '12', '1970-01-01', 0, 0, NULL, NULL),
(8, 'RJ22SL1450', 8, 'API', ' SUMERPUR', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '', '2023-04-20', 0, 0, NULL, NULL),
(9, 'GJ05GC9999', 9, 'API', 'SURAT - 395023', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '', '2023-04-20', 0, 0, NULL, NULL),
(10, 'PVC1234', 11, 'API', 'FRAZER TOWN', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, 'DOC/125', '2023-04-20', 0, 0, NULL, NULL),
(11, 'MH125454', 12, 'API', 'FRAZER TOWN', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, 'A12', '2022-03-02', 0, 0, NULL, NULL),
(12, 'GJ27X7664', 13, 'API', 'AHMEDABAD', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '', '1970-01-01', 0, 0, NULL, NULL),
(13, 'GJ00ZZ1001', 14, 'API', 'ahmedabad', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '2112155454545', '2023-04-20', 0, 0, NULL, NULL),
(14, 'GJ00ZZ1001', 15, 'API', 'ahmedabad', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '2112155454545', '2023-04-20', 0, 0, NULL, NULL),
(15, 'MH09AB1234', 16, 'API', 'Maharashtra', 34, 0, '34AACCC1596Q002', '2023-04-20', 1, '', '2023-04-20', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vewbgroups`
--

DROP TABLE IF EXISTS `vewbgroups`;
CREATE TABLE IF NOT EXISTS `vewbgroups` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vewbid` int NOT NULL,
  `userid` int NOT NULL,
  `drivermobileno` double NOT NULL,
  `irno` int NOT NULL,
  `irdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehicle_ewaybill_masters`
--
ALTER TABLE `vehicle_ewaybill_masters`
  ADD CONSTRAINT `FKewbID` FOREIGN KEY (`eid`) REFERENCES `ewaybills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

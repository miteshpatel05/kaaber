-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2023 at 10:01 AM
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
  `ewbId` int DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ewaybills`
--

INSERT INTO `ewaybills` (`id`, `ewbId`, `trackingId`, `driverNo`, `partyNo`, `ownerNo`, `ewbVehicleType`, `ewbNo`, `ewayBillDate`, `genMode`, `userGstin`, `supplyType`, `subSupplyType`, `docType`, `docNo`, `docDate`, `fromGstin`, `fromTrdName`, `fromAddr1`, `fromAddr2`, `fromPlace`, `fromPincode`, `fromStateCode`, `toGstin`, `toTrdName`, `toAddr1`, `toAddr2`, `toPlace`, `toPincode`, `toStateCode`, `totalValue`, `totInvValue`, `cgstValue`, `sgstValue`, `igstValue`, `cessValue`, `transporterId`, `transporterName`, `status`, `actualDist`, `noValidDays`, `transitDist`, `transitDays`, `remainDist`, `remainDays`, `validUpto`, `extendedTimes`, `rejectStatus`, `vehicleType`, `actFromStateCode`, `actToStateCode`, `transactionType`, `otherValue`, `cessNonAdvolValue`, `VehiclListDetails`, `itemList`, `ownStatus`, `child_updMode`, `child_vehicleNo`, `child_fromPlace`, `child_fromState`, `child_tripshtNo`, `child_userGSTINTransin`, `child_enteredDate`, `child_transMode`, `child_transDocNo`, `child_transDocDate`, `child_groupNo`, `child_extandNumber`, `created_at`, `created_by`, `updated_at`, `updated_by`, `isDeleted`, `deleted_at`, `deleted_by`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, 561008883595, '2023-05-14 23:15:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'DOC12345678ew', '2023-05-15 00:00:00', '34AACCC1596Q002', 'NIC Industries', '7th block, kuvempu layout', 'kuvempu layout', 'Banagalore', 605001, '34', '29AWGPV7107B1Z1', 'XYZ Industries', '7th block, kuvempu layout', 'kuvempu layout', 'Banagalore', 562160, '29', '9978.84', '12908.00', '0.00', '0.00', '1197.46', '508.94', '12AWGPV7107B1Z1', 'XYZ EXPORTS', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-05-17 23:59:00', 0, 'N', 'R', '34', '29', 'Combination-of-2-and-3', '1222.76', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:8:\"KA123456\";s:9:\"fromPlace\";s:10:\"Banagalore\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 11:15:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:5:\"DOC01\";s:12:\"transDocDate\";s:10:\"15/05/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:4:\"Rice\";s:7:\"hsnCode\";i:100610;s:8:\"quantity\";d:100.35;s:7:\"qtyUnit\";s:3:\"BAG\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";d:5;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:9978.84;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:23', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:23', 9999, '2023-05-22 11:31:42', 1, 'No', '2023-05-22 11:31:42', 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 591008883594, '2023-05-14 23:14:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'DOC1234567896734', '2023-05-15 00:00:00', '34AACCC1596Q002', 'NIC Industries', '7th block, kuvempu layout', 'kuvempu layout', 'Banagalore', 605001, '34', '29AWGPV7107B1Z1', 'XYZ Industries', '7th block, kuvempu layout', 'kuvempu layout', 'Banagalore', 562160, '29', '9978.84', '12908.00', '0.00', '0.00', '1197.46', '508.94', '12AWGPV7107B1Z1', 'XYZ EXPORTS', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-05-17 23:59:00', 0, 'N', 'R', '34', '29', 'Combination-of-2-and-3', '1222.76', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:8:\"KA123456\";s:9:\"fromPlace\";s:10:\"Banagalore\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 11:14:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:5:\"DOC01\";s:12:\"transDocDate\";s:10:\"15/05/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:4:\"Rice\";s:7:\"hsnCode\";i:100610;s:8:\"quantity\";d:100.35;s:7:\"qtyUnit\";s:3:\"BAG\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";d:5;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:9978.84;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:23', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:23', 9999, '2023-05-22 11:31:48', 1, 'No', '2023-05-22 11:31:48', 1),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 521008883593, '2023-05-14 22:20:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '4/23', '2023-04-02 00:00:00', '34AACCC1596Q002', 'NIC company pvt ltd', 'HOUSE NO.1793, 2ND FLOOR, J.V.C. COMPLEX,', 'KAMAN ROAD, KARIWALI VILLAGE,', 'BHIWANDI', 421302, '34', '24AABCR1283N2Z7', 'RUCHI SYNTHETICS PVT. LTD. (SURAT)', '60, RADHE MARKET,', 'RING ROAD,', 'SURAT', 395002, '24', '68757.60', '72195.00', '0.00', '0.00', '3437.88', '0.00', '24CRPPS6468C1ZB', 'MATA CARGO CARRIER (24CRPPS6468C1ZB)', 'ACT', 279, 2, NULL, 0, 0, 0, '2023-05-17 23:59:00', 0, 'N', 'R', '27', '24', 'Combination-of-2-and-3', '-0.48', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH00AA0000\";s:9:\"fromPlace\";s:8:\"BHIWANDI\";s:9:\"fromState\";i:27;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 10:20:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:4:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:8:\"JET PARA\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:374;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:23188;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:11:\"DUSTER PARA\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:187.6;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:11443.6;}i:2;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:3;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:10:\"KUMKUM GPO\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:188;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:11656;}i:3;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:4;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:10:\"SILVER GPO\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:374.5;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:22470;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:24', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:24', 9999, '2023-05-22 11:31:52', 1, 'No', '2023-05-22 11:31:52', 1),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 551008883592, '2023-05-15 22:15:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '3/23', '2023-04-02 00:00:00', '34AACCC1596Q002', 'NIC company pvt ltd', 'HOUSE NO.1793, 2ND FLOOR, J.V.C. COMPLEX,', 'KAMAN ROAD, KARIWALI VILLAGE,', 'BHIWANDI', 421302, '34', '24AABCR1283N2Z7', 'RUCHI SYNTHETICS PVT. LTD. (SURAT)', '60, RADHE MARKET,', 'RING ROAD,', 'SURAT', 395002, '24', '68757.60', '72195.00', '0.00', '0.00', '3437.88', '0.00', '24CRPPS6468C1ZB', 'MATA CARGO CARRIER (24CRPPS6468C1ZB)', 'ACT', 279, 2, NULL, 0, 0, 0, '2023-05-17 23:59:00', 0, 'N', 'R', '27', '24', 'Combination-of-2-and-3', '-0.48', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH00AA0000\";s:9:\"fromPlace\";s:8:\"BHIWANDI\";s:9:\"fromState\";i:27;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 10:15:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:4:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:8:\"JET PARA\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:374;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:23188;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:11:\"DUSTER PARA\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:187.6;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:11443.6;}i:2;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:3;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:10:\"KUMKUM GPO\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:188;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:11656;}i:3;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:4;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:10:\"SILVER GPO\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:374.5;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:22470;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:25', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:25', 9999, '2023-05-22 10:04:25', 1, 'No', '2023-05-22 10:04:25', 1),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 581008883591, '2023-05-15 22:14:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '2/23', '2023-04-02 00:00:00', '34AACCC1596Q002', 'NIC company pvt ltd', 'HOUSE NO.1793, 2ND FLOOR, J.V.C. COMPLEX,', 'KAMAN ROAD, KARIWALI VILLAGE,', 'BHIWANDI', 421302, '34', '24AABCR1283N2Z7', 'RUCHI SYNTHETICS PVT. LTD. (SURAT)', '60, RADHE MARKET,', 'RING ROAD,', 'SURAT', 395002, '24', '68757.60', '72195.00', '0.00', '0.00', '3437.88', '0.00', '24CRPPS6468C1ZB', 'MATA CARGO CARRIER (24CRPPS6468C1ZB)', 'ACT', 279, 2, NULL, 0, 0, 0, '2023-05-17 23:59:00', 0, 'N', 'R', '27', '24', 'Combination-of-2-and-3', '-0.48', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH00AA0000\";s:9:\"fromPlace\";s:8:\"BHIWANDI\";s:9:\"fromState\";i:27;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 10:14:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:4:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:8:\"JET PARA\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:374;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:23188;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:11:\"DUSTER PARA\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:187.6;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:11443.6;}i:2;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:3;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:10:\"KUMKUM GPO\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:188;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:11656;}i:3;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:4;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:10:\"SILVER GPO\";s:7:\"hsnCode\";i:540710;s:8:\"quantity\";d:374.5;s:7:\"qtyUnit\";s:3:\"MTR\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:5;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:22470;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:26', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:26', 9999, '2023-05-22 10:04:26', 1, 'No', '2023-05-22 10:04:26', 1),
(6, NULL, NULL, NULL, NULL, NULL, NULL, 511008883590, '2023-05-15 19:00:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '70', '2023-05-15 00:00:00', '34AACCC1596Q002', 'Neelkamal test', '364, Villianur Main Rd, Nellithope', 'Kuyavarpalayam, Puducherry', 'Kuyavarpalayam', 605005, '34', '07AABCU9603R1ZP', 'Ujjivan Small Finance Bank Limited', 'Khampur Raya Village Shadi Kampur Plot No. 2364 / 8', 'Khampur Raya Village Shadi Kampur', 'New Delhi', 110008, '7', '2050.00', '2419.00', '0.00', '0.00', '369.00', '0.00', '05AAABC0181E1ZE', 'Rail transport', 'ACT', 2350, 12, NULL, 0, 0, 0, '1970-01-01 00:00:00', 0, 'N', '', '34', '7', 'Regular', '0.00', '0.00', 'a:0:{}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:9:\"A1 Trolly\";s:11:\"productDesc\";s:3:\"ANY\";s:7:\"hsnCode\";i:2515;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"OTH\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:2050;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:27', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:27', 9999, '2023-05-22 10:04:27', 1, 'No', '2023-05-22 10:04:27', 1),
(7, NULL, NULL, NULL, NULL, NULL, NULL, 551008883589, '2023-05-15 18:33:00', 'API', '34AACCC1596Q002', 'O', 'Others', 'OTH', 'PR00000002', '2022-05-07 00:00:00', '34AACCC1596Q002', 'NIRAV ENGINEERING WORKS', 'C-194 / C-195, AKSHAY MITTAL IND.ESTATE', 'SANJAY BLDG.NO.5 , SIR M.V.ROAD,', 'PONDICHERRY', 605001, '34', '24AKTPP1693H1ZN', 'Devikrupa Brass Industries', 'Plot No.66, Mukta Estate', 'Radar Road, Shankar Tekri', 'Jamnagar', 361004, '24', '21533.25', '27863.00', '0.00', '0.00', '6029.31', '0.00', '', '', 'ACT', 2094, 11, NULL, 0, 0, 0, '2023-05-26 23:59:00', 0, 'N', 'R', '34', '24', 'Regular', '300.44', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH12BE1234\";s:9:\"fromPlace\";s:11:\"PONDICHERRY\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 06:33:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:4:\"BOX2\";s:12:\"transDocDate\";s:10:\"07/05/2022\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:43:\"Parts and accessories of the motor vehicles\";s:11:\"productDesc\";s:30:\"Parts and accessories of the m\";s:7:\"hsnCode\";i:87086000;s:8:\"quantity\";d:592;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:21533.25;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:27', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:27', 9999, '2023-05-22 10:04:27', 1, 'No', '2023-05-22 10:04:27', 1),
(8, NULL, NULL, NULL, NULL, NULL, NULL, 581008883588, '2023-05-15 17:59:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'SB00000298', '2023-03-15 00:00:00', '34AACCC1596Q002', 'NIRAV ENGINEERING WORKS', 'C-194 / C-195, AKSHAY MITTAL IND.ESTATE', 'SANJAY BLDG.NO.5 , SIR M.V.ROAD,', 'PONDICHERRY', 605001, '34', '05AAACT2727Q1Z2', 'Tata Motors Ltd. (Utk.)', 'Tata Motors Ltd. (Utk.)', 'PLOT NO.1,SECTOR-G, IIE-SIDCUL , PANTANAGAR,', 'UTTARANCHAL', 263153, '5', '3241954.80', '3825507.00', '0.00', '0.00', '583551.86', '0.00', '', '', 'ACT', 2551, 13, NULL, 0, 0, 0, '2023-05-28 23:59:00', 0, 'N', 'R', '34', '5', 'BillTo-ShipTo', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH48BE1234\";s:9:\"fromPlace\";s:11:\"PONDICHERRY\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 05:59:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:23:\"Washers  hardware items\";s:11:\"productDesc\";s:23:\"Washers  hardware items\";s:7:\"hsnCode\";i:73182200;s:8:\"quantity\";d:9028000;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:3241954.8;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:28', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:28', 9999, '2023-05-22 10:04:28', 1, 'No', '2023-05-22 10:04:28', 1),
(9, NULL, NULL, NULL, NULL, NULL, NULL, 511008883587, '2023-05-15 17:53:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV/2023/00046', '2023-05-15 00:00:00', '34AACCC1596Q002', 'Spica Hydraulics Pvt Ltd', 'Shed No C30', '', 'Belgaum', 590008, '34', '08ABZPM1758K1ZS', 'Swastik Corporation', 'F-6, 1st Floor, Shri Raja Ram Complex,,Loha Mandi, SC Road,', '', 'Jaipur', 302001, '8', '599.00', '706.82', '0.00', '0.00', '107.82', '0.00', '34AACCC1596Q002', 'HGFD', 'ACT', 1663, 9, NULL, 0, 0, 0, '2023-05-24 23:59:00', 0, 'N', 'R', '29', '8', 'Combination-of-2-and-3', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"KA03TR1234\";s:9:\"fromPlace\";s:7:\"Belgaum\";s:9:\"fromState\";i:29;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 05:53:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:43:\"[004_110_001mk_A] Y09750\nRotation C750 Body\";s:7:\"hsnCode\";i:29420090;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"UNT\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:599;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:29', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:29', 9999, '2023-05-22 10:04:29', 1, 'No', '2023-05-22 10:04:29', 1),
(10, NULL, NULL, NULL, NULL, NULL, NULL, 541008883586, '2023-05-15 17:50:00', 'API', '34AACCC1596Q002', 'O', 'Others', 'OTH', 'PR00000003', '2022-05-07 00:00:00', '34AACCC1596Q002', 'NIRAV ENGINEERING WORKS', 'C-194 / C-195, AKSHAY MITTAL IND.ESTATE', 'SANJAY BLDG.NO.5 , SIR M.V.ROAD,', 'PONDICHERRY', 605001, '34', '24AKTPP1693H1ZN', 'Devikrupa Brass Industries', 'Plot No.66, Mukta Estate', 'Radar Road, Shankar Tekri', 'Jamnagar', 361004, '24', '24961.22', '31950.00', '0.00', '0.00', '6989.14', '0.00', '', '', 'ACT', 2094, 11, NULL, 0, 0, 0, '2023-05-26 23:59:00', 0, 'N', 'R', '34', '24', 'Regular', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH48AE1234\";s:9:\"fromPlace\";s:11:\"PONDICHERRY\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 05:50:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:4:\"BOX2\";s:12:\"transDocDate\";s:10:\"07/05/2022\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:43:\"Parts and accessories of the motor vehicles\";s:11:\"productDesc\";s:30:\"Parts and accessories of the m\";s:7:\"hsnCode\";i:87086000;s:8:\"quantity\";d:566;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:24961.22;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:30', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:30', 9999, '2023-05-22 10:04:30', 1, 'No', '2023-05-22 10:04:30', 1),
(11, NULL, NULL, NULL, NULL, NULL, NULL, 571008883585, '2023-05-15 17:47:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'INV/2023/00045', '2023-05-15 00:00:00', '34AACCC1596Q002', 'Spica Hydraulics Pvt Ltd', 'Shed No C30', '', 'Belgaum', 590008, '34', '33AAACF5094Q1Z7', 'Agro Hytos Pvt Ltd', 'SF. No.82B/2B, 85/2, Sandegoundanpalayam,,Kovilpalayam Post, Pollachi', '', 'Coimbatore', 642110, '33', '1.00', '1.18', '0.00', '0.00', '0.18', '0.00', '34AACCC1596Q002', 'ertyu', 'ACT', 907, 5, NULL, 0, 0, 0, '2023-05-20 23:59:00', 0, 'N', 'R', '29', '33', 'Combination-of-2-and-3', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"KA06TG1234\";s:9:\"fromPlace\";s:7:\"Belgaum\";s:9:\"fromState\";i:29;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 05:47:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:43:\"[004_770_001mk_A] Y09055\nADB Stair Manifold\";s:7:\"hsnCode\";i:84818030;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"UNT\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";i:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:1;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:31', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:31', 9999, '2023-05-22 10:04:31', 1, 'No', '2023-05-22 10:04:31', 1),
(12, NULL, NULL, NULL, NULL, NULL, NULL, 501008883584, '2023-05-15 17:38:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'DOC123456789673', '2023-05-15 00:00:00', '34AACCC1596Q002', 'NIC Industries', '7th block, kuvempu layout', 'kuvempu layout', 'Banagalore', 605001, '34', '29AWGPV7107B1Z1', 'XYZ Industries', '7th block, kuvempu layout', 'kuvempu layout', 'Banagalore', 562160, '29', '9978.84', '12908.00', '0.00', '0.00', '1197.46', '508.94', '12AWGPV7107B1Z1', 'XYZ EXPORTS', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-05-17 23:59:00', 0, 'N', 'R', '34', '29', 'Combination-of-2-and-3', '1222.76', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:8:\"KA123456\";s:9:\"fromPlace\";s:10:\"Banagalore\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 05:38:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:5:\"DOC01\";s:12:\"transDocDate\";s:10:\"15/05/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:4:\"Rice\";s:7:\"hsnCode\";i:100610;s:8:\"quantity\";d:100.35;s:7:\"qtyUnit\";s:3:\"BAG\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";d:5;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:9978.84;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:32', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:32', 9999, '2023-05-22 10:04:32', 1, 'No', '2023-05-22 10:04:32', 1),
(13, NULL, NULL, NULL, NULL, NULL, NULL, 561008883582, '2023-05-15 17:26:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'DOC12345678967', '2023-05-15 00:00:00', '34AACCC1596Q002', 'NIC Industries', '7th block, kuvempu layout', 'kuvempu layout', 'Banagalore', 605001, '34', '29AWGPV7107B1Z1', 'XYZ Industries', '7th block, kuvempu layout', 'kuvempu layout', 'Banagalore', 562160, '29', '9978.84', '12908.00', '0.00', '0.00', '1197.46', '508.94', '12AWGPV7107B1Z1', 'XYZ EXPORTS', 'ACT', 362, 2, NULL, 0, 0, 0, '2023-05-17 23:59:00', 0, 'N', 'R', '34', '29', 'Combination-of-2-and-3', '1222.76', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:8:\"KA123456\";s:9:\"fromPlace\";s:10:\"Banagalore\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 05:26:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:5:\"DOC01\";s:12:\"transDocDate\";s:10:\"15/05/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:4:\"Rice\";s:7:\"hsnCode\";i:100610;s:8:\"quantity\";d:100.35;s:7:\"qtyUnit\";s:3:\"BAG\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:12;s:8:\"cessRate\";d:5;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:9978.84;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:32', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:32', 9999, '2023-05-22 10:04:32', 1, 'No', '2023-05-22 10:04:32', 1),
(14, NULL, NULL, NULL, NULL, NULL, NULL, 531008883583, '2023-05-15 17:26:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '69', '2023-05-15 00:00:00', '34AACCC1596Q002', 'Neelkamal test', 'B-426, S umel Business  Park-7,', 'Near  Soni Ni Chali,', 'Ahmedabad', 382350, '34', '07AABCU9603R1ZP', 'Ujjivan Small Finance Bank Limited', 'Khampur Raya Village Shadi Kampur Plot No. 2364 / 8', 'Khampur Raya Village Shadi Kampur', 'New Delhi', 110008, '7', '2050.00', '2419.00', '0.00', '0.00', '369.00', '0.00', '05AAABC0181E1ZE', 'Logistar', 'ACT', 925, 5, NULL, 0, 0, 0, '2023-05-20 23:59:00', 0, 'N', 'R', '24', '7', 'Bill-From-Dispatch-From', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"GJ01DX4567\";s:9:\"fromPlace\";s:9:\"Ahmedabad\";s:9:\"fromState\";i:24;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 05:26:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:15:\"A1 Trolly (ANY)\";s:7:\"hsnCode\";i:2515;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"OTH\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:2050;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:33', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:33', 9999, '2023-05-22 10:04:33', 1, 'No', '2023-05-22 10:04:33', 1),
(15, NULL, NULL, NULL, NULL, NULL, NULL, 591008883581, '2023-05-15 17:16:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '68', '2023-05-15 00:00:00', '34AACCC1596Q002', 'Neelkamal test', 'B-426, S\'umel Business Park-7,', 'Near Soni Ni Chali,', 'Ahmedabad', 382350, '34', '07AABCU9603R1ZP', 'Ujjivan Small Finance Bank Limited', 'Khampur Raya Village Shadi Kampur Plot No. 2364 / 8', 'Khampur Raya Village Shadi Kampur', 'New Delhi', 110008, '7', '2050.00', '2419.00', '0.00', '0.00', '369.00', '0.00', '05AAABC0181E1ZE', 'Logistar', 'ACT', 925, 5, NULL, 0, 0, 0, '2023-05-20 23:59:00', 0, 'N', 'R', '24', '7', 'Bill-From-Dispatch-From', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"GJ01DX4567\";s:9:\"fromPlace\";s:9:\"Ahmedabad\";s:9:\"fromState\";i:24;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 05:16:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:0:\"\";s:11:\"productDesc\";s:15:\"A1 Trolly (ANY)\";s:7:\"hsnCode\";i:2515;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"OTH\";s:8:\"cgstRate\";i:0;s:8:\"sgstRate\";i:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:2050;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:34', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:34', 9999, '2023-05-22 10:04:34', 1, 'No', '2023-05-22 10:04:34', 1),
(16, NULL, NULL, NULL, NULL, NULL, NULL, 591008883578, '2023-05-15 16:51:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '78', '2021-04-16 00:00:00', '34AACCC1596Q002', 'VRAJ RAJ INDUSTRIES', '2ND CROSS NO 59  19  A', 'GROUND FLOOR OSBORNE ROAD', 'FRAZER TOWN', 605001, '34', '05AAACG0904A1ZL', 'sthuthya', 'Shree Nilaya', 'Dasarahosahalli', 'Beml Nagar', 263652, '5', '0.00', '300.00', '0.00', '0.00', '0.00', '0.00', '', '', 'ACT', 2686, 14, NULL, 0, 0, 0, '2023-05-29 23:59:00', 0, 'N', 'R', '34', '5', 'Regular', '-100.00', '400.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:11:\"FRAZER TOWN\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 04:51:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:2:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:5:\"Wheat\";s:11:\"productDesc\";s:5:\"Wheat\";s:7:\"hsnCode\";i:1001;s:8:\"quantity\";d:4;s:7:\"qtyUnit\";s:3:\"BOX\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:0;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:5:\"Steel\";s:11:\"productDesc\";s:5:\"Steel\";s:7:\"hsnCode\";i:7213;s:8:\"quantity\";d:4;s:7:\"qtyUnit\";s:3:\"BOX\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:0;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:35', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:35', 9999, '2023-05-22 10:04:35', 1, 'No', '2023-05-22 10:04:35', 1),
(17, NULL, NULL, NULL, NULL, NULL, NULL, 521008883577, '2023-05-15 16:50:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', '60', '2021-04-16 00:00:00', '34AACCC1596Q002', 'VRAJ RAJ INDUSTRIES', '2ND CROSS NO 59  19  A', 'GROUND FLOOR OSBORNE ROAD', 'FRAZER TOWN', 605001, '34', '05AAACG0904A1ZL', 'sthuthya', 'Shree Nilaya', 'Dasarahosahalli', 'Beml Nagar', 263652, '5', '0.00', '300.00', '0.00', '0.00', '0.00', '0.00', '', '', 'ACT', 2686, 14, NULL, 0, 0, 0, '2023-05-29 23:59:00', 0, 'N', 'R', '34', '5', 'Regular', '-100.00', '400.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:11:\"FRAZER TOWN\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 04:50:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:2:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:5:\"Wheat\";s:11:\"productDesc\";s:5:\"Wheat\";s:7:\"hsnCode\";i:1001;s:8:\"quantity\";d:4;s:7:\"qtyUnit\";s:3:\"BOX\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:0;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:5:\"Steel\";s:11:\"productDesc\";s:5:\"Steel\";s:7:\"hsnCode\";i:7213;s:8:\"quantity\";d:4;s:7:\"qtyUnit\";s:3:\"BOX\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:0;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:35', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:35', 9999, '2023-05-22 10:04:35', 1, 'No', '2023-05-22 10:04:35', 1),
(18, NULL, NULL, NULL, NULL, NULL, NULL, 551008883576, '2023-05-15 16:42:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'abc132', '2021-04-16 00:00:00', '34AACCC1596Q002', 'VRAJ RAJ INDUSTRIES', '2ND CROSS NO 59  19  A', 'GROUND FLOOR OSBORNE ROAD', 'FRAZER TOWN', 605001, '34', '05AAACG0904A1ZL', 'sthuthya', 'Shree Nilaya', 'Dasarahosahalli', 'Beml Nagar', 263652, '5', '0.00', '300.00', '0.00', '0.00', '0.00', '0.00', '', '', 'ACT', 2686, 14, NULL, 0, 0, 0, '2023-05-29 23:59:00', 0, 'N', 'R', '34', '5', 'Regular', '-100.00', '400.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:11:\"FRAZER TOWN\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 04:42:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:0:\"\";s:12:\"transDocDate\";N;s:7:\"groupNo\";s:1:\"0\";}}', 'a:2:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:5:\"Wheat\";s:11:\"productDesc\";s:5:\"Wheat\";s:7:\"hsnCode\";i:1001;s:8:\"quantity\";d:4;s:7:\"qtyUnit\";s:3:\"BOX\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:0;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:5:\"Steel\";s:11:\"productDesc\";s:5:\"Steel\";s:7:\"hsnCode\";i:7213;s:8:\"quantity\";d:4;s:7:\"qtyUnit\";s:3:\"BOX\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:0;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:36', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:36', 9999, '2023-05-22 10:04:36', 1, 'No', '2023-05-22 10:04:36', 1),
(19, NULL, NULL, NULL, NULL, NULL, NULL, 541008883573, '2023-05-15 15:57:00', 'API', '34AACCC1596Q002', 'O', 'Others', 'OTH', 'PR00000041', '2023-01-30 00:00:00', '34AACCC1596Q002', 'NIRAV ENGINEERING WORKS', 'C-194 / C-195, AKSHAY MITTAL IND.ESTATE', 'SANJAY BLDG.NO.5 , SIR M.V.ROAD,', 'PONDICHERRY', 605001, '34', '24AKTPP1693H1ZN', 'Devikrupa Brass Industries', 'Plot No.66, Mukta Estate', 'Radar Road, Shankar Tekri', 'Jamnagar', 361004, '24', '28247.16', '36156.00', '0.00', '0.00', '7909.20', '0.00', '', '', 'ACT', 2094, 11, NULL, 0, 0, 0, '2023-05-26 23:59:00', 0, 'N', 'R', '34', '24', 'Regular', '0.36', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH48AE2318\";s:9:\"fromPlace\";s:11:\"PONDICHERRY\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 03:57:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:6:\"BOX  2\";s:12:\"transDocDate\";s:10:\"30/01/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:2:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:43:\"Parts and accessories of the motor vehicles\";s:11:\"productDesc\";s:30:\"Parts and accessories of the m\";s:7:\"hsnCode\";i:87086000;s:8:\"quantity\";d:397;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:17642.19;}i:1;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:2;s:9:\"productId\";i:0;s:11:\"productName\";s:10:\"Auto Parts\";s:11:\"productDesc\";s:10:\"Auto Parts\";s:7:\"hsnCode\";i:87089900;s:8:\"quantity\";d:396;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:10604.97;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:37', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:37', 9999, '2023-05-22 10:04:37', 1, 'No', '2023-05-22 10:04:37', 1),
(20, NULL, NULL, NULL, NULL, NULL, NULL, 521008883564, '2023-05-15 13:22:00', 'API', '34AACCC1596Q002', 'O', 'Others', 'OTH', 'PR00000040', '2023-01-30 00:00:00', '34AACCC1596Q002', 'NIRAV ENGINEERING WORKS', 'C-194 / C-195, AKSHAY MITTAL IND.ESTATE', 'SANJAY BLDG.NO.5 , SIR M.V.ROAD,', 'PONDICHERRY', 605001, '34', '24AKTPP1693H1ZN', 'Devikrupa Brass Industries', 'Plot No.66, Mukta Estate', 'Radar Road, Shankar Tekri', 'Jamnagar', 361004, '24', '47568.41', '61188.00', '0.00', '0.00', '13319.15', '0.00', '', '', 'ACT', 2094, 11, NULL, 0, 0, 0, '2023-05-26 23:59:00', 0, 'N', 'R', '34', '24', 'Regular', '300.44', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH48BV2391\";s:9:\"fromPlace\";s:11:\"PONDICHERRY\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 01:22:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:6:\"BOX  3\";s:12:\"transDocDate\";s:10:\"30/01/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:43:\"Parts and accessories of the motor vehicles\";s:11:\"productDesc\";s:30:\"Parts and accessories of the m\";s:7:\"hsnCode\";i:87086000;s:8:\"quantity\";d:1498;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:47568.41;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:38', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:38', 9999, '2023-05-22 10:04:38', 1, 'No', '2023-05-22 10:04:38', 1),
(21, NULL, NULL, NULL, NULL, NULL, NULL, 551008883563, '2023-05-15 13:16:00', 'API', '34AACCC1596Q002', 'O', 'Others', 'OTH', 'PR00000042', '2023-01-30 00:00:00', '34AACCC1596Q002', 'NIRAV ENGINEERING WORKS', 'C-194 / C-195, AKSHAY MITTAL IND.ESTATE', 'SANJAY BLDG.NO.5 , SIR M.V.ROAD,', 'PONDICHERRY', 605001, '34', '24CYNPS2200P1Z2', 'Sonal Brass', 'Plot No.4729/2, GIDC-', 'Phase-III', 'JAMNAGAR', 361004, '24', '8622.67', '11337.00', '0.00', '0.00', '2414.35', '0.00', '', '', 'ACT', 2094, 11, NULL, 0, 0, 0, '2023-05-26 23:59:00', 0, 'N', 'R', '34', '24', 'Regular', '300.02', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH48BV2391\";s:9:\"fromPlace\";s:11:\"PONDICHERRY\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 01:16:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:6:\"BOX  1\";s:12:\"transDocDate\";s:10:\"30/01/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:43:\"Parts and accessories of the motor vehicles\";s:11:\"productDesc\";s:30:\"Parts and accessories of the m\";s:7:\"hsnCode\";i:87086000;s:8:\"quantity\";d:368;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:8622.67;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:38', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:38', 9999, '2023-05-22 10:04:38', 1, 'No', '2023-05-22 10:04:38', 1),
(22, NULL, NULL, NULL, NULL, NULL, NULL, 511008883561, '2023-05-15 13:00:00', 'API', '34AACCC1596Q002', 'O', 'Others', 'OTH', 'PR00000046', '2023-02-28 00:00:00', '34AACCC1596Q002', 'NIRAV ENGINEERING WORKS', 'C-194 / C-195, AKSHAY MITTAL IND.ESTATE', 'SANJAY BLDG.NO.5 , SIR M.V.ROAD,', 'PONDICHERRY', 605001, '34', '27ACGPK4061M1ZD', 'Karvir Industry', 'Behind Parsi Agyari', 'Tarapur Village', 'Tarapur', 401502, '27', '5495.49', '6270.00', '0.00', '0.00', '274.77', '0.00', '', '', 'ACT', 1400, 7, NULL, 0, 0, 0, '2023-05-22 23:59:00', 0, 'N', 'R', '34', '27', 'Regular', '500.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:10:\"MH14BV2318\";s:9:\"fromPlace\";s:11:\"PONDICHERRY\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 01:00:00 PM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:6:\"BOX  1\";s:12:\"transDocDate\";s:10:\"28/02/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:43:\"Parts and accessories of the motor vehicles\";s:11:\"productDesc\";s:30:\"Parts and accessories of the m\";s:7:\"hsnCode\";i:87086000;s:8:\"quantity\";d:27;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:0;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:5495.49;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:39', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:39', 9999, '2023-05-22 10:04:39', 1, 'No', '2023-05-22 10:04:39', 1),
(23, NULL, NULL, NULL, NULL, NULL, NULL, 511008883558, '2023-05-15 10:41:00', 'API', '34AACCC1596Q002', 'O', 'Supply', 'INV', 'TN33STS220000300', '2023-05-08 00:00:00', '34AACCC1596Q002', 'TVS ELECTRONICS LTD -CHENNAI', 'Scorpion Group-N 28 ECN Road,Near CSI Church,Vadaperumpakkam,Chettimedu Road,,CHENNAI', 'CHENNAI', 'CHENNAI', 605001, '34', '29AACCC1596Q000', 'TVS ELECTRONICS LTD-TK', 'PANDITHANHALLI, HIREHALLI POST,', 'Tumakuru', 'Tumakuru', 572168, '29', '3815.72', '4502.55', '0.00', '0.00', '686.83', '0.00', '27AAACE5491L1ZA', 'EPITOME COMPONENTS LTD.', 'ACT', 377, 2, NULL, 0, 0, 0, '2023-05-17 23:59:00', 0, 'N', 'R', '34', '29', 'Regular', '0.00', '0.00', 'a:1:{i:0;O:8:\"stdClass\":11:{s:7:\"updMode\";s:3:\"API\";s:9:\"vehicleNo\";s:7:\"PVC1234\";s:9:\"fromPlace\";s:7:\"CHENNAI\";s:9:\"fromState\";i:34;s:9:\"tripshtNo\";i:0;s:16:\"userGSTINTransin\";s:15:\"34AACCC1596Q002\";s:11:\"enteredDate\";s:22:\"15/05/2023 10:41:00 AM\";s:9:\"transMode\";s:1:\"1\";s:10:\"transDocNo\";s:6:\"Doc001\";s:12:\"transDocDate\";s:10:\"08/05/2023\";s:7:\"groupNo\";s:1:\"0\";}}', 'a:1:{i:0;O:8:\"stdClass\":13:{s:6:\"itemNo\";i:1;s:9:\"productId\";i:0;s:11:\"productName\";s:32:\"COMP.PRINTER RIBBON 80C, IB -50P\";s:11:\"productDesc\";s:30:\"COMP.PRINTER RIBBON 80C, IB -5\";s:7:\"hsnCode\";i:96121010;s:8:\"quantity\";d:1;s:7:\"qtyUnit\";s:3:\"NOS\";s:8:\"cgstRate\";d:0;s:8:\"sgstRate\";d:0;s:8:\"igstRate\";d:18;s:8:\"cessRate\";d:0;s:12:\"cessNonAdvol\";d:0;s:13:\"taxableAmount\";d:3815.72;}}', 'Pending', '', '', '', 0, 0, '', '2023-05-22 15:34:40', '1', NULL, NULL, 0, NULL, '2023-05-22 10:04:40', 9999, '2023-05-22 10:04:40', 1, 'No', '2023-05-22 10:04:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ewbextvalidities`
--

DROP TABLE IF EXISTS `ewbextvalidities`;
CREATE TABLE IF NOT EXISTS `ewbextvalidities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vehicle_id` int NOT NULL,
  `ewbNo` bigint NOT NULL,
  `vehicleNo` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `fromPincode` bigint NOT NULL,
  `fromPlace` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fromStateName` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fromStateCode` bigint NOT NULL,
  `remainingDistance` bigint NOT NULL,
  `transDocNo` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `transDocDate` date DEFAULT NULL,
  `transMode` enum('1','2','3','4','5') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '1' COMMENT '1:Road, 2:Rail, 3:Air, 4:Ship, 5:inTransit',
  `extnRsnCode` enum('1','2','4','5','99') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '99' COMMENT '1:Natural Calamity, 2:Law and Order Situation, 4:Transshipment, 5:Accident, 99:Others',
  `extnRemarks` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `consignmentStatus` enum('M','T') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'T' COMMENT 'M:inMovement, T:inTransit',
  `transitType` enum('R','W','O') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'R' COMMENT 'R:ROAD, W:WAREHOUSE, O:OTHERS',
  `addressLine1` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `addressLine2` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `addressLine3` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_at` date DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `updated_by` bigint DEFAULT NULL,
  `updStatus` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `updMsg` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_EEVVehicleID_idx` (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `ewbextvalidities`
--

INSERT INTO `ewbextvalidities` (`id`, `vehicle_id`, `ewbNo`, `vehicleNo`, `fromPincode`, `fromPlace`, `fromStateName`, `fromStateCode`, `remainingDistance`, `transDocNo`, `transDocDate`, `transMode`, `extnRsnCode`, `extnRemarks`, `consignmentStatus`, `transitType`, `addressLine1`, `addressLine2`, `addressLine3`, `created_at`, `created_by`, `updated_at`, `updated_by`, `updStatus`, `updMsg`) VALUES
(1, 2, 581008883591, 'MH00AA0000', 421302, 'BHIWANDI', '27', 34, 103, '', '1970-01-01', '1', '1', NULL, 'T', 'R', 'HOUSE NO.1793, 2ND FLOOR, J.V.C. COMPLEX,', 'KAMAN ROAD, KARIWALI VILLAGE,', NULL, '2023-05-28', 1, '2023-05-28', 1, NULL, NULL),
(2, 1, 561008883582, 'KA123456', 605001, 'Banagalore', '34', 34, 103, 'DOC01', '2023-05-15', '1', '1', NULL, 'T', 'R', '7th block, kuvempu layout', 'kuvempu layout', NULL, '2023-05-30', 1, '2023-05-30', 1, NULL, NULL),
(3, 1, 561008883582, 'KA123456', 605001, 'Banagalore', '34', 34, 103, 'DOC01', '2023-05-15', '1', '1', NULL, 'T', 'R', '7th block, kuvempu layout', 'kuvempu layout', NULL, '2023-05-30', 1, '2023-05-30', 1, NULL, NULL),
(4, 1, 561008883582, 'KA123456', 605001, 'Banagalore', '34', 34, 103, 'DOC01', '2023-05-15', '1', '1', NULL, 'T', 'R', '7th block, kuvempu layout', 'kuvempu layout', NULL, '2023-05-30', 1, '2023-05-30', 1, NULL, NULL),
(5, 1, 561008883582, 'KA123456', 605001, 'Banagalore', '34', 34, 103, 'DOC01', '2023-05-15', '1', '1', NULL, 'T', 'R', '7th block, kuvempu layout', 'kuvempu layout', NULL, '2023-05-30', 1, '2023-05-30', 1, NULL, NULL),
(6, 8, 531008883583, 'GJ01DX4567', 382350, 'Ahmedabad', '24', 34, 103, '', '1970-01-01', '1', '1', NULL, 'T', 'R', 'B-426, S umel Business  Park-7,', 'Near  Soni Ni Chali,', NULL, '2023-05-30', 1, '2023-05-30', 1, NULL, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_01_15_105324_create_roles_table', 1),
(5, '2016_01_15_114412_create_role_user_table', 1),
(6, '2016_01_26_115212_create_permissions_table', 1),
(7, '2016_01_26_115523_create_permission_role_table', 1),
(8, '2016_02_09_132439_create_permission_user_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_04_29_054032_create_vehicles_table', 1),
(12, '2023_04_29_070255_create_vehicle_ewaybill_masters_table', 1),
(13, '2023_04_29_071732_ewaybill', 1),
(14, '2023_05_18_095802_create_vewbgroups_table', 1),
(15, '2023_05_24_103955_create_trackings_table', 2),
(16, '2023_05_30_031229_create_articles_table', 3);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `model`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Can View Users', 'view.users', 'Can view users', 'Permission', '2023-05-22 01:26:04', '2023-05-22 01:26:04', NULL),
(2, 'Can Create Users', 'create.users', 'Can create new users', 'Permission', '2023-05-22 01:26:04', '2023-05-22 01:26:04', NULL),
(3, 'Can Edit Users', 'edit.users', 'Can edit users', 'Permission', '2023-05-22 01:26:04', '2023-05-22 01:26:04', NULL),
(4, 'Can Delete Users', 'delete.users', 'Can delete users', 'Permission', '2023-05-22 01:26:04', '2023-05-22 01:26:04', NULL),
(5, 'Operate Vehicle', 'operate.vehicle', 'user can operate vehicle', 'Permission', '2023-05-29 00:38:14', '2023-05-30 03:22:19', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 4, 1, '2023-05-30 03:20:41', '2023-05-30 03:20:41', NULL),
(7, 3, 1, '2023-05-30 03:20:41', '2023-05-30 03:20:41', NULL),
(6, 2, 1, '2023-05-30 03:20:41', '2023-05-30 03:20:41', NULL),
(5, 1, 1, '2023-05-30 03:20:41', '2023-05-30 03:20:41', NULL),
(9, 5, 1, '2023-05-30 03:20:41', '2023-05-30 03:20:41', NULL);

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
(1, 'Admin', 'admin', 'Admin Role', 5, '2023-05-22 01:26:04', '2023-05-22 01:26:04', NULL),
(2, 'User', 'user', 'User Role', 1, '2023-05-22 01:26:04', '2023-05-22 01:26:04', NULL),
(3, 'Unverified', 'unverified', 'Unverified Role', 0, '2023-05-22 01:26:04', '2023-05-22 01:26:04', NULL);

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
(1, 1, 1, '2023-05-22 01:26:04', '2023-05-22 01:26:04', NULL),
(2, 2, 2, '2023-05-22 01:26:04', '2023-05-22 01:26:04', NULL);

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
-- Table structure for table `trackings`
--

DROP TABLE IF EXISTS `trackings`;
CREATE TABLE IF NOT EXISTS `trackings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vid` int NOT NULL,
  `pincode` int NOT NULL,
  `location` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `trackingdate` date NOT NULL,
  `remark` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `trackings`
--

INSERT INTO `trackings` (`id`, `vid`, `pincode`, `location`, `status`, `trackingdate`, `remark`, `created_at`, `updated_at`) VALUES
(1, 2, 382170, 'Unjha', '0', '2023-05-24', 'puncher at maktupur', '2023-05-24 05:56:37', '2023-05-24 05:56:37'),
(2, 2, 382170, 'Unjha', '1', '2023-05-25', NULL, '2023-05-24 05:57:17', '2023-05-24 05:57:17'),
(3, 2, 38140, 'Kamali', '0', '2023-05-25', 'progress', '2023-05-24 22:09:08', '2023-05-24 22:09:08'),
(4, 2, 382170, 'Ahmedabad', '0', '2023-05-23', 'at paladi', '2023-05-24 22:41:10', '2023-05-24 22:41:10'),
(5, 2, 369456, 'Gandhinagar', '0', '2023-05-22', 'at G 5', '2023-05-24 22:49:26', '2023-05-24 22:49:26'),
(6, 2, 359454, 'BARODA', '0', '2023-05-22', 'at G10', '2023-05-24 22:50:05', '2023-05-24 22:50:05'),
(7, 2, 31459, 'SURAT', '0', '2023-05-09', 'AT PONDETURI', '2023-05-24 22:51:59', '2023-05-24 22:51:59'),
(8, 2, 382170, 'Unjha', '2', '2023-05-11', 'at sardar chock', '2023-05-24 23:11:25', '2023-05-24 23:11:25'),
(9, 2, 382170, 'unava', '0', '2023-05-11', 'at sardar chock', '2023-05-25 00:11:20', '2023-05-25 00:11:20'),
(10, 2, 382170, 'Rajkot', NULL, '2023-05-11', 'at sardar chock', '2023-05-25 00:14:21', '2023-05-25 00:14:21'),
(11, 2, 382170, 'Rajkot', NULL, '2023-05-11', 'at sardar chock', '2023-05-25 00:14:47', '2023-05-25 00:14:47'),
(12, 2, 382170, 'Rajkot', '0', '2023-05-11', 'at sardar chock', '2023-05-25 00:22:52', '2023-05-25 00:22:52'),
(17, 2, 382170, 'Rajkot', NULL, '2023-05-11', 'at sardar chock', '2023-05-25 00:45:11', '2023-05-25 00:45:11'),
(18, 2, 382170, 'Botad', NULL, '2023-05-11', 'at sardar chock', '2023-05-25 00:48:31', '2023-05-25 00:48:31'),
(19, 2, 382170, 'Botad', '10', '2023-05-11', 'at sardar chock', '2023-05-25 01:03:38', '2023-05-25 01:03:38'),
(20, 2, 382170, 'Bhavnagar', '10', '2023-05-11', 'at sardar chock', '2023-05-25 04:25:50', '2023-05-25 04:25:50'),
(21, 2, 382170, 'Botad', '10', '2023-05-11', 'at sardar chock', '2023-05-25 04:26:07', '2023-05-25 04:26:07'),
(22, 9, 382170, 'Unjha', NULL, '2023-05-24', NULL, '2023-05-25 05:49:02', '2023-05-25 05:49:02');

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
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$rVbjju5HtP2/kdxgydhsw.xMnqlaRDPUOLId0EvXCyl04xJ1tnsSK', NULL, '2023-05-22 01:26:04', '2023-05-22 01:26:04'),
(2, 'User', 'user@user.com', NULL, '$2y$10$VkrrjEWuOqqSSpfajMPQ1u/6NZxTzp.1dYt6bv3VplxfU71pqy2oK', NULL, '2023-05-22 01:26:04', '2023-05-22 01:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehicleno` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `updMode` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fromPlace` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fromState` int NOT NULL,
  `tripshtNo` int NOT NULL,
  `userGSTINTransin` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `enteredDate` date NOT NULL,
  `transMode` int NOT NULL,
  `transDocNo` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `transDocDate` date NOT NULL,
  `groupNo` int NOT NULL,
  `mobile` double DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `groupdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicleno`, `updMode`, `fromPlace`, `fromState`, `tripshtNo`, `userGSTINTransin`, `enteredDate`, `transMode`, `transDocNo`, `transDocDate`, `groupNo`, `mobile`, `user_id`, `groupdate`, `created_at`, `updated_at`) VALUES
(1, 'KA123456', 'API', 'Banagalore', 34, 0, '34AACCC1596Q002', '2023-05-15', 1, 'DOC01', '2023-05-15', 0, NULL, NULL, NULL, NULL, NULL),
(2, 'MH00AA0000', 'API', 'BHIWANDI', 27, 0, '34AACCC1596Q002', '2023-05-15', 1, '', '1970-01-01', 0, 998866558, 1, '2023-05-23', NULL, NULL),
(3, 'MH12BE1234', 'API', 'PONDICHERRY', 34, 0, '34AACCC1596Q002', '2023-05-15', 1, 'BOX2', '2022-05-07', 0, 984568956, 1, '2023-05-30', NULL, NULL),
(4, 'MH48BE1234', 'API', 'PONDICHERRY', 34, 0, '34AACCC1596Q002', '2023-05-15', 1, '', '1970-01-01', 0, 984568956, 1, '2023-05-30', NULL, NULL),
(5, 'KA03TR1234', 'API', 'Belgaum', 29, 0, '34AACCC1596Q002', '2023-05-15', 1, '', '1970-01-01', 0, NULL, NULL, NULL, NULL, NULL),
(6, 'MH48AE1234', 'API', 'PONDICHERRY', 34, 0, '34AACCC1596Q002', '2023-05-15', 1, 'BOX2', '2022-05-07', 0, NULL, NULL, NULL, NULL, NULL),
(7, 'KA06TG1234', 'API', 'Belgaum', 29, 0, '34AACCC1596Q002', '2023-05-15', 1, '', '1970-01-01', 0, NULL, NULL, NULL, NULL, NULL),
(8, 'GJ01DX4567', 'API', 'Ahmedabad', 24, 0, '34AACCC1596Q002', '2023-05-15', 1, '', '1970-01-01', 0, NULL, NULL, NULL, NULL, NULL),
(9, 'PVC1234', 'API', 'FRAZER TOWN', 34, 0, '34AACCC1596Q002', '2023-05-15', 1, '', '1970-01-01', 0, 9998866509, 2, '2023-05-23', NULL, NULL),
(10, 'MH48AE2318', 'API', 'PONDICHERRY', 34, 0, '34AACCC1596Q002', '2023-05-15', 1, 'BOX  2', '2023-01-30', 0, NULL, NULL, NULL, NULL, NULL),
(11, 'MH48BV2391', 'API', 'PONDICHERRY', 34, 0, '34AACCC1596Q002', '2023-05-15', 1, 'BOX  3', '2023-01-30', 0, NULL, NULL, NULL, NULL, NULL),
(12, 'MH14BV2318', 'API', 'PONDICHERRY', 34, 0, '34AACCC1596Q002', '2023-05-15', 1, 'BOX  1', '2023-02-28', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_ewaybill_masters`
--

DROP TABLE IF EXISTS `vehicle_ewaybill_masters`;
CREATE TABLE IF NOT EXISTS `vehicle_ewaybill_masters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vid` int NOT NULL,
  `eid` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `lrno` int DEFAULT NULL,
  `lrdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `vehicle_ewaybill_masters`
--

INSERT INTO `vehicle_ewaybill_masters` (`id`, `vid`, `eid`, `user_id`, `lrno`, `lrdate`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 1, 2, NULL, NULL, NULL, NULL, NULL),
(3, 2, 3, 1, 101, '2023-05-08', NULL, NULL),
(4, 2, 4, 1, 25, '2023-05-09', NULL, NULL),
(5, 2, 5, 1, 23, '2023-05-10', NULL, NULL),
(6, 3, 7, 1, 55, '2023-05-22', NULL, NULL),
(7, 4, 8, 1, 66, '2023-05-23', NULL, NULL),
(8, 5, 9, NULL, NULL, NULL, NULL, NULL),
(9, 6, 10, NULL, NULL, NULL, NULL, NULL),
(10, 7, 11, NULL, NULL, NULL, NULL, NULL),
(11, 1, 12, NULL, NULL, NULL, NULL, NULL),
(12, 1, 13, NULL, NULL, NULL, NULL, NULL),
(13, 8, 14, NULL, NULL, NULL, NULL, NULL),
(14, 8, 15, NULL, NULL, NULL, NULL, NULL),
(15, 9, 16, 1, 30, '2023-05-21', NULL, NULL),
(16, 9, 17, 1, 31, '2023-05-09', NULL, NULL),
(17, 9, 18, 1, 32, '2023-05-10', NULL, NULL),
(18, 10, 19, NULL, NULL, NULL, NULL, NULL),
(19, 11, 20, NULL, NULL, NULL, NULL, NULL),
(20, 11, 21, NULL, NULL, NULL, NULL, NULL),
(21, 12, 22, NULL, NULL, NULL, NULL, NULL),
(22, 9, 23, 1, 33, '2023-05-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vewbgroups`
--

DROP TABLE IF EXISTS `vewbgroups`;
CREATE TABLE IF NOT EXISTS `vewbgroups` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `vewbid` int NOT NULL,
  `user_id` int NOT NULL,
  `drivermobileno` double NOT NULL,
  `irno` int NOT NULL,
  `irdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Adminer 4.8.1 MySQL 11.6.2-MariaDB-ubu2404 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminFName` varchar(100) NOT NULL,
  `AdminLName` varchar(100) NOT NULL,
  `AdminEmail` varchar(255) NOT NULL,
  `AdminPhone` varchar(20) DEFAULT NULL,
  `AdminManager` int(11) DEFAULT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminOldPassword` varchar(255) DEFAULT NULL,
  `AdminStatus` tinyint(1) NOT NULL DEFAULT 1,
  `AdminUpdatedTime` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `AdminCreateTime` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `admin` (`AdminID`, `AdminFName`, `AdminLName`, `AdminEmail`, `AdminPhone`, `AdminManager`, `AdminPassword`, `AdminOldPassword`, `AdminStatus`, `AdminUpdatedTime`, `AdminCreateTime`) VALUES
(1,	'IGIHOZO',	'Didier',	'admin@5starvacationafrica.com',	'0788940718',	NULL,	'ae2bac2e4b4da805d01b2952d7e35ba4',	NULL,	1,	'2024-12-19 11:22:26',	'2024-12-19 11:19:28');

DROP TABLE IF EXISTS `Partners`;
CREATE TABLE `Partners` (
  `PartnerID` int(11) NOT NULL AUTO_INCREMENT,
  `PartnerName` varchar(255) DEFAULT NULL,
  `PartnerLogo` varchar(255) DEFAULT NULL,
  `PartnerLink` varchar(255) DEFAULT NULL,
  `PartnerAddress` text DEFAULT NULL,
  `PartnerStatus` tinyint(1) DEFAULT NULL,
  `PartnerUpdatedTime` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `PartnerCreatedTime` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`PartnerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `Partners` (`PartnerID`, `PartnerName`, `PartnerLogo`, `PartnerLink`, `PartnerAddress`, `PartnerStatus`, `PartnerUpdatedTime`, `PartnerCreatedTime`) VALUES
(1,	'ASD de2wc',	'1734622146_67643bc29aa52',	'http://localhost/5starvacationafrica/package.php',	'fdsf, fdsf, fdsfds',	1,	'2024-12-19 17:29:06',	'2024-12-19 15:29:06'),
(2,	'fwds',	'1734622293_67643c5515103',	'http://localhost/5starvacationafrica/admin/partners.php',	'fdsf,fgjs ',	1,	'2024-12-19 17:31:33',	'2024-12-19 15:31:33');

DROP TABLE IF EXISTS `Services`;
CREATE TABLE `Services` (
  `ServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `ServiceName` varchar(255) DEFAULT NULL,
  `ServiceDescription` text DEFAULT NULL,
  `ServiceIcon` varchar(255) DEFAULT NULL,
  `ServiceStatus` tinyint(1) DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`ServiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `Services` (`ServiceID`, `ServiceName`, `ServiceDescription`, `ServiceIcon`, `ServiceStatus`, `DateUpdated`, `DateCreated`) VALUES
(1,	'AAA',	'vdfxc fv',	'1734619449_Screenshot from 2024-12-17 15-43-50.png',	1,	NULL,	'2024-12-19 14:44:09'),
(2,	'AAA',	'vdfxc fv',	'1734619534_Screenshot from 2024-12-17 15-43-50.png',	1,	NULL,	'2024-12-19 14:45:34'),
(3,	'AAA',	'vdfxc fv',	'1734619635_Screenshot from 2024-12-17 15-43-50.png',	1,	NULL,	'2024-12-19 14:47:15'),
(4,	'DSFSDF',	'VSVSD DSAVADS',	'1734620496_Screenshot from 2024-12-17 11-03-41.png',	1,	NULL,	'2024-12-19 15:01:36'),
(5,	'GH',	'HGH FHDF',	'1734620549_Didier.webp',	1,	NULL,	'2024-12-19 15:02:29'),
(6,	'GH',	'HGH FHDF',	'1734620591_Didier.webp',	1,	NULL,	'2024-12-19 15:03:11'),
(7,	'234234',	'FSDAVG VSADB',	'1734620612_wallpaper.jpg',	1,	NULL,	'2024-12-19 15:03:32'),
(8,	'fsdvxz',	' bffbsfd gbfdb sdgfdsb sgdxcb',	'1734620817_IGIHOZO Didier.png',	1,	NULL,	'2024-12-19 15:06:57'),
(9,	'sav adsvds dsafa',	'EFEDASVBRE EASGVD EARSFDSA WAEDSF',	'1734620978_67643732a3365',	1,	NULL,	'2024-12-19 15:09:38');

-- 2024-12-19 15:32:34

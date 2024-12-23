-- Adminer 4.8.1 MySQL 11.6.2-MariaDB-ubu2404 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `AboutUs`;
CREATE TABLE `AboutUs` (
  `AboutId` int(11) NOT NULL AUTO_INCREMENT,
  `AboutTitle` varchar(255) DEFAULT NULL,
  `AboutBody` text DEFAULT NULL,
  `AboutBullets` text DEFAULT NULL,
  `AboutImage` varchar(255) DEFAULT NULL,
  `AboutStatus` enum('active','inactive') DEFAULT 'active',
  `CreatedAt` timestamp NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`AboutId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


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

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(255) DEFAULT NULL,
  `country_code` char(3) DEFAULT NULL,
  `phone_code` varchar(10) DEFAULT NULL,
  `continent` varchar(50) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `countries` (`country_id`, `country_name`, `country_code`, `phone_code`, `continent`, `active`) VALUES
(1,	'Afghanistan',	'AFG',	'+93',	'Asia',	1),
(2,	'Armenia',	'ARM',	'+374',	'Asia',	1),
(3,	'Azerbaijan',	'AZE',	'+994',	'Asia',	1),
(4,	'Bahrain',	'BHR',	'+973',	'Asia',	1),
(5,	'Bangladesh',	'BGD',	'+880',	'Asia',	1),
(6,	'Bhutan',	'BTN',	'+975',	'Asia',	1),
(7,	'Brunei',	'BRN',	'+673',	'Asia',	1),
(8,	'Cambodia',	'KHM',	'+855',	'Asia',	1),
(9,	'China',	'CHN',	'+86',	'Asia',	1),
(10,	'Cyprus',	'CYP',	'+357',	'Asia',	1),
(11,	'Georgia',	'GEO',	'+995',	'Asia',	1),
(12,	'India',	'IND',	'+91',	'Asia',	1),
(13,	'Indonesia',	'IDN',	'+62',	'Asia',	1),
(14,	'Iran',	'IRN',	'+98',	'Asia',	1),
(15,	'Iraq',	'IRQ',	'+964',	'Asia',	1),
(16,	'Israel',	'ISR',	'+972',	'Asia',	1),
(17,	'Japan',	'JPN',	'+81',	'Asia',	1),
(18,	'Jordan',	'JOR',	'+962',	'Asia',	1),
(19,	'Kazakhstan',	'KAZ',	'+7',	'Asia',	1),
(20,	'Kuwait',	'KWT',	'+965',	'Asia',	1),
(21,	'Kyrgyzstan',	'KGZ',	'+996',	'Asia',	1),
(22,	'Laos',	'LAO',	'+856',	'Asia',	1),
(23,	'Lebanon',	'LBN',	'+961',	'Asia',	1),
(24,	'Malaysia',	'MYS',	'+60',	'Asia',	1),
(25,	'Maldives',	'MDV',	'+960',	'Asia',	1),
(26,	'Mongolia',	'MNG',	'+976',	'Asia',	1),
(27,	'Myanmar',	'MMR',	'+95',	'Asia',	1),
(28,	'Nepal',	'NPL',	'+977',	'Asia',	1),
(29,	'North Korea',	'PRK',	'+850',	'Asia',	1),
(30,	'Oman',	'OMN',	'+968',	'Asia',	1),
(31,	'Pakistan',	'PAK',	'+92',	'Asia',	1),
(32,	'Palestine',	'PSE',	'+970',	'Asia',	1),
(33,	'Philippines',	'PHL',	'+63',	'Asia',	1),
(34,	'Qatar',	'QAT',	'+974',	'Asia',	1),
(35,	'Russia',	'RUS',	'+7',	'Asia',	1),
(36,	'Saudi Arabia',	'SAU',	'+966',	'Asia',	1),
(37,	'Singapore',	'SGP',	'+65',	'Asia',	1),
(38,	'South Korea',	'KOR',	'+82',	'Asia',	1),
(39,	'Sri Lanka',	'LKA',	'+94',	'Asia',	1),
(40,	'Syria',	'SYR',	'+963',	'Asia',	1),
(41,	'Tajikistan',	'TJK',	'+992',	'Asia',	1),
(42,	'Thailand',	'THA',	'+66',	'Asia',	1),
(43,	'Timor-Leste',	'TLS',	'+670',	'Asia',	1),
(44,	'Turkey',	'TUR',	'+90',	'Asia',	1),
(45,	'Turkmenistan',	'TKM',	'+993',	'Asia',	1),
(46,	'United Arab Emirates',	'ARE',	'+971',	'Asia',	1),
(47,	'Uzbekistan',	'UZB',	'+998',	'Asia',	1),
(48,	'Vietnam',	'VNM',	'+84',	'Asia',	1),
(49,	'Yemen',	'YEM',	'+967',	'Asia',	1),
(50,	'Albania',	'ALB',	'+355',	'Europe',	1),
(51,	'Andorra',	'AND',	'+376',	'Europe',	1),
(52,	'Armenia',	'ARM',	'+374',	'Europe',	1),
(53,	'Austria',	'AUT',	'+43',	'Europe',	1),
(54,	'Azerbaijan',	'AZE',	'+994',	'Europe',	1),
(55,	'Belarus',	'BLR',	'+375',	'Europe',	1),
(56,	'Belgium',	'BEL',	'+32',	'Europe',	1),
(57,	'Bosnia and Herzegovina',	'BIH',	'+387',	'Europe',	1),
(58,	'Bulgaria',	'BGR',	'+359',	'Europe',	1),
(59,	'Croatia',	'HRV',	'+385',	'Europe',	1),
(60,	'Cyprus',	'CYP',	'+357',	'Europe',	1),
(61,	'Czech Republic',	'CZE',	'+420',	'Europe',	1),
(62,	'Denmark',	'DNK',	'+45',	'Europe',	1),
(63,	'Estonia',	'EST',	'+372',	'Europe',	1),
(64,	'Finland',	'FIN',	'+358',	'Europe',	1),
(65,	'France',	'FRA',	'+33',	'Europe',	1),
(66,	'Georgia',	'GEO',	'+995',	'Europe',	1),
(67,	'Germany',	'DEU',	'+49',	'Europe',	1),
(68,	'Greece',	'GRC',	'+30',	'Europe',	1),
(69,	'Hungary',	'HUN',	'+36',	'Europe',	1),
(70,	'Iceland',	'ISL',	'+354',	'Europe',	1),
(71,	'Ireland',	'IRL',	'+353',	'Europe',	1),
(72,	'Italy',	'ITA',	'+39',	'Europe',	1),
(73,	'Kazakhstan',	'KAZ',	'+7',	'Europe',	1),
(74,	'Kosovo',	'KOS',	'+383',	'Europe',	1),
(75,	'Latvia',	'LVA',	'+371',	'Europe',	1),
(76,	'Liechtenstein',	'LIE',	'+423',	'Europe',	1),
(77,	'Lithuania',	'LTU',	'+370',	'Europe',	1),
(78,	'Luxembourg',	'LUX',	'+352',	'Europe',	1),
(79,	'Malta',	'MLT',	'+356',	'Europe',	1),
(80,	'Moldova',	'MDA',	'+373',	'Europe',	1),
(81,	'Monaco',	'MCO',	'+377',	'Europe',	1),
(82,	'Montenegro',	'MNE',	'+382',	'Europe',	1),
(83,	'Netherlands',	'NLD',	'+31',	'Europe',	1),
(84,	'North Macedonia',	'MKD',	'+389',	'Europe',	1),
(85,	'Norway',	'NOR',	'+47',	'Europe',	1),
(86,	'Poland',	'POL',	'+48',	'Europe',	1),
(87,	'Portugal',	'PRT',	'+351',	'Europe',	1),
(88,	'Romania',	'ROU',	'+40',	'Europe',	1),
(89,	'Russia',	'RUS',	'+7',	'Europe',	1),
(90,	'San Marino',	'SMR',	'+378',	'Europe',	1),
(91,	'Serbia',	'SRB',	'+381',	'Europe',	1),
(92,	'Slovakia',	'SVK',	'+421',	'Europe',	1),
(93,	'Slovenia',	'SVN',	'+386',	'Europe',	1),
(94,	'Spain',	'ESP',	'+34',	'Europe',	1),
(95,	'Sweden',	'SWE',	'+46',	'Europe',	1),
(96,	'Switzerland',	'CHE',	'+41',	'Europe',	1),
(97,	'Turkey',	'TUR',	'+90',	'Europe',	1),
(98,	'Ukraine',	'UKR',	'+380',	'Europe',	1),
(99,	'United Kingdom',	'GBR',	'+44',	'Europe',	1),
(100,	'Vatican City',	'VAT',	'+379',	'Europe',	1),
(101,	'Australia',	'AUS',	'+61',	'Oceania',	1),
(102,	'Fiji',	'FJI',	'+679',	'Oceania',	1),
(103,	'Kiribati',	'KIR',	'+686',	'Oceania',	1),
(104,	'Marshall Islands',	'MHL',	'+692',	'Oceania',	1),
(105,	'Micronesia',	'FSM',	'+691',	'Oceania',	1),
(106,	'Nauru',	'NRU',	'+674',	'Oceania',	1),
(107,	'New Zealand',	'NZL',	'+64',	'Oceania',	1),
(108,	'Palau',	'PLW',	'+680',	'Oceania',	1),
(109,	'Papua New Guinea',	'PNG',	'+675',	'Oceania',	1),
(110,	'Samoa',	'WSM',	'+685',	'Oceania',	1),
(111,	'Solomon Islands',	'SLB',	'+677',	'Oceania',	1),
(112,	'Tonga',	'TON',	'+676',	'Oceania',	1),
(113,	'Tuvalu',	'TUV',	'+688',	'Oceania',	1),
(114,	'Vanuatu',	'VUT',	'+678',	'Oceania',	1),
(115,	'Algeria',	'DZA',	'+213',	'Africa',	1),
(116,	'Angola',	'AGO',	'+244',	'Africa',	1),
(117,	'Benin',	'BEN',	'+229',	'Africa',	1),
(118,	'Botswana',	'BWA',	'+267',	'Africa',	1),
(119,	'Burkina Faso',	'BFA',	'+226',	'Africa',	1),
(120,	'Burundi',	'BDI',	'+257',	'Africa',	1),
(121,	'Cabo Verde',	'CPV',	'+238',	'Africa',	1),
(122,	'Cameroon',	'CMR',	'+237',	'Africa',	1),
(123,	'Central African Republic',	'CAF',	'+236',	'Africa',	1),
(124,	'Chad',	'TCD',	'+235',	'Africa',	1),
(125,	'Comoros',	'COM',	'+269',	'Africa',	1),
(126,	'Congo',	'COG',	'+242',	'Africa',	1),
(127,	'Democratic Republic of the Congo',	'COD',	'+243',	'Africa',	1),
(128,	'Djibouti',	'DJI',	'+253',	'Africa',	1),
(129,	'Egypt',	'EGY',	'+20',	'Africa',	1),
(130,	'Equatorial Guinea',	'GNQ',	'+240',	'Africa',	1),
(131,	'Eritrea',	'ERI',	'+291',	'Africa',	1),
(132,	'Eswatini',	'SWZ',	'+268',	'Africa',	1),
(133,	'Ethiopia',	'ETH',	'+251',	'Africa',	1),
(134,	'Gabon',	'GAB',	'+241',	'Africa',	1),
(135,	'Gambia',	'GMB',	'+220',	'Africa',	1),
(136,	'Ghana',	'GHA',	'+233',	'Africa',	1),
(137,	'Guinea',	'GIN',	'+224',	'Africa',	1),
(138,	'Guinea-Bissau',	'GNB',	'+245',	'Africa',	1),
(139,	'Ivory Coast',	'CIV',	'+225',	'Africa',	1),
(140,	'Kenya',	'KEN',	'+254',	'Africa',	1),
(141,	'Lesotho',	'LSO',	'+266',	'Africa',	1),
(142,	'Liberia',	'LBR',	'+231',	'Africa',	1),
(143,	'Libya',	'LBY',	'+218',	'Africa',	1),
(144,	'Madagascar',	'MDG',	'+261',	'Africa',	1),
(145,	'Malawi',	'MWI',	'+265',	'Africa',	1),
(146,	'Mali',	'MLI',	'+223',	'Africa',	1),
(147,	'Mauritania',	'MRT',	'+222',	'Africa',	1),
(148,	'Mauritius',	'MUS',	'+230',	'Africa',	1),
(149,	'Morocco',	'MAR',	'+212',	'Africa',	1),
(150,	'Mozambique',	'MOZ',	'+258',	'Africa',	1),
(151,	'Namibia',	'NAM',	'+264',	'Africa',	1),
(152,	'Niger',	'NER',	'+227',	'Africa',	1),
(153,	'Nigeria',	'NGA',	'+234',	'Africa',	1),
(154,	'Rwanda',	'RWA',	'+250',	'Africa',	1),
(155,	'São Tomé and Príncipe',	'STP',	'+239',	'Africa',	1),
(156,	'Senegal',	'SEN',	'+221',	'Africa',	1),
(157,	'Seychelles',	'SYC',	'+248',	'Africa',	1),
(158,	'Sierra Leone',	'SLE',	'+232',	'Africa',	1),
(159,	'Somalia',	'SOM',	'+252',	'Africa',	1),
(160,	'South Africa',	'ZAF',	'+27',	'Africa',	1),
(161,	'South Sudan',	'SSD',	'+211',	'Africa',	1),
(162,	'Sudan',	'SDN',	'+249',	'Africa',	1),
(163,	'Togo',	'TGO',	'+228',	'Africa',	1),
(164,	'Tunisia',	'TUN',	'+216',	'Africa',	1),
(165,	'Uganda',	'UGA',	'+256',	'Africa',	1),
(166,	'Zambia',	'ZMB',	'+260',	'Africa',	1),
(167,	'Zimbabwe',	'ZWE',	'+263',	'Africa',	1);

DROP TABLE IF EXISTS `Destinations`;
CREATE TABLE `Destinations` (
  `DestinationID` int(11) NOT NULL AUTO_INCREMENT,
  `DestinationLocation` varchar(255) NOT NULL,
  `DestinationDiscountPercentage` int(11) DEFAULT 0,
  `DestinationPrice` decimal(10,2) NOT NULL,
  `DestinationImage` varchar(255) DEFAULT NULL,
  `DestinationDetails` text DEFAULT NULL,
  `DestinationStatus` enum('active','inactive') DEFAULT 'active',
  `CreatedAt` timestamp NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`DestinationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


DROP TABLE IF EXISTS `Guides`;
CREATE TABLE `Guides` (
  `GuideID` int(11) NOT NULL AUTO_INCREMENT,
  `GuideFname` varchar(50) NOT NULL,
  `GuideLname` varchar(50) NOT NULL,
  `GuideSpecialization` varchar(100) NOT NULL,
  `GuidePicture` varchar(255) DEFAULT NULL,
  `GuideFacebook` varchar(255) DEFAULT NULL,
  `GuideTwitter` varchar(255) DEFAULT NULL,
  `GuideInstagram` varchar(255) DEFAULT NULL,
  `GuideStatus` tinyint(1) DEFAULT 1,
  `GuideDateCreated` datetime DEFAULT current_timestamp(),
  `GuideDateUpdated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`GuideID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


DROP TABLE IF EXISTS `LandingPage`;
CREATE TABLE `LandingPage` (
  `LandingID` int(11) NOT NULL AUTO_INCREMENT,
  `LandingTitle` varchar(255) NOT NULL,
  `LandingDescription` text DEFAULT NULL,
  `LandingImage` varchar(255) DEFAULT NULL,
  `LandingStatus` enum('active','inactive') DEFAULT 'active',
  `CreatedAt` timestamp NULL DEFAULT current_timestamp(),
  `UpdatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`LandingID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


DROP TABLE IF EXISTS `PackageBooking`;
CREATE TABLE `PackageBooking` (
  `BookingID` int(11) NOT NULL AUTO_INCREMENT,
  `BookingPackageID` int(11) NOT NULL,
  `PackageQuantity` int(11) NOT NULL DEFAULT 1,
  `PricePerPackage` int(11) NOT NULL DEFAULT 0,
  `TotalPrice` int(11) NOT NULL DEFAULT 0,
  `TravelerNames` varchar(255) NOT NULL,
  `TravelerEmail` varchar(255) NOT NULL,
  `TravelerDate` date NOT NULL,
  `TravelerSpecialRequest` text DEFAULT NULL,
  `BookingStatus` int(11) NOT NULL DEFAULT 0,
  `CreatedAt` int(11) NOT NULL,
  `UpdatedAt` int(11) NOT NULL,
  PRIMARY KEY (`BookingID`),
  KEY `idx_booking_package_id` (`BookingPackageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `PackageBooking` (`BookingID`, `BookingPackageID`, `PackageQuantity`, `PricePerPackage`, `TotalPrice`, `TravelerNames`, `TravelerEmail`, `TravelerDate`, `TravelerSpecialRequest`, `BookingStatus`, `CreatedAt`, `UpdatedAt`) VALUES
(1,	9,	1,	700,	700,	'dcs',	'cds@d.h',	'2024-12-25',	'',	0,	1734952008,	1734952008),
(2,	9,	1,	700,	700,	'dsa',	'igihozodidier707@gmail.com',	'2024-12-25',	'No other ',	0,	1734952180,	1734952180),
(3,	9,	1,	700,	700,	'csdc',	'igihozodidier707@gmail.com',	'2024-12-19',	'',	0,	1734952304,	1734952304),
(4,	9,	1,	700,	700,	'dsc',	'igenolouise@gmail.com',	'2024-12-24',	'dsa',	0,	1734952338,	1734952338),
(5,	9,	1,	700,	700,	'dsc',	'dsc@cd.g',	'2024-12-26',	'cdsx dcs',	0,	1734952511,	1734952511),
(6,	9,	1,	700,	700,	'dsc',	'igenomlouise@gmail.com',	'2024-12-27',	'',	0,	1734952564,	1734952564);

DROP TABLE IF EXISTS `Packages`;
CREATE TABLE `Packages` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `description` text NOT NULL,
  `days` int(11) NOT NULL,
  `nights` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `travel_type` int(11) NOT NULL,
  `package_type` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `num_persons` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `Packages` (`package_id`, `name`, `intro`, `description`, `days`, `nights`, `price`, `travel_type`, `package_type`, `country_id`, `num_persons`, `image`, `status`, `created_at`) VALUES
(9,	'Family trip to Nyungwe',	'fbv ewsdv wesdfdsfbv ewsdv wesdfdsfbv ewsdv wesdfds',	'fbv ewsdv wesdfdsfbv ewsdv wesdfdsfbv ewsdv wesdfdsfbv ewsdv wesdfdsfbv ewsdv wesdfds',	1,	0,	700.00,	4,	4,	154,	7,	'../img/images/packages/1734944281_67692619f0198',	1,	'2024-12-23 08:58:01');

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


DROP TABLE IF EXISTS `Testimony`;
CREATE TABLE `Testimony` (
  `TestimonyID` int(11) NOT NULL AUTO_INCREMENT,
  `TestimonyPerson` varchar(255) NOT NULL,
  `PersonPicture` varchar(255) DEFAULT NULL,
  `TestimonyLocation` varchar(255) NOT NULL,
  `TestimonyBody` text DEFAULT NULL,
  `TestimonyStatus` tinyint(4) DEFAULT NULL,
  `TestimonyCreatedAt` timestamp NULL DEFAULT current_timestamp(),
  `TestimonyUpdatedAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`TestimonyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;


DROP TABLE IF EXISTS `tour_categories`;
CREATE TABLE `tour_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `tour_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Adventure Tours',	1,	'2024-12-20 09:14:57',	'2024-12-20 09:14:57'),
(2,	'City Tours',	1,	'2024-12-20 09:14:57',	'2024-12-20 09:14:57'),
(3,	'Couple Tours',	1,	'2024-12-20 09:14:57',	'2024-12-20 09:14:57'),
(4,	'Group Tours',	1,	'2024-12-20 09:14:57',	'2024-12-20 09:14:57'),
(5,	'Weekend Break',	1,	'2024-12-20 09:14:57',	'2024-12-20 09:14:57'),
(6,	'Business Tours',	1,	'2024-12-20 09:14:57',	'2024-12-20 09:14:57');

DROP TABLE IF EXISTS `tour_packages`;
CREATE TABLE `tour_packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `tour_packages` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Vip Package',	1,	'2024-12-20 09:15:33',	'2024-12-20 09:15:33'),
(2,	'Regular Package',	1,	'2024-12-20 09:15:33',	'2024-12-20 09:15:33'),
(3,	'Best Package',	1,	'2024-12-20 09:15:33',	'2024-12-20 09:15:33'),
(4,	'High Price Package',	1,	'2024-12-20 09:15:33',	'2024-12-20 09:15:33'),
(5,	'Low Price Package',	1,	'2024-12-20 09:15:33',	'2024-12-20 09:15:33');

-- 2024-12-23 11:18:10

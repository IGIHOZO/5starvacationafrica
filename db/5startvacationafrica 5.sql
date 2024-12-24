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

INSERT INTO `AboutUs` (`AboutId`, `AboutTitle`, `AboutBody`, `AboutBullets`, `AboutImage`, `AboutStatus`, `CreatedAt`, `UpdatedAt`) VALUES
(1,	'About Us – 5Star Vacation Africa',	'Welcome to 5Star Vacation Africa – Where Dreams Meet Luxury!\r\n\r\nAt 5Star Vacation Africa, we are dedicated to crafting unforgettable travel experiences that celebrate the beauty, culture, and diversity of Africa. With a passion for excellence and a commitment to sustainability, we specialize in providing world-class tourism services that exceed expectations.\r\n\r\nOur Mission\r\nTo redefine African tourism by delivering luxurious, tailored travel experiences that connect travelers with the heart of Africa’s breathtaking landscapes, vibrant cultures, and extraordinary wildlife.\r\n\r\nOur Vision\r\nTo be a leading travel brand, known for inspiring unforgettable journeys while promoting sustainable tourism that benefits local communities and conserves Africa’s rich natural heritage.\r\n\r\nWhat We Offer\r\nLuxury Tours & Safaris\r\nExplore Africa’s iconic destinations in style, with bespoke safaris, exclusive lodge stays, and personalized itineraries designed to suit your preferences.\r\n\r\nCultural Immersions\r\nExperience Africa’s rich heritage through curated cultural tours, interactive experiences, and connections with local communities.\r\n\r\nPristine Destinations\r\nFrom the Serengeti to the Rwandan rainforests, we specialize in showcasing Africa’s most spectacular locations.\r\n\r\nEco-Friendly Travel\r\nWe prioritize sustainable practices to ensure that our tours contribute positively to the environment and local economies.\r\n\r\nWhy Choose 5Star Vacation Africa?\r\nPersonalized Luxury: Every detail of your journey is tailored to meet your unique desires.\r\nExpert Guidance: Our team of experienced travel experts and guides ensure seamless and enriching adventures.\r\nCommitment to Sustainability: We focus on eco-tourism and giving back to the communities we serve.\r\nUnparalleled Experiences: From gorilla trekking in Rwanda to private safaris in Tanzania, we create moments you’ll treasure forever.\r\nOur Destinations\r\nEast Africa: Kenya, Tanzania, Rwanda, and Uganda – featuring gorilla trekking, savannah safaris, and cultural tours.\r\nSouthern Africa: Botswana, South Africa, and Namibia – home to luxury safaris and stunning landscapes.\r\nIndian Ocean Islands: Seychelles and Zanzibar – perfect for tropical getaways.\r\n\r\n\r\nContact us today and let the journey begin!',	'Join Us on a Journey of a Lifetime\r\nWhether you’re seeking adventure, relaxation, or cultural discovery, 5Star Vacation Africa promises an experience that is as unique as it is luxurious. Let us take you on a journey to discover the magic of Africa, where every moment is designed to leave you inspired.',	'../img/images/about_us/1735040399_676a9d8f4dd48.jpg',	'active',	'2024-12-24 03:28:46',	'2024-12-24 11:45:26');

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

INSERT INTO `Destinations` (`DestinationID`, `DestinationLocation`, `DestinationDiscountPercentage`, `DestinationPrice`, `DestinationImage`, `DestinationDetails`, `DestinationStatus`, `CreatedAt`, `UpdatedAt`) VALUES
(11,	'dasf',	2,	50000.00,	'../img/images/destinations/1735040399_676a9d8f4dd48.jpg',	'hjjj fd dsfsd fsafsa fasf ashjjj fd dsfsd fsafsa fasf as',	'active',	'2024-12-24 09:39:59',	'2024-12-24 09:39:59');

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
(7,	10,	4,	120,	480,	'dsdf',	'sdf@c.j',	'2024-11-29',	'',	0,	1734965010,	1734965010),
(8,	10,	1,	120,	120,	'fds',	'dds@cd.ds',	'2025-01-02',	'',	0,	1734965481,	1734965481),
(9,	10,	1,	120,	120,	'dscxz',	'ds@ds.com',	'2024-12-27',	'',	0,	1734965784,	1734965784),
(10,	10,	1,	120,	120,	'fds',	'sd@ds.fds',	'2024-12-26',	'',	0,	1734965966,	1734965966),
(11,	1,	1,	4,	4000,	'fewds',	'dsa@ds.fs',	'2024-12-20',	'',	0,	1735027846,	1735027846),
(12,	1,	1,	4,	4000,	'dfas',	'sa@d.d',	'2024-12-26',	'',	0,	1735028078,	1735028078),
(13,	3,	3,	1,	5400,	'fds',	'fds@fs.hj',	'2024-12-27',	'',	0,	1735028265,	1735028265),
(14,	3,	1,	1,	1800,	'dsf',	'sa@ds.gh',	'2024-12-26',	'',	0,	1735028567,	1735028567),
(15,	3,	1,	1800,	1800,	'scxv',	'ds@fsd.hg',	'2024-12-25',	'',	0,	1735028645,	1735028645),
(16,	3,	6,	1800,	10800,	'sdsf',	'sdf@dsf',	'2024-12-27',	'',	0,	1735028682,	1735028682);

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
  `status` int(11) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

INSERT INTO `Packages` (`package_id`, `name`, `intro`, `description`, `days`, `nights`, `price`, `travel_type`, `package_type`, `country_id`, `num_persons`, `image`, `status`, `created_at`) VALUES
(1,	'Wildlife safari',	'akagera is the home of bigfive animal this makes this place a home wildlfe safari to every one who discover rwanda',	'Itinerary\r\nDay 1: Arrival in Kigali and City Exploration\r\nArrival: Meet and greet at Kigali International Airport with private luxury transfer.\r\nAccommodation: Check-in at The Retreat by Heaven, a luxury boutique hotel in Kigali.\r\nActivities:\r\nPrivate city tour including the Kigali Genocide Memorial and Inema Arts Center.\r\nShopping for bespoke crafts at Kigali’s vibrant markets.\r\nDining: Dinner at Fusion Restaurant, offering a fine dining experience with panoramic views.\r\nDay 2: Volcanoes National Park – Gorilla Trekking\r\nTransfer: Private luxury vehicle to Volcanoes National Park.\r\nAccommodation: Stay at Bisate Lodge, an eco-luxury retreat with spectacular views of the Virunga Mountains.\r\nActivity: Gorilla trekking – a once-in-a-lifetime experience. Spend an hour with a gorilla family in their natural habitat.\r\nDining: Enjoy a romantic dinner with a view of the volcanoes.\r\nDay 3: Golden Monkey Tracking & Nature Experience\r\nActivity: Guided tracking of the Golden Monkeys, known for their playful nature and vibrant fur.\r\nRelaxation: Afternoon at leisure with optional activities (nature walks or a couples’ spa session).\r\nDining: Gourmet meals served at Bisate Lodge, accompanied by curated wine selections.\r\nDay 4: Return to Kigali and Departure\r\nMorning: Leisurely breakfast with a final view of the scenic mountains.\r\nTransfer: Private luxury transfer to Kigali.\r\nShopping: Stop at a high-end boutique for last-minute souvenirs.\r\nDeparture: Drop-off at Kigali International Airport for your onward journey.',	4,	3,	4000.00,	3,	4,	153,	2,	'../img/images/packages/1735009772_676a25ec6d3fd',	1,	'2024-12-24 03:09:32'),
(2,	'2 Days Mountain Gorilla Trekking in Rwanda',	'This 2-day adventure is designed for travelers with limited time but a strong desire to experience the majesty of mountain gorillas in their natural habitat. Discover the beauty of Rwanda\'s Volcanoes National Park with a seamless, intimate, and unforgettable trek.',	'Day 1: Arrival in Musanze (Volcanoes National Park)\r\nMorning:\r\n\r\nArrival in Kigali. Meet and greet by your guide.\r\nTransfer to Musanze (approx. 2.5-hour drive) in a private, comfortable vehicle.\r\nScenic stops along the way for photos and views of the rolling hills of Rwanda.\r\nAfternoon:\r\n\r\nCheck-in at Sabyinyo Silverback Lodge (luxury) or Five Volcanoes Boutique Hotel (mid-range).\r\nLunch at the lodge.\r\nExplore Musanze town or visit the Twin Lakes of Burera and Ruhondo for a serene afternoon.\r\nEvening:\r\n\r\nEarly dinner and briefing by your guide on the next day’s trek.\r\nRest and prepare for an early start.\r\nDay 2: Gorilla Trekking Experience\r\nEarly Morning:\r\n\r\nBreakfast at the lodge.\r\nTransfer to the Volcanoes National Park Headquarters for registration and assignment of trekking groups.\r\nStart your guided trek through the lush rainforest to meet a mountain gorilla family.\r\nLate Morning:\r\n\r\nSpend up to one hour observing the gorillas. Witness their behaviors, interact with their environment, and enjoy this once-in-a-lifetime encounter.\r\nAfternoon:\r\n\r\nReturn to the lodge for a hearty lunch.\r\nRelax, freshen up, and then transfer back to Kigali.\r\nEvening:\r\n\r\nOptional: Dinner in Kigali or drop-off at your hotel/airport for departure.',	2,	-1,	3000.00,	4,	4,	154,	2,	'../img/images/packages/1735010176_676a2780b19a7',	1,	'2024-12-24 03:16:16'),
(3,	'2 Days & 1 Night Luxury Experience in Nyungwe National Park',	'Nyungwe National Park is a haven for nature lovers and wildlife enthusiasts. This 2-day package is perfect for those seeking adventure, tranquility, and an immersive experience in one of Africa\'s oldest rainforests.',	'Day 1: Arrival and Canopy Walk Adventure\r\nMorning:\r\nPrivate luxury transfer from Kigali to Nyungwe National Park (5-hour scenic drive or optional charter flight).\r\nStop for coffee tasting at a plantation en route.\r\nAfternoon:\r\nCheck-in at One&Only Nyungwe House, a luxurious retreat nestled amidst a tea plantation.\r\nEmbark on a Canopy Walk for breathtaking views of the rainforest and wildlife.\r\nEvening:\r\nRelax with a couple\'s spa session at the lodge.\r\nEnjoy a romantic candlelit dinner overlooking the lush landscapes.\r\nDay 2: Chimpanzee Trekking and Departure\r\nEarly Morning:\r\nBegin the day with chimpanzee trekking, led by expert guides. Witness these primates in their natural habitat, alongside other forest wildlife.\r\nLate Morning:\r\nReturn to the lodge for a hearty breakfast.\r\nLeisure time to explore the lodge or enjoy a short nature walk.\r\nAfternoon:\r\nPrivate transfer back to Kigali or optional stop at King’s Palace Museum in Nyanza.\r\n',	2,	1,	1800.00,	3,	4,	154,	2,	'../img/images/packages/1735010390_676a2856490af',	1,	'2024-12-24 03:19:50');

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


DROP TABLE IF EXISTS `registrations`;
CREATE TABLE `registrations` (
  `applicant_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `country_of_residence` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `internship_level` varchar(20) DEFAULT NULL,
  `type_of_internship` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `cv_path` varchar(255) DEFAULT NULL,
  `request_letter_path` varchar(200) DEFAULT NULL,
  `recorded_time` timestamp(6) NULL DEFAULT current_timestamp(6),
  `status` varchar(100) DEFAULT 'pending',
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `registrations` (`applicant_id`, `name`, `email`, `phone_number`, `start_date`, `end_date`, `nationality`, `country_of_residence`, `department`, `internship_level`, `type_of_internship`, `gender`, `additional_info`, `cv_path`, `request_letter_path`, `recorded_time`, `status`) VALUES
(6,	'Sophie Narame',	's.narame@alustudent.com',	'250793433248',	'2025-01-15',	'2025-04-15',	'1200370053685036',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'I am interested in interning in the Sales and Marketing department at First Class Tour because I have a strong passion for the travel industry and the creative, strategic aspects of marketing. The idea of helping to craft compelling campaigns and building meaningful relationships with customers excites me, especially in a field that delivers unique, memorable travel experiences.\r\nFirst Class Tour\'s reputation for providing luxury, personalized travel services stands out to me, and I would love to contribute to showcasing that quality to a broader audience. My background in K.A.C.A. Multiservice Company Limited has given me a solid understanding of consumer behavior, digital marketing strategies, and communication. I\'m particularly interested in how these skills can be applied in the context of travel, where the ability to connect emotionally with customers can make a huge difference in their decision-making process.\r\nAdditionally, I am eager to learn more about the dynamic nature of sales in the travel industry, primarily how to target the right audience, craft compelling offers, and build long-term relationships with clients. This internship would provide an excellent opportunity to gain hands-on experience in a fast-paced environment while also allowing me to contribute fresh ideas and enthusiasm to the team.\r\nI\'m excited about the possibility of helping First Class Tour grow its brand and attract new customers while also developing my skills in digital marketing, content creation, and market research.\r\n',	'uploads/Sophie Narame\'s CV.pdf',	'uploads/ALU Rwanda Internship Support Letter _Sophie  Narame.pdf',	'2024-11-12 10:02:56.645221',	'approved'),
(7,	'Annick IRANGABIYE',	'a.irangabiy@alustudent.com',	'0793175533',	'2025-01-15',	'2025-04-15',	'Burundian',	'Rwanda',	'Sales and Marketing',	'On-site',	'Academic Internship (for students completing their studies)',	'female',	'Thank you. I am interested in First Class Tours because I need to acquire more skills in the tourism industry and gain hands-on experience. Additionally, I hope to improve and receive more skills from your initiative using the skills I gained from different areas I engaged in.',	'uploads/Annick Irangabiye_Resume (5).pdf',	'uploads/Annick Irangabiye_Cover letter (5).pdf',	'2024-11-12 11:04:49.987539',	'approved'),
(8,	'Akimana Sheila',	's.akimana@alustudent.com',	'0783086636',	'2025-01-15',	'2015-04-15',	'burundi',	'Rwanda',	'Sales and Marketing',	'On-site',	NULL,	'female',	'',	'uploads/Sheila\'s resume (1).pdf',	'uploads/ALU Rwanda Internship Support Letter _Sheila  Akimana[1].pdf',	'2024-11-12 15:54:10.731594',	'approved'),
(9,	'Akimana Sheila',	's.akimana@alustudent.com',	'0783086636',	'2025-01-15',	'2025-04-15',	'burundi',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'I am interested in this internship because I am passionate about luxury travel and hospitality. I see it as a unique opportunity to learn from a top-tier company, gain hands-on experience in high-end customer service, and develop skills in event planning and operations. This internship will allow me to build a strong foundation for my career in the luxury travel industry, while contributing to creating exceptional travel experiences for clients.\r\n\r\n',	'uploads/Sheila\'s resume (1).pdf',	'uploads/ALU Rwanda Internship Support Letter _Sheila  Akimana[1].pdf',	'2024-11-12 16:00:33.194880',	'approved'),
(10,	'Uwimana andutirabose',	'u.andutirab@alustudent.com',	'0784708473',	'2025-01-15',	'2025-04-15',	'Congolese',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'Iâ€™m excited to intern at First Class Tour because Iâ€™m passionate about the travel industry and admire your focus on personalised, high-quality experiences. Iâ€™m eager to gain hands-on experience in client relations, trip planning, and logistics, while contributing my organizational skills and enthusiasm for travel. This internship is a great opportunity for me to grow professionally and deepen my knowledge of the travel business.',	'uploads/Uwimana Andutirabose,Resume (1).pdf',	'uploads/ALU Rwanda Internship Support Letter _Uwimana  Andutirabose.pdf',	'2024-11-12 19:57:30.344097',	'approved'),
(12,	'Nishimwe chanelle',	'C.nishimwe2@alustudent.com',	'0798494228',	'2025-01-15',	'2025-04-15',	'Burundian',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'I\'m interested in FirstTour class because I\'m glad to know different things and to obtain different skills and knowledge on the things that I hadn\'t know before.',	'uploads/chanelle Resume.pdf',	'uploads/Internship Support Letter - New Model Students_encrypted_.pdf',	'2024-11-14 22:37:13.739960',	'approved'),
(13,	'Nelly Umwali',	'n.umwalinelly1@alustudent.com',	'0798747166',	'2025-01-15',	'2025-04-15',	'Rwandan',	'Rwanda ',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'I want to gain experience and  it is also an opportunity for me to see if its the right career path for me and also learn more from you.',	'uploads/My Resume .docx_2.pdf',	'uploads/Internship Support Letter - New Model Students_encrypted_.pdf',	'2024-11-16 17:54:58.873873',	'approved'),
(15,	'Akingeneye Alphonse',	'firstclasstours1@gmail.com',	'0788913722',	'2025-01-15',	'2025-04-15',	'Rwandan',	'Rwanda',	NULL,	NULL,	NULL,	'male',	'Welcome to First class Tours Application form\r\nThank you for your interest in joining First Class',	'uploads/4 days trip.pdf',	'uploads/BISOKE HIKING.pdf',	'2024-11-17 08:31:34.025926',	'approved'),
(16,	'Latia IRADUKUNDA',	'l.iradukund1@alustudent.com',	'0792359982',	'2024-01-15',	'2024-04-15',	'Burundian',	'RWANDA',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    Thank you for preparing to us this opportunity',	'uploads/Latia IRADUKUNDA Resume .pdf',	'uploads/Latia IRADUKUNDA Cover letter.pdf',	'2024-11-18 11:51:20.079458',	'pending'),
(17,	'Latia IRADUKUNDA',	'l.iradukund1@alustudent.com',	'0792359982',	'2024-01-15',	'2024-04-15',	'Burundian',	'RWANDA',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    Thank you for preparing to us this opportunity',	'uploads/Latia IRADUKUNDA Resume .pdf',	'uploads/Latia IRADUKUNDA Cover letter.pdf',	'2024-11-18 11:51:23.325054',	'pending'),
(18,	'Latia IRADUKUNDA',	'l.iradukund1@alustudent.com',	'0792359982',	'2024-01-15',	'2024-04-15',	'Burundian',	'RWANDA',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    Thank you for preparing to us this opportunity',	'uploads/Latia IRADUKUNDA Resume .pdf',	'uploads/Latia IRADUKUNDA Cover letter.pdf',	'2024-11-18 11:51:29.088533',	'approved'),
(19,	'Clemence NIYONSABA',	'c.niyonsaba@alustudent.com',	'0791387515',	'2025-01-15',	'2025-04-15',	'Rwandan',	'RWANDA',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'Am willing to gain new skills',	'uploads/_My resume (1).pdf',	'uploads/Internship Support Letter - New Model Students_encrypted_ (1).pdf',	'2024-11-18 12:08:14.562960',	'pending'),
(20,	'Clemence NIYONSABA',	'c.niyonsaba@alustudent.com',	'0791387515',	'2025-01-15',	'2025-04-15',	'Rwandan',	'RWANDA',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'Am willing to gain new skills',	'uploads/_My resume (1).pdf',	'uploads/Internship Support Letter - New Model Students_encrypted_ (1).pdf',	'2024-11-18 12:08:17.991903',	'approved'),
(21,	'Don Divin Niyukuri',	'd.niyukuri@alustudent.com',	'0793859722',	'2025-01-10',	'2025-04-30',	'Burundian',	'Rwanda',	'Tourism Development',	'Remote',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/DON DIVIN NIYUKURI RESUME (2).pdf',	'uploads/First Tour Internship Application latter (1).pdf',	'2024-11-18 12:46:32.585841',	'approved'),
(22,	'Adebayo Adamu ',	'adamadebayoit@gmail.com',	'0794423287',	'2025-01-09',	'2025-04-28',	'Nigerian',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Bayo\'s_Resume_Official.pdf',	'uploads/ALU Rwanda Internship Support Letter _Adamu Itunu Adebayo.pdf',	'2024-11-18 16:28:55.949245',	'pending'),
(23,	'Adebayo Adamu ',	'adamadebayoit@gmail.com',	'0794423287',	'2025-01-09',	'2025-04-28',	'Nigerian',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Bayo\'s_Resume_Official.pdf',	'uploads/ALU Rwanda Internship Support Letter _Adamu Itunu Adebayo.pdf',	'2024-11-18 16:29:11.180025',	'pending'),
(24,	'Adebayo Adamu ',	'adamadebayoit@gmail.com',	'0794423287',	'2025-01-09',	'2025-04-28',	'Nigerian',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Bayo\'s_Resume_Official.pdf',	'uploads/ALU Rwanda Internship Support Letter _Adamu Itunu Adebayo.pdf',	'2024-11-18 16:29:17.510022',	'pending'),
(25,	'Adebayo Adamu ',	'adamadebayoit@gmail.com',	'0794423287',	'2025-01-09',	'2025-04-28',	'Nigerian',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Bayo\'s_Resume_Official.pdf',	'uploads/ALU Rwanda Internship Support Letter _Adamu Itunu Adebayo.pdf',	'2024-11-18 16:33:22.163034',	'approved'),
(26,	'Todisoa Olivia RAZAKARIVONY ',	't.razakariv@alustudent.com',	'250793902952',	'2025-01-12',	'2025-05-09',	'Malagasy ',	'Rwanda ',	'Tour Consultant',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Resume summative Olivia .pdf',	'uploads/Motivation letter tourisme .docx.pdf',	'2024-11-18 16:38:04.935094',	'pending'),
(27,	'Todisoa Olivia RAZAKARIVONY ',	't.razakariv@alustudent.com',	'250793902952',	'2025-01-12',	'2025-05-09',	'Malagasy ',	'Rwanda ',	'Tour Consultant',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Resume summative Olivia .pdf',	'uploads/Motivation letter tourisme .docx.pdf',	'2024-11-18 16:38:09.881435',	'approved'),
(28,	'Joselyne Umuhoza Murekeyisoni',	'j.murekeyis@alustudent.com',	'0799317955',	'2025-01-06',	'2025-04-30',	'Rwandan',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'  ',	'uploads/Joselyne\'s Resume.pdf',	'uploads/First Class Tours cover letter.pdf',	'2024-11-18 19:08:23.801802',	'approved'),
(29,	'Yvette Umuhoza',	'y.umuhoza@alustudent.com',	'0782051941',	'2025-09-01',	'2025-04-25',	'Rwanda',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Yvette Umuhoza\'s  Resume .pdf',	'uploads/_Yvette\'s Cover letter .pdf',	'2024-11-18 22:30:04.562441',	'pending'),
(30,	'Yvette Umuhoza',	'y.umuhoza@alustudent.com',	'0782051941',	'2025-09-01',	'2025-04-25',	'Rwanda',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Yvette Umuhoza\'s  Resume .pdf',	'uploads/_Yvette\'s Cover letter .pdf',	'2024-11-18 22:30:06.450966',	'pending'),
(31,	'Yvette Umuhoza',	'y.umuhoza@alustudent.com',	'0782051941',	'2025-09-01',	'2025-02-05',	'Rwanda',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Yvette Umuhoza\'s  Resume .pdf',	'uploads/_Yvette\'s Cover letter .pdf',	'2024-11-18 22:32:47.999753',	'pending'),
(32,	'Yvette Umuhoza',	'y.umuhoza@alustudent.com',	'782051941',	'2025-09-05',	'2025-05-05',	'Rwanda',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Yvette Umuhoza\'s  Resume .pdf',	'uploads/_Yvette\'s Cover letter .pdf',	'2024-11-18 22:35:12.518775',	'approved'),
(33,	'Jeannette Mukashema',	'j.mukashema@alustudent.com',	'0794253569',	'2025-01-10',	'2025-04-30',	'Rwanda',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Jeannette Mukashema_Resume (1).pdf',	'uploads/Jeannette Mukashema.pdf',	'2024-11-19 07:24:14.292178',	'approved'),
(34,	'Yvette umuhoza',	'y.umuhoza@alustudent.com',	'0782051941',	'2025-10-20',	'2025-03-04',	'Rwanda',	'Rwnada ',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Yvette Umuhoza\'s  Resume .pdf',	'uploads/_Yvette\'s Cover letter .pdf',	'2024-11-19 08:30:33.685036',	'approved'),
(35,	'Yvette umuhoza',	'y.umuhoza@alustudent.com',	'0782051941',	'2025-01-10',	'2025-04-30',	'Rwanda',	'Rwnada ',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Yvette Umuhoza\'s  Resume .pdf',	'uploads/_Yvette\'s Cover letter .pdf',	'2024-11-19 08:36:18.493681',	'pending'),
(36,	'Alain Mbabazi ',	'a.mbabazi1@alustudent.com',	'250780602625',	'2025-01-10',	'2025-04-30',	'Congolese',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Alain Mbabazi resume.docx',	'uploads/Alain Mbabazi request letter.pdf',	'2024-11-19 09:31:20.515822',	'approved'),
(37,	'Tesire Claire',	'clairetesire3@gmail.com',	'0781251213',	'2024-01-01',	'2025-06-25',	'Rwandan',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Claire Tesire_Resume .docx (1).pdf',	'uploads/Tesire\'s cover letter.pdf',	'2024-11-19 10:36:55.374220',	'approved'),
(38,	'Yvette Umuhoza',	'y.umuhoza@alustudent.com',	'0782051941',	'2025-01-10',	'2025-04-30',	'Rwanda',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Yvette Umuhoza\'s  Resume .pdf',	'uploads/_Yvette\'s Cover letter .pdf',	'2024-11-19 11:44:30.112210',	'pending'),
(39,	'Nelly Umwali',	'n.umwalinelly1@alustudent.com',	'0798747166',	'2025-01-15',	'2025-04-15',	'Rwandan',	'Rwanda ',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'I want gain experience.',	'uploads/My Resume .docx_2.pdf',	'uploads/Internship Support Letter - New Model Students_encrypted_.pdf',	'2024-11-19 12:38:18.568464',	'approved'),
(40,	'Jean Pierre . BUTOYI',	'j.butoyi@alustudent.com',	'0724711258',	'2024-01-08',	'2024-03-30',	'Rwanda',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/INTERNSHIP CV FOR TOURISM DEVELOPMENT.pdf',	'uploads/Student card.jpg',	'2024-11-19 12:56:56.572796',	'pending'),
(41,	'Jean Pierre . BUTOYI',	'j.butoyi@alustudent.com',	'0724711258',	'2024-01-08',	'2024-03-30',	'Rwanda',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/INTERNSHIP CV FOR TOURISM DEVELOPMENT.pdf',	'uploads/Student card.jpg',	'2024-11-19 12:56:58.943945',	'pending'),
(42,	'Jean Pierre . BUTOYI',	'j.butoyi@alustudent.com',	'0724711258',	'2024-01-08',	'2024-03-30',	'Rwanda',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/INTERNSHIP CV FOR TOURISM DEVELOPMENT.pdf',	'uploads/Student card.jpg',	'2024-11-19 12:57:02.659375',	'pending'),
(43,	'Jean Pierre . BUTOYI',	'j.butoyi@alustudent.com',	'0724711258',	'2024-01-08',	'2024-03-30',	'Rwanda',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/INTERNSHIP CV FOR TOURISM DEVELOPMENT.pdf',	'uploads/Student card.jpg',	'2024-11-19 12:57:08.422107',	'pending'),
(44,	'Yvette Umuhoza',	'y.umuhoza@alustudent.com',	'0782051941',	'2025-11-10',	'2025-04-30',	'Rwanda',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Yvette Umuhoza\'s  Resume .pdf',	'uploads/_Yvette\'s Cover letter .pdf',	'2024-11-19 13:00:44.662992',	'approved'),
(45,	'Jean Pierre BUTOYI.',	'j.butoyi@alustudent.com',	'0724711258',	'2024-01-08',	'2024-03-30',	'Rwanda',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/INTERNSHIP CV FOR TOURISM DEVELOPMENT.pdf',	'uploads/Student card.jpg',	'2024-11-19 13:01:46.181695',	'approved'),
(46,	'Yvette Umuhoza',	'y.umuhoza@alustudent.com',	'0782051941',	'2025-01-10',	'2025-04-30',	'Rwanda',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Yvette Umuhoza\'s  Resume .pdf',	'uploads/_Yvette\'s Cover letter .pdf',	'2024-11-19 13:20:06.522372',	'approved'),
(47,	'Shama GASARO RUVUGABIGWI',	'ruvugabigwishama@gmail.com',	'0782266930',	'2025-01-13',	'2024-05-13',	'Rwandan',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    I am open to work in an other department.',	'uploads/RESUME (1).pdf',	'uploads/REQUEST LETTER.pdf',	'2024-11-19 15:51:50.507994',	'approved'),
(48,	'Nelly Umwali',	'n.umwali1@alustudent.com',	'0798747166',	'2025-01-15',	'2025-04-15',	'Rwandan',	'Rwanda ',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'   I want to gain experience.',	'uploads/My Resume .docx_2.pdf',	'uploads/Internship Support Letter - New Model Students_encrypted_.pdf',	'2024-11-19 18:05:14.316519',	'approved'),
(49,	'Deng Phillip Aguto Deng',	'd.aguto@alustudent.com',	'0792109698',	'2025-01-05',	'2025-05-30',	'South Sudanese',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'This opportunity will mean a lot in my academic',	'uploads/DENG PHILLIP AGUTO. CV.pdf',	'uploads/CV FCT.pdf',	'2024-11-19 20:59:32.753479',	'approved'),
(50,	'JOEL KIZITO MUTUMPE',	'mutumpejoel@gmail.com',	'0793220753',	'2025-01-01',	'2025-04-15',	'CONGOLESE',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'Sales-Focused Entrepreneur.\r\n',	'uploads/My Resume.pdf',	'uploads/Request Letter.pdf',	'2024-11-19 21:43:05.872594',	'pending'),
(51,	'JOEL KIZITO MUTUMPE',	'mutumpejoel@gmail.com',	'0793220753',	'2025-01-01',	'2025-04-15',	'CONGOLESE',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'Sales-Focused Entrepreneur.\r\n',	'uploads/My Resume.pdf',	'uploads/Request Letter.pdf',	'2024-11-19 21:44:08.228733',	'approved'),
(52,	'IGIRANEZA Yvette',	'igiranezayvette33@gmail.com',	'0791893746',	'2024-12-02',	'2025-04-30',	'Rwandan',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Yvette Igiraneza CV.pdf',	'uploads/Internship Support Letter - New Model Students - signed.pdf',	'2024-11-20 10:56:57.499777',	'approved'),
(53,	'Emerance Habwituze',	'h.emerance@alustudent.com',	'0782854690',	'2025-01-06',	'2025-05-06',	'Rwanda',	'Rwanda',	'Tour Consultant',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Resume-Tour-Habwituze Emerance.pdf',	'uploads/Cover letter-Tour-Habwituze Emerance.pdf',	'2024-11-20 16:18:58.641819',	'pending'),
(54,	'Emerance Habwituze',	'h.emerance@alustudent.com',	'0782854690',	'2025-01-06',	'2025-04-15',	'Rwanda',	'Rwanda',	'Tour Consultant',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Resume-Tour-Habwituze Emerance.pdf',	'uploads/Cover letter-Tour-Habwituze Emerance.pdf',	'2024-11-20 16:37:53.851614',	'approved'),
(55,	'IGIRANEZA Yvette',	'igiranezayvette33@gmail.com',	'0791893746',	'2025-01-15',	'2025-04-30',	'Rwandan',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Yvette Igiraneza CV.pdf',	'uploads/Internship Support Letter - New Model Students - signed.pdf',	'2024-11-20 17:16:23.924116',	'approved'),
(56,	'Ritha Umutesi',	'rithatessy@gmail.com',	'0782511893',	'2025-01-13',	'2025-04-13',	'Rwandan',	'+250',	'Tour Consultant',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'',	'uploads/Resume.pdf',	'uploads/cover letter.pdf',	'2024-11-21 13:15:15.242549',	'approved'),
(57,	'Isimbi joyau landrine ',	'l.isimbi1@alustudent.com',	'0793019781',	'2024-11-30',	'2025-05-31',	'Rwandese ',	'Rwanda ',	'Tour Consultant',	'Remote',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Isimbiâ€™s Resume .pdf.pdf',	'uploads/Isimbiâ€™s cover letter .pdf',	'2024-11-21 14:00:42.865322',	'approved'),
(58,	'Bwiza Ange',	'a.bwiza@alustudent.com',	'0793854512',	'2024-11-21',	'2025-02-21',	'Rwandese',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Professional Internship (for individuals seeking professional experience)',	'female',	'    ',	'uploads/IMG_5797.jpeg',	'uploads/IMG_5798.jpeg',	'2024-11-21 15:03:30.218476',	'approved'),
(59,	'YEO TCHEPE BERENICE',	't.yeo@alustudent.com',	'250794245458',	'2025-01-06',	'2025-04-18',	'Ivorian',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'God, my devotion and my personality are my assets.',	'uploads/TchÃ©pÃ© BÃ©rÃ©nice YEO_ Resume .pdf',	'uploads/ALU Rwanda Internship Support Letter _Tchepe Berenice  Yeo.pdf',	'2024-11-21 16:20:53.463484',	'approved'),
(60,	'Don Divin Niyukuri',	'd.niyukuri@alustudent.com',	'0793859722',	'2025-01-15',	'2025-03-25',	'Burundian',	'Rwanda',	'Tourism Development',	'Remote',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Don Divin N\'s CV.pdf',	'uploads/First Tour Internship Application latter (1).pdf',	'2024-11-25 17:12:01.324959',	'approved'),
(61,	'SHAMI USANASE GLORIA',	'usanaseshamigloria@gmail.com',	'0783695826',	'2025-01-06',	'2025-04-06',	'Rwandese',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/SHAMI_GLORIA_RESUME.pdf',	'uploads/Shami_Usanase_Gloria.Request Letter.pdf',	'2024-11-26 09:10:28.269965',	'pending'),
(62,	'SHAMI USANASE GLORIA',	'usanaseshamigloria@gmail.com',	'0783695826',	'2025-01-06',	'2025-04-06',	'Rwandese',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/SHAMI_GLORIA_RESUME.pdf',	'uploads/Shami_Usanase_Gloria.Request Letter.pdf',	'2024-11-26 09:10:28.887450',	'pending'),
(63,	'SHAMI USANASE GLORIA',	'usanaseshamigloria@gmail.com',	'0783695826',	'2025-01-06',	'2025-04-30',	'Rwandese',	'Rwanda',	'Sales and Marketing',	'Remote',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/SHAMI_GLORIA_RESUME.pdf',	'uploads/Shami_Usanase_Gloria.Request Letter.pdf',	'2024-11-26 09:28:07.263984',	'pending'),
(64,	'SHAMI USANASE GLORIA',	'usanaseshamigloria@gmail.com',	'0783695826',	'2025-01-06',	'2025-04-30',	'Rwandese',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/SHAMI_GLORIA_RESUME.pdf',	'uploads/Shami_Usanase_Gloria.Request Letter.pdf',	'2024-11-26 09:29:13.762880',	'approved'),
(65,	'AKECH JACOB MAJUR NGOR',	'a.angor@alustudent.com',	'0794408547',	'2025-01-10',	'2025-05-10',	'South Sudanese',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    I hope this application finds you well. ',	'uploads/AKECH JACOB MAJUR NGOR\'S RESUME..pdf',	'uploads/AMN CL.pdf',	'2024-12-02 09:32:56.007685',	'approved'),
(66,	'AKECH JACOB MAJUR NGOR',	'a.ngor@alustudent.com',	'250794408547',	'2025-10-06',	'2025-03-01',	'South Sudanese',	'Rwanda',	'Tourism Development',	'Remote',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/AKECH JACOB MAJUR NGOR\'S RESUME. (1).pdf',	'uploads/Interndship request letter..pdf',	'2024-12-08 06:57:00.510442',	'approved'),
(67,	'Hassan Alieu Swaray',	'h.swaray@alustudent.com',	'0796172168',	'2025-01-01',	'2025-04-01',	'Sierra Leone',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Professional Internship (for individuals seeking professional experience)',	'male',	'Iâ€™m passionate about tourism and fist class tour.',	'uploads/HASSAN ALIEU SWARAY_Resume (CV)_2024  (2).pdf',	'uploads/ALU Rwanda Internship Support Letter _Hassan Alieu Swaray (1).pdf',	'2024-12-08 13:17:07.753257',	'pending'),
(68,	'Hassan Alieu Swaray',	'h.swaray@alustudent.com',	'0796172168',	'2025-01-01',	'2025-04-01',	'Sierra Leone',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Professional Internship (for individuals seeking professional experience)',	'male',	'Iâ€™m passionate about tourism and fist class tour.',	'uploads/HASSAN ALIEU SWARAY_Resume (CV)_2024  (2).pdf',	'uploads/ALU Rwanda Internship Support Letter _Hassan Alieu Swaray (1).pdf',	'2024-12-08 13:17:11.016242',	'pending'),
(69,	'Hassan Alieu Swaray',	'h.swaray@alustudent.com',	'0796172168',	'2025-01-01',	'2025-04-01',	'Sierra Leone',	'Rwanda',	'Sales and Marketing',	'Hybrid',	'Professional Internship (for individuals seeking professional experience)',	'male',	'Iâ€™m passionate about tourism and fist class tour.',	'uploads/HASSAN ALIEU SWARAY_Resume (CV)_2024  (2).pdf',	'uploads/ALU Rwanda Internship Support Letter _Hassan Alieu Swaray (1).pdf',	'2024-12-08 13:17:19.956094',	'pending'),
(70,	'Hassan Alieu Swaray',	'h.swaray@alustudent.com',	'0796172168',	'2025-01-05',	'2025-04-30',	'Sierra Leone',	'Rwanda',	'Tour Consultant',	'Hybrid',	'Professional Internship (for individuals seeking professional experience)',	'male',	'My dream is to explore the world.',	'uploads/HASSAN ALIEU SWARAY_Resume (CV)_2024  (1).pdf',	'uploads/ALU Rwanda Internship Support Letter _Hassan Alieu Swaray (1).pdf',	'2024-12-08 13:20:55.993571',	'approved'),
(71,	'AKECH JACOB MAJUR NGOR',	'a.ngor@alustudent.com',	'250794408547',	'2025-01-06',	'2025-04-06',	'South Sudanese',	'Rwanda',	'Tourism Development',	'Hybrid',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/AKECH JACOB MAJUR NGOR\'S RESUME. (1).pdf',	'uploads/Interndship request letter..pdf',	'2024-12-10 11:56:51.314711',	'approved'),
(72,	'Christella Ngabireyimana',	'c.ngabireyi@alustudent.com',	'0791112976',	'2024-12-11',	'2024-12-11',	'Burundi',	'Rwanda',	'Tour Consultant',	'Remote',	'Academic Internship (for students completing their studies)',	'female',	'    ',	'uploads/Christella_Ngabireyimana-Resume 1.pdf',	'uploads/Internship Request Letter for a Remote Position.pdf',	'2024-12-11 08:02:27.749066',	'approved'),
(73,	'Christella Ngabireyimana',	'c.ngabireyi@alustudent.com',	'0791112976',	'2025-01-06',	'2025-04-04',	'Burundi',	'Rwanda',	'Tour Consultant',	'Remote',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Christella_Ngabireyimana-Resume 1.pdf',	'uploads/Internship Request Letter for a Remote Position.pdf',	'2024-12-11 09:49:52.883284',	'approved'),
(74,	'Christella Ngabireyimana',	'c.ngabireyi@alustudent.com',	'0791112976',	'2025-01-06',	'2025-04-04',	'Burundi',	'Rwanda',	'Tour Consultant',	'Remote',	'Academic Internship (for students completing their studies)',	'male',	'    ',	'uploads/Christella_Ngabireyimana-Resume 1.pdf',	'uploads/Internship Request Letter for a Remote Position.pdf',	'2024-12-11 09:49:56.276072',	'approved');

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

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1,	'akingeneye',	'$2y$10$Fgm67lT8nTYAkFnQLQT4y.BYF1cU0or7nJvjoRecC6amdDMU9xOQ.');

-- 2024-12-24 17:58:04

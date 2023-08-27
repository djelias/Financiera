/*==============================================================*/
/* DBMS name:      Sybase SQL Anywhere 12                       */
/* Created on:     22/01/2021 22:22:12                          */
/*==============================================================*/


drop table if exists DETALLEUSUARIOS;

drop table if exists INVESTIGACIONS;

drop table if exists ROLS;

drop table if exists USUARIOS;


-- ---------------------------------------------------

CREATE TABLE `aboutus` (
  `abid` int(11) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `additional_fees`
--

CREATE TABLE `additional_fees` (
  `id` int(20) NOT NULL,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `fee` varchar(200) NOT NULL,
  `Amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `additional_fees`
--

INSERT INTO `additional_fees` (`id`, `get_id`, `tid`, `fee`, `Amount`) VALUES
(20, '1', 'Loan=1907598678', 'dddd', '7888'),
(21, '2', 'Loan=21319580', 'Late Payment', '4000'),
(22, '3', 'Loan=21319580', '', ''),
(23, '5', 'Loan=21319580', 'Late Payment', '2000'),
(26, '6', 'Loan=21319580', 'Late Payment', '200'),
(27, '6', 'Loan=21319580', 'Fine', '128');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attachment`
--

CREATE TABLE `attachment` (
  `id` int(20) NOT NULL,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `attached_file` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `attachment`
--

INSERT INTO `attachment` (`id`, `get_id`, `tid`, `attached_file`, `date_time`) VALUES
(1, '1', 'Loan=1907598678', 'document/4887_File_cryptos documentation.docx', '2017-05-01 12:11:34'),
(2, '2', 'Loan=21319580', 'document/2782_File_Email.docx', '2017-05-10 16:56:55'),
(3, '5', 'Loan=21319580', 'document/2045_File_Marksheet Management System.docx', '2017-05-13 13:45:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `backup`
--

CREATE TABLE `backup` (
  `id` int(200) NOT NULL,
  `tracking_id` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `backup`
--

INSERT INTO `backup` (`id`, `tracking_id`, `amount`, `address`, `date_time`) VALUES
(10, 'Cryptos?rid=782752', '0.1', '134N7BmQZHSj2WU7kUaN8fFada32GpBXbg', '2017-04-03 14:37:40'),
(11, 'Cryptos?rid=782752', '0.1', '134N7BmQZHSj2WU7kUaN8fFada32GpBXbg', '2017-04-03 15:14:12'),
(15, 'Cryptos?rid=782752', '0.1', '134N7BmQZHSj2WU7kUaN8fFada32GpBXbg', '2017-04-03 16:30:28'),
(18, 'Cryptos?rid=782752', '0.15', '134N7BmQZHSj2WU7kUaN8fFada32GpBXbg', '2017-04-03 17:59:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `banaid` int(11) NOT NULL,
  `bannar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`banaid`, `bannar`) VALUES
(3, 'bannar/sld2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `battachment`
--

CREATE TABLE `battachment` (
  `id` int(20) NOT NULL,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `attached_file` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `battachment`
--

INSERT INTO `battachment` (`id`, `get_id`, `tid`, `attached_file`, `date_time`) VALUES
(1, '1', 'Loan=1907598678', 'bdocument/5605_File_Below is the screenshot of the welcome mail sent to me when I registered with namecheap.docx', '2017-05-01 17:30:28'),
(2, '1', 'Loan=1907598678', 'bdocument/2630_File_Below is the screenshot of the welcome mail sent to me when I registered with namecheap.docx', '2017-05-01 17:32:52'),
(3, '2', 'Loan=1907598678', 'bdocument/6815_File_cryptos documentation.docx', '2017-05-01 17:38:20'),
(4, '3', 'Loan=21319580', 'bdocument/2739_File_INTRODUCTION TO NIGERIA SOCIAL LIFE AND EARLY CIVILIZATION.docx', '2017-05-01 19:35:25'),
(5, '4', 'Loan=21319580', 'bdocument/4525_File_ESTHER.docx', '2017-05-13 13:32:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borrowers`
--

CREATE TABLE `borrowers` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `addrs1` text NOT NULL,
  `addrs2` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `account` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `borrowers`
--

INSERT INTO `borrowers` (`id`, `fname`, `lname`, `email`, `phone`, `addrs1`, `addrs2`, `city`, `state`, `zip`, `country`, `comment`, `account`, `balance`, `image`, `date_time`, `status`) VALUES
(5, 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', 'FCE', 'Abeokuta', 'Ikeja', 'Lagos', '110001', 'US', 'Application for loan', '0034445657', '1451.00', 'img/user3.png', '2018-01-06 18:26:11', 'Pending'),
(6, 'Diego', 'Elias', 'diego@gmail.com', '7479-2397', 'Tonacatepeque', '', 'San Salvador', 'Tonacatepeque', '01101', 'US', 'Application for loan', 'EA291020220002', '1451.00', 'img/imagenDiego.jpeg', '2022-10-29 23:44:32', 'Pending'),
(8, 'Jose Miguel', 'Lopez Torres', 'miguel@gmail.com', '6026-2221', 'San Martin', '', 'San Salvador', 'San Martin', '01101', 'SV', 'Nuevo registro', 'LT291020220001', '0.0', 'img/foto prueba2.jpg', '2022-10-29 23:43:20', 'Pending'),
(9, 'Cruz', 'Elias', 'cruz@gmail.com', '7485 6380', 'Veracruz', '', 'San Salvador', 'Tonacatepeque', '01101', 'SV', 'Nuevo registro', 'CE00001', '0.0', 'img/papa.jpg', '2022-11-15 01:56:26', 'Pending'),
(10, 'David', 'Elias', 'david@gmail.com', '7569 6544', 'Tonacatepeque', '', 'San Salvador', 'Tonacatepeque', '01101', 'SV', 'Nuevo registro', 'DE00001', '0.0', 'img/david.jpg', '2022-11-15 01:56:30', 'Pending'),
(11, 'Alez', 'Mendez', 'alex@gmail.com', '7170 6170', 'Apopa', '', 'San Salvador', 'Apopa', '01101', 'SV', 'Nuevo registro', 'AM00001', '0.0', 'img/alex.jpg', '2022-11-15 01:56:33', 'Pending');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `collateral`
--

CREATE TABLE `collateral` (
  `id` int(20) NOT NULL,
  `idm` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `type_of_collateral` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `make` varchar(200) NOT NULL,
  `serial_number` varchar(200) NOT NULL,
  `estimated_price` varchar(200) NOT NULL,
  `proof_of_ownership` text NOT NULL,
  `cimage` text NOT NULL,
  `observation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `collateral`
--

INSERT INTO `collateral` (`id`, `idm`, `tid`, `name`, `type_of_collateral`, `model`, `make`, `serial_number`, `estimated_price`, `proof_of_ownership`, `cimage`, `observation`) VALUES
(1, '1', 'Loan=1907598678', 'bhhh', 'jhhhjk', 'hhh', 'hkkhkk', '87877878', '78787', '', 'cimage/9fdfcacaa4d943e0328bd32e35a40035ebdc7a9b.png', 'hkjkl'),
(2, '2', 'Loan=21319580', 'Mr Segun O', 'New', 'LOAN2011', 'NEWLOAN', 'LOANS20166', '40000', '', 'cimage/OPTIMUM LOGO FINAL .png', 'This is just testing'),
(3, '5', 'Loan=21319580', 'Plot of Land', 'Land', 'Land', 'Land', 'Receipt', '20000', '', 'cimage/fair.png', 'Good for the application of the loan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `alpha_2` varchar(200) NOT NULL DEFAULT '',
  `alpha_3` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `name`, `alpha_2`, `alpha_3`) VALUES
(1, 'Afghanistan', 'fl', 'afg'),
(2, 'Aland Islands', 'ax', 'ala'),
(3, 'Albania', 'al', 'alb'),
(4, 'Algeria', 'dz', 'dza'),
(5, 'American Samoa', 'as', 'asm'),
(6, 'Andorra', 'ad', 'and'),
(7, 'Angola', 'ao', 'ago'),
(8, 'Anguilla', 'ai', 'aia'),
(9, 'Antarctica', 'aq', 'ata'),
(10, 'Antigua and Barbuda', 'ag', 'atg'),
(11, 'Argentina', 'ar', 'arg'),
(12, 'Armenia', 'am', 'arm'),
(13, 'Aruba', 'aw', 'abw'),
(14, 'Australia', 'au', 'aus'),
(15, 'Austria', 'at', 'aut'),
(16, 'Azerbaijan', 'az', 'aze'),
(17, 'Bahamas', 'bs', 'bhs'),
(18, 'Bahrain', 'bh', 'bhr'),
(19, 'Bangladesh', 'bd', 'bgd'),
(20, 'Barbados', 'bb', 'brb'),
(21, 'Belarus', 'by', 'blr'),
(22, 'Belgium', 'be', 'bel'),
(23, 'Belize', 'bz', 'blz'),
(24, 'Benin', 'bj', 'ben'),
(25, 'Bermuda', 'bm', 'bmu'),
(26, 'Bhutan', 'bt', 'btn'),
(27, 'Bolivia, Plurinational State of', 'bo', 'bol'),
(28, 'Bonaire, Sint Eustatius and Saba', 'bq', 'bes'),
(29, 'Bosnia and Herzegovina', 'ba', 'bih'),
(30, 'Botswana', 'bw', 'bwa'),
(31, 'Bouvet Island', 'bv', 'bvt'),
(32, 'Brazil', 'br', 'bra'),
(33, 'British Indian Ocean Territory', 'io', 'iot'),
(34, 'Brunei Darussalam', 'bn', 'brn'),
(35, 'Bulgaria', 'bg', 'bgr'),
(36, 'Burkina Faso', 'bf', 'bfa'),
(37, 'Burundi', 'bi', 'bdi'),
(38, 'Cambodia', 'kh', 'khm'),
(39, 'Cameroon', 'cm', 'cmr'),
(40, 'Canada', 'ca', 'can'),
(41, 'Cape Verde', 'cv', 'cpv'),
(42, 'Cayman Islands', 'ky', 'cym'),
(43, 'Central African Republic', 'cf', 'caf'),
(44, 'Chad', 'td', 'tcd'),
(45, 'Chile', 'cl', 'chl'),
(46, 'China', 'cn', 'chn'),
(47, 'Christmas Island', 'cx', 'cxr'),
(48, 'Cocos (Keeling) Islands', 'cc', 'cck'),
(49, 'Colombia', 'co', 'col'),
(50, 'Comoros', 'km', 'com'),
(51, 'Congo', 'cg', 'cog'),
(52, 'Congo, The Democratic Republic of the', 'cd', 'cod'),
(53, 'Cook Islands', 'ck', 'cok'),
(54, 'Costa Rica', 'cr', 'cri'),
(55, 'Cote d\'Ivoire', 'ci', 'civ'),
(56, 'Croatia', 'hr', 'hrv'),
(57, 'Cuba', 'cu', 'cub'),
(58, 'Curacao', 'cw', 'cuw'),
(59, 'Cyprus', 'cy', 'cyp'),
(60, 'Czech Republic', 'cz', 'cze'),
(61, 'Denmark', 'dk', 'dnk'),
(62, 'Djibouti', 'dj', 'dji'),
(63, 'Dominica', 'dm', 'dma'),
(64, 'Dominican Republic', 'do', 'dom'),
(65, 'Ecuador', 'ec', 'ecu'),
(66, 'Egypt', 'eg', 'egy'),
(67, 'El Salvador', 'sv', 'slv'),
(68, 'Equatorial Guinea', 'gq', 'gnq'),
(69, 'Eritrea', 'er', 'eri'),
(70, 'Estonia', 'ee', 'est'),
(71, 'Ethiopia', 'et', 'eth'),
(72, 'Falkland Islands (Malvinas)', 'fk', 'flk'),
(73, 'Faroe Islands', 'fo', 'fro'),
(74, 'Fiji', 'fj', 'fji'),
(75, 'Finland', 'fi', 'fin'),
(76, 'France', 'fr', 'fra'),
(77, 'French Guiana', 'gf', 'guf'),
(78, 'French Polynesia', 'pf', 'pyf'),
(79, 'French Southern Territories', 'tf', 'atf'),
(80, 'Gabon', 'ga', 'gab'),
(81, 'Gambia', 'gm', 'gmb'),
(82, 'Georgia', 'ge', 'geo'),
(83, 'Germany', 'de', 'deu'),
(84, 'Ghana', 'gh', 'gha'),
(85, 'Gibraltar', 'gi', 'gib'),
(86, 'Greece', 'gr', 'grc'),
(87, 'Greenland', 'gl', 'grl'),
(88, 'Grenada', 'gd', 'grd'),
(89, 'Guadeloupe', 'gp', 'glp'),
(90, 'Guam', 'gu', 'gum'),
(91, 'Guatemala', 'gt', 'gtm'),
(92, 'Guernsey', 'gg', 'ggy'),
(93, 'Guinea', 'gn', 'gin'),
(94, 'Guinea-Bissau', 'gw', 'gnb'),
(95, 'Guyana', 'gy', 'guy'),
(96, 'Haiti', 'ht', 'hti'),
(97, 'Heard Island and McDonald Islands', 'hm', 'hmd'),
(98, 'Holy See (Vatican City State)', 'va', 'vat'),
(99, 'Honduras', 'hn', 'hnd'),
(100, 'Hong Kong', 'hk', 'hkg'),
(101, 'Hungary', 'hu', 'hun'),
(102, 'Iceland', 'is', 'isl'),
(103, 'India', 'in', 'ind'),
(104, 'Indonesia', 'id', 'idn'),
(105, 'Iran, Islamic Republic of', 'ir', 'irn'),
(106, 'Iraq', 'iq', 'irq'),
(107, 'Ireland', 'ie', 'irl'),
(108, 'Isle of Man', 'im', 'imn'),
(109, 'Israel', 'il', 'isr'),
(110, 'Italy', 'it', 'ita'),
(111, 'Jamaica', 'jm', 'jam'),
(112, 'Japan', 'jp', 'jpn'),
(113, 'Jersey', 'je', 'jey'),
(114, 'Jordan', 'jo', 'jor'),
(115, 'Kazakhstan', 'kz', 'kaz'),
(116, 'Kenya', 'ke', 'ken'),
(117, 'Kiribati', 'ki', 'kir'),
(118, 'Korea, Democratic People\'s Republic of', 'kp', 'prk'),
(119, 'Korea, Republic of', 'kr', 'kor'),
(120, 'Kuwait', 'kw', 'kwt'),
(121, 'Kyrgyzstan', 'kg', 'kgz'),
(122, 'Lao People\'s Democratic Republic', 'la', 'lao'),
(123, 'Latvia', 'lv', 'lva'),
(124, 'Lebanon', 'lb', 'lbn'),
(125, 'Lesotho', 'ls', 'lso'),
(126, 'Liberia', 'lr', 'lbr'),
(127, 'Libyan Arab Jamahiriya', 'ly', 'lby'),
(128, 'Liechtenstein', 'li', 'lie'),
(129, 'Lithuania', 'lt', 'ltu'),
(130, 'Luxembourg', 'lu', 'lux'),
(131, 'Macao', 'mo', 'mac'),
(132, 'Macedonia, The former Yugoslav Republic of', 'mk', 'mkd'),
(133, 'Madagascar', 'mg', 'mdg'),
(134, 'Malawi', 'mw', 'mwi'),
(135, 'Malaysia', 'my', 'mys'),
(136, 'Maldives', 'mv', 'mdv'),
(137, 'Mali', 'ml', 'mli'),
(138, 'Malta', 'mt', 'mlt'),
(139, 'Marshall Islands', 'mh', 'mhl'),
(140, 'Martinique', 'mq', 'mtq'),
(141, 'Mauritania', 'mr', 'mrt'),
(142, 'Mauritius', 'mu', 'mus'),
(143, 'Mayotte', 'yt', 'myt'),
(144, 'Mexico', 'mx', 'mex'),
(145, 'Micronesia, Federated States of', 'fm', 'fsm'),
(146, 'Moldova, Republic of', 'md', 'mda'),
(147, 'Monaco', 'mc', 'mco'),
(148, 'Mongolia', 'mn', 'mng'),
(149, 'Montenegro', 'me', 'mne'),
(150, 'Montserrat', 'ms', 'msr'),
(151, 'Morocco', 'ma', 'mar'),
(152, 'Mozambique', 'mz', 'moz'),
(153, 'Myanmar', 'mm', 'mmr'),
(154, 'Namibia', 'na', 'nam'),
(155, 'Nauru', 'nr', 'nru'),
(156, 'Nepal', 'np', 'npl'),
(157, 'Netherlands', 'nl', 'nld'),
(158, 'New Caledonia', 'nc', 'ncl'),
(159, 'New Zealand', 'nz', 'nzl'),
(160, 'Nicaragua', 'ni', 'nic'),
(161, 'Niger', 'ne', 'ner'),
(162, 'Nigeria', 'ng', 'nga'),
(163, 'Niue', 'nu', 'niu'),
(164, 'Norfolk Island', 'nf', 'nfk'),
(165, 'Northern Mariana Islands', 'mp', 'mnp'),
(166, 'Norway', 'no', 'nor'),
(167, 'Oman', 'om', 'omn'),
(168, 'Pakistan', 'pk', 'pak'),
(169, 'Palau', 'pw', 'plw'),
(170, 'Palestinian Territory, Occupied', 'ps', 'pse'),
(171, 'Panama', 'pa', 'pan'),
(172, 'Papua New Guinea', 'pg', 'png'),
(173, 'Paraguay', 'py', 'pry'),
(174, 'Peru', 'pe', 'per'),
(175, 'Philippines', 'ph', 'phl'),
(176, 'Pitcairn', 'pn', 'pcn'),
(177, 'Poland', 'pl', 'pol'),
(178, 'Portugal', 'pt', 'prt'),
(179, 'Puerto Rico', 'pr', 'pri'),
(180, 'Qatar', 'qa', 'qat'),
(181, 'Reunion', 're', 'reu'),
(182, 'Romania', 'ro', 'rou'),
(183, 'Russian Federation', 'ru', 'rus'),
(184, 'Rwanda', 'rw', 'rwa'),
(185, 'Saint Barthelemy', 'bl', 'blm'),
(186, 'Saint Helena, Ascension and Tristan Da Cunha', 'sh', 'shn'),
(187, 'Saint Kitts and Nevis', 'kn', 'kna'),
(188, 'Saint Lucia', 'lc', 'lca'),
(189, 'Saint Martin (French Part)', 'mf', 'maf'),
(190, 'Saint Pierre and Miquelon', 'pm', 'spm'),
(191, 'Saint Vincent and The Grenadines', 'vc', 'vct'),
(192, 'Samoa', 'ws', 'wsm'),
(193, 'San Marino', 'sm', 'smr'),
(194, 'Sao Tome and Principe', 'st', 'stp'),
(195, 'Saudi Arabia', 'sa', 'sau'),
(196, 'Senegal', 'sn', 'sen'),
(197, 'Serbia', 'rs', 'srb'),
(198, 'Seychelles', 'sc', 'syc'),
(199, 'Sierra Leone', 'sl', 'sle'),
(200, 'Singapore', 'sg', 'sgp'),
(201, 'Sint Maarten (Dutch Part)', 'sx', 'sxm'),
(202, 'Slovakia', 'sk', 'svk'),
(203, 'Slovenia', 'si', 'svn'),
(204, 'Solomon Islands', 'sb', 'slb'),
(205, 'Somalia', 'so', 'som'),
(206, 'South Africa', 'za', 'zaf'),
(207, 'South Georgia and The South Sandwich Islands', 'gs', 'sgs'),
(208, 'South Sudan', 'ss', 'ssd'),
(209, 'Spain', 'es', 'esp'),
(210, 'Sri Lanka', 'lk', 'lka'),
(211, 'Sudan', 'sd', 'sdn'),
(212, 'Suriname', 'sr', 'sur'),
(213, 'Svalbard and Jan Mayen', 'sj', 'sjm'),
(214, 'Swaziland', 'sz', 'swz'),
(215, 'Sweden', 'se', 'swe'),
(216, 'Switzerland', 'ch', 'che'),
(217, 'Syrian Arab Republic', 'sy', 'syr'),
(218, 'Taiwan, Province of China', 'tw', 'twn'),
(219, 'Tajikistan', 'tj', 'tjk'),
(220, 'Tanzania, United Republic of', 'tz', 'tza'),
(221, 'Thailand', 'th', 'tha'),
(222, 'Timor-Leste', 'tl', 'tls'),
(223, 'Togo', 'tg', 'tgo'),
(224, 'Tokelau', 'tk', 'tkl'),
(225, 'Tonga', 'to', 'ton'),
(226, 'Trinidad and Tobago', 'tt', 'tto'),
(227, 'Tunisia', 'tn', 'tun'),
(228, 'Turkey', 'tr', 'tur'),
(229, 'Turkmenistan', 'tm', 'tkm'),
(230, 'Turks and Caicos Islands', 'tc', 'tca'),
(231, 'Tuvalu', 'tv', 'tuv'),
(232, 'Uganda', 'ug', 'uga'),
(233, 'Ukraine', 'ua', 'ukr'),
(234, 'United Arab Emirates', 'ae', 'are'),
(235, 'United Kingdom', 'gb', 'gbr'),
(236, 'United States', 'us', 'usa'),
(237, 'United States Minor Outlying Islands', 'um', 'umi'),
(238, 'Uruguay', 'uy', 'ury'),
(239, 'Uzbekistan', 'uz', 'uzb'),
(240, 'Vanuatu', 'vu', 'vut'),
(241, 'Venezuela, Bolivarian Republic of', 've', 'ven'),
(242, 'Viet Nam', 'vn', 'vnm'),
(243, 'Virgin Islands, British', 'vg', 'vgb'),
(244, 'Virgin Islands, U.S.', 'vi', 'vir'),
(245, 'Wallis and Futuna', 'wf', 'wlf'),
(246, 'Western Sahara', 'eh', 'esh'),
(247, 'Yemen', 'ye', 'yem'),
(248, 'Zambia', 'zm', 'zmb'),
(249, 'Zimbabwe', 'zw', 'zwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_permission`
--

CREATE TABLE `emp_permission` (
  `id` int(20) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `module_name` varchar(350) NOT NULL,
  `pcreate` varchar(20) NOT NULL,
  `pread` varchar(20) NOT NULL,
  `pupdate` varchar(20) NOT NULL,
  `pdelete` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `emp_permission`
--

INSERT INTO `emp_permission` (`id`, `tid`, `module_name`, `pcreate`, `pread`, `pupdate`, `pdelete`) VALUES
(34, 'Cryptos?rid=782752', 'Email Panel', '0', '0', '0', '0'),
(35, 'Cryptos?rid=782752', 'Borrower Details', '1', '0', '0', '0'),
(36, 'Cryptos?rid=782752', 'Employee Wallet', '1', '1', '0', '0'),
(37, 'Cryptos?rid=782752', 'Loan Details', '0', '0', '0', '0'),
(38, 'Cryptos?rid=782752', 'Internal Message', '1', '1', '0', '0'),
(39, 'Cryptos?rid=782752', 'Missed Payment', '0', '0', '0', '0'),
(40, 'Cryptos?rid=782752', 'Payment', '1', '0', '0', '0'),
(41, 'Cryptos?rid=782752', 'Employee Details', '0', '0', '0', '0'),
(42, 'Cryptos?rid=782752', 'Module Permission', '0', '0', '0', '0'),
(43, 'Cryptos?rid=782752', 'Savings Account', '1', '1', '0', '0'),
(44, 'Cryptos?rid=782752', 'General Settings', '0', '0', '0', '0'),
(45, 'Loan=21319580', 'Email Panel', '1', '1', '1', '1'),
(46, 'Loan=21319580', 'Borrower Details', '1', '1', '1', '1'),
(47, 'Loan=21319580', 'Employee Wallet', '1', '1', '1', '1'),
(48, 'Loan=21319580', 'Loan Details', '1', '1', '1', '1'),
(49, 'Loan=21319580', 'Internal Message', '1', '1', '0', '0'),
(50, 'Loan=21319580', 'Missed Payment', '1', '1', '1', '1'),
(51, 'Loan=21319580', 'Payment', '1', '1', '1', '1'),
(52, 'Loan=21319580', 'Employee Details', '1', '1', '1', '1'),
(53, 'Loan=21319580', 'Module Permission', '1', '1', '1', '1'),
(54, 'Loan=21319580', 'Savings Account', '1', '1', '1', '1'),
(55, 'Loan=21319580', 'General Settings', '1', '1', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_role`
--

CREATE TABLE `emp_role` (
  `id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etemplates`
--

CREATE TABLE `etemplates` (
  `id` int(11) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `receiver_email` varchar(350) NOT NULL,
  `subject` varchar(350) NOT NULL,
  `msg` text NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `topic` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `faqs`
--

INSERT INTO `faqs` (`id`, `topic`, `content`) VALUES
(1, 'Please type the subject here', '<p>Please Update Faqs Here</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fin_info`
--

CREATE TABLE `fin_info` (
  `id` int(20) NOT NULL,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `occupation` text NOT NULL,
  `mincome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fin_info`
--

INSERT INTO `fin_info` (`id`, `get_id`, `tid`, `occupation`, `mincome`) VALUES
(3, '1', 'Loan=1907598678', '', ''),
(5, '2', 'Loan=1907598678', 'Teacher', '40000'),
(6, '3', 'Loan=21319580', 'Banker', '500000'),
(7, '5', 'Loan=21319580', 'Teacher', '87000'),
(8, '5', 'Loan=21319580', 'Computer Operator', '15000'),
(9, '5', 'Loan=21319580', 'Trader', '72500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pho` varchar(200) NOT NULL,
  `face` varchar(200) NOT NULL,
  `webs` varchar(200) NOT NULL,
  `conh` varchar(200) NOT NULL,
  `twi` varchar(200) NOT NULL,
  `gplus` varchar(200) NOT NULL,
  `ins` varchar(200) NOT NULL,
  `yous` varchar(200) NOT NULL,
  `about` text NOT NULL,
  `apply` text NOT NULL,
  `mission` text NOT NULL,
  `objective` text NOT NULL,
  `map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `footer`
--

INSERT INTO `footer` (`id`, `email`, `pho`, `face`, `webs`, `conh`, `twi`, `gplus`, `ins`, `yous`, `about`, `apply`, `mission`, `objective`, `map`) VALUES
(2, 'info@bequesters.com', '+233808883675466', 'www.facebook.com/info@bequesters', 'www.bequesters.com', 'Lasvegas USA', 'www.twitter.com/info@bequesters', 'www.googleplus.com/oinfo@bequesters', 'www.in.com/info@bequesters', 'www.youtube.com/info@bequesters', 'About the system here. Thanks, We are just testing the software and we discover that the software is errors free. Thanks once again.', 'Who may apply here. Thabnks', 'Mission here. Thanks', 'System OBJECTIVE HERE. Thanks', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hiw`
--

CREATE TABLE `hiw` (
  `hid` int(11) NOT NULL,
  `hiw` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hiw`
--

INSERT INTO `hiw` (`hid`, `hiw`) VALUES
(1, '<p>We Provide Loans For Individual, Coperate and Many</p>\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loan_info`
--

CREATE TABLE `loan_info` (
  `id` int(20) NOT NULL,
  `borrower` varchar(200) NOT NULL,
  `baccount` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `amount` float NOT NULL,
  `interest` float DEFAULT NULL,
  `tiempo` float DEFAULT NULL,
  `date_release` varchar(200) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `g_name` varchar(200) DEFAULT NULL,
  `g_phone` varchar(200) DEFAULT NULL,
  `g_address` text DEFAULT NULL,
  `rela` varchar(200) DEFAULT NULL,
  `g_image` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `pay_date` varchar(200) NOT NULL,
  `amount_topay` varchar(200) NOT NULL,
  `teller` varchar(200) NOT NULL,
  `remark` text NOT NULL,
  `upstatus` varchar(200) NOT NULL,
  `montoPendiente` float DEFAULT NULL,
  `ultimo_pago` varchar(200) DEFAULT NULL,
  `proximo_pago` varchar(200) DEFAULT NULL,
  `estatusPrestamo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `loan_info`
--

INSERT INTO `loan_info` (`id`, `borrower`, `baccount`, `desc`, `amount`, `interest`, `tiempo`, `date_release`, `agent`, `g_name`, `g_phone`, `g_address`, `rela`, `g_image`, `status`, `remarks`, `pay_date`, `amount_topay`, `teller`, `remark`, `upstatus`, `montoPendiente`, `ultimo_pago`, `proximo_pago`, `estatusPrestamo`) VALUES
(7, '5', '--Select Customer--', 'new loan', 500000, 5, 3, '06/21/2017', 'Admin', 'Mr Segun', '09034543234', '4, ade', 'GFriend', 'img/', 'Disapproved', 'good', '10/31/2017', '1000000', 'Admin', 'new loan', 'Pending', NULL, NULL, NULL, NULL),
(14, '6', 'EA291020220002', 'new', 7000, 4, 3, '2022/10/30', 'Admin', 'null', 'null', 'null', 'null', 'rutaarchivos', 'Pendiente', '', '2022/11/30', '370.21', 'Admin', 'new', 'Pendiente', 5813.25, '0', '0', NULL),
(15, '6', 'EA291020220003', 'Nuevo Prestamo', 10000, 4, 5, '2022-11-30', 'Admin', 'null', 'null', 'null', 'null', 'rutaarchivos', '', '', '2022-12-30', '442.02', 'Admin', 'Primer pago', 'Pendiente', -0.00248, '2025-07-30', '2025-08-30', 0),
(16, '9', 'CE2200001', 'nuevo prestamo', 5000, 5, 2, '2022-11-30', 'Admin', 'null', 'null', 'null', 'null', 'rutaarchivos', '', '', '2023-01-30', '362.35', 'Admin', 'cuota mensual', 'Pendiente', 0, '2024-09-30', '2024-10-30', 0),
(17, '9', 'ER291020220002', 'nuevo prestamo', 10000, 4, 4, '2022-11-30', 'Admin', 'null', 'null', 'null', 'null', 'rutaarchivos', '', '', '2022-12-30', '471.81', 'Admin', 'fecha de pago', 'Pendiente', 0, '2023-05-30', '2023-06-30', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `id` int(200) NOT NULL,
  `sender_id` varchar(200) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `msg_to` varchar(200) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`id`, `sender_id`, `sender_name`, `msg_to`, `subject`, `message`, `date_time`) VALUES
(4, 'Cryptos?rid=782752', 'au JJJ', 'Loan=21319580', 'Hello', '<p>Good to see you</p>\r\n', '2017-05-01 18:46:57'),
(5, 'Loan=21319580', 'Admin', 'Cryptos?rid=782752', 'RE: Hello', '<p>Thanks<br />\r\n-------------------------</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Good to see you</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2017-05-01 18:48:27'),
(6, 'Cryptos?rid=782752', 'au JJJ', 'Loan=21319580', 'RE: RE: Hello', '<p>Thanks&nbsp; you<br />\r\n-------------------------</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Thanks<br />\r\n-------------------------</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Good to see you</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2017-05-01 18:49:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mywallet`
--

CREATE TABLE `mywallet` (
  `id` int(11) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `t_to` varchar(200) NOT NULL,
  `Amount` varchar(200) NOT NULL,
  `Desc` varchar(200) NOT NULL,
  `wtype` varchar(200) NOT NULL,
  `tdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mywallet`
--

INSERT INTO `mywallet` (`id`, `tid`, `t_to`, `Amount`, `Desc`, `wtype`, `tdate`) VALUES
(39, 'Loan=1907598678', 'NIL', '500', 'hkbvhk', 'credit', '2018-01-03 23:03:23'),
(55, 'Cryptos?rid=453536', 'NIL', '5000', 'transfer to aa HHJ', 'transfer', '2018-01-03 23:03:19'),
(57, 'Cryptos?rid=453536', 'NIL', '3000', 'reverse 3k back to you', 'transfer', '2018-01-03 23:03:14'),
(58, 'Cryptos?rid=453536', 'NIL', '5000', 'add payment', 'debit', '2018-01-03 23:03:08'),
(59, 'Cryptos?rid=453536', 'NIL', '2000', 'jjjjj', 'debit', '2018-01-03 23:03:02'),
(60, 'Loan=21319580', 'NIL', '2400', 'Give loan', 'debit', '2018-01-03 23:02:57'),
(61, 'Loan=21319580', 'NIL', '1350', 'Loan Payment', 'credit', '2018-01-03 23:02:51'),
(64, 'Loan=21319580', 'Cryptos?rid=782752', '200', 'Transfer to JJJ', 'transfer', '2018-01-03 22:58:16'),
(65, 'Loan=21319580', 'Cryptos?rid=782752', '150', 'Transfer money', 'transfer', '2018-01-03 22:58:34'),
(66, 'Loan=21319580', 'NIL', '525', 'Loan due', 'credit', '2018-01-03 23:05:19'),
(67, 'Loan=21319580', 'NIL', '1050', 'Add Payment', 'debit', '2018-01-03 23:04:46'),
(68, 'Loan=21319580', 'Cryptos?rid=782752', '200', 'Transfer to Staff JJJ', 'transfer', '2018-01-05 15:39:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` int(20) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `account` varchar(200) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `customer` varchar(200) NOT NULL,
  `loan` varchar(200) NOT NULL,
  `pay_date` varchar(200) NOT NULL,
  `amount_to_pay` varchar(200) NOT NULL,
  `remarks` text NOT NULL,
  `interesPagado` float DEFAULT NULL,
  `capitalPagado` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `tid`, `account`, `account_no`, `customer`, `loan`, `pay_date`, `amount_to_pay`, `remarks`, `interesPagado`, `capitalPagado`) VALUES
(5, 'Loan=21319580', '199382731', '5', '5', '1000000', '05/30/2017', '3000000', 'Payment for Doris Micheal', NULL, NULL),
(6, 'Loan=21319580', '12', '6', '6', '150', '11/02/2022', '150', 'Pago al dia', NULL, NULL),
(10, 'Loan=21319580', '12', '6', '6', '150', '12/02/2022', '150', 'pago al dia', NULL, NULL),
(11, 'Loan=21319580', '13', '6', '6', '200', '01/02/2023', '200', 'ma', NULL, NULL),
(12, 'Loan=21319580', '13', '6', '6', '200', '12/02/2022', '200', 'pago puntual', NULL, NULL),
(20, 'Loan=21319580', '14', '6', '6', '370.21', '02/28/2023', '400', 'pago al dia', 280, 120),
(21, 'Loan=21319580', '14', '6', '6', '370.21', '11/29/2022', '400', 'pago al dia', 275.2, 124.8),
(22, 'Loan=21319580', '14', '6', '6', '370.21', '03/30/2023', '370.21', 'pago', 270.208, 100.002),
(53, 'Loan=21319580', '15', '6', '6', '442.02', '2022-12-30', '442.02', 'pago', 400, 42.02),
(54, 'Loan=21319580', '15', '6', '6', '442.02', '2023-01-15', '2000', 'pago adelantado', 199.16, 1800.84),
(55, 'Loan=21319580', '15', '6', '6', '442.02', '2023-01-30', '442.02', 'pago cuota', 163.143, 278.877),
(56, 'Loan=21319580', '15', '6', '6', '442.02', '2023-02-28', '442.02', 'pago cuota', 315.13, 126.89),
(57, 'Loan=21319580', '15', '6', '6', '442.02', '2023-03-30', '442.02', 'pago', 310.055, 131.965),
(58, 'Loan=21319580', '15', '6', '6', '442.02', '2023-04-30', '442.02', 'pago', 304.776, 137.244),
(59, 'Loan=21319580', '15', '6', '6', '442.02', '2023-05-30', '442.02', 'pago', 299.286, 142.734),
(60, 'Loan=21319580', '15', '6', '6', '442.02', '2023-06-30', '442.02', 'pago', 293.577, 148.443),
(61, 'Loan=21319580', '15', '6', '6', '442.02', '2023-07-30', '442.02', 'pago', 287.64, 154.38),
(62, 'Loan=21319580', '15', '6', '6', '442.02', '2023-08-30', '442.02', 'pago', 281.464, 160.556),
(63, 'Loan=21319580', '15', '6', '6', '442.02', '2023-09-30', '442.02', 'pago', 275.042, 166.978),
(64, 'Loan=21319580', '15', '6', '6', '442.02', '2023-10-30', '442.02', 'pago', 268.363, 173.657),
(65, 'Loan=21319580', '15', '6', '6', '442.02', '2023-10-30', '442.02', 'pago', 261.416, 180.604),
(66, 'Loan=21319580', '15', '6', '6', '442.02', '2023-11-30', '442.02', 'pago', 254.192, 187.828),
(67, 'Loan=21319580', '15', '6', '6', '442.02', '2023-12-30', '442.02', 'pago', 246.679, 195.341),
(68, 'Loan=21319580', '15', '6', '6', '442.02', '2024-01-30', '442.02', 'pago', 238.866, 203.154),
(69, 'Loan=21319580', '15', '6', '6', '442.02', '2024-02-28', '442.02', 'pago', 230.74, 211.28),
(70, 'Loan=21319580', '15', '6', '6', '442.02', '2024-03-30', '442.02', 'pago', 222.288, 219.732),
(71, 'Loan=21319580', '15', '6', '6', '442.02', '2024-04-30', '442.02', 'pago', 213.499, 228.521),
(72, 'Loan=21319580', '15', '6', '6', '442.02', '2024-05-30', '442.02', 'pago', 204.358, 237.662),
(73, 'Loan=21319580', '15', '6', '6', '442.02', '2024-05-30', '442.02', 'pago', 194.852, 247.168),
(74, 'Loan=21319580', '15', '6', '6', '442.02', '2024-06-30', '442.02', 'pago', 184.965, 257.055),
(75, 'Loan=21319580', '15', '6', '6', '442.02', '2024-07-30', '442.02', 'pago', 174.683, 267.337),
(76, 'Loan=21319580', '15', '6', '6', '442.02', '2024-08-30', '442.02', 'pago', 163.99, 278.03),
(77, 'Loan=21319580', '15', '6', '6', '442.02', '2024-09-30', '442.02', 'pago', 152.868, 289.152),
(78, 'Loan=21319580', '15', '6', '6', '442.02', '2024-10-30', '442.02', 'pago', 141.302, 300.718),
(79, 'Loan=21319580', '15', '6', '6', '442.02', '2024-11-30', '442.02', 'pago', 129.274, 312.746),
(80, 'Loan=21319580', '15', '6', '6', '442.02', '2024-12-30', '442.02', 'pago', 116.764, 325.256),
(81, 'Loan=21319580', '15', '6', '6', '442.02', '2025-01-30', '442.02', 'pago', 103.753, 338.267),
(82, 'Loan=21319580', '15', '6', '6', '442.02', '2025-02-28', '442.02', 'pago', 90.2224, 351.798),
(83, 'Loan=21319580', '15', '6', '6', '442.02', '2025-03-30', '442.02', 'pago', 76.1504, 365.87),
(84, 'Loan=21319580', '15', '6', '6', '442.02', '2025-04-30', '442.02', 'pago', 61.5156, 380.504),
(85, 'Loan=21319580', '15', '6', '6', '442.02', '2025-05-30', '442.02', 'pago', 46.2956, 395.724),
(86, 'Loan=21319580', '15', '6', '6', '442.02', '2025-06-30', '442.02', 'pago', 30.4666, 411.553),
(87, 'Loan=21319580', '15', '6', '6', '442.02', '2025-07-30', '364.12', 'pago', 14.0045, 350.115),
(88, 'Loan=21319580', '16', '9', '9', '362.35', '2022-12-30', '362.35', 'pago', 250, 112.35),
(89, 'Loan=21319580', '16', '9', '9', '362.35', '2023-01-30', '362.35', 'pago', 244.383, 117.967),
(90, 'Loan=21319580', '16', '9', '9', '362.35', '2023-02-28', '362.35', 'pago', 238.484, 123.866),
(91, 'Loan=21319580', '16', '9', '9', '362.35', '2023-03-30', '362.35', 'pago', 232.29, 130.059),
(92, 'Loan=21319580', '16', '9', '9', '362.35', '2023-04-30', '362.35', 'pago', 225.788, 136.562),
(93, 'Loan=21319580', '16', '9', '9', '362.35', '2023-05-30', '362.35', 'pago', 218.96, 143.391),
(94, 'Loan=21319580', '16', '9', '9', '362.35', '2023-06-30', '362.35', 'pago', 211.79, 150.56),
(95, 'Loan=21319580', '16', '9', '9', '362.35', '2023-07-30', '362.35', 'pago', 204.262, 158.088),
(96, 'Loan=21319580', '16', '9', '9', '362.35', '2023-08-30', '362.35', 'pago', 196.357, 165.992),
(97, 'Loan=21319580', '16', '9', '9', '362.35', '2023-09-30', '362.35', 'pago', 188.058, 174.292),
(98, 'Loan=21319580', '16', '9', '9', '362.35', '2023-11-30', '362.35', 'pago', 179.344, 183.007),
(99, 'Loan=21319580', '16', '9', '9', '362.35', '2023-11-30', '362.35', 'pago', 170.193, 192.157),
(100, 'Loan=21319580', '16', '9', '9', '362.35', '2023-12-30', '362.35', 'pago', 160.585, 201.765),
(101, 'Loan=21319580', '16', '9', '9', '362.35', '2024-01-30', '362.35', 'pago', 150.497, 211.853),
(102, 'Loan=21319580', '16', '9', '9', '362.35', '2024-02-28', '362.35', 'pago', 139.904, 222.445),
(103, 'Loan=21319580', '16', '9', '9', '362.35', '2024-03-30', '362.35', 'pago', 128.782, 233.568),
(104, 'Loan=21319580', '16', '9', '9', '362.35', '2024-04-30', '362.35', 'pago', 117.104, 245.247),
(105, 'Loan=21319580', '16', '9', '9', '362.35', '2024-05-30', '362.35', 'pago', 104.841, 257.509),
(106, 'Loan=21319580', '16', '9', '9', '362.35', '2024-05-30', '362.35', 'pago', 91.9655, 270.384),
(107, 'Loan=21319580', '16', '9', '9', '362.35', '2024-06-30', '362.35', 'pago', 78.4465, 283.904),
(108, 'Loan=21319580', '16', '9', '9', '362.35', '2024-07-30', '362.35', 'pago', 64.2515, 298.099),
(109, 'Loan=21319580', '16', '9', '9', '362.35', '2024-08-30', '362.35', 'pago', 49.3466, 313.003),
(110, 'Loan=21319580', '16', '9', '9', '362.35', '2024-08-30', '362.35', 'pago', 33.6964, 328.654),
(111, 'Loan=21319580', '16', '9', '9', '362.35', '2024-09-30', '362.35', 'pago', 17.2638, 345.086),
(112, 'Loan=21319580', '17', '9', '9', '471.81', '2022-12-30', '2000', 'pago', 400, 1600),
(113, 'Loan=21319580', '17', '9', '9', '471.81', '2023-01-30', '2000', 'psgo', 336, 1664),
(114, 'Loan=21319580', '17', '9', '9', '471.81', '2023-02-28', '2000', 'pago', 269.44, 1730.56),
(115, 'Loan=21319580', '17', '9', '9', '471.81', '2023-03-30', '2000', 'pago', 200.218, 1799.78),
(116, 'Loan=21319580', '17', '9', '9', '471.81', '2023-04-30', '2000', 'pago', 128.226, 1871.77),
(117, 'Loan=21319580', '17', '9', '9', '471.81', '2023-05-30', '1462.12', 'pago', 53.3556, 1408.76);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_schedule`
--

CREATE TABLE `payment_schedule` (
  `id` int(20) NOT NULL,
  `idm` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `term` varchar(200) NOT NULL,
  `day` varchar(200) NOT NULL,
  `schedule` varchar(200) NOT NULL,
  `interest` varchar(200) NOT NULL,
  `penalty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `payment_schedule`
--

INSERT INTO `payment_schedule` (`id`, `idm`, `tid`, `term`, `day`, `schedule`, `interest`, `penalty`) VALUES
(10, '11', 'Loan=21319580', 'kjnk', 'Week', 'Daily', '2', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pay_schedule`
--

CREATE TABLE `pay_schedule` (
  `id` int(20) NOT NULL,
  `get_id` varchar(200) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `schedule` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `interest` varchar(200) NOT NULL,
  `payment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pay_schedule`
--

INSERT INTO `pay_schedule` (`id`, `get_id`, `tid`, `schedule`, `balance`, `interest`, `payment`) VALUES
(11, '6', 'Loan=21319580', '12/30/2017', '200', '2', '50'),
(12, '7', 'Loan=21319580', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `sms_gateway` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `api` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sms`
--

INSERT INTO `sms` (`id`, `sms_gateway`, `username`, `password`, `api`, `status`) VALUES
(1, 'SMSTEAMS', 'optimum', 'optimum', 'http://smsteams.com/components/com_spc/smsapi.php?', 'Activated');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `systemset`
--

CREATE TABLE `systemset` (
  `sysid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `footer` text NOT NULL,
  `abb` varchar(200) NOT NULL,
  `fax` text NOT NULL,
  `currency` text NOT NULL,
  `website` text NOT NULL,
  `mobile` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `map` text NOT NULL,
  `stamp` varchar(350) NOT NULL,
  `timezone` text NOT NULL,
  `sms_charges` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `systemset`
--

INSERT INTO `systemset` (`sysid`, `title`, `name`, `footer`, `abb`, `fax`, `currency`, `website`, `mobile`, `image`, `address`, `email`, `map`, `stamp`, `timezone`, `sms_charges`) VALUES
(1, 'Advance Loan / Lending Management System with SMS Notification & Saving System for Micro Finance Bank', 'NIR Loan Management System for Micro Finance Bank', 'All rights reserved. 2017 (c)', 'NIR Loan', '23459', '$', 'https://www.critechglobal.com', '+13238922757', '../img/ass.png', 'Ghana Currency                           ', 'critech.getresponse@gmail.com', 'Map Code Here          ', 'stamp.jpg', '-12', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaction`
--

CREATE TABLE `transaction` (
  `id` int(20) NOT NULL,
  `txid` varchar(200) NOT NULL,
  `t_type` varchar(200) NOT NULL COMMENT 'Deposit OR Withdraw',
  `acctno` varchar(200) NOT NULL,
  `fn` varchar(200) NOT NULL,
  `ln` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transaction`
--

INSERT INTO `transaction` (`id`, `txid`, `t_type`, `acctno`, `fn`, `ln`, `email`, `phone`, `amount`, `date_time`) VALUES
(1, 'TXID-35663574', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '2000', '2017-12-23 14:57:20'),
(2, 'TXID-48939392', 'Deposit', '20000', 'Doris', 'Micheal', 'segtism@gmail.com', '+1564783934', '1525', '2017-12-23 14:57:26'),
(3, 'TXID-73095459', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '250', '2017-12-23 14:57:31'),
(4, 'TXID-94293702', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '200', '2017-12-23 15:46:34'),
(5, 'TXID-50934204', 'Withdraw', '20000', 'Doris', 'Micheal', 'segtism@gmail.com', '+1564783934', '20', '2017-12-23 16:02:16'),
(6, 'TXID-38992248', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '20', '2017-12-23 16:31:34'),
(7, 'TXID-39031128', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '35', '2018-01-06 17:32:07'),
(8, 'TXID-84875916', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '25', '2018-01-06 17:35:58'),
(9, 'TXID-45293701', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '55', '2018-01-06 17:48:19'),
(10, 'TXID-84558899', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '10', '2018-01-06 17:49:51'),
(11, 'TXID-99934205', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '33', '2018-01-06 17:50:29'),
(12, 'TXID-89936219', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '42', '2018-01-06 17:51:15'),
(13, 'TXID-64374512', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '20', '2018-01-06 17:57:03'),
(14, 'TXID-87992249', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '39', '2018-01-06 17:58:39'),
(15, 'TXID-39294311', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '87', '2018-01-06 18:00:23'),
(16, 'TXID-76812928', 'Deposit', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '100', '2018-01-06 18:03:50'),
(17, 'TXID-12060791', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '250', '2018-01-06 18:21:37'),
(18, 'TXID-51421692', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '200', '2018-01-06 18:25:02'),
(19, 'TXID-28228637', 'Withdraw', '0034445657', 'Ayodeji', 'Akinade', 'business2016@gmail.com', '08033527716', '50', '2018-01-06 18:26:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `twallet`
--

CREATE TABLE `twallet` (
  `id` int(20) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `Total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `twallet`
--

INSERT INTO `twallet` (`id`, `tid`, `Total`) VALUES
(10, 'Loan=21319580', '1025'),
(12, 'Cryptos?rid=782752', '550');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `addr1` text NOT NULL,
  `addr2` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`userid`, `name`, `email`, `phone`, `addr1`, `addr2`, `city`, `state`, `zip`, `country`, `comment`, `username`, `password`, `id`, `image`, `role`) VALUES
(467, 'au JJJ', 'at@g.com', '+2334857757769', 'Ghana                    ', 'Ghana                              ', 'Acra', 'Acra', '23450', 'US', '  Good Â  Â  Â Â Â  Â Â Â  Â Â Â  Â Â Â  Â  Â  Â Â Â  Â Â Â  Â Â Â  Â Â Â  Â  Â ', 'at', 'YXQ=', 'Cryptos?rid=782752', 'img/ac_logo.png', ''),
(482, 'Admin', 'admin@admin.com', '08101750845', 'address1', 'address2', 'city', 'state', 'zip', 'US', 'comment', 'admin', 'YWRtaW4=', 'Loan=21319580', 'img/bitcoin_3.png', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`abid`);

--
-- Indices de la tabla `additional_fees`
--
ALTER TABLE `additional_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `backup`
--
ALTER TABLE `backup`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banaid`);

--
-- Indices de la tabla `battachment`
--
ALTER TABLE `battachment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `collateral`
--
ALTER TABLE `collateral`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emp_permission`
--
ALTER TABLE `emp_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `emp_role`
--
ALTER TABLE `emp_role`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etemplates`
--
ALTER TABLE `etemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fin_info`
--
ALTER TABLE `fin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hiw`
--
ALTER TABLE `hiw`
  ADD PRIMARY KEY (`hid`);

--
-- Indices de la tabla `loan_info`
--
ALTER TABLE `loan_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mywallet`
--
ALTER TABLE `mywallet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payment_schedule`
--
ALTER TABLE `payment_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pay_schedule`
--
ALTER TABLE `pay_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `systemset`
--
ALTER TABLE `systemset`
  ADD PRIMARY KEY (`sysid`);

--
-- Indices de la tabla `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `twallet`
--
ALTER TABLE `twallet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `abid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `additional_fees`
--
ALTER TABLE `additional_fees`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `attachment`
--
ALTER TABLE `attachment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `backup`
--
ALTER TABLE `backup`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `banaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `battachment`
--
ALTER TABLE `battachment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `collateral`
--
ALTER TABLE `collateral`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de la tabla `emp_permission`
--
ALTER TABLE `emp_permission`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `emp_role`
--
ALTER TABLE `emp_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etemplates`
--
ALTER TABLE `etemplates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fin_info`
--
ALTER TABLE `fin_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hiw`
--
ALTER TABLE `hiw`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `loan_info`
--
ALTER TABLE `loan_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mywallet`
--
ALTER TABLE `mywallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `payment_schedule`
--
ALTER TABLE `payment_schedule`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pay_schedule`
--
ALTER TABLE `pay_schedule`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `systemset`
--
ALTER TABLE `systemset`
  MODIFY `sysid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `twallet`
--
ALTER TABLE `twallet`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;


-- ---------------------------------------------------

/*==============================================================*/
/* Table: DETALLEUSUARIO                                        */
/*==============================================================*/
create table DETALLEUSUARIOS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   idUsuario            integer                        null,
   idRol                integer                        null,
   permisoInvestigacion char(255)                      not null,
   fechaInicioPermiso   date                           not null,
   fechaFinPermiso      date                           not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_DETALLEUSUARIOS primary key (id)
);

/*==============================================================*/
/* Table: ROL                                                   */
/*==============================================================*/
create table ROLS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   idDetalleUsuario     integer                        null,
   nombreRol            char(255)                      not null,
   estado               char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_ROLS primary key (id)
);


/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIOS 
(
   id                   integer                        not null 	AUTO_INCREMENT,
   idDetalleUsuario     integer                        null,
   nombreUsuario        char(255)                      not null,
   correoElectronico1   char(255)                      not null,
   password             char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_USUARIOS primary key (id)
);

/*==============================================================*/
/* Table: ZONA                                                  */
/*==============================================================*/
create table ZONAS 
(
   id                   integer                        not null		AUTO_INCREMENT,
   nombreZona           char(255)                      not null,
   descripcionZona1     char(255)                      not null,
   lugarZona            char(255)                     not null,
   idDepto              integer                        null,
   idMunicipio          integer                        null,
   latitudZona          float                          not null,
   longitudZona         float                          not null,
   habitatZona          char(255)                      not null,
   created_at 			timestamp					   null,
   updated_at 			timestamp					   null,
   constraint PK_ZONAS primary key (id)
);


alter table DETALLEUSUARIOS
   add constraint FK_DETALLEU_OBTIENE_ROL foreign key (idRol)
      references ROLS (id)
      on update restrict
      on delete restrict;

alter table DETALLEUSUARIOS
   add constraint FK_DETALLEU_POSEE2_USUARIO foreign key (idUsuario)
      references USUARIOS (id)
      on update restrict
      on delete restrict;


alter table ROLS
   add constraint FK_ROL_OBTIENE2_DETALLEU foreign key (idDetalleUsuario)
      references DETALLEUSUARIOS (id)
      on update restrict
      on delete restrict;


alter table USUARIOS
   add constraint FK_USUARIO_POSEE_DETALLEU foreign key (idDetalleUsuario)
      references DETALLEUSUARIOS (id)
      on update restrict
      on delete restrict;


CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(2, 'role-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(3, 'role-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(4, 'role-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(5, 'usuario-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(6, 'usuario-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(7, 'usuario-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(8, 'usuario-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(9, 'departamento-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(10, 'departamento-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(11, 'departamento-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(12, 'departamento-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(13, 'coleccion-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(14, 'coleccion-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(15, 'coleccion-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(16, 'coleccion-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(17, 'especieAmenazada-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(18, 'especieAmenazada-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(19, 'especieAmenazada-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(20, 'especieAmenazada-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(21, 'zona-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(22, 'zona-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(23, 'zona-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(24, 'zona-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(25, 'secuencia-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(26, 'secuencia-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(27, 'secuencia-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(28, 'secuencia-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(29, 'tipoInvestigacion-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(30, 'tipoInvestigacion-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(31, 'tipoInvestigacion-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(32, 'tipoInvestigacion-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(33, 'riesgo-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(34, 'riesgo-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(35, 'riesgo-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(36, 'riesgo-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(37, 'municipio-list', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(38, 'municipio-create', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(39, 'municipio-edit', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31'),
(40, 'municipio-delete', 'web', '2021-02-24 10:24:31', '2021-02-24 10:24:31');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

--
-- Estructura de tabla para la tabla `roles`
--
CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-02-24 10:25:35', '2021-02-24 10:25:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diego', 'diego@gmail.com', NULL, '$2y$10$.N3WdI85CXw4D6C1HGUKreI39lDsHF7id1OKdZUDqwIBPuhmFOHQa', NULL, '2021-02-24 10:28:46', '2021-02-24 10:28:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

-- --------------------------------------------------------

--
-- Table structure for table `sys_app`
--

DROP TABLE IF EXISTS `sys_app`;
CREATE TABLE `sys_app` (
  `favico` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `app_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `app_year` int DEFAULT NULL,
  `login_member` int DEFAULT '0' COMMENT '0. non-aktif, 1. aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sys_app`
--

INSERT INTO `sys_app` (`favico`, `logo`, `company_name`, `app_name`, `app_year`, `login_member`) VALUES
('favicon.ico', 'logo.png', 'Festival Sertifikasiku', 'Sertifikasiku', 2021, 1);

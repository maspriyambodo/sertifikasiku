
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
  `login_member` int DEFAULT '0' COMMENT '0. non-aktif, 1. aktif',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sys_app`
--

INSERT INTO `sys_app` (`favico`, `logo`, `company_name`, `app_name`, `app_year`, `login_member`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
('favicon.ico', 'logo.png', 'Festival Sertifikasiku', 'Sertifikasiku', 2021, 1, 1, '1970-01-01 00:00:00', NULL, NULL, NULL, NULL);

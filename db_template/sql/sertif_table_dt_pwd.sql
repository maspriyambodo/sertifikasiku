
-- --------------------------------------------------------

--
-- Table structure for table `dt_pwd`
--

DROP TABLE IF EXISTS `dt_pwd`;
CREATE TABLE `dt_pwd` (
  `id` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `uname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastcheck` date DEFAULT NULL,
  `note` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` int DEFAULT NULL COMMENT '1. Aktif, 2. Non-Aktif',
  `syscreatedate` date DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `sysupdatedate` date DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysdeletedate` date DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ini adalah table manajemen password';


-- --------------------------------------------------------

--
-- Table structure for table `sys_roles`
--

DROP TABLE IF EXISTS `sys_roles`;
CREATE TABLE `sys_roles` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stat` int NOT NULL DEFAULT '1' COMMENT '1. aktif 0. non-aktif',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sys_roles`
--

INSERT INTO `sys_roles` (`id`, `parent_id`, `name`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 0, 'Super User', 'Super administrators', 1, 1, '2021-02-25 02:27:34', 1, '2021-03-08 08:29:08', 1, '2021-06-08 23:51:23'),
(2, 0, 'Administrator', 'user role untuk administrator', 1, 1, '2021-10-09 03:07:01', NULL, NULL, NULL, NULL),
(3, 0, 'platinum', 'role untuk member / user dengan status PLATINUM', 1, 1, '2021-10-09 03:13:16', NULL, NULL, NULL, NULL),
(4, 0, 'silver', 'role untuk member / user dengan status SILVER', 1, 1, '2021-10-09 03:13:51', NULL, NULL, NULL, NULL);

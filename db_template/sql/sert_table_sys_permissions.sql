
-- --------------------------------------------------------

--
-- Table structure for table `sys_permissions`
--

DROP TABLE IF EXISTS `sys_permissions`;
CREATE TABLE `sys_permissions` (
  `id` int NOT NULL,
  `role_id` int DEFAULT NULL,
  `id_menu` int DEFAULT NULL,
  `v` int DEFAULT NULL COMMENT 'view',
  `c` int DEFAULT NULL COMMENT 'create',
  `r` int DEFAULT NULL COMMENT 'read',
  `u` int DEFAULT NULL COMMENT 'update',
  `d` int DEFAULT NULL COMMENT 'delete',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sys_permissions`
--

INSERT INTO `sys_permissions` (`id`, `role_id`, `id_menu`, `v`, `c`, `r`, `u`, `d`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(2, 1, 2, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(3, 1, 3, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(4, 1, 4, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(5, 1, 5, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(6, 1, 6, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(7, 1, 7, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(8, 1, 8, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(9, 1, 9, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(10, 1, 10, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(11, 1, 11, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(12, 1, 12, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(13, 1, 13, 1, 1, 1, 1, 1, 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00', 1, '2021-01-01 00:00:00'),
(14, 1, 14, 1, 1, 1, 1, 1, 1, '2021-09-15 14:46:08', NULL, NULL, NULL, NULL),
(15, 1, 15, 1, 1, 1, 1, 1, 1, '2021-10-09 00:24:10', NULL, NULL, NULL, NULL),
(16, 2, 1, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(17, 2, 2, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(18, 2, 3, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(19, 2, 4, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(20, 2, 5, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(21, 2, 6, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(22, 2, 7, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(23, 2, 8, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(24, 2, 9, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(25, 2, 10, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(26, 2, 11, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(27, 2, 12, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(28, 2, 13, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(29, 2, 14, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(30, 2, 15, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-11 15:58:22', NULL, NULL),
(31, 3, 1, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:07', NULL, NULL),
(32, 3, 2, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:07', NULL, NULL),
(33, 3, 3, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:07', NULL, NULL),
(34, 3, 4, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:07', NULL, NULL),
(35, 3, 5, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:07', NULL, NULL),
(36, 3, 6, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:07', NULL, NULL),
(37, 3, 7, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:07', NULL, NULL),
(38, 3, 8, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:08', NULL, NULL),
(39, 3, 9, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:08', NULL, NULL),
(40, 3, 10, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:08', NULL, NULL),
(41, 3, 11, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:08', NULL, NULL),
(42, 3, 12, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:08', NULL, NULL),
(43, 3, 13, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:08', NULL, NULL),
(44, 3, 14, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:08', NULL, NULL),
(45, 3, 15, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:16', 1, '2021-10-11 01:31:07', NULL, NULL),
(46, 4, 1, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(47, 4, 2, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(48, 4, 3, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(49, 4, 4, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(50, 4, 5, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(51, 4, 6, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(52, 4, 7, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(53, 4, 8, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(54, 4, 9, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(55, 4, 10, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:07', NULL, NULL),
(56, 4, 11, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:07', NULL, NULL),
(57, 4, 12, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:07', NULL, NULL),
(58, 4, 13, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:07', NULL, NULL),
(59, 4, 14, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(60, 4, 15, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(61, 1, 16, 1, 1, 1, 1, 1, 1, '2021-10-11 15:57:51', NULL, NULL, NULL, NULL),
(62, 2, 16, 1, 1, 1, 1, 1, 1, '2021-10-11 15:57:51', 1, '2021-10-11 15:58:22', NULL, NULL),
(63, 3, 16, 0, 0, 0, 0, 0, 1, '2021-10-11 15:57:51', NULL, NULL, NULL, NULL),
(64, 4, 16, 0, 0, 0, 0, 0, 1, '2021-10-11 15:57:51', 1, '2021-10-11 16:08:06', NULL, NULL),
(65, 1, 17, 1, 1, 1, 1, 1, 1, '2021-10-12 10:39:27', NULL, NULL, NULL, NULL),
(66, 2, 17, 0, 0, 0, 0, 0, 1, '2021-10-12 10:39:27', NULL, NULL, NULL, NULL),
(67, 3, 17, 0, 0, 0, 0, 0, 1, '2021-10-12 10:39:27', NULL, NULL, NULL, NULL),
(68, 4, 17, 0, 0, 0, 0, 0, 1, '2021-10-12 10:39:27', NULL, NULL, NULL, NULL);

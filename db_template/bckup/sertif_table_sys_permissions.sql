
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
-- RELATIONSHIPS FOR TABLE `sys_permissions`:
--   `role_id`
--       `sys_roles` -> `id`
--   `id_menu`
--       `sys_menu` -> `id`
--

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
(16, 2, 1, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(17, 2, 2, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(18, 2, 3, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(19, 2, 4, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(20, 2, 5, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(21, 2, 6, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(22, 2, 7, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(23, 2, 8, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(24, 2, 9, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(25, 2, 10, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(26, 2, 11, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(27, 2, 12, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(28, 2, 13, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(29, 2, 14, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(30, 2, 15, 1, 1, 1, 1, 1, 1, '2021-10-09 03:07:01', 1, '2021-10-29 14:41:02', NULL, NULL),
(31, 3, 1, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(32, 3, 2, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(33, 3, 3, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(34, 3, 4, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(35, 3, 5, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(36, 3, 6, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(37, 3, 7, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(38, 3, 8, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(39, 3, 9, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(40, 3, 10, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(41, 3, 11, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(42, 3, 12, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(43, 3, 13, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(44, 3, 14, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(45, 3, 15, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:16', 1, '2021-10-29 16:13:58', NULL, NULL),
(46, 4, 1, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(47, 4, 2, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(48, 4, 3, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(49, 4, 4, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(50, 4, 5, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(51, 4, 6, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(52, 4, 7, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(53, 4, 8, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(54, 4, 9, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(55, 4, 10, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(56, 4, 11, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(57, 4, 12, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(58, 4, 13, 0, 0, 0, 0, 0, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(59, 4, 14, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(60, 4, 15, 1, 1, 1, 1, 1, 1, '2021-10-09 03:13:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(61, 1, 16, 1, 1, 1, 1, 1, 1, '2021-10-11 15:57:51', NULL, NULL, NULL, NULL),
(62, 2, 16, 1, 1, 1, 1, 1, 1, '2021-10-11 15:57:51', 1, '2021-10-29 14:41:02', NULL, NULL),
(63, 3, 16, 0, 0, 0, 0, 0, 1, '2021-10-11 15:57:51', 1, '2021-10-29 16:13:58', NULL, NULL),
(64, 4, 16, 0, 0, 0, 0, 0, 1, '2021-10-11 15:57:51', 1, '2021-10-29 16:14:07', NULL, NULL),
(65, 1, 17, 1, 1, 1, 1, 1, 1, '2021-10-12 10:39:27', NULL, NULL, NULL, NULL),
(66, 2, 17, 1, 1, 1, 1, 1, 1, '2021-10-12 10:39:27', 1, '2021-10-29 14:41:02', NULL, NULL),
(67, 3, 17, 0, 0, 0, 0, 0, 1, '2021-10-12 10:39:27', 1, '2021-10-29 16:13:58', NULL, NULL),
(68, 4, 17, 0, 0, 0, 0, 0, 1, '2021-10-12 10:39:27', 1, '2021-10-29 16:14:07', NULL, NULL),
(69, 5, 1, 1, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(70, 5, 2, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(71, 5, 3, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(72, 5, 4, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(73, 5, 5, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(74, 5, 6, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(75, 5, 7, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(76, 5, 8, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(77, 5, 9, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(78, 5, 10, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(79, 5, 11, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(80, 5, 12, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(81, 5, 13, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(82, 5, 14, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(83, 5, 15, 1, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(84, 5, 16, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(85, 5, 17, 0, 0, 0, 0, 0, 1, '2021-10-15 20:19:43', 1, '2021-10-27 22:21:58', NULL, NULL),
(86, 6, 1, 1, 1, 1, 1, 1, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(87, 6, 2, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(88, 6, 3, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(89, 6, 4, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(90, 6, 5, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(91, 6, 6, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(92, 6, 7, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(93, 6, 8, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(94, 6, 9, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(95, 6, 10, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(96, 6, 11, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(97, 6, 12, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(98, 6, 13, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(99, 6, 14, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(100, 6, 15, 1, 1, 1, 1, 1, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(101, 6, 16, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(102, 6, 17, 0, 0, 0, 0, 0, 1, '2021-10-16 21:17:55', 1, '2021-10-29 16:13:46', NULL, NULL),
(103, 1, 18, 1, 1, 1, 1, 1, 1, '2021-10-22 17:06:34', NULL, NULL, NULL, NULL),
(104, 2, 18, 1, 1, 1, 1, 1, 1, '2021-10-22 17:06:34', 1, '2021-10-29 14:41:02', NULL, NULL),
(105, 3, 18, 1, 1, 1, 1, 1, 1, '2021-10-22 17:06:34', 1, '2021-10-29 16:13:58', NULL, NULL),
(106, 4, 18, 1, 1, 1, 1, 1, 1, '2021-10-22 17:06:34', 1, '2021-10-29 16:14:07', NULL, NULL),
(107, 5, 18, 1, 0, 0, 0, 0, 1, '2021-10-22 17:06:34', 1, '2021-10-27 22:21:58', NULL, NULL),
(108, 6, 18, 1, 1, 1, 1, 1, 1, '2021-10-22 17:06:34', 1, '2021-10-29 16:13:46', NULL, NULL),
(109, 1, 19, 1, 1, 1, 1, 1, 1, '2021-10-28 19:15:26', NULL, NULL, NULL, NULL),
(110, 2, 19, 1, 1, 1, 1, 1, 1, '2021-10-28 19:15:26', 1, '2021-10-29 14:41:02', NULL, NULL),
(111, 3, 19, 0, 0, 0, 0, 0, 1, '2021-10-28 19:15:26', 1, '2021-10-29 16:13:58', NULL, NULL),
(112, 4, 19, 0, 0, 0, 0, 0, 1, '2021-10-28 19:15:26', 1, '2021-10-29 16:14:07', NULL, NULL),
(113, 5, 19, 0, 0, 0, 0, 0, 1, '2021-10-28 19:15:26', NULL, NULL, NULL, NULL),
(114, 6, 19, 0, 0, 0, 0, 0, 1, '2021-10-28 19:15:26', 1, '2021-10-29 16:13:46', NULL, NULL),
(115, 1, 20, 1, 1, 1, 1, 1, 1, '2021-10-29 13:20:28', NULL, NULL, NULL, NULL),
(116, 2, 20, 1, 1, 1, 1, 1, 1, '2021-10-29 13:20:28', 1, '2021-10-29 14:41:02', NULL, NULL),
(117, 3, 20, 0, 0, 0, 0, 0, 1, '2021-10-29 13:20:28', 1, '2021-10-29 16:13:58', NULL, NULL),
(118, 4, 20, 0, 0, 0, 0, 0, 1, '2021-10-29 13:20:28', 1, '2021-10-29 16:14:07', NULL, NULL),
(119, 5, 20, 0, 0, 0, 0, 0, 1, '2021-10-29 13:20:28', NULL, NULL, NULL, NULL),
(120, 6, 20, 0, 0, 0, 0, 0, 1, '2021-10-29 13:20:28', 1, '2021-10-29 16:13:46', NULL, NULL),
(121, 7, 1, 1, 1, 1, 1, 1, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(122, 7, 2, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(123, 7, 3, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(124, 7, 4, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(125, 7, 5, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(126, 7, 6, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(127, 7, 7, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(128, 7, 8, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(129, 7, 9, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(130, 7, 10, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(131, 7, 11, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(132, 7, 12, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(133, 7, 13, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(134, 7, 14, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(135, 7, 15, 1, 1, 1, 1, 1, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(136, 7, 16, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(137, 7, 17, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(138, 7, 18, 1, 1, 1, 1, 1, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(139, 7, 19, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL),
(140, 7, 20, 0, 0, 0, 0, 0, 2, '2021-10-29 15:06:45', 1, '2021-10-29 16:10:49', NULL, NULL);

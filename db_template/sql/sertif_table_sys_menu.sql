
-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu` (
  `id` int NOT NULL,
  `menu_parent` int DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_no` int DEFAULT NULL,
  `group_menu` int DEFAULT NULL COMMENT '1. applications\r\n2. report\r\n3. systems',
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `stat` int DEFAULT NULL COMMENT '0. non-aktif / delete\r\n1. aktif\r\n2. hide',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`id`, `menu_parent`, `nama`, `link`, `order_no`, `group_menu`, `icon`, `description`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, NULL, 'Dashboard', 'Applications/Dashboard/index/', 100, 1, 'fas fa-tachometer-alt', 'menu default systems', 1, 1, '2021-03-11 04:07:27', 1, '2021-09-12 05:22:21', 0, '2021-07-07 23:54:26'),
(2, NULL, 'Master Wilayah', 'javascrip:;', 300, 3, 'fas fa-globe-asia', 'menu untuk master data wilayah indonesia', 1, 1, '2021-03-13 12:29:43', 1, '2021-10-11 16:09:42', 0, '0000-00-00 00:00:00'),
(3, NULL, 'Master Country', 'Master/Country/index/', 310, 3, 'fas fa-globe', 'menu untuk master data negara /country', 0, 1, '2021-03-13 19:35:02', 1, '2021-10-11 16:04:33', 1, '2021-10-17 15:01:03'),
(4, 2, 'Provinsi', 'Master/Wilayah/Provinsi/index/', 301, 3, '', 'menu untuk master data provinsi indonesia', 1, 1, '2021-03-13 12:31:34', 1, '2021-10-11 16:10:47', 0, '0000-00-00 00:00:00'),
(5, 2, 'Kabupaten', 'Master/Wilayah/Kabupaten/index/', 302, 3, '', 'menu untuk master data kabupaten indonesia', 1, 1, '2021-03-13 19:21:17', 1, '2021-10-11 16:11:28', 0, '0000-00-00 00:00:00'),
(6, 2, 'Kecamatan', 'Master/Wilayah/Kecamatan/index/', 303, 3, '', 'menu untuk master data kecamatan indonesia', 1, 1, '2021-03-13 19:22:00', 1, '2021-10-11 16:12:03', 0, '0000-00-00 00:00:00'),
(7, 2, 'Kelurahan', 'Master/Wilayah/Kelurahan/index/', 304, 3, '', 'menu untuk master data kelurahan indonesia', 1, 1, '2021-03-13 19:22:30', 1, '2021-10-11 16:12:37', 0, '0000-00-00 00:00:00'),
(8, NULL, 'Menu Management', 'Systems/Menu/index/', 200, 2, 'fas fa-bars', NULL, 1, 1, '2021-03-11 04:10:12', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, NULL, 'Menu Group', 'Systems/Menu_group/index/', 201, 2, 'fas fa-th-list', NULL, 1, 1, '2021-03-13 20:23:14', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(10, NULL, 'Systems', 'Systems/index/', 202, 2, 'fas fa-cogs', NULL, 1, 1, '2021-03-11 16:05:08', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(11, NULL, 'User Management', 'Systems/Users/index/', 203, 2, 'fas fa-user-cog', NULL, 1, 1, '2021-03-11 15:59:24', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(12, NULL, 'Permissions', 'Systems/Permissions/index/', 204, 2, 'fas fa-key', NULL, 1, 1, '2021-03-11 16:00:24', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(13, NULL, 'Blocked Account', 'Systems/Locked/index/', 205, 2, 'fas fa-lock', NULL, 1, 1, '2021-06-07 11:33:39', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(14, NULL, 'Password Management', 'Applications/Password_management/index/', 109, 1, 'fas fa-key', 'menu untuk aplikasi penyimpanan password', 1, 1, '2021-09-15 14:46:08', NULL, NULL, NULL, NULL),
(15, NULL, 'Streaming', 'Streaming/index/', 102, 1, 'fas fa-video', 'aplikasi untuk live streaming', 1, 1, '2021-10-09 00:24:10', NULL, NULL, NULL, NULL),
(16, NULL, 'Master Materi', 'Master/Materi/index/', 305, 3, 'fas fa-book', 'menu untuk master data materi', 1, 1, '2021-10-11 15:57:51', 1, '2021-10-11 16:04:55', NULL, NULL),
(17, NULL, 'Master Sesi', 'Master/Sesi/index/', 306, 3, 'far fa-clock', 'menu untuk master data sesi materi', 1, 1, '2021-10-12 10:39:27', 1, '2021-10-12 11:20:56', NULL, NULL),
(18, NULL, 'Signin', 'Signin/', 101, 1, '', 'sdklj', 2, 1, '2021-10-22 17:06:34', 1, '2021-10-22 20:03:39', NULL, NULL),
(19, NULL, 'Bidang Industri', 'Master/Bidang/index/', 307, 3, 'fas fa-book', 'menu untuk jenis bidang industri', 1, 1, '2021-10-28 19:15:26', NULL, NULL, NULL, NULL),
(20, NULL, 'Sponsor', 'Master/Sponsor/index/', 308, 3, 'fas fa-dollar-sign', 'menu untuk data sponsor acara', 1, 1, '2021-10-29 13:20:28', NULL, NULL, NULL, NULL),
(21, NULL, 'Klasifikasi Materi', 'Master/Klasifikasi/index/', 309, 3, 'fas fa-certificate', 'menu untuk master data klasifikasi level materi', 1, 1, '2021-11-03 19:01:14', NULL, NULL, NULL, NULL);

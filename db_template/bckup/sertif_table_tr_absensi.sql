
-- --------------------------------------------------------

--
-- Table structure for table `tr_absensi`
--

DROP TABLE IF EXISTS `tr_absensi`;
CREATE TABLE `tr_absensi` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `materi_id` int NOT NULL,
  `rating_materi` int DEFAULT NULL,
  `stat` int DEFAULT NULL COMMENT '1. hadir, 0 tidak hadir',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `tr_absensi`:
--   `user_id`
--       `sys_users` -> `id`
--   `materi_id`
--       `dt_materi` -> `id`
--

--
-- Dumping data for table `tr_absensi`
--

INSERT INTO `tr_absensi` (`id`, `user_id`, `materi_id`, `rating_materi`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 15135, 4, NULL, 1, 15135, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(2, 15212, 4, NULL, 1, 15212, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(3, 14388, 4, NULL, 1, 14388, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(4, 15172, 4, NULL, 1, 15172, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(5, 15178, 4, NULL, 1, 15178, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(6, 15215, 4, NULL, 1, 15215, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(7, 15201, 4, NULL, 1, 15201, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(8, 14045, 4, NULL, 1, 14045, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(9, 15165, 4, NULL, 1, 15165, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(10, 15139, 4, NULL, 1, 15139, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(11, 13866, 4, NULL, 1, 13866, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(12, 15113, 4, NULL, 1, 15113, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(13, 14389, 4, NULL, 1, 14389, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(14, 15112, 4, NULL, 1, 15112, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(15, 15171, 4, NULL, 1, 15171, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(16, 15184, 4, NULL, 1, 15184, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(17, 15200, 4, NULL, 1, 15200, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(18, 14508, 4, NULL, 1, 14508, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(19, 15164, 4, NULL, 1, 15164, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(20, 15193, 4, NULL, 1, 15193, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(22, 15176, 4, NULL, 1, 15176, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(23, 13990, 4, NULL, 1, 13990, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(24, 14392, 4, NULL, 1, 14392, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(25, 15147, 4, NULL, 1, 15147, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(26, 15143, 4, NULL, 1, 15143, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(27, 14495, 4, NULL, 1, 14495, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(28, 15174, 4, NULL, 1, 15174, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(29, 15136, 4, NULL, 1, 15136, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(30, 14185, 4, NULL, 1, 14185, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(31, 15195, 4, NULL, 1, 15195, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(32, 15197, 4, NULL, 1, 15197, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(33, 15166, 4, NULL, 1, 15166, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(34, 15210, 4, NULL, 1, 15210, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(35, 15124, 4, NULL, 1, 15124, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(36, 15159, 4, NULL, 1, 15159, '2021-10-29 17:05:33', NULL, NULL, NULL, NULL),
(37, 15225, 4, NULL, 1, 15225, '2021-10-29 17:05:34', NULL, NULL, NULL, NULL),
(38, 15183, 4, NULL, 1, 15183, '2021-10-29 17:05:34', NULL, NULL, NULL, NULL),
(39, 15211, 4, NULL, 1, 15211, '2021-10-29 17:05:34', NULL, NULL, NULL, NULL),
(40, 14377, 4, NULL, 1, 14377, '2021-10-29 17:05:34', NULL, NULL, NULL, NULL),
(41, 14381, 4, NULL, 1, 14381, '2021-10-29 17:05:34', NULL, NULL, NULL, NULL),
(42, 15163, 4, NULL, 1, 15163, '2021-10-29 17:05:34', NULL, NULL, NULL, NULL),
(43, 15110, 4, NULL, 1, 15110, '2021-10-29 17:05:34', NULL, NULL, NULL, NULL),
(44, 14509, 4, NULL, 1, 14509, '2021-10-29 17:05:34', NULL, NULL, NULL, NULL),
(45, 15129, 4, NULL, 1, 15129, '2021-10-29 17:05:36', NULL, NULL, NULL, NULL),
(46, 15209, 4, NULL, 1, 15209, '2021-10-29 17:05:36', NULL, NULL, NULL, NULL),
(47, 15190, 4, NULL, 1, 15190, '2021-10-29 17:05:36', NULL, NULL, NULL, NULL),
(48, 15153, 4, NULL, 1, 15153, '2021-10-29 17:05:41', NULL, NULL, NULL, NULL),
(49, 14185, 4, NULL, 1, 14185, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(50, 14509, 4, NULL, 1, 14509, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(51, 15135, 4, NULL, 1, 15135, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(52, 15212, 4, NULL, 1, 15212, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(53, 15225, 4, NULL, 1, 15225, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(54, 15195, 4, NULL, 1, 15195, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(55, 15147, 4, NULL, 1, 15147, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(56, 15139, 4, NULL, 1, 15139, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(57, 15172, 4, NULL, 1, 15172, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(58, 14392, 4, NULL, 1, 14392, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(60, 15211, 4, NULL, 1, 15211, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(61, 15136, 4, NULL, 1, 15136, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(62, 15153, 4, NULL, 1, 15153, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(63, 14389, 4, NULL, 1, 14389, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(64, 15201, 4, NULL, 1, 15201, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(65, 14389, 4, NULL, 1, 14389, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(66, 15174, 4, NULL, 1, 15174, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(67, 15190, 4, NULL, 1, 15190, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(68, 15215, 4, NULL, 1, 15215, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(69, 15171, 4, NULL, 1, 15171, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(70, 13990, 4, NULL, 1, 13990, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(71, 15195, 4, NULL, 1, 15195, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(72, 15184, 4, NULL, 1, 15184, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(73, 15129, 4, NULL, 1, 15129, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(74, 15112, 4, NULL, 1, 15112, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(75, 15183, 4, NULL, 1, 15183, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(76, 15116, 4, NULL, 1, 15116, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(77, 15193, 4, NULL, 1, 15193, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(78, 15192, 4, NULL, 1, 15192, '2021-10-29 17:10:12', NULL, NULL, NULL, NULL),
(79, 14495, 4, NULL, 1, 14495, '2021-10-29 17:10:13', NULL, NULL, NULL, NULL),
(80, 15163, 4, NULL, 1, 15163, '2021-10-29 17:10:13', NULL, NULL, NULL, NULL),
(81, 15166, 4, NULL, 1, 15166, '2021-10-29 17:10:13', NULL, NULL, NULL, NULL),
(82, 15197, 4, NULL, 1, 15197, '2021-10-29 17:10:13', NULL, NULL, NULL, NULL),
(83, 14381, 4, NULL, 1, 14381, '2021-10-29 17:10:17', NULL, NULL, NULL, NULL),
(84, 15210, 4, NULL, 1, 15210, '2021-10-29 17:10:22', NULL, NULL, NULL, NULL),
(85, 15211, 4, NULL, 1, 15211, '2021-10-29 17:28:15', NULL, NULL, NULL, NULL),
(86, 15181, 4, NULL, 1, 15181, '2021-10-29 17:28:15', NULL, NULL, NULL, NULL),
(87, 15153, 4, NULL, 1, 15153, '2021-10-29 17:28:16', NULL, NULL, NULL, NULL),
(88, 15171, 4, NULL, 1, 15171, '2021-10-29 17:28:16', NULL, NULL, NULL, NULL),
(89, 15184, 4, NULL, 1, 15184, '2021-10-29 17:28:16', NULL, NULL, NULL, NULL),
(90, 15174, 4, NULL, 1, 15174, '2021-10-29 17:28:16', NULL, NULL, NULL, NULL),
(91, 15127, 4, NULL, 1, 15127, '2021-10-29 17:28:16', NULL, NULL, NULL, NULL),
(92, 15147, 4, NULL, 1, 15147, '2021-10-29 17:28:16', NULL, NULL, NULL, NULL),
(93, 14185, 4, NULL, 1, 14185, '2021-10-29 17:28:16', NULL, NULL, NULL, NULL),
(94, 15116, 4, NULL, 1, 15116, '2021-10-29 17:28:16', NULL, NULL, NULL, NULL),
(95, 15197, 4, NULL, 1, 15197, '2021-10-29 17:28:16', NULL, NULL, NULL, NULL),
(96, 15144, 4, NULL, 1, 15144, '2021-10-29 17:28:17', NULL, NULL, NULL, NULL);

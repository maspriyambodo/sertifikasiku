
-- --------------------------------------------------------

--
-- Table structure for table `dt_materi`
--

DROP TABLE IF EXISTS `dt_materi`;
CREATE TABLE `dt_materi` (
  `id` int NOT NULL,
  `id_sesi` int DEFAULT NULL,
  `nama_materi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `time_start` datetime DEFAULT NULL,
  `time_stop` datetime DEFAULT NULL,
  `link_video` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stat` int NOT NULL DEFAULT '0' COMMENT '1. aktif, 0 non-aktif',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dt_materi`
--

INSERT INTO `dt_materi` (`id`, `id_sesi`, `nama_materi`, `deskripsi`, `time_start`, `time_stop`, `link_video`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 'MATERI 1', 'DESKRIPSI SINGKAT MATERI', '2021-10-11 09:00:00', '2021-10-11 10:30:00', 'rSTicPKvnG0', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, 'MATERI 2', 'DESKRIPSI SINGKAT MATERI', '2021-10-11 11:00:00', '2021-10-11 00:30:00', '3__xMehSX94', 1, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dt_materi`
--

DROP TABLE IF EXISTS `dt_materi`;
CREATE TABLE `dt_materi` (
  `id` int NOT NULL,
  `id_sesi` int DEFAULT NULL,
  `id_industri` int DEFAULT NULL,
  `id_klasifikasi` int DEFAULT NULL,
  `narasumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_narsum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_materi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `time_start` datetime DEFAULT NULL,
  `time_stop` datetime DEFAULT NULL,
  `link_video` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stat` int NOT NULL DEFAULT '0' COMMENT '1. aktif, 0 non-aktif',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
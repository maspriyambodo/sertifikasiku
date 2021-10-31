
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
  `narasumber` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title_narsum` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
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

--
-- RELATIONSHIPS FOR TABLE `dt_materi`:
--   `id_sesi`
--       `mt_sesimateri` -> `id`
--   `id_industri`
--       `mt_industri` -> `id`
--   `id_klasifikasi`
--       `mt_klasifikasi` -> `id`
--

--
-- Dumping data for table `dt_materi`
--

INSERT INTO `dt_materi` (`id`, `id_sesi`, `id_industri`, `id_klasifikasi`, `narasumber`, `title_narsum`, `nama_materi`, `deskripsi`, `time_start`, `time_stop`, `link_video`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 1, 2, 'Narasumber 1', 'editor in urbanasia', 'Introduction to fundamental Digital Marketing', ' DESKRIPSI SINGKAT MATERI ', '2021-10-22 17:35:00', '2021-10-22 20:59:00', 'https://youtu.be/_cpAkIpZ7B8', 0, NULL, NULL, 2, '2021-10-22 05:38:18', NULL, NULL),
(2, 1, 2, 2, 'Narasumber 2', 'content creator', 'Introduction to Fundamental Social Media', ' Mini Class Sertifikasiku ', '2021-10-22 06:30:00', '2021-10-22 09:00:00', '5jAYS3kh8yk', 0, NULL, NULL, 1, '2021-10-22 07:04:10', NULL, NULL),
(3, 1, 3, 1, 'Narasumber 3', 'founder', 'TESTING MATERI', ' ini untuk testing', '2021-10-22 09:35:00', '2021-10-22 09:35:00', 'https://www.youtube.com/watch?v=ACOshGZKtXE', 1, 1, '2021-10-22 08:34:42', 1, '2021-10-29 06:54:18', NULL, NULL),
(4, 1, 1, 1, 'Narasumber 4', 'fashion director', 'How to Trade with Technical Analyst', 'Webinar Bincang Asik Vol 41', '2021-10-29 04:00:00', '2021-10-29 05:00:00', 'https://youtu.be/J1MhSKGHKPo', 0, 2, '2021-10-23 05:53:16', 2, '2021-10-29 03:56:57', NULL, NULL);

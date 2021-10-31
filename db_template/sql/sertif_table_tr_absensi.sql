
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

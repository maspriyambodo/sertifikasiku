
-- --------------------------------------------------------

--
-- Table structure for table `mt_klasifikasi`
--

DROP TABLE IF EXISTS `mt_klasifikasi`;
CREATE TABLE `mt_klasifikasi` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `stat` int DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `mt_sesimateri`
--

DROP TABLE IF EXISTS `mt_sesimateri`;
CREATE TABLE `mt_sesimateri` (
  `id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stat` int NOT NULL DEFAULT '1',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mt_sesimateri`
--

INSERT INTO `mt_sesimateri` (`id`, `nama`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'testing sesi', 1, 2, '2021-10-30 02:29:03', NULL, NULL, NULL, NULL);


-- --------------------------------------------------------

--
-- Table structure for table `dt_sponsor`
--

DROP TABLE IF EXISTS `dt_sponsor`;
CREATE TABLE `dt_sponsor` (
  `id` int NOT NULL,
  `kategori` int DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `url_website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stat` int DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dt_sponsor`
--

INSERT INTO `dt_sponsor` (`id`, `kategori`, `nama`, `path`, `url_website`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 'google', 'sponsor30_023218.png', 'https://google.com', 1, 2, '2021-10-30 02:32:18', NULL, NULL, NULL, NULL),
(2, 2, 'testing media partner', 'sponsor29_131740.png', 'https://sertifikasiku.com', 1, 2, '2021-10-30 02:32:54', NULL, NULL, NULL, NULL);

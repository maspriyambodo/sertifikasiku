
-- --------------------------------------------------------

--
-- Table structure for table `mt_klasifikasi`
--

DROP TABLE IF EXISTS `mt_klasifikasi`;
CREATE TABLE `mt_klasifikasi` (
  `id` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci,
  `stat` int DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `mt_klasifikasi`:
--

--
-- Dumping data for table `mt_klasifikasi`
--

INSERT INTO `mt_klasifikasi` (`id`, `nama`, `deskripsi`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'Beginer', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 1, '2021-10-28 17:44:58', NULL, NULL, NULL, NULL),
(2, 'Intermediate', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 1, '2021-10-28 17:47:59', NULL, NULL, NULL, NULL);

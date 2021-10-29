
-- --------------------------------------------------------

--
-- Table structure for table `mt_industri`
--

DROP TABLE IF EXISTS `mt_industri`;
CREATE TABLE `mt_industri` (
  `id` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
-- Dumping data for table `mt_industri`
--

INSERT INTO `mt_industri` (`id`, `nama`, `deskripsi`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'INDUSTRI A', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 1, '2021-10-28 17:45:20', NULL, NULL, NULL, NULL),
(2, 'INDUSTRI B', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 1, 1, '2021-10-28 17:46:00', NULL, NULL, NULL, NULL),
(3, 'INDUSTRI C', 'when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', 1, 1, '2021-10-28 17:46:39', NULL, NULL, NULL, NULL);


-- --------------------------------------------------------

--
-- Table structure for table `dt_sponsor`
--

DROP TABLE IF EXISTS `dt_sponsor`;
CREATE TABLE `dt_sponsor` (
  `id` int NOT NULL,
  `kategori` int DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `url_website` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
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
(1, 1, 'media partner 1', 'jkashd.png', 'https://facebook.com', 1, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(2, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 1, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(3, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(4, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(5, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(6, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(7, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(8, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(9, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(10, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(11, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(12, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(13, 2, 'media partner 1', 'aosido.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(14, 1, 'media partner 1', 'jkashd.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(15, 1, 'media partner 1', 'jkashd.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(16, 1, 'media partner 1', 'jkashd.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(17, 1, 'media partner 1', 'jkashd.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(18, 1, 'media partner 1', 'jkashd.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(19, 1, 'media partner 1', 'jkashd.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL),
(20, 1, 'media partner 1', 'jkashd.png', 'https://facebook.com', 0, 1, '2021-10-28 22:05:24', NULL, NULL, NULL, NULL);

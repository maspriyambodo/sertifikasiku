
-- --------------------------------------------------------

--
-- Table structure for table `tr_chat`
--

DROP TABLE IF EXISTS `tr_chat`;
CREATE TABLE `tr_chat` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `msg` text COLLATE utf8mb4_general_ci NOT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tr_chat`
--

INSERT INTO `tr_chat` (`id`, `user_id`, `msg`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(3, 1, 'hahaha', 1, '2021-10-09 01:29:42', NULL, NULL, NULL, NULL),
(4, 1, 'hoihoiho', 1, '2021-10-09 01:31:18', NULL, NULL, NULL, NULL),
(5, 1, 'gakgagagkagk', 1, '2021-10-09 01:42:14', NULL, NULL, NULL, NULL),
(6, 2, 'komen dari administrator', 2, '2021-10-09 03:30:17', NULL, NULL, NULL, NULL),
(7, 3, 'komen dari platinum user', 3, '2021-10-09 03:30:45', NULL, NULL, NULL, NULL),
(8, 4, 'komen dari silver user', 4, '2021-10-09 03:31:09', NULL, NULL, NULL, NULL),
(9, 1, 'test', 1, '2021-10-09 04:15:07', NULL, NULL, NULL, NULL),
(10, 1, 'gagal', 1, '2021-10-09 04:16:20', NULL, NULL, NULL, NULL),
(11, 1, 'Lorem Ipsum has been', 1, '2021-10-09 21:09:10', NULL, NULL, NULL, NULL),
(12, 1, 'took a galley of', 1, '2021-10-09 21:09:20', NULL, NULL, NULL, NULL),
(13, 1, 'printing and typesetting', 1, '2021-10-09 21:10:48', NULL, NULL, NULL, NULL),
(14, 1, 'printing and typesetting', 1, '2021-10-09 21:10:56', NULL, NULL, NULL, NULL),
(15, 1, 'with desktop publishing', 1, '2021-10-09 21:13:14', NULL, NULL, NULL, NULL),
(16, 1, 'standard dummy text', 1, '2021-10-09 21:14:39', NULL, NULL, NULL, NULL),
(17, 1, 'Ipsum is simply', 1, '2021-10-09 21:16:19', NULL, NULL, NULL, NULL),
(18, 1, 'essentially unchanged', 1, '2021-10-09 21:17:28', NULL, NULL, NULL, NULL),
(19, 1, 'kontol', 1, '2021-10-09 21:28:23', NULL, NULL, NULL, NULL),
(20, 1, 'hahahaha', 1, '2021-10-09 21:30:35', NULL, NULL, NULL, NULL),
(21, 1, 'bisa nih', 1, '2021-10-09 21:31:07', NULL, NULL, NULL, NULL),
(22, 1, 'test on mobile', 1, '2021-10-09 21:46:28', NULL, NULL, NULL, NULL),
(23, 1, 'wah kok eror', 1, '2021-10-09 21:48:38', NULL, NULL, NULL, NULL);

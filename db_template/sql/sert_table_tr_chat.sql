
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
(3, 1, 'hahaha', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(4, 1, 'hoihoiho', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(5, 1, 'gakgagagkagk', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(6, 2, 'komen dari administrator', 2, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(7, 3, 'komen dari platinum user', 3, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(8, 4, 'komen dari silver user', 4, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(9, 1, 'test', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(10, 1, 'gagal', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(11, 1, 'Lorem Ipsum has been', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(12, 1, 'took a galley of', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(13, 1, 'printing and typesetting', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(14, 1, 'printing and typesetting', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(15, 1, 'with desktop publishing', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(16, 1, 'standard dummy text', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(17, 1, 'Ipsum is simply', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(18, 1, 'essentially unchanged', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(19, 1, 'kontol', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(20, 1, 'hahahaha', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(21, 1, 'bisa nih', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(22, 1, 'test on mobile', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(23, 1, 'wah kok eror', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(24, 1, 'test send lokal chat', 1, '2021-10-10 01:19:02', NULL, NULL, NULL, NULL),
(25, 1, 'bisa ni', 1, '2021-10-10 01:29:42', NULL, NULL, NULL, NULL),
(26, 1, 'cek cek', 1, '2021-10-10 21:37:49', NULL, NULL, NULL, NULL),
(27, 1, 'cke cek', 1, '2021-10-10 21:38:54', NULL, NULL, NULL, NULL),
(28, 1, 'cke cek', 1, '2021-10-10 21:39:07', NULL, NULL, NULL, NULL),
(29, 1, '<del class=\"text-danger\">censor</del>', 1, '2021-10-11 00:40:38', NULL, NULL, NULL, NULL),
(30, 1, '', 1, '2021-10-11 00:40:53', NULL, NULL, NULL, NULL),
(31, 3, '', 3, '2021-10-11 01:31:24', NULL, NULL, NULL, NULL),
(32, 3, '', 3, '2021-10-11 01:43:29', NULL, NULL, NULL, NULL),
(33, 3, '', 3, '2021-10-11 01:44:58', NULL, NULL, NULL, NULL),
(34, 3, '', 3, '2021-10-11 01:46:15', NULL, NULL, NULL, NULL),
(35, 3, '', 3, '2021-10-11 01:47:38', NULL, NULL, NULL, NULL),
(36, 3, '', 3, '2021-10-11 01:50:06', NULL, NULL, NULL, NULL),
(37, 3, '', 3, '2021-10-11 01:52:08', NULL, NULL, NULL, NULL),
(38, 3, '', 3, '2021-10-11 01:54:48', NULL, NULL, NULL, NULL),
(39, 3, '', 3, '2021-10-11 01:57:44', NULL, NULL, NULL, NULL);


-- --------------------------------------------------------

--
-- Table structure for table `tr_chat`
--

DROP TABLE IF EXISTS `tr_chat`;
CREATE TABLE `tr_chat` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `materi_id` int DEFAULT NULL,
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

INSERT INTO `tr_chat` (`id`, `user_id`, `materi_id`, `msg`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(3, 3, NULL, 'hahaha', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(4, 1, NULL, 'hoihoiho', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(5, 1, NULL, 'gakgagagkagk', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(6, 2, NULL, 'komen dari administrator', 2, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(7, 3, NULL, 'komen dari platinum user', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(8, 4, NULL, 'komen dari silver user', 4, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(9, 1, NULL, 'test', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(10, 1, NULL, 'gagal', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(11, 1, NULL, 'Lorem Ipsum has been', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(12, 1, NULL, 'took a galley of', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(13, 1, NULL, 'printing and typesetting', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(14, 1, NULL, 'printing and typesetting', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(15, 1, NULL, 'with desktop publishing', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(16, 1, NULL, 'standard dummy text', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(17, 1, NULL, 'Ipsum is simply', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(18, 1, NULL, 'essentially unchanged', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(19, 1, NULL, 'kontol', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(20, 1, NULL, 'hahahaha', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(21, 1, NULL, 'bisa nih', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(22, 1, NULL, 'test on mobile', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(23, 1, NULL, 'wah kok eror', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(24, 1, NULL, 'test send lokal chat', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(25, 1, NULL, 'bisa ni', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(26, 1, NULL, 'cek cek', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(27, 1, NULL, 'cke cek', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(28, 1, NULL, 'cke cek', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(29, 1, NULL, '<del class=\"text-danger\">censor</del>', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(30, 1, NULL, '', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(31, 3, NULL, '', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(32, 3, NULL, '', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(33, 3, NULL, '', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(34, 3, NULL, '', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(35, 3, NULL, '', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(36, 3, NULL, '', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(37, 3, NULL, '', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(38, 3, NULL, '', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(39, 3, NULL, '', 3, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(40, 1, NULL, 'test', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(41, 1, NULL, 'tes dari lokal', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(42, 1, NULL, 'test dari lokal', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL),
(43, 1, NULL, '<del class=\"text-danger\">censor</del>', 1, '2021-10-14 01:29:42', NULL, NULL, NULL, NULL);


-- --------------------------------------------------------

--
-- Table structure for table `tr_chat`
--

DROP TABLE IF EXISTS `tr_chat`;
CREATE TABLE `tr_chat` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `materi_id` int DEFAULT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
(0, 2, 1, 'TESTING SEND CHAT', 2, '2021-10-30 02:31:04', NULL, NULL, NULL, NULL);

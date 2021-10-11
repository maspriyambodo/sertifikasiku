
-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

DROP TABLE IF EXISTS `sys_users`;
CREATE TABLE `sys_users` (
  `id` int NOT NULL,
  `uname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `pict` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `stat` int DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `login_attempt` int DEFAULT '0',
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`id`, `uname`, `pwd`, `role_id`, `pict`, `stat`, `last_login`, `ip_address`, `login_attempt`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'bod', '$2y$10$MR5pL70DrGTDCgVN5cgKeOvHW2fpGQPw1laBIOCmN4uDduSsgCFvS', 1, 'users09_014016.jpg', 1, '2021-10-11 02:04:32', '127.0.0.1', 0, 1, '2021-03-07 23:06:13', 1, '2021-10-09 01:40:16', 0, '2021-07-08 00:09:25'),
(2, 'administrator', '$2y$10$BE6bAPmNz0Hh1g5yL3Tk6Ov4j1HYs55ngBwSH8FHpyUY4Go7zVx6i', 2, 'blank.png', 1, '2021-10-09 03:10:25', '127.0.0.1', 0, 1, '2021-10-09 03:10:15', NULL, NULL, NULL, NULL),
(3, 'Teresa', '$2y$10$AKxxsTFe6i4u11AoSFf2cuIsxnRgO9NviKtdlZo5/XuaBLfHsq9Qe', 3, 'blank.png', 1, '2021-10-11 01:31:20', '127.0.0.1', 0, 1, '2021-10-09 03:15:47', NULL, NULL, NULL, NULL),
(4, 'Lisa', '$2y$10$zVsxkwKVXVIdHnXRWZz46ujMoPecalNqSwK75o9OR9yq7fpeP7NVK', 4, 'blank.png', 1, NULL, NULL, 0, 1, '2021-10-09 03:16:15', NULL, NULL, NULL, NULL);

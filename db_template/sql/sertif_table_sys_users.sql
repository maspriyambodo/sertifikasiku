
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
  `login_stat` int DEFAULT '0' COMMENT '1. login, 0. offline',
  `login_attempt` int DEFAULT '0',
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
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

INSERT INTO `sys_users` (`id`, `uname`, `pwd`, `role_id`, `pict`, `stat`, `last_login`, `ip_address`, `login_stat`, `login_attempt`, `user_agent`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 'bod', '$2y$10$BE6bAPmNz0Hh1g5yL3Tk6Ov4j1HYs55ngBwSH8FHpyUY4Go7zVx6i', 1, 'blank', 1, '2021-10-31 17:02:43', '127.0.0.1', 0, 0, NULL, 1, '1970-01-01 01:40:28', NULL, NULL, NULL, NULL),
(2, 'administrator', '$2y$10$gqFEWNPKRJOUfSrpsvJSg.iW.xpWJQuV0x1akfVlWz2yNLAVyEoQ.', 1, 'users30_022620.jpg', 1, '2021-10-30 02:26:39', '127.0.0.1', 0, 0, NULL, 1, '2021-10-30 02:15:51', 2, '2021-10-30 02:26:20', NULL, NULL);

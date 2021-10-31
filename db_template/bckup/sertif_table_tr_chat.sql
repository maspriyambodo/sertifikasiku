
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
-- RELATIONSHIPS FOR TABLE `tr_chat`:
--   `user_id`
--       `sys_users` -> `id`
--   `materi_id`
--       `dt_materi` -> `id`
--

--
-- Dumping data for table `tr_chat`
--

INSERT INTO `tr_chat` (`id`, `user_id`, `materi_id`, `msg`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(2, 14185, 4, 'test min', 14185, '2021-10-29 15:58:46', NULL, NULL, NULL, NULL),
(3, 13866, 4, 'test', 13866, '2021-10-29 16:03:09', NULL, NULL, NULL, NULL),
(4, 13866, 4, 'check', 13866, '2021-10-29 16:09:31', NULL, NULL, NULL, NULL),
(5, 14506, 4, 'Yoo', 14506, '2021-10-29 16:11:56', NULL, NULL, NULL, NULL),
(6, 15110, 4, 'nothing voice', 15110, '2021-10-29 16:12:42', NULL, NULL, NULL, NULL),
(7, 15147, 4, 'ga ada suara kah', 15147, '2021-10-29 16:13:01', NULL, NULL, NULL, NULL),
(8, 15181, 4, 'Apakah tidak ada suarannya ya', 15181, '2021-10-29 16:13:18', NULL, NULL, NULL, NULL),
(9, 15147, 4, 'videonya juga ga ada ya?', 15147, '2021-10-29 16:13:29', NULL, NULL, NULL, NULL),
(10, 13866, 4, 'chechk', 13866, '2021-10-29 16:13:59', NULL, NULL, NULL, NULL),
(11, 15178, 4, 'test suara <del class=\"text-danger\">censor</del>', 15178, '2021-10-29 16:14:09', NULL, NULL, NULL, NULL),
(12, 15125, 4, 'apakah memang belum mulai?', 15125, '2021-10-29 16:14:20', NULL, NULL, NULL, NULL),
(13, 15178, 4, 'test suaranya min', 15178, '2021-10-29 16:14:25', NULL, NULL, NULL, NULL),
(14, 2, 4, 'mohon di tunggu ya kak', 2, '2021-10-29 16:14:37', NULL, NULL, NULL, NULL),
(15, 15125, 4, 'Baik kak', 15125, '2021-10-29 16:14:54', NULL, NULL, NULL, NULL),
(16, 15163, 4, 'iya kak', 15163, '2021-10-29 16:15:12', NULL, NULL, NULL, NULL),
(17, 15178, 4, 'ok', 15178, '2021-10-29 16:16:03', NULL, NULL, NULL, NULL),
(18, 15178, 4, 'terdengar', 15178, '2021-10-29 16:16:20', NULL, NULL, NULL, NULL),
(19, 15110, 4, 'nah', 15110, '2021-10-29 16:16:36', NULL, NULL, NULL, NULL),
(20, 15163, 4, 'mf', 15163, '2021-10-29 16:18:02', NULL, NULL, NULL, NULL),
(21, 15139, 4, 'Hadir A. Benny Suprani', 15139, '2021-10-29 16:18:22', NULL, NULL, NULL, NULL),
(22, 15163, 4, 'kok gk ada suaranya ya kak', 15163, '2021-10-29 16:18:24', NULL, NULL, NULL, NULL),
(23, 15178, 4, 'jaksel', 15178, '2021-10-29 16:18:36', NULL, NULL, NULL, NULL),
(24, 15110, 4, 'medaaaaaaan', 15110, '2021-10-29 16:18:37', NULL, NULL, NULL, NULL),
(25, 15146, 4, 'Gas', 15146, '2021-10-29 16:19:03', NULL, NULL, NULL, NULL),
(26, 15146, 4, 'Trading kripto', 15146, '2021-10-29 16:19:13', NULL, NULL, NULL, NULL),
(27, 13866, 4, 'medannnnnn', 13866, '2021-10-29 16:20:12', NULL, NULL, NULL, NULL),
(28, 15127, 4, 'hadir', 15127, '2021-10-29 16:22:42', NULL, NULL, NULL, NULL),
(29, 15143, 4, 'lombok hadir', 15143, '2021-10-29 16:23:38', NULL, NULL, NULL, NULL),
(30, 15160, 4, 'Test', 15160, '2021-10-29 16:23:45', NULL, NULL, NULL, NULL),
(31, 15143, 4, 'link absensi mana admin', 15143, '2021-10-29 16:24:14', NULL, NULL, NULL, NULL),
(32, 2, 4, 'link absensi akan muncul di akhir acara ya kak', 2, '2021-10-29 16:24:52', NULL, NULL, NULL, NULL),
(33, 15178, 4, 'analisa teknikal dan fundamental bedanya apa? yang lebih bagus atau powerfull yang mana?', 15178, '2021-10-29 16:25:41', NULL, NULL, NULL, NULL),
(34, 15183, 4, 'Seberapa besar impact teknikal analyst untuk penunjang trading dalam meraih value growth ? Terimakasih', 15183, '2021-10-29 16:26:17', NULL, NULL, NULL, NULL),
(35, 15178, 4, 'kenapa saham dan crypto saja? forex dan gold ga bisa?', 15178, '2021-10-29 16:26:31', NULL, NULL, NULL, NULL),
(36, 15135, 4, 'Mahruf dari UT Bandarlampung', 15135, '2021-10-29 16:27:01', NULL, NULL, NULL, NULL),
(37, 15135, 4, 'Nyimak', 15135, '2021-10-29 16:27:12', NULL, NULL, NULL, NULL),
(38, 14509, 4, 'mantaap', 14509, '2021-10-29 16:27:42', NULL, NULL, NULL, NULL),
(39, 15135, 4, 'Cara absen gimanakah?', 15135, '2021-10-29 16:27:52', NULL, NULL, NULL, NULL),
(40, 15124, 4, 'bagaimana cara mengetahui waktu yang tepat untuk cut loss kak?', 15124, '2021-10-29 16:28:14', NULL, NULL, NULL, NULL),
(41, 14381, 4, 'Tes', 14381, '2021-10-29 16:28:30', NULL, NULL, NULL, NULL),
(42, 15178, 4, 'MM yang bagus brp?', 15178, '2021-10-29 16:28:40', NULL, NULL, NULL, NULL),
(43, 15135, 4, 'Terimakasih Admin🙏', 15135, '2021-10-29 16:29:59', NULL, NULL, NULL, NULL),
(44, 13866, 4, 'moving average untuk saham paling bagus apa ya?', 13866, '2021-10-29 16:32:03', NULL, NULL, NULL, NULL),
(45, 15116, 4, 'Cara memakai fibonacci bagaimana', 15116, '2021-10-29 16:37:06', NULL, NULL, NULL, NULL),
(46, 15211, 4, 'crypto gmn bang ?', 15211, '2021-10-29 16:38:18', NULL, NULL, NULL, NULL),
(47, 15116, 4, 'Untuk menentukan resisten, support dan pivot bagaimana', 15116, '2021-10-29 16:39:11', NULL, NULL, NULL, NULL),
(48, 15139, 4, 'Saat kapan timing cut loss?. Apa indikator yg mendukung saat cutloss? Terima kasih', 15139, '2021-10-29 16:46:44', NULL, NULL, NULL, NULL),
(49, 13866, 4, 'cara screening saham paling efektif gimana ya bang?', 13866, '2021-10-29 16:52:06', NULL, NULL, NULL, NULL),
(50, 15197, 4, 'screening saham paling enak tuh pake app DSI :D pake kriteria stochastic, net akumulasi asing, net akumulasi bandar.. the best dah', 15197, '2021-10-29 16:59:20', NULL, NULL, NULL, NULL),
(51, 15135, 4, 'Absen <del class=\"text-danger\">censor</del>', 15135, '2021-10-29 17:06:31', NULL, NULL, NULL, NULL),
(52, 14381, 4, 'q sudah absen kak', 14381, '2021-10-29 17:07:10', NULL, NULL, NULL, NULL),
(53, 2, 4, 'absen sudah muncul di screen ya kak', 2, '2021-10-29 17:07:10', NULL, NULL, NULL, NULL),
(54, 14381, 4, 'kak admin....absensinya cuma nama aja kan kak', 14381, '2021-10-29 17:07:56', NULL, NULL, NULL, NULL),
(55, 15139, 4, 'Sdh masuk absen tapi ga bisa diisi. Kenapa ya?', 15139, '2021-10-29 17:08:16', NULL, NULL, NULL, NULL),
(56, 2, 4, 'iya benar kak', 2, '2021-10-29 17:08:22', NULL, NULL, NULL, NULL),
(57, 15139, 4, 'Bisa dibantu ulang Bapak Ibu Admin? Saya belum sempat isi tadi', 15139, '2021-10-29 17:09:10', NULL, NULL, NULL, NULL),
(58, 15190, 4, 'iya kak saya blm bisa absen', 15190, '2021-10-29 17:09:30', NULL, NULL, NULL, NULL),
(59, 15190, 4, 'iya kak saya blm bisa absen', 15190, '2021-10-29 17:09:30', NULL, NULL, NULL, NULL),
(60, 15195, 4, 'kak habis absen di klik hadir tadi auto keluar gitu dari webinarnya, itu udah ke record absensinya kak? terimakasih', 15195, '2021-10-29 17:09:48', NULL, NULL, NULL, NULL),
(61, 2, 4, 'iya betul kak', 2, '2021-10-29 17:10:02', NULL, NULL, NULL, NULL),
(62, 15136, 4, 'mohon maaf, tasi nama pattern yang disebut itu maru bozou ya?', 15136, '2021-10-29 17:10:46', NULL, NULL, NULL, NULL),
(63, 15139, 4, 'Mohon maaf Kak saya kok ga bisa ketik nama diisian absen ya? Mohon dibantu', 15139, '2021-10-29 17:12:12', NULL, NULL, NULL, NULL),
(64, 15148, 4, 'link absen nya ada dimana ya?', 15148, '2021-10-29 17:12:53', NULL, NULL, NULL, NULL),
(65, 14381, 4, 'kalau bisa kirim ulang kak', 14381, '2021-10-29 17:13:22', NULL, NULL, NULL, NULL),
(66, 15190, 4, 'maaf kak saya tidak bisa ngetik karena sudah saya klik2 tidak bisa', 15190, '2021-10-29 17:13:40', NULL, NULL, NULL, NULL),
(67, 15184, 4, 'Belum bisa klik kolom nama kak', 15184, '2021-10-29 17:13:46', NULL, NULL, NULL, NULL),
(68, 15225, 4, 'halo', 15225, '2021-10-29 17:14:32', NULL, NULL, NULL, NULL),
(69, 15181, 4, 'Apakah absensi sudah dibagikan', 15181, '2021-10-29 17:15:44', NULL, NULL, NULL, NULL),
(70, 15135, 4, 'Sudah ka  cuma nama alhamdulillah.terimakasih ka', 15135, '2021-10-29 17:16:45', NULL, NULL, NULL, NULL),
(71, 15129, 4, 'Kenapa sy gak bisa ketik nama di kolom nya ya?', 15129, '2021-10-29 17:18:04', NULL, NULL, NULL, NULL),
(72, 14381, 4, 'kak ini sudah kan saya mau close cz sholat', 14381, '2021-10-29 17:19:07', NULL, NULL, NULL, NULL),
(73, 2, 4, 'iya sudah selesai kak', 2, '2021-10-29 17:19:34', NULL, NULL, NULL, NULL),
(74, 2, 4, 'kak tri absennya sudah masuk ya kak', 2, '2021-10-29 17:20:17', NULL, NULL, NULL, NULL),
(75, 15171, 4, 'ini mau ngisi nama kok gabisa?', 15171, '2021-10-29 17:20:39', NULL, NULL, NULL, NULL),
(76, 15129, 4, 'Terima kasih kak admin,', 15129, '2021-10-29 17:21:04', NULL, NULL, NULL, NULL),
(77, 15190, 4, 'kak saya belum bisa absen dari tadi', 15190, '2021-10-29 17:21:38', NULL, NULL, NULL, NULL),
(78, 15184, 4, 'Kak tolong kirim ulang kolom absensinya ya', 15184, '2021-10-29 17:22:00', NULL, NULL, NULL, NULL),
(79, 15148, 4, 'saya juga belum bisa', 15148, '2021-10-29 17:22:01', NULL, NULL, NULL, NULL),
(80, 15144, 4, 'Link absennya dimana?', 15144, '2021-10-29 17:23:09', NULL, NULL, NULL, NULL),
(81, 15127, 4, 'gabisa di refresh jd ngestuck', 15127, '2021-10-29 17:23:39', NULL, NULL, NULL, NULL),
(82, 2, 4, 'apanya kak yang stuck ?', 2, '2021-10-29 17:24:13', NULL, NULL, NULL, NULL),
(83, 2, 4, 'untuk webinarnya sudah selesai, jadi hanya menampilkan gambar saja', 2, '2021-10-29 17:24:28', NULL, NULL, NULL, NULL),
(84, 15127, 4, 'jd untuk absennya gmn', 15127, '2021-10-29 17:24:53', NULL, NULL, NULL, NULL),
(85, 15127, 4, 'ini saya gabisa absen', 15127, '2021-10-29 17:24:59', NULL, NULL, NULL, NULL),
(86, 15148, 4, 'yg blm absen bagaimana ya?', 15148, '2021-10-29 17:25:21', NULL, NULL, NULL, NULL),
(87, 15181, 4, 'Yang belum absensi gimana ya ka', 15181, '2021-10-29 17:26:32', NULL, NULL, NULL, NULL),
(88, 2, 4, 'sudah kami kirim kembali kak popup absennya', 2, '2021-10-29 17:28:22', NULL, NULL, NULL, NULL),
(89, 15127, 4, 'saya berhasil ga min absennya', 15127, '2021-10-29 17:29:31', NULL, NULL, NULL, NULL),
(90, 2, 4, 'sudah berhasil kak', 2, '2021-10-29 17:30:25', NULL, NULL, NULL, NULL),
(91, 15148, 4, 'ga bisa absen', 15148, '2021-10-29 17:35:23', NULL, NULL, NULL, NULL),
(92, 1, 3, 'hallloooo', 1, '2021-10-29 23:44:45', NULL, NULL, NULL, NULL);

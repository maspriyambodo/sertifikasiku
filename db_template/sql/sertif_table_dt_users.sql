
-- --------------------------------------------------------

--
-- Table structure for table `dt_users`
--

DROP TABLE IF EXISTS `dt_users`;
CREATE TABLE `dt_users` (
  `id` int NOT NULL,
  `sys_user_id` int DEFAULT NULL COMMENT 'relasi dengan ID table sys_users',
  `nama` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `jenis_kelamin` int NOT NULL DEFAULT '0' COMMENT '1. Male\r\n2. Female',
  `id_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'bisa nomor ktp, nomor induk pegawai, nomor induk karyawan',
  `lahir_1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'tempat lahir',
  `lahir_2` date DEFAULT NULL COMMENT 'tanggal_lahir',
  `address_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL COMMENT 'alamat nama jalan',
  `address_provinsi` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_kabupaten` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_kecamatan` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address_kelurahan` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `negara` int DEFAULT '101',
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `pekerjaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `stat` int DEFAULT NULL,
  `syscreateuser` int DEFAULT NULL,
  `syscreatedate` datetime DEFAULT NULL,
  `sysupdateuser` int DEFAULT NULL,
  `sysupdatedate` datetime DEFAULT NULL,
  `sysdeleteuser` int DEFAULT NULL,
  `sysdeletedate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dt_users`
--

INSERT INTO `dt_users` (`id`, `sys_user_id`, `nama`, `jenis_kelamin`, `id_number`, `lahir_1`, `lahir_2`, `address_1`, `address_provinsi`, `address_kabupaten`, `address_kecamatan`, `address_kelurahan`, `negara`, `mail`, `telp`, `pekerjaan`, `stat`, `syscreateuser`, `syscreatedate`, `sysupdateuser`, `sysupdatedate`, `sysdeleteuser`, `sysdeletedate`) VALUES
(1, 1, 'priyambodo', 1, '3175061303940001', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 101, 'maspriyambodo', '081282309100', 'kerja', 1, 1, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00', 1, '1970-01-01 00:00:00'),
(2, 2, 'administrator', 1, '3171234567890001', 'DKI JAKARTA', '1970-01-01', 'Jl. Rini No. 61 RT 6/RW 2', '31', '3174', '317404', '3174041004', 101, 'Hallo@sertifikasiku.com', '6281318984005', 'administrator', 1, 1, '2021-10-30 02:15:51', 2, '2021-10-30 02:26:20', NULL, NULL);


-- --------------------------------------------------------

--
-- Structure for view `absensi_materi`
--
DROP TABLE IF EXISTS `absensi_materi`;

DROP VIEW IF EXISTS `absensi_materi`;
CREATE OR REPLACE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `absensi_materi`  AS SELECT `dt_materi`.`id` AS `id_materi`, `dt_materi`.`nama_materi` AS `nama_materi`, `dt_materi`.`time_start` AS `time_start`, `dt_materi`.`time_stop` AS `time_stop`, `tr_absensi`.`id` AS `id_absensi`, `tr_absensi`.`user_id` AS `user_id`, (case when (`tr_absensi`.`stat` = 1) then 'hadir' else 'tidak hadir' end) AS `absen`, `sys_users`.`uname` AS `uname` FROM ((`dt_materi` left join `tr_absensi` on((`dt_materi`.`id` = `tr_absensi`.`materi_id`))) left join `sys_users` on((`tr_absensi`.`user_id` = `sys_users`.`id`))) ;

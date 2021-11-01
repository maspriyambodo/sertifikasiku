
--
-- Indexes for dumped tables
--

--
-- Indexes for table `dt_materi`
--
ALTER TABLE `dt_materi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `id_sesi` (`id_sesi`),
  ADD KEY `id_industri` (`id_industri`),
  ADD KEY `id_klasifikasi` (`id_klasifikasi`);

--
-- Indexes for table `dt_notif`
--
ALTER TABLE `dt_notif`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `role_id` (`role_id`),
  ADD KEY `syscreateuser` (`syscreateuser`);

--
-- Indexes for table `dt_pwd`
--
ALTER TABLE `dt_pwd`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `syscreateuser` (`syscreateuser`) USING BTREE;

--
-- Indexes for table `dt_sponsor`
--
ALTER TABLE `dt_sponsor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `syscreateuser` (`syscreateuser`);

--
-- Indexes for table `dt_users`
--
ALTER TABLE `dt_users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `id_user` (`sys_user_id`) USING BTREE,
  ADD KEY `address_provinsi` (`address_provinsi`) USING BTREE,
  ADD KEY `address_kelurahan` (`address_kelurahan`) USING BTREE,
  ADD KEY `address_kecamatan` (`address_kecamatan`) USING BTREE,
  ADD KEY `address_kabupaten` (`address_kabupaten`) USING BTREE,
  ADD KEY `negara` (`negara`) USING BTREE;

--
-- Indexes for table `mt_country`
--
ALTER TABLE `mt_country`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `code` (`code`) USING BTREE,
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `mt_industri`
--
ALTER TABLE `mt_industri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_klasifikasi`
--
ALTER TABLE `mt_klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_sesimateri`
--
ALTER TABLE `mt_sesimateri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mt_wil_kabupaten`
--
ALTER TABLE `mt_wil_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`) USING BTREE,
  ADD UNIQUE KEY `id_kabupaten` (`id_kabupaten`) USING BTREE,
  ADD KEY `id_provinsi` (`id_provinsi`) USING BTREE;

--
-- Indexes for table `mt_wil_kecamatan`
--
ALTER TABLE `mt_wil_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`) USING BTREE,
  ADD UNIQUE KEY `id_kecamatan` (`id_kecamatan`) USING BTREE,
  ADD KEY `id_kabupaten` (`id_kabupaten`) USING BTREE;

--
-- Indexes for table `mt_wil_kelurahan`
--
ALTER TABLE `mt_wil_kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`) USING BTREE,
  ADD UNIQUE KEY `id_kelurahan` (`id_kelurahan`) USING BTREE,
  ADD KEY `id_kecamatan` (`id_kecamatan`) USING BTREE;

--
-- Indexes for table `mt_wil_provinsi`
--
ALTER TABLE `mt_wil_provinsi`
  ADD PRIMARY KEY (`id_provinsi`) USING BTREE,
  ADD UNIQUE KEY `id_provinsi` (`id_provinsi`) USING BTREE;

--
-- Indexes for table `sys_app`
--
ALTER TABLE `sys_app`
  ADD PRIMARY KEY (`favico`) USING BTREE,
  ADD KEY `favico` (`favico`) USING BTREE,
  ADD KEY `syscreateuser` (`syscreateuser`);

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `group_menu` (`group_menu`) USING BTREE;

--
-- Indexes for table `sys_menu_group`
--
ALTER TABLE `sys_menu_group`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indexes for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD KEY `sys_permissions_ibfk_1` (`role_id`) USING BTREE,
  ADD KEY `id_menu` (`id_menu`) USING BTREE;

--
-- Indexes for table `sys_roles`
--
ALTER TABLE `sys_roles`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id` (`id`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE,
  ADD UNIQUE KEY `uname` (`uname`) USING BTREE,
  ADD KEY `role_id` (`role_id`) USING BTREE;

--
-- Indexes for table `tr_absensi`
--
ALTER TABLE `tr_absensi`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `materi_id` (`materi_id`);

--
-- Indexes for table `tr_chat`
--
ALTER TABLE `tr_chat`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `materi_id` (`materi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dt_materi`
--
ALTER TABLE `dt_materi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dt_notif`
--
ALTER TABLE `dt_notif`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_pwd`
--
ALTER TABLE `dt_pwd`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_sponsor`
--
ALTER TABLE `dt_sponsor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `dt_users`
--
ALTER TABLE `dt_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mt_country`
--
ALTER TABLE `mt_country`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_industri`
--
ALTER TABLE `mt_industri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_klasifikasi`
--
ALTER TABLE `mt_klasifikasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mt_sesimateri`
--
ALTER TABLE `mt_sesimateri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sys_menu_group`
--
ALTER TABLE `sys_menu_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `sys_roles`
--
ALTER TABLE `sys_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dt_materi`
--
ALTER TABLE `dt_materi`
  ADD CONSTRAINT `dt_materi_ibfk_1` FOREIGN KEY (`id_sesi`) REFERENCES `mt_sesimateri` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_materi_ibfk_2` FOREIGN KEY (`id_industri`) REFERENCES `mt_industri` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_materi_ibfk_3` FOREIGN KEY (`id_klasifikasi`) REFERENCES `mt_klasifikasi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dt_notif`
--
ALTER TABLE `dt_notif`
  ADD CONSTRAINT `dt_notif_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `sys_roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_notif_ibfk_2` FOREIGN KEY (`syscreateuser`) REFERENCES `dt_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dt_pwd`
--
ALTER TABLE `dt_pwd`
  ADD CONSTRAINT `dt_pwd_ibfk_1` FOREIGN KEY (`syscreateuser`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dt_sponsor`
--
ALTER TABLE `dt_sponsor`
  ADD CONSTRAINT `dt_sponsor_ibfk_1` FOREIGN KEY (`syscreateuser`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `dt_users`
--
ALTER TABLE `dt_users`
  ADD CONSTRAINT `dt_users_ibfk_1` FOREIGN KEY (`sys_user_id`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_2` FOREIGN KEY (`address_provinsi`) REFERENCES `mt_wil_provinsi` (`id_provinsi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_3` FOREIGN KEY (`address_kelurahan`) REFERENCES `mt_wil_kelurahan` (`id_kelurahan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_4` FOREIGN KEY (`address_kecamatan`) REFERENCES `mt_wil_kecamatan` (`id_kecamatan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_5` FOREIGN KEY (`address_kabupaten`) REFERENCES `mt_wil_kabupaten` (`id_kabupaten`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `dt_users_ibfk_6` FOREIGN KEY (`negara`) REFERENCES `mt_country` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_wil_kabupaten`
--
ALTER TABLE `mt_wil_kabupaten`
  ADD CONSTRAINT `mt_wil_kabupaten_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `mt_wil_provinsi` (`id_provinsi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_wil_kecamatan`
--
ALTER TABLE `mt_wil_kecamatan`
  ADD CONSTRAINT `mt_wil_kecamatan_ibfk_1` FOREIGN KEY (`id_kabupaten`) REFERENCES `mt_wil_kabupaten` (`id_kabupaten`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mt_wil_kelurahan`
--
ALTER TABLE `mt_wil_kelurahan`
  ADD CONSTRAINT `mt_wil_kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `mt_wil_kecamatan` (`id_kecamatan`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sys_app`
--
ALTER TABLE `sys_app`
  ADD CONSTRAINT `sys_app_ibfk_1` FOREIGN KEY (`syscreateuser`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD CONSTRAINT `sys_menu_ibfk_1` FOREIGN KEY (`group_menu`) REFERENCES `sys_menu_group` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sys_permissions`
--
ALTER TABLE `sys_permissions`
  ADD CONSTRAINT `sys_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `sys_roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `sys_permissions_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `sys_menu` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD CONSTRAINT `sys_users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `sys_roles` (`id`);

--
-- Constraints for table `tr_absensi`
--
ALTER TABLE `tr_absensi`
  ADD CONSTRAINT `tr_absensi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tr_absensi_ibfk_2` FOREIGN KEY (`materi_id`) REFERENCES `dt_materi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tr_chat`
--
ALTER TABLE `tr_chat`
  ADD CONSTRAINT `tr_chat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `sys_users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `tr_chat_ibfk_2` FOREIGN KEY (`materi_id`) REFERENCES `dt_materi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

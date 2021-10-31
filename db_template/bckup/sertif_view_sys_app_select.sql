
-- --------------------------------------------------------

--
-- Structure for view `sys_app_select`
--
DROP TABLE IF EXISTS `sys_app_select`;

DROP VIEW IF EXISTS `sys_app_select`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sys_app_select`  AS SELECT `sys_app`.`favico` AS `favico`, `sys_app`.`logo` AS `logo`, `sys_app`.`company_name` AS `company_name`, `sys_app`.`app_name` AS `app_name`, `sys_app`.`app_year` AS `app_year`, `sys_app`.`login_member` AS `login_member` FROM `sys_app` ;

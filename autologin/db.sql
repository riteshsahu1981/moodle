CREATE TABLE `mdl_autologin_login` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`moodle_username` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`laravel_username` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`login_status` INT(11) NOT NULL,
	`created_at` DATETIME NULL DEFAULT NULL,
	`updated_at` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;
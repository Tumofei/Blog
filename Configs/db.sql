CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` TEXT NULL,
	`email` VARCHAR(200) NULL DEFAULT NULL,
	`password` VARCHAR(50) NULL DEFAULT NULL,
	`role_id` TINYINT(4) NULL DEFAULT '3',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `email` (`email`),
	INDEX `FK_users_role` (`role_id`),
	CONSTRAINT `FK_users_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
)
CREATE TABLE `posts` (
	`id_users` INT(11) NULL DEFAULT NULL,
	`name_post` TEXT NOT NULL,
	`content` TEXT NULL,
	`date_create` DATE NOT NULL,
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`)
)
CREATE TABLE `role` (
	`id` TINYINT(4) NOT NULL AUTO_INCREMENT,
	`name` TINYTEXT NULL,
	`level` VARCHAR(50) NULL DEFAULT 'user',
	PRIMARY KEY (`id`)
)

INSERT INTO role (id, name, level) VALUES ('1', 'Пользователь', 'user');
INSERT INTO role (id, name, level) VALUES ('2', 'Модератор', 'moderator');
INSERT INTO role (id, name, level) VALUES ('3', 'Администратор', 'admin');

INSERT INTO users (name, email, password, role_id) VALUES ('admin' , 'admin@gmail.com' , '21232f297a57a5a743894a0e4a801fc3'  , '3' ); \\pass - admin
INSERT INTO users (name, email, password, role_id) VALUES ('moderator' , 'moderator@gmail.com' , '0408f3c997f309c03b08bf3a4bc7b730'  , '2' ); \\pass - moderator
INSERT INTO users (name, email, password, role_id) VALUES ('user' , 'user@gmail.com'   , 'ee11cbb19052e40b07aac0ca060c23ee'  , '1' ); \\pass - user


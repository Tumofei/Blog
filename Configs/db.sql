CREATE TABLE users(
id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
name TEXT,
email VARCHAR(200) UNIQUE,
password VARCHAR(50),
permission CHAR(50)
);
CREATE TABLE posts(
id_users INTEGER,	
name_post TEXT NOT NULL,
content TEXT,
date_create DATE NOT NULL,
id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY
);
INSERT INTO users (name, email, password, permission) VALUES ('admin' , 'admin@gmail.com' , '21232f297a57a5a743894a0e4a801fc3'  , 'admin' );


CREATE TABLE `role` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` TINYTEXT NULL,
	`level` VARCHAR(50) NULL DEFAULT 'user',
	PRIMARY KEY (`id`)
)

INSERT INTO role (id, name, level) VALUES ('1', 'Пользователь', 'user');
INSERT INTO role (id, name, level) VALUES ('2', 'Модератор', 'moderator');
INSERT INTO role (id, name, level) VALUES ('3', 'Администратор', 'admin');
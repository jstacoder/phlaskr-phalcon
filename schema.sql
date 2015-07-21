SET foreign_key_checks = 0;
DROP TABLE IF EXISTS `messages`;
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(70) NOT NULL,
      `email` varchar(70) NOT NULL,
      PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `messages` (
      `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `title` varchar(70) NOT NULL,
      `text` varchar(500) NOT NULL,
      `author_id` int(10) unsigned,
      CONSTRAINT `fk_user_msg` FOREIGN KEY (`author_id`) REFERENCES `users`(`id`),
      PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `posts`;

CREATE TABLE IF NOT EXISTS `posts` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `title` varchar(255),
    `body` varchar(500),
    `excerpt` varchar(500),
    `published` datetime DEFAULT NULL,
    `updated` datetime DEFAULT NULL,
    `pinged` int(1),
    `to_ping` int(1),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET foreign_key_checks = 1;

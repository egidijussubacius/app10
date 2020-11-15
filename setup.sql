CREATE DATABASE app10db;
USE app10db;

CREATE TABLE `continent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `continent_id` int(11) NOT NULL,
  `name` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
 
  KEY `IDX_5373C966921F4C77` (`continent_id`),
  CONSTRAINT `FK_5373C966921F4C77` FOREIGN KEY (`continent_id`) REFERENCES `continent` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

